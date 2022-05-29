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

	public function getMedrecAutoComplete($keyword)
	{
		if (strlen($keyword)==10) {
			$this->db->distinct();
			$this->db->select('NO_MEDREC,NAMA');
			$this->db->from('NKL_PASIEN_IRJ');
			if ($keyword!='')
			{
				$this->db->like("UPPER(\"NO_MEDREC\")",strtoupper($keyword));
				$this->db->or_like("UPPER(\"NAMA\")",strtoupper($keyword));
			} else {
				$this->db->where("NO_MEDREC",'xxxxx');
			}
			$this->db->limit(5,0);
			return $this->db->get()->result_array();

		} else {

			$this->db->distinct();
			$this->db->select('NO_IPD as NO_MEDREC,NAMARI as NAMA');
			$this->db->from('NKL_PASIEN_IRI');
			if ($keyword!='')
			{
				$this->db->like("UPPER(\"NO_IPD\")",strtoupper($keyword));
				$this->db->or_like("UPPER(\"NAMARI\")",strtoupper($keyword));
			} else {
				$this->db->where("NO_IPD",'xxxxx');
			}
			$this->db->limit(5,0);
			return $this->db->get()->result_array();
			}	
	}

	public function cek_medrec($medrec)
	{
		$this->db->where('NO_MEDREC',$medrec);
		return $this->db->get('NKL_PASIEN_IRJ')->row();
	}

	public function getHasilNuklirIRI($tanggal, $medrec)
    {
    	$tanggal = date('d-M-y', strtotime($tanggal));
        // $query = $this->db->query("CALL hasil_nuk_iri('".$tanggal."', '".$medrec."')");

   //      $pelayananIri = $this->db->query("
   //      	select 
			// NO_IPD, ID_JNS_LAYANAN, TGL_LAYANAN from NKL_PELAYANAN_IRI
			// WHERE TGL_LAYANAN = '".$tanggal."' and NO_IPD = '".$medrec."' and ID_JNS_LAYANAN like 'LNIV%'
   //      ")->result();
		
    	$this->db->from('NKL_PELAYANAN_IRI');
    	$this->db->where('TGL_LAYANAN', $tanggal);
    	$this->db->where('NO_IPD', $medrec);
    	$pelayananIri = $this->db->get()->result();

        
     	if (count($pelayananIri)) {
     		foreach ($pelayananIri as $iri) {
     			$this->db->from('NKL_PEMERIKSAAN_NUK');
		    	$this->db->where('TGL_KUNJUNGAN', $iri->TGL_LAYANAN);
		    	$this->db->where('ID_JNS_LAYANAN', $iri->ID_JNS_LAYANAN);
		    	$this->db->where('NO_MEDREC', $iri->NO_IPD);
		    	$check =  $this->db->get()->row();

     			if (@$check->NO_MEDREC == null) {
     				$this->db->insert('NKL_PEMERIKSAAN_NUK', [
	     				'NO_MEDREC' => $iri->NO_IPD,
	     				'ID_JNS_LAYANAN' => $iri->ID_JNS_LAYANAN,
	     				'TGL_KUNJUNGAN' => $iri->TGL_LAYANAN,
	     			]);
     			}
     		}
     	}

		// $query="select * from NKL_PEMERIKSAAN_NUK WHERE TGL_KUNJUNGAN = '".$tanggal."' AND NO_MEDREC = '".$medrec."' ";
		// return $this->db->query($query)->result();

		$this->db->from('NKL_PEMERIKSAAN_NUK');
    	$this->db->where('TGL_KUNJUNGAN', $tanggal);
    	$this->db->where('NO_MEDREC', $medrec);
    	return $this->db->get()->result();




    }

    public function getHasilNuklirIRJ($tanggal, $medrec)
    {
    	$tanggal = date('d-M-y', strtotime($tanggal));
        $query = $this->db->query("CALL hasil_nuk_irj('".$tanggal."', '".$medrec."')");
        return $query->result();
    }
}