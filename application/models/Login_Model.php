<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}		
	public function check_login($filter) {

		return $this->db->get_where('users', $filter);

	}
	public function updateToken($email,$reset_token){
		$data = array(
			'Reset_Token'   => $reset_token
		);
		$this->db->where('Email', $email);
		$this->db->update('users', $data);
	}
	public function update_password($email,$password){
		$data = array(
			'Password'   => md5($password),
			'Reset_Token'   => 'NULL'
		);
		$this->db->where('Email', $email);
		return $this->db->update('users', $data);
	}
}
