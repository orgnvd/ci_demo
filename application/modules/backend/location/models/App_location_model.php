<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_location_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	protected $tbl_Module = 'tbl_country';
	protected $tbl_State = 'tbl_state';
	protected $tbl_City = 'tbl_city';
	protected $tbl_Language = 'tbl_language';

	public function insertModule($post_value){
		
		if(!empty($post_value)){
			$inserted = $this->db->insert($this->tbl_Module, $post_value);
			if($inserted){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function insertState($post_value){
		
		if(!empty($post_value)){
			$inserted = $this->db->insert($this->tbl_State, $post_value);
			if($inserted){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function insertMapping($post_value){
		$language_id    = $post_value['language_id'];
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
			$country_id = $_POST['country_id'][$i];
		$sql1 = "insert into tbl_country_language
		(country_id,language_id) values('$country_id','$language_id')";  
	   $this->db->query($sql1);
	   }
			if($inserted){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		
	}
	
	public function insertLanguage($post_value){
		
		if(!empty($post_value)){
			$static_pageData = array(
			'language_name'  => $post_value['language_name'],
			'language_code'  => $post_value['language_code'],
			'created_date' 	   => $post_value['created_date'],
			'created_by'       => $post_value['created_by'],
			'create_browser'   => $post_value['create_browser'],
			'created_ip'       => $post_value['created_ip']
        );
		$this->db->insert('tbl_language', $static_pageData);
		$insert_id = $this->db->insert_id();
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
		$country_id = $_POST['country_id'][$i];
		$sql1 = "insert into tbl_country_language
		(country_id,language_id) values('$country_id','$insert_id')";  
	   $this->db->query($sql1);
	   }
			if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function insertFont($post_value){
		
		if(!empty($post_value)){
			$static_pageData = array(
			'category_id'  => $post_value['category_id'],
			'heading_size'  => $post_value['heading_size'],
			'heading_color'  => $post_value['heading_color'],
			'content_size'  => $post_value['content_size'],
			'content_color'  => $post_value['content_color'],
			'created_date' 	   => $post_value['created_date'],
			'created_by'       => $post_value['created_by'],
			'create_browser'   => $post_value['create_browser'],
			'created_ip'       => $post_value['created_ip']
        );
		$this->db->insert('tbl_font_management', $static_pageData);
		$insert_id = $this->db->insert_id();
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
		$country_id = $_POST['country_id'][$i];
		$sql1 = "insert into tbl_font_country
		(font_id,country_id) values('$insert_id','$country_id')";  
	   $this->db->query($sql1);
	   }
			if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function insertCity($post_value){
		
		if(!empty($post_value)){
			$inserted = $this->db->insert($this->tbl_City, $post_value);
			if($inserted){			
				$return['status'] = 'true';
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function updatelocation_page($sub_ad, $id) {
		$sub_admin['continent_id']  = $sub_ad['continent_id'];
		$sub_admin['country_name']  = $sub_ad['country_name'];
		$sub_admin['country_key']  = $sub_ad['country_key'];
		$sub_admin['country_logo']  = $sub_ad['country_logo'];
		$sub_admin['modified_date']  = $sub_ad['modified_date'];
        $sub_admin['modified_by']  = $sub_ad['modified_by'];
        $sub_admin['modified_browser']  = $sub_ad['modified_browser'];
        $sub_admin['modified_ip']  = $sub_ad['modified_ip'];
		$this->db->where('country_id', $id);
		$update_status = $this->db->update('tbl_country', $sub_admin);
		if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function updatestate_page($sub_ad, $id) {
		$this->db->where('state_id', $id);
		$update_status = $this->db->update('tbl_state', $sub_ad);
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function updatelanguage_page($sub_ad, $id) {
		$sub_admin['language_name']    = $sub_ad['language_name'];
		$sub_admin['language_code']    = $sub_ad['language_code'];
		$sub_admin['modified_date']  = $sub_ad['modified_date'];
        $sub_admin['modified_by']  = $sub_ad['modified_by'];
        $sub_admin['modified_browser']  = $sub_ad['modified_browser'];
        $sub_admin['modified_ip']  = $sub_ad['modified_ip'];
		$this->db->where('language_id', $id);
		$update_status = $this->db->update('tbl_language', $sub_admin);
		if(@count($id)>0)
			{
		  $sql_del = "delete from tbl_country_language where language_id='".$id."'";
		  $this->db->query($sql_del);
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
		$country_id = $_POST['country_id'][$i];
		$sql1 = "insert into tbl_country_language
		(country_id,language_id) values('$country_id','$id')";  
	   $this->db->query($sql1);
			} }
		
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function updatefont_page($sub_ad, $id) {
		
		$sub_admin['category_id']    = $sub_ad['category_id'];
		$sub_admin['heading_size']    = $sub_ad['heading_size'];
		$sub_admin['heading_color']    = $sub_ad['heading_color'];
		$sub_admin['content_size']    = $sub_ad['content_size'];
		$sub_admin['content_color']    = $sub_ad['content_color'];
		$sub_admin['modified_date']  = $sub_ad['modified_date'];
        $sub_admin['modified_by']  = $sub_ad['modified_by'];
        $sub_admin['modified_browser']  = $sub_ad['modified_browser'];
        $sub_admin['modified_ip']  = $sub_ad['modified_ip'];
		$this->db->where('id', $id);
		$update_status = $this->db->update('tbl_font_management', $sub_admin);
		if(@count($id)>0)
			{
		  $sql_del = "delete from tbl_font_country where font_id='".$id."'";
		  $this->db->query($sql_del);
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
		$country_id = $_POST['country_id'][$i];
		$sql1 = "insert into tbl_font_country
		(font_id,country_id) values('$id','$country_id')";  
	   $this->db->query($sql1);
			} }
		
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function updatecity_page($sub_ad, $id) {
		$this->db->where('city_id', $id);
		$update_status = $this->db->update('tbl_city', $sub_ad);
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	
	public function getLocationList(){
		$this->db->select('*');
		$this->db->order_by('country_name', 'asc');
		return  $this->db->get($this->tbl_Module)->result();
	}
	
	public function checklocationExist($editId="") {

        $this->db->where('country_id', $editId);

        $this->db->from('tbl_country');

        $userStatus = $this->db->count_all_results();        
		
        if ($userStatus > 0) {

            return 1;

        } else {

            return 0;

        }

    }
	
	public function checkstateExist($editId="") {

        $this->db->where('state_id', $editId);

        $this->db->from('tbl_state');

        $userStatus = $this->db->count_all_results();        
		
        if ($userStatus > 0) {

            return 1;

        } else {

            return 0;

        }

    }
	
	public function checklanguageExist($editId="") {

        $this->db->where('language_id', $editId);

        $this->db->from('tbl_language');

        $userStatus = $this->db->count_all_results();        
		
        if ($userStatus > 0) {

            return 1;

        } else {

            return 0;

        }

    }
	
	public function checkcityExist($editId="") {

        $this->db->where('city_id', $editId);

        $this->db->from('tbl_city');

        $userStatus = $this->db->count_all_results();        
		
        if ($userStatus > 0) {

            return 1;

        } else {

            return 0;

        }

    }
	
	public function checkconditionExist($status) {
		$check = $status['static_page_id'];
		$this->db->where('country_id', $check);
		$this->db->where('is_active', '1');

        $this->db->from('tbl_state');

        $userStatus = $this->db->count_all_results();        
		
        if ($userStatus > 0) {

            return 1;

        } else {

            return 0;

        }

    }
	

	public function check_countryExist($c_name){
        $country_name = trim($c_name);
		$this->db->select('*');
		$this->db->where('country_name', $country_name);
		//$this->db->from('tbl_country');
        $query = $this->db->get('tbl_country');        
		return $query->num_rows();
	}
	
	public function check_countryEditExist($c_name,$id){
        $country_name = trim($c_name);
		$this->db->select('*');
		$this->db->where('country_name', $country_name);
		$this->db->where('country_id !=', $id);
		$query = $this->db->get('tbl_country');        
		//echo $this->db->last_query(); exit;
		return $query->num_rows();
	}
	
	public function check_stateExist($c_name,$id){
        $state_name = trim($c_name);
		$this->db->select('*');
		$this->db->where('state_name', $state_name);
		if(!empty($id))
		{
		$this->db->where('state_id !=', $id);
		}
		$query = $this->db->get('tbl_state');
		//echo $this->db->last_query(); exit;	
		return $query->num_rows();
	}
	
	public function check_cityExist($c_name,$id){
        $city_name = trim($c_name);
		$this->db->select('*');
		$this->db->where('city_name', $city_name);
		if(!empty($id))
		{
		$this->db->where('city_id !=', $id);
		}
		$query = $this->db->get('tbl_city');        
		return $query->num_rows();
	}
	
	public function check_languageExist($c_name,$id){
        $language_name = trim($c_name);
		$this->db->select('*');
		$this->db->where('language_name', $language_name);
		if(!empty($id))
		{
		$this->db->where('language_id !=', $id);
		}
		$query = $this->db->get('tbl_language');        
		return $query->num_rows();
	}
	
	public function deletelocation($id){

		$this->db->where('country_id', $id);

		if ($this->db->delete('tbl_country')) {

            return 1;

        } else {

            return 0;

        }

	}
	
	public function deletestate($id){

		$this->db->where('state_id', $id);

		if ($this->db->delete('tbl_state')) {

            return 1;

        } else {

            return 0;

        }

	}
	
	public function deletelanguage($id){

		$this->db->where('language_id', $id);

		if ($this->db->delete('tbl_language')) {

            return 1;

        } else {

            return 0;

        }

	}
	
	public function deletecity($id){

		$this->db->where('city_id', $id);

		if ($this->db->delete('tbl_city')) {

            return 1;

        } else {

            return 0;

        }

	}
	
	public function status_active_inacive($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('country_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_country', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('country_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_country', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_state($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('state_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_state', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('state_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_state', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_language($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('language_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_language', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('language_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_language', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_font($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_font_management', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_font_management', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_city($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('city_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_city', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('city_id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_city', $sub_admin);

            return 'active';

        }

    }
	
	public function fetchEditlocation($sid) {
        $this->db->from('tbl_country');
        $this->db->where('country_id', $sid);
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
	
	public function fetchEditstate($sid) {
        $this->db->from('tbl_state');
        $this->db->where('state_id', $sid);
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
	
	public function fetchEditlanguage($sid) {
        $this->db->from('tbl_language');
        $this->db->where('language_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function fetchEditfont($sid) {
        $this->db->from('tbl_font_management');
        $this->db->where('id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function fetchEditcity($sid) {
        $this->db->from('tbl_city');
        $this->db->where('city_id', $sid);
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
	
	public function fetchstateList($sid) {
        $this->db->from('tbl_state');
        $this->db->where('country_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function fetchmappingList($sid) {
        $this->db->from('tbl_country_language');
        $this->db->where('language_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function fetchlanguageList() {
        $this->db->from('tbl_language');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function fetchfontList() {
        $this->db->select('tbl_font_management.*,tbl_Category.cate_name');
    $this->db->from('tbl_font_management');
    $this->db->join('tbl_Category', 'tbl_Category.id = tbl_font_management.category_id');
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	
	public function fetchcityList($sid) {
        $this->db->from('tbl_city');
        $this->db->where('state_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function getMapCountryDetail($sid) {
	$this->db->select('country_id');
    $this->db->from('tbl_country_language');
   	$this->db->where('language_id', $sid);
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
	
	public function getMapCountryFontDetail($sid) {
	$this->db->select('country_id');
    $this->db->from('tbl_font_country');
   	$this->db->where('font_id', $sid);
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
	
	public function getCountryDetail1($array) {
		//pr($array);DIE;
		$this->db->select('tbl_font_country.font_id,tbl_font_country.country_id,tbl_country.country_id,tbl_country.country_name');
    $this->db->from('tbl_font_country');
    $this->db->join('tbl_country', 'tbl_country.country_id = tbl_font_country.country_id');
    $this->db->where('font_id', $array);	
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function getstateExistDetail($country_id, $state){
		if($state !='' && $country_id !=''){
			$this->db->select('*');
			$this->db->where('country_id', $country_id);
			$this->db->where('state_name', $state);
			$query = $this->db->get($this->tbl_State);
			if ($query->num_rows() > 0) {
				$return['status'] = 'true';
			}else{
				$return['status'] = 'false';
			}
			return $return; 
		}
	}
	
	public function getcityExistDetail($country_id, $state, $city){
		if($state !='' && $country_id !='' && $city !=''){
			$this->db->select('*');
			$this->db->where('country_id', $country_id);
			$this->db->where('state_id', $state);
			$this->db->where('city_name', $city);
			$query = $this->db->get($this->tbl_City);
			if ($query->num_rows() > 0) {
				$return['status'] = 'true';
			}else{
				$return['status'] = 'false';
			}
			return $return; 
		}
	}
	
	public function getcountryExistDetail($country){
		if($country!=''){
			$this->db->select('*');
			$this->db->where('country_name', $country);
			$query = $this->db->get($this->tbl_Module);
			if ($query->num_rows() > 0) {
				$return['status'] = 'true';
			}else{
				$return['status'] = 'false';
			}
			return $return; 
		}
	}
	
	public function insert_csv_state($record){
		if(!empty($record)){
			return $this->db->insert($this->tbl_State, $record);
		}
	}
	
	public function insert_csv_city($record){
		if(!empty($record)){
			return $this->db->insert($this->tbl_City, $record);
		}
	}
	
	public function insert_csv_country($record){
		if(!empty($record)){
			return $this->db->insert($this->tbl_Module, $record);
		}
	}
	
}
