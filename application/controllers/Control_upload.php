<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_upload extends CI_Controller {

	private $upload_path ="./uploads";

	public function upload(){

		if (! empty($_FILES)) {
			$config['upload_path']="./uploads/";
			$config['allowed_types']='gif|jpg|png';

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
	public function remove(){
		$file = $this->input->post('file');
		if ($file && file_exists($this->upload_path.'/'.$file)) {
			unlink($this->upload_path.'/'.$file);
		}
	}

	public function list_files()
	{
		$this->load->helper("file");
		$files = get_filenames($this->upload_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($this->upload_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}

}
