<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('default',true);
	}

	public function login($user,$password=null)
	{
		
	}
}