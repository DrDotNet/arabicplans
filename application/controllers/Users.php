<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();

		$this->load->model('Users_Model');
		$this->load->library('session');
		if (!(isLoggedIn()))
		{
		redirect('login');
		}		
		if (!(isAdmin()))
		{
		redirect('login');
		}	
	}

	public function index() {
		$this->show_all();
	}
	

	public function show_all()
	{		
        $data = array();
        $filters = array();
		$users = $this->Users_Model->get_users($filters)->result();
		$data['users'] = $users;
	
		$data['title'] = "المستخدمين";
		$data['subtitle'] = "كافة المستخدمين";	
		$this->load->view('includes/header', $data);
		$this->load->view('users/all', $data);
		$this->load->view('includes/footer');

	}
	public function create()
	{
	
	    $data = array();
	    $data['title'] = "المستخدمين";
		$data['subtitle'] = "إضافة مستخدم جديد";

		$this->load->view('includes/header', $data);
		$this->load->view('users/create');	
		$this->load->view('includes/footer');
	}
	
    public function add() {

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$fullname = $this->input->post('data[fullname]');
			$password = sha1($this->input->post("data[password]"));
			$repeat_password = sha1($this->input->post("password2"));
			$email = $this->input->post("data[email]");
			$status = $this->input->post("data[status]");
			$type = $this->input->post("data[type]");			
		}		


		if(!isset($fullname) || empty($fullname)
	    || !isset($password) || empty($password)
		|| !isset($email)    || empty($email)
		|| !isset($type)     || empty($type)
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}

		if($password != $repeat_password ) {
		  $this->showError("403", "كلمتا المرور يجب أن تكونا متطابقتين");	
		}


        $filters = array();
        $filters['email'] = $email;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() > 0){
			$this->showError("403", "عذرا .. البريد الإلكتروني المسجل موجود حاليا .. من فضلك اختر بريدا الكترونيا آخر");
		}
		
		$data['password'] = $password;
		if(isset($data['status']) && !empty($data['status'])){
			$data['status'] = "Active";
		}else {
			$data['status'] = "Not Active";
		}


		$this->Users_Model->add($data);
		redirect('users');
    }	
	

	public function view($id)
	{
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}
		$data = array();
		$filters = array();
		$filters['id'] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $users = $users->result();
        $user = $users[0];
		$data['user'] = $user;

	    $data['title'] = "المستخدمين";
	    $data['subtitle'] = "تعديل بيانات المستخدم";
			
		$this->load->view('includes/header', $data);
		$this->load->view('users/edit');	
		$this->load->view('includes/footer'); 
	}

    public function edit() {

	    $id = intval($this->input->post("user_id"));
		$filters = array();
		$filters['id'] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $users = $users->result();
        $user = $users[0];
		
		$old_password = $user->password;

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$fullname = $this->input->post('data[fullname]');
			$password = $this->input->post("data[password]");
			$repeat_password = $this->input->post("password2");
			$email = $this->input->post("data[email]");
			$status = $this->input->post("data[status]");
			$type = $this->input->post("data[type]");			
		}
		
		if(!isset($fullname) || empty($fullname)
		|| !isset($email)    || empty($email)
		|| !isset($type)     || empty($type)
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}

		if(isset($password) && !empty($password) && isset($repeat_password) && !empty($repeat_password)) {
			if($password != $repeat_password ) {
		      $this->showError("403", "كلمتا المرور يجب أن تكونا متطابقتين");	
			}else {
			  $password = sha1($this->input->post("data[password]"));
			}
		}else {
			$password = $old_password;
		}		


        $filters = array();
        $filters['email'] = $email;	
        $filters['id !='] = $id;			
		$users = $this->Users_Model->get_users($filters);
		if($users->num_rows() > 0){
			$this->showError("403", "عذرا .. البريد الإلكتروني المسجل موجود حاليا .. من فضلك اختر بريدا الكترونيا آخر");
		}
		
		$data['password'] = $password;
		if(isset($data['status']) && !empty($data['status'])){
			$data['status'] = "Active";
		}else {
			$data['status'] = "Not Active";
		}


		$this->Users_Model->edit($data,$id);
		redirect("users/view/$id");
    }	

	public function delete_user_message() {	
		$id = intval($this->input->post('user_id'));
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}		
		echo '<p>هل أنت متأكد من حذف هذا المستخدم؟</p>';
			
		echo '<input type="hidden" name ="user_id" value="'.$id.'" />			  
			  <div class="modal-footer">
			    <button type="submit" name="submit_delete" class="btn btn-danger">نعم</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
				
			  </div>';			  					
			
		}
	public function delete() {
	
		$id = intval($this->input->post('user_id'));
			
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}				
		$result = $this->Users_Model->delete($id);
		redirect("users");
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
