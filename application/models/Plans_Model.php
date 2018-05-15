<?php
/* model to check registration method */

defined('BASEPATH') OR exit('No direct script access allowed');
 
 /* function to get sectors */
class Plans_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}
	
	function get_plans($filters) {
		if(isset($filters)){
			$this->db->where($filters);
		}
		return $this->db->get('plans');
	}

    function add($data){
        $this->db->insert('plans', $data);
		return $this->db->insert_id();
    }

	function edit($data,$id) {
		$this->db->where('plan_id', $id);
		$this->db->update('plans', $data);
	}
	 function delete($id)
    {
        $this->db->where("plan_id",$id);
        $this->db->delete("plans");
		return $this->db->error();
    }	
	
	
}
