<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('default',true);
	}

	public function cek_user($nip,$password)
	{

		$kondisi = array(
			'nip' => $nip,
			'password' => md5($password)
		);

		// $this->db->select('*');
		// $this->db->from('USER_LOGIN_NUKLIR');
		// $this->db->where($kondisi);
		// $this->db->limit(1);
		// return $this->db->get()->row();

		return $this->db->query($query)->row();
	}

	public function login($user,$password=null)
	{
		
	}
}