<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Hasil_nuklir extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_hasil_nuklir');
	}

	public function index()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='DATA Hasil Nuklir';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_hasil_nuklir';

		$data['data_hasil_nuklir'] = $this->M_hasil_nuklir->get_data();
		// var_dump($data);
		// exit();
		$this->load->view('template',$data);
	}

	public function view_insert()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='DATA Hasil Nuklir';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_insert';

		$this->load->view('template',$data);
	}

	public function insert()
	{
		$NM_HASIL = $this->input->post('NM_HASIL');
		$KADAR = $this->input->post('KADAR_NORMAL');
		$SATUAN = $this->input->post('SATUAN');
		$ID_JNS = $this->input->post('ID_JNS_PEMERIKSAAN');

		$data = array(
			'NM_HASIL' => $NM_HASIL,
			'KADAR_NORMAL' => $KADAR,
			'SATUAN' => $SATUAN,
			'ID_JNS_PEMERIKSAAN' => $ID_JNS 
		);

		$this->M_hasil_nuklir->insert_data($data,'NKL_JENIS_HASIL_NUK');
		echo $data;
		exit;
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Disimpan','type'=>'success','head'=>'Success'));
		// redirect('hasil_nuklir','refresh');
	}

	public function delete($NM_HASIL)
	{
		$this->M_hasil_nuklir->delete_data($NM_HASIL);
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Dihapus','type'=>'success','head'=>'Success'));
		redirect('hasil_nuklir','refresh');
	}
}