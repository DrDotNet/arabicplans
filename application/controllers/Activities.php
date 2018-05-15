<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();

		$this->load->model('MainSectors_Model');
		$this->load->model('SubSectors_Model');
		$this->load->model('Activities_Model');
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
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;

        $filters = array();
		$sub_sectors = $this->SubSectors_Model->get_sub_sectors($filters)->result();
		$data['sub_sectors'] = $sub_sectors;

        $filters = array();
		$activities = $this->Activities_Model->get_activities($filters)->result();
		$data['activities'] = $activities;
		
		$data['title'] = "الأنشطة الإقتصادية";
		$data['subtitle'] = "كافة الأنشطة الإقتصادية";	
		$this->load->view('includes/header', $data);
		$this->load->view('activities/all', $data);
		$this->load->view('includes/footer');

	}
	public function create()
	{
	
	    $data = array();
		$data['title'] = "الأنشطة الإقتصادية";
		$data['subtitle'] = "إضافة نشاط إقتصادي جديد";

        $filters = array();
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;

        $filters = array();
		$sub_sectors = $this->SubSectors_Model->get_sub_sectors($filters)->result();
		$data['sub_sectors'] = $sub_sectors;
		
		$this->load->view('includes/header', $data);
		$this->load->view('activities/create');	
		$this->load->view('includes/footer');
	}
	
    public function add() {

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$activity_name = $this->input->post('data[activity_name]');
			$activity_description = $this->input->post("data[activity_description]");
            $main_sector_id = $this->input->post('data[main_sector_id]');		
            $sub_sector_id = $this->input->post('data[sub_sector_id]');				
		}		


		if(!isset($activity_name) || empty($activity_name)
		|| !isset($main_sector_id) || empty($main_sector_id)	
	    || !isset($sub_sector_id) || empty($sub_sector_id)
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}

		$main_sector_id = intval($main_sector_id);
		$sub_sector_id = intval($sub_sector_id);

        $filters = array();
        $filters['activity_name'] = $activity_name;	
        $filters['main_sector_id'] = $main_sector_id;	
        $filters['sub_sector_id'] = $sub_sector_id;		
		$activities = $this->Activities_Model->get_activities($filters);
		if($activities->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم النشاط الإقتصادي المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}
		
		$this->Activities_Model->add($data);
		redirect('activities');
    }	
	

	public function view($id)
	{
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}
		$data = array();
		$filters = array();
		$filters['activity_id'] = $id;			
		$activities = $this->Activities_Model->get_activities($filters);
		if($activities->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $activities = $activities->result();
        $activity = $activities[0];
		$data['activity'] = $activity;

        $filters = array();
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;

        $filters = array();
		$sub_sectors = $this->SubSectors_Model->get_sub_sectors($filters)->result();
		$data['sub_sectors'] = $sub_sectors;

		
		$data['title'] = "الأنشطة الإقتصادية";
		$data['subtitle'] = "تعديل بيانات النشاط الإقتصادي";
			
		$this->load->view('includes/header', $data);
		$this->load->view('activities/edit');	
		$this->load->view('includes/footer'); 
	}

    public function edit() {

	    $id = intval($this->input->post("activity_id"));
		$filters = array();
		$filters['activity_id'] = $id;			
		$activities = $this->Activities_Model->get_activities($filters);
		if($activities->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $activities = $activities->result();
        $activity = $activities[0];
		

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$activity_name = $this->input->post('data[activity_name]');
			$activity_description = $this->input->post("data[activity_description]");
            $main_sector_id = $this->input->post('data[main_sector_id]');		
            $sub_sector_id = $this->input->post('data[sub_sector_id]');				
		}		


		if(!isset($activity_name) || empty($activity_name)
		|| !isset($main_sector_id) || empty($main_sector_id)	
	    || !isset($sub_sector_id) || empty($sub_sector_id)
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}
	


        $filters = array();
        $filters['activity_name'] = $activity_name;	
		$filters['main_sector_id'] = $main_sector_id;	
		$filters['sub_sector_id'] = $sub_sector_id;
        $filters['activity_id !='] = $id;			
		$activities = $this->Activities_Model->get_activities($filters);
		if($activities->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم النشاط الإقتصادي المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}



		$this->Activities_Model->edit($data,$id);
		redirect("activities/view/$id");
    }	

	public function delete_activity_message() {	
		$id = intval($this->input->post('activity_id'));
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}		
		echo '<p>هل أنت متأكد من حذف هذا النشاط الإقتصادي؟</p>';
			
		echo '<input type="hidden" name ="activity_id" value="'.$id.'" />			  
			  <div class="modal-footer">
			    <button type="submit" name="submit_delete" class="btn btn-danger">نعم</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
				
			  </div>';			  					
			
		}
	public function delete() {
	
		$id = intval($this->input->post('activity_id'));
			
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}				
		$result = $this->Activities_Model->delete($id);
		redirect("activities");
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
