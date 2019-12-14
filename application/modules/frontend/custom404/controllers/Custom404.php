<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404 extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('cmspages/Cmsmodel');
	}
	 

	public function index($id=False){
		
		$data['main_content'] = 'custom404/404';
		$this->load->view('front/layout', $data);
	}
	
}
