<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_cms_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	protected $tbl_country = 'tbl_country';
	protected $tbl_nationality = 'tbl_nationality';

	public function insertModule($post_value,$fileName){

		if(!empty($post_value)){
			$static_pageData = array(
				'cmsTitle'        => $post_value['title_name'],
				'cmsSlug'         => $post_value['slug'],
				'cmsShortDesc'    => $post_value['description'],
				'cmsLongDesc' 	  => $post_value['long_description'],
				'cmsBanner' 	  => $fileName,
				'cmsStatus' 	  => '1',
				'metaTitle'       => $post_value['meta_title'],
				'metaKeyword'     => $post_value['meta_keyword'],
				'metaDescription' => $post_value['meta_description'],
				'cmsDateCreated'  => $post_value['created_date'],
				'cmsDateModified' => $post_value['created_date']
			);
		$this->db->insert('tbl_cms', $static_pageData);
		$insert_id = $this->db->insert_id();
		if(!empty($fileName)){
		/* 	$imgArr = array();
			$imgArr = explode(',',$fileName);
			for($i=0;$i< @count($imgArr);$i++)
			{
			$mainimg = $imgArr[$i];
			$sql2 = "insert into tbl_cms_banner(cms_id,banner_image) values('$insert_id','$mainimg')"; 
			$this->db->query($sql2);
			}  */
		}
		if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "Cms added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			return $return;
		}
	}
	
	function getlanguagename($country_id = null){
		//pr($country_id); exit;
		if(!empty($country_id)){
		$this->db->select('language_id, language_name');
		$this->db->where_in('language_id', $country_id);
		$query = $this->db->get('tbl_language');
		if($query->result())
			{
			echo '<option value="">Select Language</option>';
			foreach ($query->result() as $language) {
			echo '<option value="'.$language->language_id.'">'.$language->language_name.'</option>';
			}
			
		} } else{
		echo '<option value="">Select Language</option>';
		}
	}
	
	function getcountryname1($country_id = null){
		if($country_id != NULL){
		$this->db->select('country_id, country_name');
		$this->db->where_in('country_id', $country_id);
		$query = $this->db->get('tbl_country');
		if($query->result())
			{
			echo '<option value="">Select Country</option>';
			foreach ($query->result() as $country) {
			echo '<option value="'.$country->country_id.'">'.$country->country_name.'</option>';
			}
		} } else {
			echo '<option value="">Select Country</option>';
		}
	}
	
	function getcountryname($country_id = null){
		
		$this->db->select('country_id, country_name');
		$this->db->where_in('country_id', $country_id);
		$this->db->where('is_active', '1');
		$this->db->order_by('country_name','ASC');
		$query = $this->db->get('tbl_country');
		if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	

	}
	
	public function countryList($language_id){
		$this->db->select('*');
		$this->db->from('tbl_country_language as tcl');
		$this->db->join('tbl_country as tl','tcl.country_id = tl.country_id' );
		$this->db->where('tcl.language_id', $language_id);
		return $this->db->get()->result();
	}
	
	function getstatename($country_id = null){
		if($country_id != NULL){
		$this->db->select('state_id, state_name');
		$this->db->where('country_id', $country_id);
		$query = $this->db->get('tbl_state');
		if($query->result())
			{
			echo '<option value="">Select State</option>';
			foreach ($query->result() as $country) {
			echo '<option value="'.$country->state_id.'">'.$country->state_name.'</option>';
			}
		} } else{
		echo '<option value="">Select State</option>';	
		}
	}
	
	function getcityname($country_id = null){
		if($country_id != NULL){
		$this->db->select('city_id, city_name');
		$this->db->where('state_id', $country_id);
		$query = $this->db->get('tbl_city');
		if($query->result())
			{
			echo '<option value="">Select City</option>';
			foreach ($query->result() as $country) {
			echo '<option value="'.$country->city_id.'">'.$country->city_name.'</option>';
			}
		} } else{
		echo '<option value="">Select City</option>';
		}
	}
	
	public function checkcountryidexist($sub_ad, $id) {
		//pr($sub_ad['language_id']); exit;
		$this->db->where('cms_id', $id);
		$this->db->where_in('language_id', $sub_ad['language_id']);
		$this->db->from('tbl_cms');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}

    }
	
	public function updatecms_page($post_value, $id, $fileName) {
		//pr($post_value); die;
		$static_pageData = array(
			    'cmsTitle'        => $post_value['title_name'],
				'cmsSlug'         => $post_value['slug'],
				'cmsShortDesc'    => $post_value['description'],
				'cmsLongDesc' 	  => $post_value['long_description'],
				'cmsBanner' 	  => $fileName,
				'cmsStatus' 	  => '1',
				'metaTitle'       => $post_value['meta_title'],
				'metaKeyword'     => $post_value['meta_keyword'],
				'metaDescription' => $post_value['meta_description'],
				'cmsDateCreated'  => $post_value['created_date'],
				'cmsDateModified' => $post_value['created_date']
		);
		$this->db->where('cmsid', $id);
		$update_status = $this->db->update('tbl_cms', $static_pageData);
		 
	 
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function getCmsList(){
    $this->db->select('*');
    $this->db->from('tbl_cms');
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	

	
 
 
	
	public function fetchlanguage(){
		$this->db->select('language_id,language_name,is_active');
		$this->db->where('is_active','1');
		return  $this->db->get($this->tbl_language)->result();
	}
	
	public function fetchbusinesscategory(){
		$this->db->select('*');
		$this->db->where('parent_id','0');
		$this->db->order_by('cate_name','ASC');
		return  $this->db->get($this->tbl_Category)->result();
	}
	
	public function fetchcountry(){
		$this->db->select('country_id,country_name,is_active');
		$this->db->where('is_active','1');
		$this->db->order_by('country_name','ASC');
		return  $this->db->get($this->tbl_country)->result();
	}
	public function fetchnatinality(){
		$this->db->select('country_id,country_name,is_active');
		$this->db->where('is_active','1');
		$this->db->order_by('country_name','ASC');
		return  $this->db->get($this->tbl_nationality)->result();
	}
	
	
	public function checkcmsExist($editId="") {
		$this->db->where('cmsid', $editId);
		$this->db->from('tbl_cms');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function checkbannerExist($editId="") {
		$this->db->where('id', $editId);
		$this->db->from('tbl_banner');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function deletecms($id){
		$this->db->where('cmsid', $id);
		if ($this->db->delete('tbl_cms')) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function deletebanner($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_banner')) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function status_active_inacive($status) {

        $staus = $status['status'];
	   // echo  $staus;die;
        if ($staus == 0) {

            $sub_admin['cmsStatus'] = '0';

            $this->db->where('cmsid ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_cms', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['cmsStatus'] = '1';

            $this->db->where('cmsid ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_cms', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_banner($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'active';

        }

    }
	
	public function fetchEditcms($sid) {
		$this->db->select('*');
		$this->db->from('tbl_cms');
		$this->db->where('tbl_cms.cmsid', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function getCountryDetail($sid) {
	$this->db->select('country_id');
    $this->db->from('tbl_cms');
   	$this->db->where('cms_id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			$res_exp=array();
				foreach ($data as $val)
				 {
					$res_exp[]=$val['country_id'] ;
				 }
			return $res_exp; 
	     }
        return false;
    }
	
	public function getbannerDetail($sid) {
	$this->db->select('id,banner_image');
    $this->db->from('tbl_cms_banner');
   	$this->db->where('cms_id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			
			return $data; 
	     }
        return false;
    }

	public function fetchbannerList($sid) {
        $this->db->from('tbl_banner');
        $this->db->where('cms_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function fetchEditbanner($sid) {
        $this->db->from('tbl_banner');
        $this->db->where('id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
			$return['status'] = 'true';
			$return['resultset'] = $data;
			$return['message'] = '';
        }else{
			$return['status'] = 'false';
			$return['message'] = 'No record found';
		}
        return $return;
    }
	
	public function updatebanner_page($sub_ad, $id) {
		$sub_admin['banner_name']    = $sub_ad['banner_name'];
		$sub_admin['banner_title']  = $sub_ad['banner_title'];
		$sub_admin['banner_link']  = $sub_ad['banner_link'];
        $sub_admin['banner_image']  = $sub_ad['banner_image'];
		$this->db->where('id', $id);
		$update_status = $this->db->update('tbl_banner', $sub_admin);
		if ($update_status) {
		return $update_status;
		} else {
		return FALSE;
		}
	}
	
	public function check_slugExist($c_name,$id){
        $slug = trim($c_name);
		$this->db->select('*');
		$this->db->where('cmsSlug', $slug);
		if(!empty($id))
		{
		$this->db->where('id !=', $id);
		}
		$query = $this->db->get('tbl_cms');        
		return $query->num_rows();
	}
	
	public function checkconditionExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('cmsid', $check);
		$this->db->from('tbl_cms');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
	public function checkstatusExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('cmsid', $check);
		$this->db->where('cmsStatus', '0');
		$this->db->from('tbl_cms');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
	public function getCountryDetail1($array) {
		//pr($array);DIE;
		$this->db->select('tbl_cms.cms_id,tbl_cms.country_id,tbl_country.country_id,tbl_country.country_name,tbl_language.language_id,tbl_language.language_name');
    $this->db->from('tbl_cms');
    $this->db->join('tbl_country', 'tbl_country.country_id = tbl_cms.country_id');
    $this->db->join('tbl_language', 'tbl_language.language_id = tbl_cms.language_id');
	$this->db->where('cms_id', $array);	
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	/* get all country which selected in top most parent category.
	*  Auther - ajendra.mishra 3rd march 2017...
	*/
	
	public function fetch_category_country($business_cate_id){
		if($business_cate_id){
			$this->db->select('tc.country_name,tc.country_logo, tc.country_id');
			$this->db->from('tbl_business_category_country as tbcc');
			$this->db->join('tbl_country as tc', 'tbcc.country_id = tc.country_id');
			$this->db->where('tbcc.category_id ', $business_cate_id);
			$this->db->where('tbcc.b_cate_id', $business_cate_id);
			$this->db->where('tc.country_name != ', 'Global');
			$this->db->where('tc.is_active', '1');
			$this->db->group_by('tc.country_id');
			$this->db->order_by('tc.country_name', 'ASC');
			return $this->db->get()->result();
		}
		
	}
	
}
