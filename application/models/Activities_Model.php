<?php
/* model to check registration method */

defined('BASEPATH') OR exit('No direct script access allowed');
 
 /* function to get sectors */
class Activities_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}
	
	function get_activities($filters) {
		if(isset($filters)){
			$this->db->where($filters);
		}
		return $this->db->get('activities');
	}

    function add($data){
        $this->db->insert('activities', $data);
    }

	function edit($data,$id) {
		$this->db->where('activity_id', $id);
		$this->db->update('activities', $data);
	}
	 function delete($id)
    {
        $this->db->where("activity_id",$id);
        $this->db->delete("activities");
		return $this->db->error();
    }	
	
	
}
