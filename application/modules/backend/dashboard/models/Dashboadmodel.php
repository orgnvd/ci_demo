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
	
	
	
	
}
