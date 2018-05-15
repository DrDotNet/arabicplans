<?php
/**
 * checks whether the user is currently logged in or not
 */
function isLoggedIn() {
  // get the superobject
  $CI =& get_instance();

  $uid = intval($CI->session->userdata('user_id'));
  // make sure that the user id is set in the session
  if(!isset($uid) || empty($uid)) {
    return false;
  }

  $CI->load->model('Users_Model');

  $currentUser = $CI->Users_Model->get_by_id($uid);
  // make sure the userid exists in the db
  if($currentUser->num_rows() != 1) {
	  
    return false;

  }

  // make sure the user is active
  $result = $currentUser->result();
  if ($result[0]->status != 'Active') {
    return false;

  }

  if ($CI->session->userdata('arabic_palns_flag_user_logged_in') != 1 ) {
    return false;
  }
  return true;
}

function isAdmin() {
  // get the superobject
  $CI =& get_instance();

  $uid = intval($CI->session->userdata('user_id'));
  // make sure that the user id is set in the session
  if(!isset($uid) || empty($uid)) {
    return false;
  }

  $CI->load->model('Users_Model');

  $currentUser = $CI->Users_Model->get_by_id($uid);
  // make sure the userid exists in the db
  if($currentUser->num_rows() != 1) {
	  
    return false;

  }

  // make sure the user is admin
  $result = $currentUser->result();
  if ($result[0]->type != 'Admin') {
    return false;

  }

  if ($CI->session->userdata('arabic_palns_flag_user_logged_in') != 1 ) {
    return false;
  }
  return true;
}


function getSubString($string,$to){
  return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $to))." ...";
}



?>
