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
									'kelas'=> $nama,
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

				header("location:".base_url('index.php/'));
				// $this->load->view('register/register_success', $data);
				// $this->load->view('footer');
				
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
	public function timeline($kelas_id){
			$show_enrol = $this->dtmodel->kelas_dosen($kelas_id);
			$enrol = (string)$show_enrol->enrol;
			$enrol_path = "./uploads/".$enrol;
			$this->load->helper("file");
			$nip = $this->dtmodel->anggota($kelas_id,$_SESSION['username']);
			$data = array('dt' => $this->dtmodel->anggota($kelas_id,$_SESSION['username']),
						  'posting' => $this->dtmodel->show_posting((string)$nip->nip,$kelas_id),
						  'posting_pengumuman' => $this->dtmodel->show_posting_pengumuman((string)$nip->nip,$kelas_id),
						  'files'=>get_filenames($enrol_path),
						  'posting_tugas' => $this->dtmodel->show_posting_tugas((string)$nip->nip,$kelas_id),
						  'posting_kuiz'=>$this->dtmodel->tampil_kuiz((string)$nip->nip,$kelas_id),
						  'kuiz_pil'=>$this->dtmodel->kuiz_pil((string)$nip->nip,$kelas_id),
						  'anggota'=>$nip,
						  'data_soal'=>$this->dtmodel->tampil_soal(),
						  'cek_upload'=>$this->dtmodel->cek_upload());
			$this->load->view('user/dashboard/student_nav',$data);
			$this->load->view('user/dashboard/student_timeline',$data);
			$this->load->view('footer');
	}
	public function lembar_kuiz($kelas_id,$kuiz_id){
			$show_enrol = $this->dtmodel->kelas_dosen($kelas_id);
			$enrol = (string)$show_enrol->enrol;
			$enrol_path = "./uploads/".$enrol;
			$this->load->helper("file");
			$nip = $this->dtmodel->anggota($kelas_id,$_SESSION['username']);
			$data = array('dt' => $this->dtmodel->anggota($kelas_id,$_SESSION['username']),
						  'posting' => $this->dtmodel->show_posting((string)$nip->nip,$kelas_id),
						  'files'=>get_filenames($enrol_path),
						  'posting_kuiz'=>$this->dtmodel->tampil_kuiz((string)$nip->nip,$kelas_id),
						  'kus_id'=>$kuiz_id,
						  'kuiz_pil'=>$this->dtmodel->kuiz_pil((string)$nip->nip,$kelas_id),
						  'anggota'=>$nip,
						  'data_soal'=>$this->dtmodel->tampil_soal());
			$this->load->view('user/dashboard/student_nav',$data);
			$this->load->view('user/dashboard/lembar_kuiz',$data);
			$this->load->view('footer');
	}

	public function siswa($kelas_id){
		
			$data = array('dt' => $this->dtmodel->anggota($kelas_id,$_SESSION['username']),
						  'siswa' => $this->dtmodel->siswa($kelas_id));
			$this->load->view('user/dashboard/student_nav',$data);
			$this->load->view('user/dashboard/student_siswa');
			$this->load->view('footer');
	}
	public function tentang($kelas_id,$enrol){
			$enrol_path = "./uploads/".$enrol;
			$this->load->helper("file");
			
			
			$data = array('dt' => $this->dtmodel->anggota($kelas_id,$_SESSION['username']),
						  'files'=>get_filenames($enrol_path),
						  'posting_tugas' => $this->dtmodel->show_posting_tugas_siswa($kelas_id));
			$this->load->view('user/dashboard/student_nav',$data);
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
	public function teachertimeline($kelas_id){
			$show_enrol = $this->dtmodel->kelas_dosen($kelas_id);
			$enrol = (string)$show_enrol->enrol;
			$enrol_path = "./uploads/".$enrol;
			$this->load->helper("file");
			$data = array('dt' => $this->dtmodel->kelas_dosen($kelas_id),
						  'posting' => $this->dtmodel->show_posting($_SESSION['username'],$kelas_id),
						  'posting_pengumuman' => $this->dtmodel->show_posting_pengumuman($_SESSION['username'],$kelas_id),
						  'files'=>get_filenames($enrol_path),
						  'posting_tugas' => $this->dtmodel->show_posting_tugas($_SESSION['username'],$kelas_id),
						  'last_row'=>$this->dtmodel->post_last_row($_SESSION['username'],$kelas_id),
						  'posting_kuiz'=>$this->dtmodel->tampil_kuiz($_SESSION['username'],$kelas_id),
						  'kuiz_pil'=>$this->dtmodel->kuiz_pil($_SESSION['username'],$kelas_id),
						  'data_soal'=>$this->dtmodel->tampil_soal());
			$this->load->view('user/dashboard/teacher_nav',$data);
			$this->load->view('user/dashboard/teacher_timeline',$data);
			$this->load->view('footer');
	}
	public function post_pengumuman($kelas_id){
		$dt_post   = array('post_id'=>null,
						   'waktu'=>date('Y-m-d H:m:s'),
						   'nip'=>$_SESSION['username'],
						   'kelas_id'=>$kelas_id,
						   'jenis'=>'pengumuman');
		$do_posti  = $this->dtmodel->insert_post($dt_post);
		/*$do_insert = $this->dtmodel->insert_pengumuman();*/
		if (!$do_posti) {
			$this->db->error();
		}else{
			$dt_peng = array('pengumuman_id'=>null,
							 'pengumuman' => $this->input->post('pengumuman'),
							 'topik_id'=>null,
							 'post_id'=>$do_posti);
			$do_insert_pengumuman = $this->dtmodel->do_insert_pengumuman($dt_peng);
			if ($do_insert_pengumuman) {
				header("location:".base_url('index.php/web/teachertimeline/'.$kelas_id));
			}
		}
	}
	public function post_tugas($kelas_id){
		$enrol = $this->input->post('enrol');
		$old_dir = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol."/"."temp_name"."/";
		$dt_post   = array('post_id'=>null,
						   'waktu'=>date('Y-m-d H:i:s'),
						   'nip'=>$_SESSION['username'],
						   'kelas_id'=>$kelas_id,
						   'jenis'=>'tugas');
		$do_posti  = $this->dtmodel->insert_post($dt_post);
		/*$do_insert = $this->dtmodel->insert_pengumuman();*/
		if (!$do_posti) {
			$this->db->error();
		}else{
			$dt_tugas = array('tugas_id'=>null,
							 'judul' => $this->input->post('judul'),
							 'instruksi' => $this->input->post('instruksi'),
							 'batas_waktu'=>$this->input->post('batas_waktu')." ".date("H:i:s"),
							 'topik_id'=>null,
							 'materi'=>$this->input->post('path_materi').$do_posti,
							 'post_id'=>$do_posti);
			$do_insert_tugas = $this->dtmodel->do_insert_tugas($dt_tugas);
			$new_dir = $this->input->post('path_materi').$do_posti;
			rename($old_dir, $new_dir);
			if ($do_insert_tugas) {
				header("location:".base_url('index.php/web/teachertimeline/'.$kelas_id));
			}
		}
	}
	public function lembar_tugas($post_id,$kelas_id){
		$data = array('dt' => $this->dtmodel->kelas_dosen($kelas_id),
					  "cek_tugas"=>$this->dtmodel->cek_tugas($post_id));
		$cek= $this->dtmodel->cek_tugas($post_id);
		$this->load->helper("file");
		/*foreach ($cek->result_array() as $up) {
			echo $up['nama'];
			$files = get_filenames($up['dir_upload']);
			print_r($files);
		}*/
			$this->load->view('user/dashboard/teacher_nav',$data);
			$this->load->view('user/dashboard/lembar_tugas',$data);
			$this->load->view('footer');
	}

	public function scoring($kuiz_id,$kelas_id){
		$data = array('cek_jwb_kuiz' => $this->dtmodel->cek_jwb_kuiz($kuiz_id),
					  'dt' => $this->dtmodel->kelas_dosen($kelas_id));
		$cek= $this->dtmodel->cek_jwb_kuiz($kuiz_id);
			$this->load->view('user/dashboard/teacher_nav',$data);
			$this->load->view('user/dashboard/scoring',$data);
			$this->load->view('footer');
	}

	public function up_mhs($enrol,$kelas_id){
		$dir_up = $this->input->post('dir_up');
		$murid_id = $this->input->post('murid_id');
		$post_id = $this->input->post('post_id');
		$old_dir = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/"."temp_name"."/";
		$dt_up   = 	 array('upload_id'=>null,
						   'dir_upload'=>$dir_up.$murid_id,
						   'murid_id'=>$murid_id,
						   'post_id'=>$post_id);
		$do_up  = $this->dtmodel->insert_up($dt_up);
			$new_dir = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/".$post_id.$murid_id;
			rename($old_dir, $new_dir);
			if ($do_up) {
				header("location:".base_url('index.php/web/timeline/'.$kelas_id));
			}
		
	}
	public function teachersiswa($kelas_id){
			$data = array('dt' => $this->dtmodel->kelas_dosen($kelas_id),
						  'siswa' => $this->dtmodel->siswa($kelas_id));
			$this->load->view('user/dashboard/teacher_nav',$data);
			$this->load->view('user/dashboard/teacher_siswa',$data);
			$this->load->view('footer');
	}
	public function teachertentang($kelas_id){
			$data = array('dt' => $this->dtmodel->kelas_dosen($kelas_id),
						  'posting_tugas' => $this->dtmodel->show_posting_tugas($_SESSION['username'],$kelas_id));
			$this->load->view('user/dashboard/teacher_nav',$data);
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
	public function hapus_posting($id_posting,$enrol,$kelas_id){
			echo "posting id : ".$id_posting."\n<br>";
			echo "enrol 	 : ".$enrol;

			$do_hapus = $this->dtmodel->hapus_posting($id_posting);
			if (! $do_hapus) {
				echo $this->dtmodel->error();
			}else{
				header("location:".base_url('index.php/web/teachertimeline/'.$kelas_id));
			}
	}

}
