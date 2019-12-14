<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_users_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	protected $tbl_role = "tbl_role";
	protected $tbl_country = "tbl_country";
	protected $tbl_users = "tbl_users";
	
	public function getUserlist($id=false){
		$this->db->select('tu.id,tu.first_name, tu.user_is_active, tu.address, tu.last_name,tu.user_name, tu.user_email, tu.user_mobile,  tu.country_id, tu.user_role_id, tc.country_name, tr.user_role');
		$this->db->from($this->tbl_users.' as tu');
		$this->db->join($this->tbl_country.' as tc', 'tc.country_id = tu.country_id');
		$this->db->join($this->tbl_role.' as tr', 'tr.id = tu.user_role_id');
		//$this->db->where('tu.user_is_active', '1');
		$this->db->where('tu.user_role_id !=', '0');
		if($id){
			$this->db->where('tu.id', $id);
			$result =  $this->db->get()->row_array();
		}else{
			$result =  $this->db->get()->result_array();
		}
		
		if(!empty($result)){
			$return['status'] = "true";
			$return['list'] = $result;
		}else{
			$return['status'] = "false";
		}
		return $return;
	}
	
	public function getUserRole(){
		$this->db->select('*');
		$this->db->where('is_active', '1');
		$this->db->where('super_admin !=', '1');
		$result =  $this->db->get($this->tbl_role)->result();
		if(!empty($result)){
			
			$return['status'] = "true";
			$return['role'] = $result;
			$return['country'] = $this->getCountryRole();
		}else{
			$return['status'] = "false";
		}
		return $return;
	}
	public function getCountryRole(){
		$this->db->select('country_name,country_id');
		$this->db->where('is_active', '1');
		$result =  $this->db->get($this->tbl_country)->result();
		if(!empty($result)){
			return $result;
		}else{
			return $result;
		}
	}
	public function deleteUser($id){
		if($id){
			$this->db->where('id', $id);
			$this->db->delete($this->tbl_users);
			$return['status'] = 'true';
		}else{
			$return['status'] ='false';
		}
		return $return;
	}

	public function insertModule($post_value, $id=false){
		if(!empty($post_value)){
			if($id){
				$this->db->where('id',$id );
				$return = $this->db->update($this->tbl_users, $post_value);
			}else{
				$return = $this->db->insert($this->tbl_users, $post_value);
			}
			
			if($return){
				$return['status'] = 'true';
			}else{
				$return['status'] = 'false';
			}
		}else{
			$return['status'] = 'false';
		}
		return $return;
	}
	
	public function updateStatus($post_value){
		if(!empty($post_value)){
			$id = $post_value['row_id'];
			$data = array();
			$data['user_is_active'] = $post_value['status'];
			
			$this->db->where('id', $id);
			$updated = $this->db->update($this->tbl_users, $data);
			if($updated){			
				$return['status'] = 'true';
				$return['message'] = "Record updated successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong, please try again.";
			}
			return $return;
		}
	}
	
}
