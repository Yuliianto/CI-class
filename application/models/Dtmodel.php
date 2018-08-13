<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtmodel extends CI_Model {

	public function GetSessions(){
		$data = $this->db->query('select * from ci_sessions');
		return $data -> result_array();
	}
	public function is_dosen($username){
		if (! $row = $this->db->get_where('dosen',array('nik'=>$username))->row()) {
			return 0;
		}else{
			return 1;
		}
	}
	public function create_user($data){
		$res = $this->db->insert('users',$data);
		return $res;
	}
	public function create_class($data){
		$res = $this->db->insert('kelas',$data);
		return $res;
	}
	public function cek_user($username,$password){

		if (! $row = $this->db->get_where('users',array('username'=>$username))->row()) {
			$error = $this->db->error();
			return boolval(FALSE);
		}else{
		$row = $this->db->get_where('users',array('username'=>$username))->row();
		$hash = $row->password;
		$plntxt =$this->encryption->decrypt($hash);

		return boolval($password == $plntxt);
		}
	}

	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$query=$this->db->get_where('users',array('username'=>$username))->row();
		$id = $query->id;
		return $id;
		
	}
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	public function show_kelas($nip){
		$res = $this->db->get_where('kelas',array('nip'=>$nip));
		return $res;
	}
	public function get_kelas_id_from_enrol($enrol){
		$this->db->from('kelas');
		$this->db->where('enrol',$enrol);
		return $this->db->get()->row();
	}
	public function join($data){
		$res = $this->db->insert('anggota',$data);
		return $res;
	}
	public function delete_joined($id){
		$res = $this->db->delete('anggota',array('kelas_id'=>$id,'nim'=>$_SESSION['username']));
		return $res;
	}
	public function delete_kelas($id){
		$res = $this->db->delete('kelas',array('kelas_id'=>$id,'nip'=>$_SESSION['username']));
		return $res;
	}
	public function class_joined($nim){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('anggota','anggota.kelas_id=kelas.kelas_id');
		$this->db->where('anggota.nim',$nim);
		return $this->db->get();
	}
	public function kelas_dosen($id){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('dosen','kelas.nip=dosen.nik');
		$this->db->where('kelas.kelas_id',$id);
		return $this->db->get()->row();
	}
	public function insert_post($data){
		$res = $this->db->insert('posting',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function insert_komentar($data){
		$res= $this->db->insert("komentar",$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function insert_up($data){
		$res = $this->db->insert('tugas_upload',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function do_insert_pengumuman($data){
		$res = $this->db->insert('pengumuman',$data);
		return $res;
	}
	public function do_insert_tugas($data){
		$res = $this->db->insert('tugas',$data);
		return $res;
	}
	public function show_posting($username,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function show_posting_pengumuman($username,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('pengumuman','posting.post_id=pengumuman.post_id');
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function show_posting_tugas($username,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('tugas','posting.post_id=tugas.post_id');
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function show_posting_tugas_siswa($kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('tugas','posting.post_id=tugas.post_id');
		$this->db->where(array('kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function siswa($kelas_id){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->join('mahasiswa','anggota.nim=mahasiswa.nim');
		$this->db->where(array('kelas_id'=>$kelas_id));
		return $this->db->get();
	}
	public function anggota($kelas_id,$nim){
		$this->db->select("*");
		$this->db->from("anggota");
		$this->db->join("kelas","anggota.kelas_id=kelas.kelas_id");
		$this->db->join("dosen","kelas.nip=dosen.nik");
		$this->db->where(array('anggota.nim'=>$nim,'anggota.kelas_id'=>$kelas_id));
		return $this->db->get()->row();
	}
	public function post_last_row($nip,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->where(array('nip'=>$nip,'kelas_id'=>$kelas_id));
		return $this->db->get()->last_row();
	}
	public function insert_kuiz($data){
		$res = $this->db->insert('kuiz',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function insert_soal($data){
		$res = $this->db->insert('soal',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function insert_pilih($data){
		$res = $this->db->insert('pilihan',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function tampil_kuiz($username,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('kuiz','posting.post_id=kuiz.post_id');
		/*$this->db->join('soal','kuiz.kuiz_id=soal.kuiz_id');*/
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function tampil_soal(){
		$this->db->select('*');
		$this->db->from('soal');
		$this->db->join('kuiz','kuiz.kuiz_id=soal.kuiz_id');
		/*$this->db->join('soal','kuiz.kuiz_id=soal.kuiz_id');*/
		/*$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');*/
		return $this->db->get();
	}
	public function kuiz_pil($username,$kelas_id){
		$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('kuiz','posting.post_id=kuiz.post_id');
		$this->db->join('soal','kuiz.kuiz_id=soal.kuiz_id');
		$this->db->join('pilihan','soal.soal_id=pilihan.soal_id');
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
		return $this->db->get();
	}
	public function insert_jawab($data){
		$res = $this->db->insert('jawaban',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function update_jawaban($data,$kondisi){
		$this->db->where($kondisi);
		$res = $this->db->update("jawaban",$data);
		return $res;
	}
	public function update_deskrip($data,$kondisi){
		$this->db->where($kondisi);
		$res = $this->db->update("kuiz",$data);
		return $res;
	}
	public function cek_status($soal_id,$anggota_id){
		$this->db->select("*");
		$this->db->from("jawaban");
		$res = $this->db->where(array("soal_id"=>$soal_id,"anggota_id"=>$anggota_id));
		if (! $res) {
			return $this->db->error();
		}else{
			return $this->db->get()->row();
		}
	}
	public function jawaban_saya($anggota_id,$soal_id){
		$this->db->select("*");
		$this->db->from("jawaban");
		$this->db->where(array("anggota_id"=>$anggota_id,"soal_id"=>$soal_id));
		return $this->db->get()->row();
	}
	public function hapus_posting($id){
		$this->db->where("post_id",$id);
		$res = $this->db->delete("posting");
		return $res;
	}
	public function cek_upload(){
		$this->db->select('*');
		$this->db->from("tugas_upload");
		return $this->db->get();
	}
	public function cek_tugas($post_id){
		$this->db->select('*');
		$this->db->from("tugas_upload");
		$this->db->join("anggota","anggota.anggota_id=tugas_upload.murid_id");
		$this->db->join("mahasiswa","mahasiswa.nim=anggota.nim");
		$this->db->where(array("post_id" => $post_id));
		return $this->db->get();
	}
	public function cek_jwb_kuiz($kuiz_id){
		$this->db->select("anggota.nim, jawaban.anggota_id, COUNT(jawaban.status) as total_benar");
		$this->db->group_by("jawaban.anggota_id");
		// $this->db->select('*');
		$this->db->from("jawaban");
		$this->db->join("soal","soal.soal_id = jawaban.soal_id");
		$this->db->join("anggota","jawaban.anggota_id = anggota.anggota_id");
		// $this->db->join("pilihan","jawaban.jawaban = pilihan.pilih");
		$this->db->where(array("soal.kuiz_id" => $kuiz_id,"jawaban.status"=>"benar"));
		return $this->db->get();
	}
	public function return_soal($kuiz_id){
		$this->db->select('*');
		$this->db->from('soal');
		$this->db->join('kuiz','kuiz.kuiz_id=soal.kuiz_id');
		$this->db->where(array("soal.kuiz_id"=>$kuiz_id));
		return $this->db->get();
	}
	public function return_pilihan(){
		$this->db->select("*");
		$this->db->from("pilihan");
		return $this->db->get();
	}
	public function update_kunci($data,$kondisi){
		$this->db->where($kondisi);
		$res = $this->db->update("soal",$data);
		return $res;
	}
	public function show_komentar(){
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->join('users','komentar.anggota_id=users.id');
		$this->db->order_by("waktu","ASC");
		return $this->db->get();
	}
	public function show_user(){
		$id = $this->session->user_id;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('id'=>$id));
		return $this->db->get()->row();
	}
	public function jml_soal($kuiz_id){
		$this->db->select("count(soal_id) as jml_soal");
		$this->db->from("soal");
		$this->db->join("kuiz","soal.kuiz_id = kuiz.kuiz_id");
		$this->db->where(array("soal.kuiz_id"=>$kuiz_id));
		return $this->db->get()->row();
	}
	public function update_profil($id,$data){
		$this->db->where(array("id"=>$id));
		$res = $this->db->update("users",$data);
		return $res;
	}
	public function check_email($email)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where(array("email"=>$email));
		return $this->db->get()->row();
	}
}
