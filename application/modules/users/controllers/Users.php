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
		// var_dump($data);
		// exit();
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
		$this->form_validation->set_rules('NIP' , 'NIP' , 'required|is_unique[USER_LOGIN_NUKLIR.NIP]');

		$this->form_validation->set_message('is_unique', '* %s tidak boleh sama atau NIP sudah terdaftar');


		if ($this->form_validation->run() == FALSE) {
			$data['title']='Kelola Nuklir';
			$data['subtitle']='TAMBAH DATA USERS NUKLIR';
			$data['header']='header/header';
			$data['navbar']='navbar/navbar';
			$data['sidebar']='sidebar/sidebar';
			$data['footer']='footer/footer';
			$data['body']='v_insert';
			$this->load->view('template',$data); 
		} else {
			
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
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Disimpan','type'=>'success','head'=>'Success'));
		redirect('users','refresh');
		}
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
		$data['users_nuklir_akses'] = $this->M_users->get_akses();
		$data['users_nuklir_aktif'] = $this->M_users->get_aktif();
		// var_dump($data['users_nuklir']);
		// exit;
		$this->load->view('template',$data);
	}

	public function update()
	{
		$NIP=$this->input->post('NIP');
		$AKSES=$this->input->post('AKSES');
		$AKTIF=$this->input->post('AKTIF');
		$STATUS=$this->input->post('STATUS');

		$data = array(
			'NIP' => $NIP,
			'AKSES' => $AKSES,
			'STATUS' => $STATUS,
			'AKTIF' => $AKTIF );
		$this->M_users->update_data($NIP,$data);
		// var_dump($data);
		// exit();
		redirect('users','refresh');
	}

	public function delete($NIP)
	{
		$this->M_users->delete_data($NIP);
		redirect('users','refresh');
	}


}