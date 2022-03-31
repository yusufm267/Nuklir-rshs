<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_dashboard extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->db = $this->load->database('default',true);
    }
    public function get_data(){
    	$query="
			select 'Jabatan' as nama, count(*) as total, 'jabatan' link from jabatan
            union all
            select 'Bagian' as nama, count(*) as total, 'bagian' link from bagian
            union all
            select 'Jenis Pegawai' as nama, count(*) as total, 'jenis_pegawai' link from jenis_pegawai
            union all
            select 'Kualifikasi Pendidikan' as nama, count(*) as total, 'qualifikasi_pend' link from qualifikasi_pend
            union all
            select 'PPDS' as nama, count(*) as total, 'ppds' link  from ppds
    	";
    	return $this->db->query($query)->result();
    }
}