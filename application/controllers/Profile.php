<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();
		$this->load->model('Settings_Model');
		$this->load->model('Languages_Model');
		$this->load->model('Users_Model');
		$this->load->model('Roles_Model');
		$this->load->library('session');
		if (!(isLoggedIn()))
		{
		redirect('login');
		}		

        $settings_info = @reset($this->Settings_Model->get_settings()->result_array());
        $_SESSION['language'] = $language = $this->Languages_Model->get_language_detail($settings_info["language_id"]);
        $this->lang->load('backend', strtolower($language["language_name"]));		
		
	}

	public function index() {
		$this->profile();
	}

	public function profile()
	{
		$id = $this->session->userdata("user_id");
		if(!isset($id) || empty($id)) {
			$this->showError("403", $this->lang->line('Invalid Link'));
		}
		$data = array();
		$filters = array();
		$filters['deleted'] = 0;
		$filters['id'] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() != 1){
			$this->showError("403", $this->lang->line('Invalid Link'));
		}

        $users = $users->result();
        $user = $users[0];
		$data['user'] = $user;
			
		$filters = array();
		$data['roles'] = $this->Roles_Model->get_roles($filters)->result();
		$data['title'] = $this->lang->line('My Profile');
	    $data['subtitle'] = $this->lang->line('Edit Profile');
			
		$this->load->view('includes/header', $data);
		$this->load->view('users/profile');	
		$this->load->view('includes/footer'); 
	}	
    public function edit_profile() {

	    $id = $this->session->userdata("user_id");
		$filters = array();
		$filters['deleted'] = 0;
		$filters['id'] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() != 1){
			$this->showError("403", $this->lang->line('Invalid Link'));
		}

        $users = $users->result();
        $user = $users[0];
		
		$old_password = $user->password;
		$profile_picture = $user->profile_picture;

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$fullname = $this->input->post('data[fullname]');
			$username = $this->input->post("data[username]");
			$password = $this->input->post("data[password]");
			$repeat_password = $this->input->post("password2");
			$email = $this->input->post("data[email]");
			$address = $this->input->post("data[address]");
			$phone = $this->input->post("data[phone]");
			$status = $this->input->post("data[status]");
			$type = $this->input->post("data[role_id]");			
		}
		
		if(!isset($fullname) || empty($fullname)
		|| !isset($username) || empty($username)
		|| !isset($email)    || empty($email)
		) {
			$this->showError("403", $this->lang->line('Please Fill All Required Data'));
		}

		if(isset($password) && !empty($password) && isset($repeat_password) && !empty($repeat_password)) {
			if($password != $repeat_password ) {
			    $this->showError("403", $this->lang->line('Password Fields Must Be Same'));
			}else {
			$password = sha1($this->input->post("data[password]"));
			}
		}else {
			$password = $old_password;
		}		
        $filters = array();
        $filters['deleted'] = 0;
        $filters['username'] = $username;
        $filters['id !='] = $id;		
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() > 0){
			$this->showError("403", $this->lang->line('Username Is Already In Use'));	
		}

        $filters = array();
        $filters['deleted'] = 0;
        $filters['email'] = $email;	
        $filters['id !='] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() > 0){
			$this->showError("403", $this->lang->line('Email Is Already In Use'));	
		}
		
		$data['password'] = $password;
		if(isset($data['status']) && !empty($data['status'])){
			if($data['status'] == "Active"){
				$data['status'] = "Active";
			}else{
				$data['status'] = "Not Active";
			}
		}

		if(!empty($_FILES['data']['name']['profile_picture'])){
				
			$_FILES['userFile']['name'] = $_FILES['data']['name']['profile_picture'];
			$_FILES['userFile']['name'] = str_replace(' ', '', $_FILES['userFile']['name']);
			$_FILES['userFile']['name'] = str_replace('_', '', $_FILES['userFile']['name']);
			$_FILES['userFile']['name'] = date("Ymd") . date("his") . "_" . $_FILES['userFile']['name']; 
			$_FILES['userFile']['type'] = $_FILES['data']['type']['profile_picture'];
			$_FILES['userFile']['tmp_name'] = $_FILES['data']['tmp_name']['profile_picture'];
			$_FILES['userFile']['error'] = $_FILES['data']['error']['profile_picture'];
			$_FILES['userFile']['size'] = $_FILES['data']['size']['profile_picture'];

			$uploadPath = './uploads/users/';
			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = $uploadPath;
			$config['max_size']	= '32000';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('userFile')){
				$fileData = $this->upload->data();
				$uploadData['file_name'] =  date("Ymd") . date("his") . "_" . $fileData['file_name'];
				$uploadData['file_name'] = str_replace(' ', '', $uploadData['file_name']);
				$uploadData['file_name'] = str_replace('_', '', $uploadData['file_name']);
				$uploadData['created'] = date("Y-m-d H:i:s");
				$uploadData['modified'] = date("Y-m-d H:i:s");

				$ext = end((explode(".", $fileData['file_name'])));
					$data['profile_picture'] = 'uploads/users/' .$fileData['file_name'];
				}else{
					$this->showError("!", $this->upload->display_errors());
				}
			}	

		$this->Users_Model->edit($data,$id);
		$url = $_SERVER['HTTP_REFERER'];
		redirect($url);
    }	
	  /***********************************************
   * shows an error message
   ***********************************************/
  private function showError($title, $message) {
    $res = array();
    $res['title'] = $title;
    $res['error_message'] = $message;
    exit($this->load->view('error_message', $res, true));
  }

}
