<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='dashboard';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_dashboard';

		$data['list_data'] = $this->M_dashboard->get_data();
		$this->load->view('template',$data);
	}

	public function get_value()
	{
		
	}

}