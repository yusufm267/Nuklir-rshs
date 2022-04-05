<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');
	}

	public function index()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='DATA USERS NUKLIR';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_users';

		$data['data_users_nuklir'] = $this->M_users->get_data();
		$this->load->view('template',$data);
	}

	public function view_update($NIP)
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='DATA USERS NUKLIR';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_update';

		$data['data_users_nuklir'] = $this->M_users->get_data_update($NIP);
		$data['users_nuklir'] = $this->M_users->get_data_users();
		// var_dump($data['users_nuklir']);
		// exit;
		$this->load->view('template',$data);
	}

	public function InsertUsersNuklir()
	{
		$nip=$this->input->post('nip');
		$nip2=$this->input->post('nip2');
		$nama_pegawai=$this->input->post('nm_pegawai');
		$password=md5($this->input->post('password'));

		$datapegawai = array(
			'nip' => $nip ,
			'nip2' => $nip2,
			'nm_pegawai' => $nama_pegawai,
			'password' => $password );


		$nip=$this->input->post('nip');
		$nama_pegawai=$this->input->post('nm_pegawai');
		$akses=$this->input->post('akses');
		$status=$this->input->post('status');

		$datauser = array(
			'nip' => $nip,
			'nm_pegawai' => $nama_pegawai,
			'akses' => $akses,
			'aktif' => 1,
			'status' => $status  );

		$insertpegawai = $this->M_users->insertuser('v_pegawai',$datapegawai);
		$insertuser = $this->M_users->insertuser('USER_LOGIN_NUKLIR',$datauser);
		redirect();

	}


}