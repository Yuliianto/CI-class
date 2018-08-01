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
			$deskrip = $this->input->post('deskrip');
			$dt_kuiz  = array("kuiz_id"=>null,
							  "post_id"=>$do_post,
							  "deskrip"=>$deskrip);
			//Insert data ke table kuiz dengan model
			$do_kuiz  = $this->dtmodel->insert_kuiz($dt_kuiz);
			if (! $do_kuiz) {
				echo $this->db->error;
				echo "error kuiz";
			}else{
				echo "<input type='hidden' name='post_id' value=$do_post><input type='hidden' name='kuiz_id' value=$do_kuiz> ";		
				}
			}
	}
	public function create_soal(){
		$soal = $this->input->post('soal');
		$jawaban = $this->input->post('jawaban');
		$kuiz_id = $this->input->post('kuiz_id');

		// echo "soal : ".$soal."\n";
		// echo "jwb  : ".$jawaban."\n";
		// echo "k_id : ".$kuiz_id."\n";

		// Inisialisasi data yang akan diinput ke table soal
				$dt_soal  = array("soal_id"=>null,
								  "soal" => $soal,
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
						$return_soal = $this->dtmodel->return_soal($kuiz_id);
						$return_pilihan = $this->dtmodel->return_pilihan();
						$data = array("return_soal"=>$return_soal,"return_pilihan"=>$return_pilihan);

						$this->load->view('user/dashboard/return_soal',$data);
						// foreach ($return_soal->result_array() as $s) {
						// 	echo $s['soal']."<br>";
						// 	foreach ($return_pilihan->result_array() as $p) {
						// 		if ($s['soal_id']==$p['soal_id']) {
						// 			echo "<div class=radio><label>";
						// 			echo "<input id=".$p['pilih_id']." type=radio value=".$p['pilih_id']." name=".$s['soal_id'].">&nbsp;".$p['pilih'];
						// 			echo "</label></div>";

						// 			$this->load->view("");
						// 		}
						// 	}
						// }
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
		$kunci 		 = $this->input->post('kunci');

		if ( !($pilih_id == $kunci)) {
			$hasil = "salah";
		}else{
			$hasil = "benar";
		}
		$dt_update 	 = array("jawaban"=>$pilih_id,"status"=>$hasil);
		$dt_kondisi  = array("soal_id"=>$soal_id,"anggota_id"=>$anggota_id);
		$do_update	 = $this->dtmodel->update_jawaban($dt_update,$dt_kondisi);
		if (! $do_update) {
			echo $this->db->error;
		}else{
			echo "updated";
		}
	}
	public function update_deskrip($kelas_id){
		$deskrip	 = $this->input->post('deskrip');
		$kuiz_id	 = $this->input->post('kuiz_id');

		$dt_update 	 = array("deskrip"=>$deskrip);
		$dt_kondisi  = array("kuiz_id"=>$kuiz_id);
		$do_update	 = $this->dtmodel->update_deskrip($dt_update,$dt_kondisi);
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
	public function hapus_kuiz($kelas_id){
		$post_id = $this->input->post('post_id');
		$do_hapus = $this->dtmodel->hapus_posting($post_id);
		if (! $do_hapus) {
			echo "error";
		}else{
			echo "berhasil";
		}
	}
	public function update_kunci(){
		$kunci_id = $this->input->post('kunci');
		$soal_id  = $this->input->post('soal');

		$data  = array("kunci"=>$kunci_id);
		$dt_kondisi = array("soal_id"=>$soal_id);
		$do_up =$this->dtmodel->update_kunci($data,$dt_kondisi);
		if (! $do_up) {
			echo "error!";
		}else{
			echo "berhasil";
		}
		
	}
	public function komentar(){
		$komentar = $this->input->post('txt_komen');
		$user_id  = $this->input->post('user_id');
		$post_id  = $this->input->post('p_id');

		$dt_komen = array("komentar_id"=>null,
						  "komentar"=>$komentar,
						  "waktu"=>date('Y-m-j H:i:s'),
						  "anggota_id"=>$user_id,
						  "post_id"=>$post_id);
		$do_komen = $this->dtmodel->insert_komentar($dt_komen);
		if (! $do_komen) {
			echo "error";
		}else{
			echo "berhasil";
		}
	}
	public function check_email(){
		$email = $this->input->post('email');
		$check = $this->dtmodel->check_email($email);
		if (! $check) {
			echo "user tidak terdaftar";
		}else{
			echo $check->first_name;
		}
	}
	public function kirim_email(){
		$email=$this->input->post('email');
		$config = Array(  
			'protocol' => 'smtp',  
			'smtp_host' => 'ssl://smtp.googlemail.com',  
			'smtp_port' => 465,  
			'smtp_user' => 'alumnistebialmuhsin@gmail.com',
			'smtp_pass' => 'stebi2018',  
			'mailtype'  => 'html',  
			'charset'   => 'iso-8859-1'  
			);  
		  
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  
		$this->email->from('alumnistebialmuhsin@gmail.com', 'Admin Sistem Informasi Alumni STEBI Al-Muhsin');  
		$this->email->to($email);  
		$this->email->subject('Permintaan Kata Sandi Baru');
		$new_password=substr(md5(mt_rand(100000,999999)),0,6);
		$htmlBody = " 
		<div style='background:#E7E8EB; width:100%;'>
			<div style='width:90%;background:#fff;'>
				<h5>Konfirmasi password<h5>,
				kami menerima permintaan perubahan password untuk akun e-learning<br>
				anda. sekaranga password e-learning anda telah diubah:
				<br><br>
				password : $new_password <br><br>

				<a href='localhost/CI-class'>login</a>
			</div>
		</div>
		";

		$this->email->message($htmlBody);  
		if (!$this->email->send()) {  
			echo $this->email->print_debugger();
		}else{  
			echo 'Success, send email to '.$email;  
		}
	}
	
}
