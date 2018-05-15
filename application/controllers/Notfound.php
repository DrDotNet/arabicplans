<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {
	
	 public function __construct() {
		
		parent::__construct();
		if (!(isLoggedIn()))
		{
		redirect('login');
		}		
	
	}

	public function index()
	{

		
		$data = array(
		  "title" => "404",
		  "description" => "",
		  "keywords" => "",
		  "image" => "",
		  "language_id" => ""
		
		);
				
		$res = array();
		$res['title'] = "404";
		$res['error_message'] = "رابط غير صحيح";
		exit($this->load->view('error_message', $res, true));
		
	}

	
}
