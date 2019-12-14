<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_testimonials_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	protected $tbl_Module = 'tbl_testimonial_management';
	
	public function insertTestimonials($post_value){
		
		if(!empty($post_value)){
			$language_id = $post_value['language_id'];
			$static_pageData = array(
				'name'       			=> $post_value['name'],
				'title'       			=> $post_value['title'],
				'designation'       	=> $post_value['designation'],
				'company_name'          => $post_value['company_name'],
				'image'    			    => $post_value['image'],
				'user_image'    		=> $post_value['user_image'],
				'description'  	   		=> $post_value['description'],
				'publish_date'  	   	=> $post_value['publish_date'],
				'sequence'     			=> $post_value['sequence'],
				'created_date' 	   		=> $post_value['created_date'],
				'created_by'       		=> $post_value['created_by'],
				'create_browser'   		=> $post_value['create_browser'],
				'created_ip'       		=> $post_value['created_ip']
			);
			
		$insert = $this->db->insert('tbl_testimonial_management', $static_pageData);
		if($insert){			
				$return['status'] = 'true';
				$return['message'] = "Testimonial added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Something went wrong.";
			}
			return $return;
		}
	}
	
	public function getCountryDetail($sid) {
	$this->db->select('company_name');
    $this->db->from('tbl_testimonial_management');
   	$this->db->where('id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			$res_exp=array();
				foreach ($data as $val)
				 {
					$res_exp[]=$val['company_name'] ;
				 }
			return $res_exp; 
	     }
        return false;
    }
	
	 
	
	public function updatetestimonials_page($sub_ad, $id) {
		 
		$sub_admin['name']                    = $sub_ad['name'];
		$sub_admin['title']                   = $sub_ad['title'];
		$sub_admin['designation']   		  = $sub_ad['designation'];
		$sub_admin['publish_date']   		  = $sub_ad['publish_date'];
		$sub_admin['company_name']  		  = $sub_ad['company_name'];
		$sub_admin['description']  			  = $sub_ad['description'];
		$sub_admin['sequence']  			  = $sub_ad['sequence'];
        $sub_admin['image']                   = $sub_ad['image'];
        $sub_admin['user_image']              = $sub_ad['user_image'];
		$sub_admin['modified_date']           = $sub_ad['modified_date'];
        $sub_admin['modified_by']             = $sub_ad['modified_by'];
        $sub_admin['modified_browser']        = $sub_ad['modified_browser'];
        $sub_admin['modified_ip']             = $sub_ad['modified_ip'];
		$this->db->where('id', $id);
		$update_status = $this->db->update('tbl_testimonial_management', $sub_admin);
	 
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function getTestimonialsList(){
    $this->db->select('*');
    $this->db->from('tbl_testimonial_management');
 
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	
	
	public function checktestimonialsExist($editId="") {
		$this->db->where('id', $editId);
		$this->db->from('tbl_testimonial');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}
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
