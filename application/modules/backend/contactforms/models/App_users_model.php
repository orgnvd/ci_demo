<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_users_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

	protected $tbl_users = "tbl_callback";
	
	public function getUserlist($id=false){
		 $this->db->select('*');
		 $this->db->order_by('created_date','DESC');
		 $this->db->from('tbl_callback');
		 
			$query = $this->db->get();
			if($query->num_rows()>0){
				$return['status'] = "true";
				return $query->result_array($query);
			} else{
				return array(); 
			}
	}
	
	public function getUserlistC($id=false){
		 $this->db->select('*');
		 $this->db->order_by('created_date','DESC');
		 $this->db->from('tbl_contacts');
		 
			$query = $this->db->get();
			if($query->num_rows()>0){
				$return['status'] = "true";
				return $query->result_array($query);
			} else{
				return array(); 
			}
	}
	
	public function EditTestimonials($sid) {
		$this->db->select('*');
		$this->db->from('tbl_callback');
		$this->db->where('tbl_callback.id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	public function EditContacs($sid) {
		$this->db->select('*');
		$this->db->from('tbl_contacts');
		$this->db->where('tbl_contacts.id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	  
	public function deletetemessage($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_callback')) {
		return 1;
		} else {
		return 0;
		}
	}  
	public function deleteUserc($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_contacts')) {
		return 1;
		} else {
		return 0;
		}
	}

	 
	
	 
	
}
