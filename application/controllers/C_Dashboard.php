<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/template/V_Header');
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/template/V_Footer');
	}
}
