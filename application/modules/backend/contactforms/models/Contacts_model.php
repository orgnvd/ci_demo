<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_testimonials_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	protected $tbl_Module = 'tbl_callback';
	
	 
	
	public function getTestimonialsList(){
    $this->db->select('*');
    $this->db->from('tbl_callback');
 
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	
	public function deletetestimonials($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_testimonial')) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function status_active_inacive($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_testimonial_management', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_testimonial_management', $sub_admin);

            return 'active';

        }

    }
	
	public function fetchEditTestimonials($sid) {
		$this->db->select('*');
		$this->db->from('tbl_testimonial_management');
		$this->db->where('tbl_testimonial_management.id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
}
