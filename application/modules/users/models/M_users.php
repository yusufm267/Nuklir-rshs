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

		public function insert_data_user($data)
		{
			$this->db->insert('USER_LOGIN_NUKLIR',$data);
		}

		public function insert_data_dokter($data2)
		{

			$q="select seq_dokter_nuk.nextval id from dual";
			$id=$this->db->query($q)->row();

			$data2['ID_DOKTER']=$id->ID;
			$this->db->insert('NKL_DOKTER_PERIKSA_NUK',$data2);
		}

		// public function delete_data($NIP)
		// {
		// 	$this->db->where('NIP',$NIP);
		// 	$this->db->delete('USER_LOGIN_NUKLIR');
		// }

		public function delete_data($NIP,$ID_DOKTER2)
		{
			$this->db->where('NIP',$NIP);
			$this->db->where('ID_DOKTER2',$ID_DOKTER2);
			$this->db->delete('USER_LOGIN_NUKLIR','NKL_DOKTER_PERIKSA_NUK');
		}

		public function update_data($NIP,$data)
		{
			$this->db->where('NIP',$NIP);
			$this->db->update('USER_LOGIN_NUKLIR',$data);
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

		public function get_aktif()
		{
			$this->db->distinct();
			$this->db->select('AKTIF');
			return $this->db->from('USER_LOGIN_NUKLIR')->get()->result();	
		}

		public function get_akses()
		{
			$this->db->distinct();
			$this->db->select('AKSES');
			return $this->db->from('USER_LOGIN_NUKLIR')->get()->result();	
		}

	}

	