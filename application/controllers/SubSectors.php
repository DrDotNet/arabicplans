<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubSectors extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();

		$this->load->model('MainSectors_Model');
		$this->load->model('SubSectors_Model');
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
		$sectors = $this->SubSectors_Model->get_sub_sectors($filters)->result();
		$data['sectors'] = $sectors;
		
		$data['title'] = "القطاعات الفرعية";
		$data['subtitle'] = "كافة القطاعات الفرعية";	
		$this->load->view('includes/header', $data);
		$this->load->view('sub_sectors/all', $data);
		$this->load->view('includes/footer');

	}
	public function create()
	{
	
	    $data = array();
		$data['title'] = "القطاعات الفرعية";
		$data['subtitle'] = "إضافة قطاع فرعي جديد";

        $filters = array();
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;
		
		$this->load->view('includes/header', $data);
		$this->load->view('sub_sectors/create');	
		$this->load->view('includes/footer');
	}
	
    public function add() {

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$sub_sector_name = $this->input->post('data[sub_sector_name]');
			$sub_sector_description = $this->input->post("data[sub_sector_description]");
            $main_sector_id = $this->input->post('data[main_sector_id]');			
		}		


		if(!isset($sub_sector_name) || empty($sub_sector_name)
		|| !isset($main_sector_id) || empty($main_sector_id)	
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}

		$main_sector_id = intval($main_sector_id);

        $filters = array();
        $filters['sub_sector_name'] = $sub_sector_name;	
        $filters['main_sector_id'] = $main_sector_id;		
		$sectors = $this->SubSectors_Model->get_sub_sectors($filters);
		if($sectors->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم القطاع المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}
		
		$this->SubSectors_Model->add($data);
		redirect('subsectors');
    }	
	

	public function view($id)
	{
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}
		$data = array();
		$filters = array();
		$filters['sub_sector_id'] = $id;			
		$sectors = $this->SubSectors_Model->get_sub_sectors($filters);
		if($sectors->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $sectors = $sectors->result();
        $sector = $sectors[0];
		$data['sector'] = $sector;

        $filters = array();
		$main_sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['main_sectors'] = $main_sectors;
		
		$data['title'] = "القطاعات الفرعية";
	    $data['subtitle'] = "تعديل بيانات القطاع الفرعي";
			
		$this->load->view('includes/header', $data);
		$this->load->view('sub_sectors/edit');	
		$this->load->view('includes/footer'); 
	}

    public function edit() {

	    $id = intval($this->input->post("sub_sector_id"));
		$filters = array();
		$filters['sub_sector_id'] = $id;			
		$sectors = $this->SubSectors_Model->get_sub_sectors($filters);
		if($sectors->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $sectors = $sectors->result();
        $sector = $sectors[0];
		

		if(isset($_POST['data'])){
			$data = $this->input->post('data');
			$sub_sector_name = $this->input->post('data[sub_sector_name]');
			$sub_sector_description = $this->input->post("data[sub_sector_description]");
            $main_sector_id = $this->input->post('data[main_sector_id]');			
		}		


		if(!isset($sub_sector_name) || empty($sub_sector_name)
		|| !isset($main_sector_id) || empty($main_sector_id)	
		) {
		  $this->showError("403", "أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة");
		}
	


        $filters = array();
        $filters['sub_sector_name'] = $sub_sector_name;	
		$filters['main_sector_id'] = $main_sector_id;	
        $filters['sub_sector_id !='] = $id;			
		$sectors = $this->SubSectors_Model->get_sub_sectors($filters);
		if($sectors->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم القطاع المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}



		$this->SubSectors_Model->edit($data,$id);
		redirect("subsectors/view/$id");
    }	

	public function delete_sector_message() {	
		$id = intval($this->input->post('sub_sector_id'));
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}		
		echo '<p>هل أنت متأكد من حذف هذا القطاع؟</p>';
			
		echo '<input type="hidden" name ="sub_sector_id" value="'.$id.'" />			  
			  <div class="modal-footer">
			    <button type="submit" name="submit_delete" class="btn btn-danger">نعم</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
				
			  </div>';			  					
			
		}
	public function delete() {
	
		$id = intval($this->input->post('sub_sector_id'));
			
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}				
		$result = $this->SubSectors_Model->delete($id);
		redirect("subsectors");
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
