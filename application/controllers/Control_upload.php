<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_upload extends CI_Controller {

	private $upload_path ="./uploads";

	public function upload($enrol){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/materi/'.$enrol."/";
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/materi',0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/materi',0777);
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/materi/'.$enrol,0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/materi/'.$enrol,0777);
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/materi/".$enrol."/";
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$file='file';
			echo $this->upload->data($file);
			if (! $this->upload->do_upload($file)) {
                $error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data'=> $this->upload->data());
			}
		}
	}
	public function remove($enrol){
		$enrol_path = $this->upload_path."/materi/".$enrol;
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files($enrol)
	{
		$enrol_path = $this->upload_path."/materi/".$enrol;
		$this->load->helper("file");
		$files = get_filenames($enrol_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($enrol_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo ($files);
	}


	// Dosen upload materi setiap postingan bahan tugas

	public function upload_tugas_dosen($enrol){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol."/";
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas',0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas',0777);
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol,0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol,0777);
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol."/temp_name/",0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol."/temp_name/",0777);
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/bahan_tugas/".$enrol."/"."temp_name"."/";
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$file='file';
			echo $this->upload->data($file);
			if (! $this->upload->do_upload($file)) {
                $error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data'=> $this->upload->data());
			}
		}
	}
	public function remove_tugas_dosen($enrol){
		$enrol_path = $this->upload_path."/bahan_tugas/".$enrol."/"."temp_name";
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files_tugas_dosen($enrol)
	{
		$enrol_path = $this->upload_path."/bahan_tugas/".$enrol."/"."temp_name";
		$this->load->helper("file");
		$files = get_filenames($enrol_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($enrol_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}

	// Murid upload tugas 
	public function upload_tugas_murid($enrol){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/";
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs',0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs',0777);
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol,0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol,0777);
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/temp_name/",0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/temp_name/",0777);
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/upload_mhs/".$enrol."/"."temp_name"."/";
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$file='file';
			echo $this->upload->data($file);
			if (! $this->upload->do_upload($file)) {
                $error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data'=> $this->upload->data());
			}
		}
	}
	public function remove_tugas_murid($enrol){
		$enrol_path = $this->upload_path."/upload_mhs/".$enrol."/"."temp_name";
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files_tugas_murid($enrol)
	{
		$enrol_path = $this->upload_path."/upload_mhs/".$enrol."/"."temp_name";
		$this->load->helper("file");
		$files = get_filenames($enrol_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($enrol_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}

	//EDIT BAHAN 
	public function upload_edit_bahan($enrol,$postid){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/bahan_tugas/'.$enrol."/".$postid."/";
			
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/bahan_tugas/".$enrol."/".$postid;
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$file='file';
			echo $this->upload->data($file);
			if (! $this->upload->do_upload($file)) {
                $error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data'=> $this->upload->data());
			}
		}
	}
	public function remove_edit_bahan($enrol,$postid){
		$enrol_path = $this->upload_path."/bahan_tugas/".$enrol."/".$postid;
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files_edit_bahan($enrol,$postid)
	{
		$enrol_path = $this->upload_path."/bahan_tugas/".$enrol."/".$postid;
		$this->load->helper("file");
		$files = get_filenames($enrol_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($enrol_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}

	//EDIT tugaas siswa
	public function upload_tugas($enrol,$postid){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/upload_mhs/'.$enrol."/".$postid."/";
			
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/upload_mhs/".$enrol."/".$postid;
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$file='file';
			echo $this->upload->data($file);
			if (! $this->upload->do_upload($file)) {
                $error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data'=> $this->upload->data());
			}
		}
	}
	public function remove_tugas($enrol,$postid){
		$enrol_path = $this->upload_path."/upload_mhs/".$enrol."/".$postid;
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files_tugas($enrol,$postid)
	{
		$enrol_path = $this->upload_path."/upload_mhs/".$enrol."/".$postid;
		$this->load->helper("file");
		$files = get_filenames($enrol_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($enrol_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}
}
