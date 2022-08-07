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

	public function getJenisHasilPemeriksaan($ID_JENIS)
	{
		$query="select * from NKL_JENIS_HASIL_NUK where ID_JENIS= '".$ID_JENIS."' ";
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
			$this->db->select('NO_MEDREC,NAMA,UMUR,TGL_LAHIR');
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
			$this->db->select('NO_IPD as NO_MEDREC,NAMARI as NAMA,UMURRI as UMUR,TGLLAHIRRI as TGL_LAHIR');
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

	public function getDokterPeriksaAutoComplete($keyword)
	{
		$this->db->distinct();
		$this->db->select('ID_DOKTER,NM_DOKTER');
		$this->db->from('NKL_DATA_DOKTER');
		if ($keyword!='')
		{
			$this->db->like("UPPER(\"ID_DOKTER\")",strtoupper($keyword));
			$this->db->or_like("UPPER(\"NM_DOKTER\")",strtoupper($keyword));
		} else {
			$this->db->where("ID_DOKTER", 'xxxxx');
		}
		$this->db->where('AKTIF', 'Y');
		$this->db->limit(5,0);
		return $this->db->get()->result_array();
	}

	public function getNamaHasilAutoComplete($keyword)
	{
		$this->db->distinct();
		$this->db->select('ID_JENIS,NM_HASIL,KADAR_NORMAL');
		$this->db->from('NKL_JENIS_HASIL_NUK');
		if ($keyword!='')
		{
			$this->db->like("UPPER(\"ID_JENIS\")",strtoupper($keyword));
			$this->db->or_like("UPPER(\"NM_HASIL\")",strtoupper($keyword));
		} else {
			$this->db->where("ID_JENIS", 'xxxxx');
		}
		$this->db->limit(5,0);
		return $this->db->get()->result_array();
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

     	$this->db->select('a.ID_JNS_LAYANAN,a.NM_LAYANAN,a.KELOMPOK_NUK,b.NM_HASIL,b.KADAR_HASIL,b.JENIS_RF,b.DOSIS_RF,b.NO_MEDREC');
		$this->db->from('NKL_JENIS_PELAYANAN a');
		$this->db->join('NKL_PEMERIKSAAN_NUK b','a.ID_JNS_LAYANAN = b.ID_JNS_LAYANAN','left');
    	$this->db->where('b.TGL_KUNJUNGAN', $tanggal);
    	$this->db->where('b.NO_MEDREC', $medrec);
    	$this->db->like('b.ID_JNS_LAYANAN','LNIV', 'after');
    	return $this->db->get()->result();
    }

    public function getHasilNuklirIRJ($tanggal, $medrec)
    {
    	$tanggal = date('d-M-y', strtotime($tanggal));

    	$this->db->from('NKL_PELAYANAN_POLI');
    	$this->db->where('TGL_KUNJUNGAN',$tanggal);
    	$this->db->where('NO_MEDREC',$medrec);
    	$this->db->like('ID_JNS_LAYANAN','LNIV','after');
    	$pelayananIrj = $this->db->get()->result();



    	if (count($pelayananIrj)) {
    		foreach ($pelayananIrj as $irj) {
    			$this->db->from('NKL_PEMERIKSAAN_NUK');
    			$this->db->where('TGL_KUNJUNGAN', $irj->TGL_KUNJUNGAN);
    			$this->db->where('ID_JNS_LAYANAN', $irj->ID_JNS_LAYANAN);
    			$this->db->where('NO_MEDREC', $irj->NO_MEDREC);
    			// $this->db->where('NM_HASIL', $irj->NM_HASIL);
    			// $this->db->where('KADAR_HASIL', $irj->KADAR_HASIL);
    			$check = $this->db->get()->row();
    	// 		var_dump([
    	// 			 $irj->TGL_KUNJUNGAN,
    	// 			 $irj->ID_JNS_LAYANAN,
    	// 			 $irj->NO_MEDREC,
    	// 			 $irj->NM_HASIL,
    	// 			 $irj->KADAR_HASIL
    	// 		]);
    	// die;

    			if (@$check->NO_MEDREC == NULL) {
    				$this->db->insert('NKL_PEMERIKSAAN_NUK', [
    					'NO_MEDREC' => $irj->NO_MEDREC,
    					'ID_JNS_LAYANAN' => $irj->ID_JNS_LAYANAN,
    					'TGL_KUNJUNGAN' => $irj->TGL_KUNJUNGAN,
    					'NM_HASIL' => $irj->NM_HASIL,
    					'KADAR_HASIL' => $irj->KADAR_HASIL
    				]);
    			}
    		}
    	}

    	$this->db->select('a.ID_JNS_LAYANAN,a.NM_LAYANAN,a.KELOMPOK_NUK,b.NM_HASIL,b.KADAR_HASIL,b.JENIS_RF,b.DOSIS_RF,b.NO_MEDREC');
    	$this->db->from('NKL_JENIS_PELAYANAN a');
    	$this->db->join('NKL_PEMERIKSAAN_NUK b', 'a.ID_JNS_LAYANAN = b.ID_JNS_LAYANAN', 'left');
    	$this->db->where('b.TGL_KUNJUNGAN', $tanggal);
    	$this->db->where('b.NO_MEDREC', $medrec);
    	$this->db->like('b.ID_JNS_LAYANAN','LNIV','after');
    	return $this->db->get()->result();
    }


    // public function getHasilNuklirIRJ($tanggal, $medrec)
    // {
    // 	$tanggal = date('d-M-y', strtotime($tanggal));

    // 	$this->db->from('NKL_PELAYANAN_POLI');
    // 	$this->db->where('TGL_KUNJUNGAN',$tanggal);
    // 	$this->db->where('NO_MEDREC',$medrec);
    // 	$pelayananIrj = $this->db->get()->result();

    // 	if (count($pelayananIrj)) {
    // 		foreach ($pelayananIrj as $irj) {
    // 			$this->db->from('NKL_PEMERIKSAAN_NUK');
    // 			$this->db->where('TGL_KUNJUNGAN', $irj->TGL_KUNJUNGAN);
    // 			$this->db->where('ID_JNS_LAYANAN', $irj->ID_JNS_LAYANAN);
    // 			$this->db->where('NO_MEDREC', $irj->NO_MEDREC);
    // 			$check = $this->db->get()->row();

    // 			if (@$check->NO_MEDREC == NULL) {
    // 				$this->db->insert('NKL_PEMERIKSAAN_NUK', [
    // 					'NO_MEDREC' => $irj->NO_MEDREC,
    // 					'ID_JNS_LAYANAN' => $irj->ID_JNS_LAYANAN,
    // 					'TGL_KUNJUNGAN' => $irj->TGL_KUNJUNGAN
    // 				]);
    // 			}
    // 		}
    // 	}

    // 	$this->db->from('NKL_PEMERIKSAAN_NUK');
    // 	$this->db->where('TGL_KUNJUNGAN', $tanggal);
    // 	$this->db->where('NO_MEDREC', $medrec);
    // 	$this->db->like('ID_JNS_LAYANAN', 'LNIV','after');
    // 	return $this->db->get()->result();
    // }

    public function getPemeriksaanNuklir()
    {
    	$this->db->select('a.*,b.NAMA,c.NAMARI');
    	$this->db->from('NKL_PEMERIKSAAN_NUK a');
    	$this->db->join('NKL_PASIEN_IRJ b', 'a.NO_MEDREC = b.NO_MEDREC', 'left');
    	$this->db->join('NKL_PASIEN_IRI c', 'a.NO_MEDREC = c.NO_IPD', 'left');
    	$this->db->like('TGL_KUNJUNGAN','-22','before');
    	$this->db->limit(1500);
    	return $this->db->get()->result();
    }

    public function insertPemeriksaanNuklir($data)
    {
    	$this->db->insert('NKL_PEMERIKSAAN_NUK',$data);
    }

    public function getDetailHasilPemeriksaan($NO_MEDREC)
    {
    	$query = "
    	select a.*,b.nama,b.tgl_lahir,b.umur,b.alamat,c.namari,c.tgllahirri,c.umurri,c.alamatri
		from nkl_pemeriksaan_nuk a
		left join nkl_pasien_irj b on a.no_medrec=b.no_medrec
		left join nkl_pasien_iri c on a.no_medrec=c.no_ipd
		where a.no_medrec = '".$NO_MEDREC."'
    	";

    	return $this->db->query($query)->row();
    }
}