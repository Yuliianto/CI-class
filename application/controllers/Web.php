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
				$this->load->view('header');
				$this->load->view('user/dashboard/course', $data);
				$this->load->view('footer');
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
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				// user login ok
				$data->error='';
				$this->load->view('header');
				$this->load->view('user/dashboard/course', $data);
				$this->load->view('footer');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('index', $data);
				
			}
			
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
						 'created_at'=>date('Y-m-j H:i:s'));
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
	public function detail(){

			$this->load->view('user/dashboard/detil_course');
			$this->load->view('footer');
	}
	public function siswa(){

			$this->load->view('user/dashboard/siswa');
			$this->load->view('footer');
	}

}
