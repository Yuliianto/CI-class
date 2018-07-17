<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class For_ajax extends CI_Controller {

	public function index($kelas_id)
	{
		$soal = $this->input->post('soal');
		$jawaban = $this->input->post('jawaban');
		/*$pilih = $this->input->post('pilih');*/
		echo "helo saya :".$soal."\n";
		echo "berada di :".$jawaban."\n";
		echo "kelas _id :".$kelas_id;
	}
	public function create_kuiz($kelas_id){

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
				echo "error kuiz";
			}else{
				echo $do_kuiz;		
				}
			}
	}
	public function create_soal(){
		$soal = $this->input->post('soal');
		$jawaban = $this->input->post('jawaban');
		$kuiz_id = $this->input->post('kuiz_id');
		// Inisialisasi data yang akan diinput ke table soal
				$dt_soal  = array("soal_id"=>null,
								  "soal" => $soal,
								  "jawaban" => $jawaban,
								  "kuiz_id"=>$kuiz_id);
				// Insert data ke table soal
				$do_soal  = $this->dtmodel->insert_soal($dt_soal);
				if (! $do_soal) {
					echo $this->db->error;
					echo "error soal";
				}else{
					$pilih = $this->input->post('pilih');
					foreach ($pilih as $pil => $value) {
						$dt_pilih = array("pilih_id"=>null,"pilih"=>$value,"soal_id"=>$do_soal);
						$do_pilih = $this->dtmodel->insert_pilih($dt_pilih);
					}
					if (! $do_pilih) {
						echo $this->db->error;
						echo "error pilih";
					}else{
						echo "berhasil";
					}
				}
	}
	public function jawab(){
		$soal_id	 = $this->input->post('soal_id');
		$pilih_id	 = $this->input->post('pilih_id');
		$anggota_id	 = $this->input->post('anggota_id');

		$dt_jawab 	 = array("jawab_id"=>null,
							 "soal_id"=>$soal_id,
							 "jawaban"=>$pilih_id,
							 "anggota_id"=>$anggota_id,
							 "status"=>null);
		$do_jawab	 = $this->dtmodel->insert_jawab($dt_jawab);
		if (! $do_jawab) {
			echo $this->db->error;
		}else{
			echo "soal id 	 : ".$soal_id."\n";
			echo "pilih id 	 : ".$pilih_id."\n";
			echo "anggota id : ".$anggota_id."\n";
		}
	}
	public function cek_status(){
		$soal_id	 = $this->input->post('soal_id');
		$pilih_id	 = $this->input->post('pilih_id');
		$anggota_id	 = $this->input->post('anggota_id');

		$cek = $this->dtmodel->cek_status($soal_id,$anggota_id);
		if (! $cek) {
			echo "false";
		}else{
			echo "true";
		}

			/*echo "soal id 	 : ".$soal_id."\n";
			echo "pilih id 	 : ".$pilih_id."\n";
			echo "anggota id : ".$anggota_id."\n";*/

	}
	public function update(){
		$soal_id	 = $this->input->post('soal_id');
		$pilih_id	 = $this->input->post('pilih_id');
		$anggota_id	 = $this->input->post('anggota_id');

		$dt_update 	 = array("jawaban"=>$pilih_id);
		$dt_kondisi  = array("soal_id"=>$soal_id,"anggota_id"=>$anggota_id);
		$do_update	 = $this->dtmodel->update_jawaban($dt_update,$dt_kondisi);
		if (! $do_update) {
			echo $this->db->error;
		}else{
			echo "updated";
		}
	}
	public function jawaban_saya(){
		$soal_id	 = $this->input->post('soal_id');
		$anggota_id	 = $this->input->post('anggota_id');

		$jwb_saya = $this->dtmodel->jawaban_saya($anggota_id,$soal_id);
		echo (string)$jwb_saya->jawaban;
	}
	
}
