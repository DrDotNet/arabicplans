<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();

		$this->load->model('Plans_Model');
		$this->load->model('MainSectors_Model');
		$this->load->model('SubSectors_Model');
		$this->load->model('Activities_Model');
		$this->load->library('session');
		if (!(isLoggedIn()))
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
		if(!isAdmin()){
			$filters['user_id'] = $this->session->userdata("user_id");
		}
		$plans = $this->Plans_Model->get_plans($filters)->result();
		$data['plans'] = $plans;
	
		$data['title'] = "خطط العمل";
		$data['subtitle'] = "كافة خطط العمل";	
		$this->load->view('includes/header', $data);
		$this->load->view('plans/all', $data);
		$this->load->view('includes/footer');

	}
	public function create()
	{
		$data = array();
		
        $filters = array();
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;

        $filters = array();
		$sub_sectors = $this->SubSectors_Model->get_sub_sectors($filters)->result();
		$data['sub_sectors'] = $sub_sectors;

        $filters = array();
		$activities = $this->Activities_Model->get_activities($filters)->result();
		$data['activities'] = $activities;
		
	   
		$data['title'] = "خطط العمل";
		$data['subtitle'] = "إضافة خطة عمل جديدة";

		$this->load->view('includes/header', $data);
		$this->load->view('plans/create');	
		$this->load->view('includes/footer');
	}
	
    public function add() {

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$project_name = $this->input->post('data[project_name]');
			$person_name = $this->input->post("data[person_name]");	
            $country = $this->input->post("data[country]");
           	$city = $this->input->post("data[city]");
            $project_date = date("Y-m-d",strtotime($this->input->post("data[project_date]")));
            $website = $this->input->post("data[website]");
            $email = $this->input->post("data[email]");		
            $phone = $this->input->post("data[phone]");	
            $main_sector_id = $this->input->post("data[main_sector_id]");	
            $sub_sector_id = $this->input->post("data[sub_sector_id]");	
            $activity_id = $this->input->post("data[activity_id]");	
            $user_id = intval($this->session->userdata("user_id"));			
		}		


		if(!isset($project_name) || empty($project_name)
		|| !isset($person_name) || empty($person_name)
        || !isset($country) || empty($country)
		|| !isset($city) || empty($city)
		|| !isset($project_date) || empty($project_date)
		|| !isset($website) || empty($website)
		|| !isset($email) || empty($email)
		|| !isset($phone) || empty($phone)
		|| !isset($main_sector_id) || empty($main_sector_id)
		|| !isset($sub_sector_id) || empty($sub_sector_id)
		|| !isset($activity_id) || empty($activity_id)		
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}

		$main_sector_id = intval($main_sector_id);
		$sub_sector_id = intval($sub_sector_id);
		$activity_id = intval($activity_id);
		$data["user_id"] = $user_id;
		
		
		$id = $this->Plans_Model->add($data);
		redirect("plans/second_stage/$id");
    }
	
	

	public function second_stage($id)
	{
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}
		$data = array();
		$filters = array();
		$filters['plan_id'] = $id;	
		if(!isAdmin()){
			$filters['user_id'] = $this->session->userdata("user_id");
		}		
		$plans = $this->Plans_Model->get_plans($filters);
		if($plans->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $plans = $plans->result();
        $plan = $plans[0];
		$data['plan'] = $plan;

		$data['title'] = "خطط العمل";
	    $data['subtitle'] = "تفاصيل خطة العمل";
			
		$this->load->view('includes/header', $data);
		$this->load->view('plans/second_stage');	
		$this->load->view('includes/footer'); 
	}

    public function edit() {

	    $id = intval($this->input->post("main_sector_id"));
		$filters = array();
		$filters['main_sector_id'] = $id;			
		$sectors = $this->MainSectors_Model->get_main_sectors($filters);
		if($sectors->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $sectors = $sectors->result();
        $sector = $sectors[0];
		

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$main_sector_name = $this->input->post('data[main_sector_name]');
			$main_sector_description = $this->input->post("data[main_sector_description]");			
		}		


		if(!isset($main_sector_name) || empty($main_sector_name)
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}
	


        $filters = array();
        $filters['main_sector_name'] = $main_sector_name;	
        $filters['main_sector_id !='] = $id;			
		$sectors = $this->MainSectors_Model->get_main_sectors($filters);
		if($sectors->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم القطاع المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}



		$this->MainSectors_Model->edit($data,$id);
		redirect("mainsectors/view/$id");
    }	

	public function delete_sector_message() {	
		$id = intval($this->input->post('main_sector_id'));
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}		
		echo '<p>هل أنت متأكد من حذف هذا القطاع؟</p>';
			
		echo '<input type="hidden" name ="main_sector_id" value="'.$id.'" />			  
			  <div class="modal-footer">
			    <button type="submit" name="submit_delete" class="btn btn-danger">نعم</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
				
			  </div>';			  					
			
		}
	public function delete() {
	
		$id = intval($this->input->post('main_sector_id'));
			
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}				
		$result = $this->MainSectors_Model->delete($id);
		redirect("mainsectors");
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
