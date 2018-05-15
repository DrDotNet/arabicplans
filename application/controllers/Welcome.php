<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	 public function __construct() {
		
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('Users_Model');
		$this->load->library('session');
  		if (!(isLoggedIn()))
		{
		redirect('login');
		}  
		
	}

	/* function to save user session and redirect to dashboard */
	public function index()
	{		
		$data['title'] = "الصفحة الرئيسية";
		$this->load->view('includes/header', $data);
		$this->load->view('welcome');	
		$this->load->view('includes/footer');	
	}

	private function showError($title, $message) {
		$res = array();
		$res['title'] = $title;
		$res['error_message'] = $message;
		exit($this->load->view('error_message', $res, true));
	}

}
