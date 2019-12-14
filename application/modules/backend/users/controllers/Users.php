<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			$this->load->model('users/App_users_model');
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		$data['resultset'] = $this->App_users_model->getUserlist();
		$data['main_content'] = 'users/main_users';
		$this->load->view('admin/layout', $data);
	}
	
	
	public function add(){
		$data['resultset'] = $this->App_users_model->getUserRole();
		$data['main_content'] = 'users/add_users';
		$this->load->view('admin/layout', $data);
	}
	
	public function edit($id){
		if($id){
			$data['admin_user'] = $this->App_users_model->getUserlist($id);
			$data['resultset'] = $this->App_users_model->getUserRole();
			$data['main_content'] = 'users/add_users';
			$this->load->view('admin/layout', $data);
		}
		
	}
 
	public function delete($id=false){
		if($id){
			$result = $this->App_users_model->deleteUser($id);
			if($result['status'] =='true'){
				$this->session->set_flashdata('success_message', lang('delete_message'));
				redirect('users');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('users');
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('users');
		}
	}
	
	public function process(){
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');
		$this->form_validation->set_rules('user_role_id', 'User Type', 'required');
		//$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$this->add();
		} else {
			if($this->input->post()){
				$post_value2 =createUserIpDetail($user_id);
				$update =modifyUserIpDetail($user_id);
				$post_value1 = $this->input->post();
				@$name = explode(' ', $post_value1['name']);
				@$admin_userid = $post_value1['idddd'];
				if($name[1] !=''){
					
				}else{
					$name[1] = '';
				}
				
				$admin_user = array();
				$admin_user['user_role_id'] = $post_value1['user_role_id'];
				$admin_user['country_id'] = $post_value1['country_name'];
				$admin_user['first_name'] = $name[0];
				@$admin_user['last_name'] = @$name[1];
				$admin_user['user_email'] = $post_value1['email'];
				$admin_user['user_name'] = $post_value1['username'];
				$admin_user['user_password'] = md5($post_value1['password']);
				$admin_user['user_mobile'] = $post_value1['mobile'];
				$admin_user['address'] = $post_value1['address'];
				//$admin_user['user_is_active'] = '1';
				if($admin_userid !=''){
					$post_value = array_merge($admin_user, $update);
					$update = lang('updates_message');
				}else{
					$post_value = array_merge($admin_user, $post_value2);
					$update = lang('insert_message');
				}
				
				
				$inserted = $this->App_users_model->insertModule($post_value, $admin_userid);
				if($inserted){
					$this->session->set_flashdata('success_message', $update);
					redirect('users');
				}else{
					$this->session->set_flashdata('error_message', lang('error_message'));
					redirect('users');
				}
				
			}else{
				
				$data['main_content'] = 'location/addCms';
				$this->load->view('admin/layout', $data);
			} 
		}
	}
	
	public function updateStatus(){
		$return = array();
		$post_value = $this->input->post();
		$result = $this->App_users_model->updateStatus($post_value);
		if($result['status'] = 'true'){
			$return['status']='true';
			 if ($post_value['status'] == 1) {
				$retrun['data'] ='<a title="Active"  href="javascript:void(0);" row_id="'.$post_value['row_id'].'" status="0" class="label-success statuslabel label label-default status_active"> Active </a>';
			 }else{
				$retrun['data'] ='<a title="De-Active"  href="javascript:void(0);" row_id="'.$post_value['row_id'].'" status="1" class="label-danger statuslabel label label-default status_active"> De-Active </a>'; 
			 }
			 
		}else{
			$return['status']='false';
		}
		echo json_encode($retrun); die;
	}
	
	
}
