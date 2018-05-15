<?php
/* model to check registration method */

defined('BASEPATH') OR exit('No direct script access allowed');
 
 /* function to get sectors */
class MainSectors_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}
	
	function get_main_sectors($filters) {
		if(isset($filters)){
			$this->db->where($filters);
		}
		return $this->db->get('main_sectors');
	}

    function add($data){
        $this->db->insert('main_sectors', $data);
    }

	function edit($data,$id) {
		$this->db->where('main_sector_id', $id);
		$this->db->update('main_sectors', $data);
	}
	 function delete($id)
    {
        $this->db->where("main_sector_id",$id);
        $this->db->delete("main_sectors");
		return $this->db->error();
    }	
	
	
}
