<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('template_login');
	}

	public function proses_login()
	{
		$nip=$this->input->post('nip');
		$password=$this->input->post('password');

		$cek=$this->M_login->cek_user($nip,$password);
		var_dump($cek);
		die();
	}


}