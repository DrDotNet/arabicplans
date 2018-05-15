<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct() {

		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('Users_Model');
		$this->load->library('session');
	}
	
	
	public function index()
	{
	 	if (!isLoggedIn())
		{
		  $this->load->view('login');	
		}else {
		  redirect('welcome');	
		}	 
	}

	public function login()
	{
	    $password = $this->input->post('password');
	    $email = $this->security->xss_clean($this->input->post('email'));
		if(!isset($password) || empty($password)
		|| !isset($email) || empty($email)){
		echo 0;
		exit;
		}
		$filter = array(
		  'status' => 'Active',
		  'password' => sha1($password),
		  'email' => $email
		  );
			  
		$result = $this->Login_Model->check_login($filter);

		// if result found return 1
		if ($result->num_rows() == 1) {
			$result = $result->result();

			$data = array(
			  'user_id' => $result[0]->id,
			  'fullname' => $result[0]->fullname,
			  'email' => $result[0]->email,
			  'status' => $result[0]->status,
			  'arabic_palns_flag_user_logged_in' => 1);
			  $this->session->set_userdata($data);
			  echo 1;
		}
		// else if no results found return 0
		else {
		echo 0;
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('arabic_palns_flag_user_logged_in');
		$this->session->sess_destroy();
		redirect('login');
	}

    public function create_account() {

		if($this->input->post('submit')){
			$fullname = $this->input->post('fullname');
			$password = sha1($this->input->post("password"));
			$password2 = sha1($this->input->post("password2"));
			$email = $this->input->post("email");
			$type = "End User";			
		}		


		if(!isset($fullname) || empty($fullname)
		|| !isset($password) || empty($password)
	    || !isset($password2) || empty($password2)
		|| !isset($email)    || empty($email)
		|| !isset($type)     || empty($type)
		) {
		  echo -1;
		  exit;
		}

		if($password != $password2 ) {
		  echo -2;
		  exit;	
		}

        $filters = array();
        $filters['email'] = $email;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() > 0){
		  echo 0;
		  exit;	
		}
	
	    $data = array(
		 "fullname" => $fullname,
		 "email" => $email,
		 "password" => $password,
		 "type" => $type,
		 "status" => "Active"
		
		);
		$this->Users_Model->add($data);
		echo 1;
    }	
	
	public function change_password()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->Login_Model->update_password($email,$password)){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	private function showError($title, $message) {
		$res = array();
		$res['title'] = $title;
		$res['error_message'] = $message;
		exit($this->load->view('error_message', $res ,true));
	}
	
}
