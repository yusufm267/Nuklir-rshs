<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_hasil_nuklir extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('default',true);
	}

	public function get_data()
	{
		return $this->db->from('NKL_JENIS_HASIL_NUK')->get()->result();
	}

	public function insert_data($data)
	{
		$this->db->insert('NKL_JENIS_HASIL_NUK',$data);
	}

	public function delete_data($NM_HASIL)
	{
		$this->db->where('NM_HASIL',$NM_HASIL);
		$this->db->delete('NKL_JENIS_HASIL_NUK');
	}
}