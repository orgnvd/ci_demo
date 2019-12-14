<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationmodel extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	/**
	* @ Function Name		: addApplicantData
	* @ Function Params		: $id {int}
	* @ Function Purpose 	: Get totle counts
	* @ Function Returns	: 
	*/
	public function addApplicantData($post,$image_data){
		$userdetails = array( 
			'current_address' 	=> $post['current_address'],
			'city' 				=> $post['city'], 
			'state' 			=> $post['state'], 
			'zipcode' 			=> $post['zipcode'], 
			'arrival_date' 		=> $post['arrival_date'], 
			'mobile' 			=> $post['mob'], 
			'email' 			=> $post['email'], 
			'contact_person' 	=> $post['contact_person'], 
			'emergency_number' 	=> $post['emergencyno'], 		
			'relation' 			=> $post['relation'],
			'created_date' 		=> date('Y-m-d H:i:s')
		); 
		if($this->db->insert('tbl_application_basic', $userdetails)){
			$lastinsertid = $this->db->insert_id();
				if((isset($lastinsertid)) && !empty($lastinsertid)){
					$applicantData = array(
						'app_id' 			=> $lastinsertid,
						'first_name' 		=> $post['first_name'], 
						'middle_name' 		=> $post['middle_name'],
						'last_name' 		=> $post['last_name'],
						'language' 			=> $post['language'],
						'gender' 			=> $post['gender'],
						'dob' 				=> $post['dob'],
						'birth_country' 	=> $post['birth_country'],
						'birth_place' 		=> $post['birth_place'],
						'religion' 			=> $post['religion'],
						'education' 		=> $post['education'],
						'profession' 		=> $post['profession'],
						'father_name' 		=> $post['father_name'],
						'mother_name' 		=> $post['mother_name'],
						'marital_status' 	=> $post['marital_status'],
						'created_date' 		=> date('Y-m-d H:i:s')
					);
					$this->db->insert('tbl_applicants_details', $applicantData);	
					$datasPassport = array(
						'app_id' 			=> $lastinsertid,
						'passport_number' 	=> $post['passport_number'],
						'issuing_place' 	=> $post['issuing_place'],
						'country' 			=> $post['country'],
						'issuing_date' 		=> $post['issuing_date'],
						'expiry_date' 		=> $post['expiry_date']
					);
					$this->db->insert('tbl_passport_information', $datasPassport);
					$documentData = array(
						'app_id' 			=> $lastinsertid,
						'passport_scanned' 	=> $image_data['file1'],
						'photograph' 		=> $image_data['file2'],
						'residance_proof' 	=> $image_data['file3']
					);
					$this->db->insert('tbl_documents', $documentData);	
					
					#generate application Token Number
					$string='UAE';
					$currenttimeseconds = date("mdY_His");
					$tokenID = $string.$lastinsertid.$currenttimeseconds;	
					$applicationTocken = array(
						'app_id' 			=> $lastinsertid,
						'tocken_id' 		=> $tokenID,
						'status' 			=> 'Processing',
						'created_date' 		=> date('Y-m-d H:i:s')
					);
					$this->db->insert('tbl_application_token', $applicationTocken);
					#get results of application id
					$this->db->select("tbl_application_basic.*, tbl_applicants_details.*");
					$this->db->from("tbl_application_basic");
					$this->db->join('tbl_applicants_details', 'tbl_applicants_details.app_id = tbl_application_basic.id', 'left');
					$this->db->where('tbl_application_basic.id', $lastinsertid);
					$str = $this->db->get();
					$final = $str->result();
					
					//pr($final); die("results of user session");
					
					$data = array(
						'app_id' 		 => $final['0']->app_id,
						'user_id' 		 => $final['0']->app_id,
						'userid' 		 => $final['0']->app_id,
						'name' 			 => $final['0']->first_name.'  '.$final['0']->last_name,
						'username'		 => $final['0']->first_name,
						'current_address'=> $final['0']->current_address,
						'logged_in' 	 => TRUE
					);
					$this->session->set_userdata($data);

					$return['status'] = 'true';
					$return['tocken_id'] = $tokenID;
					$return['lastinsertid'] = $lastinsertid;
				    $return['message'] = "Done";
					return $return;
				}else{
					return false;
				}
		}		
	}
	/**
	* @ Function Name		: getApplicantData
	* @ Function Params		: $id {int}
	* @ Function Purpose 	: Get app data
	* @ Function Returns	: 
	*/
	
	public function getApplicantsData($id){
		$this->db->select("tbl_application_basic.*, tbl_applicants_details.*");
		$this->db->from("tbl_application_basic");
		$this->db->join('tbl_applicants_details', 'tbl_applicants_details.app_id = tbl_application_basic.id', 'left');
		$this->db->where('tbl_applicants_details.app_id', $id);
		$str = $this->db->get();
		$result = $str->result();
		return $result;
	}
	
	/**
	* @ Function Name		: getDetails
	* @ Function Params		: 
	* @ Function Purpose 	: function to edit existing page by admin
	* @ Function Returns	: 
	**/
	
	function getAppDetails($id) {
		$this->db->select("*");
		$this->db->from("tbl_application_basic");  
		$this->db->where("tbl_application_basic.id", $id);
		return $this->db->get()->row();
	}
	
	/**
	* @ Function Name		: getDetails
	* @ Function Params		: 
	* @ Function Purpose 	: function to edit existing page by admin
	* @ Function Returns	: 
	**/
	
	function getActivePages() {
		$this->db->select("cmsid,cmsTitle");
		$this->db->from("tbl_cms");  
		$this->db->where("tbl_cms.cmsStatus", '1');
		
		$result = $this->db->get();
		$getdata=$result->result_array();
		return $getdata;
	}
	
	/**
	* @ Function Name		: getCategoryList
	* @ Function Params		: $id {int}
	* @ Function Purpose 	: Get totle counts
	* @ Function Returns	: 
	*/
	public function getCategoryList(){
		$this->db->select('tbl_visa_data.*,tbl_visa_category.title');
		$this->db->from("tbl_visa_data"); 
		$this->db->join('tbl_visa_category', 'tbl_visa_category.id = tbl_visa_data.vcategory_id', 'left');
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$return['status'] = 'true';
			$return['resultSet'] = $query->result();
		}else{
			$return['status'] = 'false';
		}
		return @$return;
	}	

}
