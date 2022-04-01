<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('default',true);
	}

	public function cek_user($nip)
	{

		// $kondisi = array(
		// 	'nip' => $nip,
		// 	'password' => md5($password)
		// );

		// $this->db->select('*');
		// $this->db->from('USER_LOGIN_NUKLIR');
		// $this->db->where($kondisi);
		// $this->db->limit(1);
		// return $this->db->get()->row();

		// return $this->db->query($query)->row();

		$query = $this->db->query("SELECT * FROM USER_LOGIN_NUKLIR WHERE nip = '$nip' ");

		if ($query->num_rows()==1) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}

	public function cek_login($nip,$password)
	{

		$query = $this->db->query("SELECT * FROM USER_LOGIN_NUKLIR WHERE nip = '$nip' and password = '$password' ");

		if ($query->num_rows()==1) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}

}