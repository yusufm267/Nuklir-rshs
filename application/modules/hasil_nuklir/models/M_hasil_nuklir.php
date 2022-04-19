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

	public function get_seq_hasil_nuk()
	{
		$query="select seq_dokter_nuk.nextval id from dual";
		$this->db->query($query)->row();
	}

	public function insert_data($data)
	{
		$id=$this->get_seq_hasil_nuk()->ID;
		$data['ID_JENIS']= $id;

		$this->db->insert('NKL_JENIS_HASIL_NUK',$data);
	}


	public function delete_data($NM_HASIL)
	{
		$this->db->where('NM_HASIL',$NM_HASIL);
		$this->db->delete('NKL_JENIS_HASIL_NUK');
	}
}