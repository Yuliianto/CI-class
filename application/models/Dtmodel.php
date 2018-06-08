<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtmodel extends CI_Model {

	public function GetSessions(){
		$data = $this->db->query('select * from ci_sessions');
		return $data -> result_array();
	}

	public function create_user($data){
		$res = $this->db->insert('users',$data);
		return $res;
	}
	public function cek_user($username,$password){

		if (! $row = $this->db->get_where('users',array('username'=>$username))->row()) {
			$error = $this->db->error();
			return boolval(FALSE);
		}else{
		$hash = $row->password;
		$plntxt =$this->encryption->decrypt($hash);

		return boolval($password||$hash);
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
	
}
