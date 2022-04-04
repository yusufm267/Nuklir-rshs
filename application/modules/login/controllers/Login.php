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
		$password=md5($this->input->post('password'));

		$cek=$this->M_login->cek_user($nip);
		if ($cek) {

			$ceklogin = $this->M_login->cek_Login($nip,$password);
			// var_dump($ceklogin);
			// // echo "<br>";
			// // echo md5($password);
			// // echo "<br>";
			// // echo $password;
			// exit;

			if ($ceklogin) {
				foreach ($ceklogin as $value)

				if ($value->AKTIF == "1") {
					
					$this->session->set_userdata('nip',$value->NIP);
					$this->session->set_userdata('nm_pegawai',$value->NM_PEGAWAI);
					$this->session->set_userdata('akses',$value->AKSES);


					if ($this->session->userdata('akses')=="1" OR $this->session->userdata('akses')=="2" ) {
				
						redirect('dashboard','refresh');
					}else{
						echo "<script>alert('Maaf anda tidak memiliki hak akses. ');";
				
						redirect('login','refresh');
					}
						}else{
							echo "<script>alert('Maaf Username Tidak Aktif. ');";
					
							redirect('login','refresh');
						}		
							}else{
								echo "<script>alert('Maaf Username atau Password salah. ');";
						
									redirect('login','refresh');
							}
								}else{
									echo "<script>alert('Maaf Username belum terdaftar. ');";
							
											redirect('login','refresh');
								}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	
		redirect('login', 'refresh');
	}


}