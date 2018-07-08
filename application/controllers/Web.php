<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data = new stdClass();

		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false ) {
			
			// validation not ok, send validation errors to the view
			if (empty($_SESSION['logged_in'])) {
				$this->load->view('index');
			}else{
				header("location:".base_url('index.php/web/dashboard'));
			}
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->dtmodel->cek_user($username, $password)) {
				
				$user_id = $this->dtmodel->get_user_id_from_username($username);
				$user    = $this->dtmodel->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_dosen']     = (bool)$user->is_dosen;
				$_SESSION['email']		  = (string)$user->email;
				// user login ok
				$data->error='';
				header("location:".base_url('index.php/web/dashboard'));
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('index', $data);
				
			}
			
		}

	}
	public function dashboard(){
	/*	$data = new stdClass();*/
			if ($_SESSION['is_dosen']=='1') {
				$this->form_validation->set_rules('nama','Nama', 'trim|required');			
				$data['kelas'] = $this->dtmodel->show_kelas($_SESSION['username']);
			}else{
				$this->form_validation->set_rules('enrol','Enrol', 'trim|required');
				$data['kelas'] = $this->dtmodel->class_joined($_SESSION['username']);
			}
			
			if ($this->form_validation->run()===false) {
				if (empty($_SESSION['logged_in'])) {
					$this->load->view('index');
				}else{
					$this->load->view('header');
					$this->load->view('user/dashboard/course', $data);
					$this->load->view('footer');
				}
			}else {
					if ($_SESSION['is_dosen']=='1') {
						$nama 	   = $this->input->post('nama');
						$section   = $this->input->post('section');
						$deskripsi = $this->input->post('deskripsi');

						$dt = array('kelas_id'=>null,
									'nama'=> $nama,
									'section'=>$section,
									'deskripsi'=>$deskripsi,
									'enrol'=>substr(md5($nama), 5),
									'nip'=>$_SESSION['username']);

						if ($this->dtmodel->create_class($dt)) {
							header("location:".base_url('index.php/web/'));
						}else{
							echo "error";
						}
					}else{
						$enrol 	  = $this->input->post('enrol');
						$kelas = $this->dtmodel->get_kelas_id_from_enrol($enrol);
						$kelas_id = (int)$kelas->kelas_id;
						$dt = array('anggota_id'=>null,
									'nim'=>$_SESSION['username'],
									'kelas_id'=> $kelas_id);
					
						if ($this->dtmodel->join($dt)) {
							header("location:".base_url('index.php/web/'));
							echo "<br><br><br><p></p>$kelas_id";
						}else{
							echo "error";
						}
					}
			}
	}
	public function do_delete_joined($kelas_id){
		$do = $this->dtmodel->delete_joined($kelas_id);
		if ($do) {
			header("location:".base_url('index.php/web'));
		}
	}
	public function delete_kelas($kelas_id){
		$do = $this->dtmodel->delete_kelas($kelas_id);
		if ($do) {
			header("location:".base_url('index.php/web'));
		}
	}
	public function logout(){
		session_destroy();
		header("location:".base_url('/'));
	}
	public function user(){
		$this->load->view('header');
		$this->load->view('footer');
	}

	public function register(){
		
		// create the data object
		$data = new stdClass();

			// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			$dt  = array('username' => $username,
						 'email' => $email,
						 'password' => $this->encryption->encrypt($password),
						 'created_at'=>date('Y-m-j H:i:s'),
						 'is_dosen'=>$this->dtmodel->is_dosen($username));
			if ($this->dtmodel->create_user($dt)) {
				
				// user creation ok
				$this->load->view('register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
	}

	public function buat_kelas(){
		$data = new stdClass();
	}

	// Student Control Web
	public function timeline(){
			$this->load->view('user/dashboard/student_nav');
			$this->load->view('user/dashboard/student_timeline');
			$this->load->view('footer');
	}
	public function siswa(){
		
			$this->load->view('user/dashboard/student_nav');
			$this->load->view('user/dashboard/student_siswa');
			$this->load->view('footer');
	}
	public function tentang(){

			$this->load->view('user/dashboard/student_nav');
			$this->load->view('user/dashboard/student_tentang');
			$this->load->view('footer');	
	}
	public function detail(){
			$data = new stdClass();
			$data->error = '';
			$this->load->view('user/dashboard/student_nav');
			$this->load->view('user/dashboard/student_detail',$data);
			$this->load->view('footer');		
	}

	// Teacher Control Web 
	public function teachertimeline(){
			$this->load->view('user/dashboard/teacher_nav');
			$this->load->view('user/dashboard/teacher_timeline');
			$this->load->view('footer');
	}
	public function teachersiswa(){
		
			$this->load->view('user/dashboard/teacher_nav');
			$this->load->view('user/dashboard/teacher_siswa');
			$this->load->view('footer');
	}
	public function teachertentang(){

			$data = new stdClass();
			$data->error = '';
			$this->load->view('user/dashboard/teacher_nav');
			$this->load->view('user/dashboard/teacher_tentang',$data);
			$this->load->view('footer');	
	}
	public function teacherdetail(){
			$data = new stdClass();
			$data->error = '';
			$this->load->view('user/dashboard/teacher_nav');
			$this->load->view('user/dashboard/teacher_detail',$data);
			$this->load->view('footer');		
	}

}
