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

	// public function get_seq_hasil_nuk()
	// {
	// 	$query="select seq_jns_hasil_nuk.nextval id from dual";
	// 	$this->db->query($query)->row();
	// }

	public function insert_data($nm_tbl,$data)
	{
		$query="select seq_jns_hasil_nuk.nextval id from dual";
		$id=$this->db->query($query)->row();
		// var_dump($id->ID);
		// exit;
		$data['ID_JENIS'] = $id->ID;
		$this->db->insert($nm_tbl,$data);
		return $this->db->affected_rows();
	}

	public function get_data_update($ID_JENIS)
	{
		$query="select * from NKL_JENIS_HASIL_NUK where ID_JENIS = '".$ID_JENIS."'";
		return $this->db->query($query)->row();
	}

	public function update_data($ID_JENIS,$data)
	{
		$this->db->where('ID_JENIS',$ID_JENIS);
		$this->db->update('NKL_JENIS_HASIL_NUK',$data);
		return $this->db->affected_rows();
	}

	public function delete_data($ID_JENIS)
	{
		$this->db->where('ID_JENIS',$ID_JENIS);
		$this->db->delete('NKL_JENIS_HASIL_NUK');
		return $this->db->affected_rows();
	}
}