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
			$this->db->insert('NKL_USER_LOGIN_NUKLIR',$data);
		}

		public function insert_data_user($data)
		{
			$this->db->insert('NKL_USER_LOGIN_NUKLIR',$data);
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

		public function delete_data($NIP)
		{	
			$this->delete_user_login_nuklir($NIP);
			$this->delete_nkl_dokter_periksa_nuk($NIP);
		}

		public function delete_user_login_nuklir($NIP)
		{
			$this->db->where('NIP',$NIP);
			$this->db->delete('NKL_USER_LOGIN_NUKLIR');
		}

		public function delete_nkl_dokter_periksa_nuk($ID_DOKTER2)
		{
			$this->db->where('ID_DOKTER2',$ID_DOKTER2);
			$this->db->delete('NKL_DOKTER_PERIKSA_NUK');
		}

		public function update_data_user($NIP,$data)
		{
			$this->db->where('NIP',$NIP);
			$this->db->update('NKL_USER_LOGIN_NUKLIR',$data);
		}

		public function update_data_dokter_periksa($NIP,$data2)
		{
			$this->db->where('ID_DOKTER2',$NIP);
			$this->db->update('NKL_DOKTER_PERIKSA_NUK',$data2);
		}

		public function get_data()
		{
			// return $this->db->from('NKL_USER_LOGIN_NUKLIR')->get()->result();
			$query="
					select a.nip,a.nip2,a.nm_pegawai,a.password,a.real_password,b.akses,b.aktif,b.status,c.alias,c.f_staff
					from v_pegawai a 
					left join nkl_user_login_nuklir b on a.nip=b.nip
					left join NKL_DOKTER_PERIKSA_NUK c on c.ID_DOKTER2=a.nip 
					where b.nip is not null
					";
			return $this->db->query($query)->result();
		}

		public function get_data_by_nip($nip)
		{
			$query="
					select * from v_pegawai where NIP = '" .$nip. "'
					";
			return $this->db->query($query)->row();
		}

		public function get_data_update($NIP)
		{
			$query="
					select a.nip,a.nip2,a.nm_pegawai,a.password,a.real_password,b.akses,b.aktif,b.status,c.alias,c.f_staff
					from v_pegawai a 
					left join nkl_user_login_nuklir b on a.nip=b.nip
					left join NKL_DOKTER_PERIKSA_NUK c on c.ID_DOKTER2=a.nip
					where a.nip='".$NIP."'
					";
			return $this->db->query($query)->row();
		}

		public function get_data_users()
		{
			return $this->db->from('NKL_USER_LOGIN_NUKLIR')->get()->result();
		}

		public function get_aktif()
		{
			$this->db->distinct();
			$this->db->select('AKTIF');
			return $this->db->from('NKL_USER_LOGIN_NUKLIR')->get()->result();	
		}

		public function get_akses()
		{
			$this->db->distinct();
			$this->db->select('AKSES');
			return $this->db->from('NKL_USER_LOGIN_NUKLIR')->get()->result();	
		}

		public function get_staff()
		{
			$this->db->distinct();
			$this->db->select('F_STAFF');
			return $this->db->from('NKL_DOKTER_PERIKSA_NUK')->get()->result();
		}

	}

	