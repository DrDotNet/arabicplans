<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainSectors extends CI_Controller {

	 public function __construct() {
		
		parent::__construct();

		$this->load->model('MainSectors_Model');
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
		$sectors = $this->MainSectors_Model->get_main_sectors($filters)->result();
		$data['sectors'] = $sectors;
	
		$data['title'] = "القطاعات الرئيسية";
		$data['subtitle'] = "كافة القطاعات الرئيسية";	
		$this->load->view('includes/header', $data);
		$this->load->view('main_sectors/all', $data);
		$this->load->view('includes/footer');

	}
	public function create()
	{
	
	    $data = array();
		$data['title'] = "القطاعات الرئيسية";
		$data['subtitle'] = "إضافة قطاع رئيسي جديد";

		$this->load->view('includes/header', $data);
		$this->load->view('main_sectors/create');	
		$this->load->view('includes/footer');
	}
	
    public function add() {

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
		$sectors = $this->MainSectors_Model->get_main_sectors($filters);
		if($sectors->num_rows() > 0){
			$this->showError("403", "عذرا .. اسم القطاع المسجل موجود حاليا .. من فضلك اختر اسما آخر");
		}
		
		$this->MainSectors_Model->add($data);
		redirect('mainsectors');
    }	
	

	public function view($id)
	{
		if(!isset($id) || empty($id)) {
			$this->showError("403", "رابط غير صحيح");
		}
		$data = array();
		$filters = array();
		$filters['main_sector_id'] = $id;			
		$sectors = $this->MainSectors_Model->get_main_sectors($filters);
		if($sectors->num_rows() != 1){
			$this->showError("403", "رابط غير صحيح");
		}

        $sectors = $sectors->result();
        $sector = $sectors[0];
		$data['sector'] = $sector;

		$data['title'] = "القطاعات الرئيسية";
	    $data['subtitle'] = "تعديل بيانات القطاع الرئيسي";
			
		$this->load->view('includes/header', $data);
		$this->load->view('main_sectors/edit');	
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
