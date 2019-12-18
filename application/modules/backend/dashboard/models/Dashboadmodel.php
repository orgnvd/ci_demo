<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboadmodel extends CI_Model{

	

	function __construct() {

        parent::__construct();

        

    }





	public function index()

	{	

		$this->load->view('login');

		

	}

	public function getApps(){

		$this->db->select('id');

		$this->db->from('tbl_application_basic');

		$count = $this->db->count_all_results();

		return $count;

	}

	

	public function getTestimonial(){

		$this->db->select('id');

		$this->db->from('tbl_testimonial_management');

		$count = $this->db->count_all_results();

		return $count;

	}

	public function insert_site($post_value, $logo)
	{
		$site_data = array(
							'site_title'      =>  $post_value['site_title'],
							'email'			  =>  $post_value['email'],
							'phone'			  =>  $post_value['phone'],
							'logo' 			  =>  $logo
						);

		$inserted = $this->db->insert('tbl_template', $site_data);
		
		if($inserted){
			return true;
		} else {
			return false;
		}
	}

	public function getList()
	{
		$this->db->select('*');
		$this->db->from('tbl_template');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getId($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_template');
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}

	public function update($post_value, $logo)
	{
		$site_data = array(
							'site_title'      =>  $post_value['site_title'],
							'email'			  =>  $post_value['email'],
							'phone'			  =>  $post_value['phone'],
							'logo' 			  =>  $logo
						);

		// $this->db->where('id', $id);
		$updated = $this->db->update('tbl_template', $site_data);
		
		if($updated){
			return true;
		} else {
			return false;
		}
	}


    

	

	

	

	

}

