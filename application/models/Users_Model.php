<?php
/* model to check registration method */

defined('BASEPATH') OR exit('No direct script access allowed');
 
 /* function to get user */
class Users_Model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
	}
	
	function get_users($filters) {
		if(isset($filters)){
			$this->db->where($filters);
		}
		return $this->db->get('users');
	}

	public function get_by_id($uid) {
		
		return $this->db->get_where('users', array('id'=>$uid));
		
	}

    function add($data){
        $this->db->insert('users', $data);
    }

	function edit($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	 function delete($id)
    {
        $this->db->where("id",$id);
        $this->db->delete("users");
		return $this->db->error();
    }	
	
	
}
