<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_upload extends CI_Controller {

	private $upload_path ="./uploads";

	public function upload($enrol){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol."/";
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol,0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol,0777);
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/".$enrol."/";
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';

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
		$enrol_path = $this->upload_path."/".$enrol;
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files($enrol)
	{
		$enrol_path = $this->upload_path."/".$enrol;
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


	// Dosen upload materi setiap postingan

	public function upload_tugas_dosen($enrol,$post_id){
			$dir_kelas = $_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol."/".$post_id."/";
			mkdir($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol.'/'.$post_id,0777);
			chmod($_SERVER['DOCUMENT_ROOT'].'/CI-class/uploads/'.$enrol.'/'.$post_id,0777);
		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/".$enrol."/".$post_id."/";
			$config['allowed_types']='gif|jpg|png|pdf|doc|docx';

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
	public function remove_tugas_dosen($enrol,$post_id){
		$enrol_path = $this->upload_path."/".$enrol."/".$post_id;
		$file = $this->input->post('file');
		if ($file && file_exists($enrol_path.'/'.$file)) {
			unlink($enrol_path.'/'.$file);
		}
	}

	public function list_files_tugas_dosen($enrol,$post_id)
	{
		$enrol_path = $this->upload_path."/".$enrol."/".$post_id;
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
