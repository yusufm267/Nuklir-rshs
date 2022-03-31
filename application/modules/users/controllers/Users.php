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
		$this->load->view('template',$data);
	}


}