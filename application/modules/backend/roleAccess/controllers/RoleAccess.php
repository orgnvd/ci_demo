<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleAccess extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		//$this->load->model('roleAccess/App_roleaccess_model');
		//$data['module_list'] = $this->App_roleAccess_model->getRollAccessList();
		$data['main_content'] = 'roleAccess/index';
		$this->load->view('admin/layout', $data);
	}
	
	
	
}
