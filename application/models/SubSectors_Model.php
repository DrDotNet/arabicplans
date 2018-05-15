<?php
/* model to check registration method */

defined('BASEPATH') OR exit('No direct script access allowed');
 
 /* function to get sectors */
class SubSectors_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}
	
	function get_sub_sectors($filters) {
		if(isset($filters)){
			$this->db->where($filters);
		}
		return $this->db->get('sub_sectors');
	}

    function add($data){
        $this->db->insert('sub_sectors', $data);
    }

	function edit($data,$id) {
		$this->db->where('sub_sector_id', $id);
		$this->db->update('sub_sectors', $data);
	}
	 function delete($id)
    {
        $this->db->where("sub_sector_id",$id);
        $this->db->delete("sub_sectors");
		return $this->db->error();
    }	
	
	
}
