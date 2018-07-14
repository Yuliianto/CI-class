<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class For_ajax extends CI_Controller {

	public function index($kelas_id)
	{
		$soal = $this->input->post('soal');
		$jawaban = $this->input->post('jawaban');
		echo "helo saya :".$soal."\n";
		echo "berada di :".$jawaban."\n";
		echo "kelas _id :".$kelas_id;
	}
	public function create_kuiz($kelas_id){
		$soal = $this->input->post('soal');
		$jawaban = $this->input->post('jawaban');

		//Inisialisasi data yang akan diinput ketable post
		$dt_post   = array('post_id'=>null,
						   'waktu'=>date('Y-m-d H:m:s'),
						   'nip'=>$_SESSION['username'],
						   'kelas_id'=>$kelas_id,
						   'jenis'=>'kuiz');
		//Insert data ke table post dengan model
		$do_post  = $this->dtmodel->insert_post($dt_post);
		if (! $do_post) {
			echo $this->db->error;
		}else{
			// Inisialisasi data yang akan diinput ketable kuiz
			$dt_kuiz  = array("kuiz_id"=>null,
							  "post_id"=>$do_post);
			//Insert data ke table kuiz dengan model
			$do_kuiz  = $this->dtmodel->insert_kuiz($dt_kuiz);
			if (! $do_kuiz) {
				echo $this->db->error;
			}else{
				// Inisialisasi data yang akan diinput ke table soal
				$dt_soal  = array("soal_id"=>null,
								  "soal" => $soal,
								  "jawaban" => $jawaban,
								  "kuiz_id"=>$do_kuiz);
				// Insert data ke table soal
				$do_soal  = $this->dtmodel->insert_soal($dt_soal);
				if (! $do_soal) {
					echo $this->db->error;
				}else{
					echo "berhasil";
				}
			}
		}

	}
	
}
