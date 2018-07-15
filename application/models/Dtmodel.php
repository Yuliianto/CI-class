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
		$this->db->join('soal','kuiz.kuiz_id=soal.kuiz_id');
		$this->db->where(array('nip'=>$username,'kelas_id'=>$kelas_id));
		$this->db->order_by('posting.post_id','DESC');
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
}
