<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactmodel extends CI_Model{
	function __construct() {
        parent::__construct();
    }
	/**
	* @ Function Name		: addCallbackData
	* @ Function Params		: $id {int}
	* @ Function Purpose 	: Add forms data backend
	* @ Function Returns	: 
	*/
	public function addContactData($post){
		if(!empty($post)){
				  // pr($post); die("ok");
				$userdetails = array( 
					'name' 			=> $post['txtName'],
					'email' 		=> $post['txtEmail'],
					'phone' 		=> $post['txtPhone'],					
					'state' 		=> $post['txtstate'],					
					'country' 		=> $post['country'],					
					'gender' 		=> $post['radio'],
					'message' 		=> $post['txtMessage'], 
					'created_date' 	=> date('Y-m-d H:i:s')
				); 
				$insertdata = $this->db->insert('tbl_contacts', $userdetails);
				$return['status'] = 'true';
				$return['message'] = "Done";
				return $return;
			}else{
				return false;
			}
	}
}
