<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_Login']);
	}

	public function index()
	{	
		if($this->session->username == null){
			$this->load->view('admin/loginadmin');
		} else {
			redirect('admin/dashboard');
		}
	}

	//buat session
	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$checkUsername = $this->M_Login->readUsername($username,$password);

		if($checkUsername == NULL){

			echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
               window.location.replace('index');
      			</script>";

		}else{
			$newdata = array(
				'username'  => $checkUsername->username,
				'name'  => $checkUsername->nama_admin,
				'email'  => $checkUsername->email,
			  );
			//set seassion
			$this->session->set_userdata($newdata);
			redirect('admin/dashboard');
		}
	}

	//hapus session
	function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
}