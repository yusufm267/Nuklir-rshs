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

	public function view_insert()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='TAMBAH DATA USERS NUKLIR';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_insert';

		$this->load->view('template',$data);
	}

	public function insert()
	{
		$NIP=$this->input->post('NIP');
		$AKSES=$this->input->post('AKSES');
		$AKTIF=$this->input->post('AKTIF');
		$STATUS=$this->input->post('STATUS');

		$data = array(
			'NIP' => $NIP,
			'AKSES' => $AKSES,
			'AKTIF'=> $AKTIF,
			'STATUS'=>$STATUS 
		);

		// var_dump($data);
		// exit;
		$this->M_users->insert_data($data,'USER_LOGIN_NUKLIR');
		redirect('users','refresh');
	}

	public function delete($NIP)
	{
		$this->M_users->delete_data($NIP);
		redirect('users','refresh');
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



}