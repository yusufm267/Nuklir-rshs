<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Hasil_nuklir extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_hasil_nuklir');

		$session_data= @$this->session->userdata()['nip'];

		if ($session_data) {
			$this->load->model('M_hasil_nuklir');
		} else {
			$this->session->set_flashdata('message',array('message'=>'Silahkan Login Terlebih Dahulu','type'=>'error','head'=>'Akses Ditolak'));
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='DATA HASIL NUKLIR';
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


	public function view_insert_hasil_nuklir()
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='INPUT HASIL NUKLIR';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_insert_hasil_nuklir';

		$this->load->view('template', $data);
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
		$ID_JNS_P = $this->input->post('ID_JNS_PEMERIKSAAN');

		$data = array(
			'NM_HASIL' => $NM_HASIL,
			'KADAR_NORMAL' => $KADAR,
			'SATUAN' => $SATUAN,
			'ID_JNS_PEMERIKSAAN' => $ID_JNS_P
		);

		// var_dump($data);
		// exit;

		// $this->M_hasil_nuklir->insert_data($data);

		$insert = $this->M_hasil_nuklir->insert_data('NKL_JENIS_HASIL_NUK',$data);
		$data = $insert ? ['message'=>'Data Berhasil Disimpan','type'=>'success','head'=>'Success'] : ['message'=>'Data Gagal Disimpan','type'=>'error','head'=>'error'];
		$this->session->set_flashdata('message',$data);
		redirect('hasil_nuklir','refresh');
		// $this->M_hasil_nuklir->insert_data('NKL_JENIS_HASIL_NUK',$data);
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Disimpan','type'=>'success','head'=>'Success'));
		// redirect('hasil_nuklir','refresh');
	}

	public function view_update($ID_JENIS)
	{
		$data['title']='Kelola Nuklir';
		$data['subtitle']='Update Data Nuklir';
		$data['header']='header/header';
		$data['navbar']='navbar/navbar';
		$data['sidebar']='sidebar/sidebar';
		$data['footer']='footer/footer';
		$data['body']='v_update';

		$data['data_hasil_jenis_nuklir'] = $this->M_hasil_nuklir->get_data_update($ID_JENIS);

		$this->load->view('template',$data);
	}

	public function update($ID_JENIS)
	{
		$NM_HASIL = $this->input->post('NM_HASIL');
		$KADAR = $this->input->post('KADAR_NORMAL');
		$SATUAN = $this->input->post('SATUAN');
		$ID_JNS_P = $this->input->post('ID_JNS_PEMERIKSAAN');

		$data = array(
			'NM_HASIL' => $NM_HASIL,
			'KADAR_NORMAL' => $KADAR,
			'SATUAN' => $SATUAN,
			'ID_JNS_PEMERIKSAAN' => $ID_JNS_P
		);

		// $this->M_hasil_nuklir->update_data($ID_JENIS,$data);
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Diperbaharui','type'=>'success','head'=>'Success'));
		// redirect('hasil_nuklir','refresh');
 
		$update = $this->M_hasil_nuklir->update_data($ID_JENIS,$data);
		$data = $update ? ['message'=>'Data Berhasil Diperbaharui','type'=>'success','head'=>'Success'] : ['message'=>'Data Gagal Diperbaharui','type'=>'error','head'=>'error'];
		$this->session->set_flashdata('message',$data);
		redirect('hasil_nuklir','refresh');
	}

	public function delete($ID_JENIS)
	{
		// var_dump($this->M_hasil_nuklir->delete_data($ID_JENIS));
		// exit;
		// if ($this->M_hasil_nuklir->delete_data($ID_JENIS)) {
		// 	$this->session->set_flashdata('message',array('message'=>'Data Berhasil Dihapus','type'=>'success','head'=>'Success'));
		// 	redirect('hasil_nuklir','refresh');
		// } else {
		// 	$this->session->set_flashdata('message',array('message'=>'Data Gagal Dihapus','type'=>'error','head'=>'error'));
		// 	redirect('hasil_nuklir','refresh');
		// }

		$delete = $this->M_hasil_nuklir->delete_data($ID_JENIS);
		$data = $delete ? ['message'=>'Data Berhasil Dihapus','type'=>'success','head'=>'Success'] : ['message'=>'Data Gagal Dihapus','type'=>'error','head'=>'error'];
		$this->session->set_flashdata('message',$data);
		redirect('hasil_nuklir','refresh');
		
		// $this->M_hasil_nuklir->delete_data($ID_JENIS);
		// $this->session->set_flashdata('message',array('message'=>'Data Berhasil Dihapus','type'=>'success','head'=>'Success'));
		// redirect('hasil_nuklir','refresh');
	}
}