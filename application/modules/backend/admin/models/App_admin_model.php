<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_admin_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

	protected $tbl_users = 'tbl_users';
	
	public function userAutheticate($username=false, $password=false){
		if($username){  
			$this->db->select('*');
			$this->db->where('user_password', $password);
			$this->db->where('user_name', $username);
			$this->db->or_where('user_email', $username);
			$this->db->or_where('user_mobile', $username);
			
			$query = $this->db->get($this->tbl_users);
			if($query->num_rows() > 0){
				$userDetail = $query->row();
				$return['status'] = 'okay';
				$return['userDetail'] = $userDetail;
				$return['message'] = "User record found successfully.";
				
			}else{
				$return['status'] = 'false';
				$return['message'] = "User credential not valid.";
			}
		}else{
			$return['status'] = 'false';
			$return['message'] = "User Not valid.";
		}
		return $return;
	}
	
	
	
}
