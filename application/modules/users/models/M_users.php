<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Users extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->db=$this->load->database('default',true);
		}

		public function insert_data($data)
		{
			$this->db->insert('USER_LOGIN_NUKLIR',$data);
		}

		public function delete_data($NIP)
		{
			$this->db->where('NIP',$NIP);
			$this->db->delete('USER_LOGIN_NUKLIR');
		}

		public function get_data()
		{
			// return $this->db->from('USER_LOGIN_NUKLIR')->get()->result();
			$query="
					select a.nip,a.nip2,a.nm_pegawai,a.password,a.real_password,b.akses,b.aktif,b.status
					from v_pegawai a 
					left join user_login_nuklir b on a.nip=b.nip
					where b.nip is not null
					";
			return $this->db->query($query)->result();
		}

		public function get_data_update($NIP)
		{
			$query="
					select a.nip,a.nip2,a.nm_pegawai,a.password,a.real_password,b.akses,b.aktif,b.status
					from v_pegawai a 
					left join user_login_nuklir b on a.nip=b.nip
					where a.nip='".$NIP."'
					";
			return $this->db->query($query)->row();
		}

		public function get_data_users()
		{
			return $this->db->from('USER_LOGIN_NUKLIR')->get()->result();
		}


	}

	