<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		$this->load->model('cms/App_cms_model');
		$cms_list = $this->App_cms_model->getCmsList();
		$data['module_list'] = $cms_list;
		//pr($data['module_list']); */
		$data['main_content'] = 'cms/index'; 
		$this->load->view('admin/layout', $data);
	}
	
	public function addCms(){
		$this->load->model('cms/App_cms_model');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('title_name', 'Cms Title Name', 'required');
		$this->form_validation->set_rules('slug', 'Cms Slug', 'required');
		$this->form_validation->set_rules('description', 'Cms Description', 'required');
		$this->form_validation->set_rules('meta_title', 'Meta title', 'required');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['main_content'] = 'cms/addCms';
			$this->load->view('admin/layout', $data);
		} else {
			if($this->input->post()){
				if(!empty($_FILES['mainimage']['name'])){
						$config['upload_path'] = 'images/cms/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
						$config['file_name'] = time() . date('Ymd');
						$this->load->library('upload');
						$this->upload->initialize($config);				
						if($this->upload->do_upload('mainimage')){
							$uploadData = $this->upload->data();
							$image_data = $uploadData['file_name'];
	
						} else { 
							$this->session->set_flashdata('error_image', lang('error_image'));
							redirect('cms');
						} 
					}else{
						$image_data = '';
					}
				$post_value2 =createUserIpDetail($user_id);
				$post_value1 = $this->input->post();
				$images_arr = array();
				for ($i = 0; $i < count($_FILES['mainimage']['name']); $i++) 
				{
				$target_dir = "./images/cms/";
				$target_file = $target_dir.time().$_FILES['mainimage']['name'][$i];
				$target_file1 = $_FILES['mainimage']['name'][$i];
				if(move_uploaded_file($_FILES['mainimage']['tmp_name'][$i],$target_file)){
					$images_arr[] = time().$target_file1;
				}
				}
				$fileName = implode(',',$images_arr);
				
				$post_value = array_merge($post_value1, $post_value2);
				$inserted = $this->App_cms_model->insertModule($post_value,$image_data);
				if($inserted['status']=='true'){
					$this->session->set_flashdata('success_message', lang('insert_message'));
					redirect('cms');
				}else{
					$this->session->set_flashdata('error_message', lang('error_message'));
					redirect('cms');
				}
				
			}else{
			$data['main_content'] = 'cms/addCms';
			$this->load->view('admin/layout', $data);
		   }
		}
	}
	
	public function ajax_getcmsstatus() {
		$this->load->model('cms/App_cms_model');
        $get_status = $this->App_cms_model->status_active_inacive($_POST);
		if ($get_status == "active") { ?>
			<a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
		<?php } else if ($get_status == "inactive") { ?>
			<a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
			<?php
		}
    }
	
	public function deleteCms($id=""){
		$this->load->model('cms/App_cms_model');
		if($id!=''){
			$getStatus = $this->App_cms_model->checkcmsExist($id);
			if ($getStatus == 1) {
				if($this->App_cms_model->deletecms($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('cms');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('cms');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('cms');
			exit();
		}
	}
	
	public function deleteBanner($id=""){
		$this->load->model('cms/App_cms_model');
		if($id!=''){
			$cms_id = $this->uri->segment(4);
			$getStatus = $this->App_cms_model->checkbannerExist($cms_id);
			if ($getStatus == 1) {
				if($this->App_cms_model->deletebanner($cms_id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('cms/viewbanner/'.$this->uri->segment(3));
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('cms/viewbanner/'.$this->uri->segment(3));
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('cms/viewbanner/'.$this->uri->segment(3));
			exit();
		}
	}
	
	public function editCms($id=false){
		$this->load->model('cms/App_cms_model');
		$user_id=$this->session->userdata('s_user_id');
		if($this->input->post()){
			
					if(!empty($_FILES['mainimage']['name'])){
						$config['upload_path'] = 'images/cms/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
						$config['file_name'] = time() . date('Ymd');
						$this->load->library('upload');
						$this->upload->initialize($config);				
						if($this->upload->do_upload('mainimage')){
							$uploadData = $this->upload->data();
							$image_data = $uploadData['file_name'];
	
						} else { 
							$this->session->set_flashdata('error_image', lang('error_image'));
							redirect('cms');
						} 
					}else{
						$image_data = $this->input->post('editbanner');
					}
				$static_pageData2 =modifyUserIpDetail($user_id);
				$static_pageData1 = $this->input->post();
				if($_FILES['mainimage']['name']!=''){
				$images_arr = array();
				for ($i = 0; $i < count($_FILES['mainimage']['name']); $i++) 
				{
				$target_dir = "./images/cms/";
				$target_file = $target_dir.time().$_FILES['mainimage']['name'][$i];
				$target_file1 = $_FILES['mainimage']['name'][$i];
				if(move_uploaded_file($_FILES['mainimage']['tmp_name'][$i],$target_file)){
					$images_arr[] = time().$target_file1;
				}
				}
				$fileName = implode(',',$images_arr);
			} 
		
		$static_pageData = array_merge($static_pageData1, $static_pageData2);
		
		/* Update CMS Page */
		$updateStatus = $this->App_cms_model->updatecms_page($static_pageData,$id,$image_data);
		/* Update CMS Page */
		if ($updateStatus) {
			$this->session->set_flashdata('success_message', lang('update_message'));
			redirect('cms');
			exit();
			} else {
		$this->session->set_flashdata('error_message', lang('error_message'));
		redirect('cms');
		}
		} else {
		$result_module = $this->App_cms_model->fetchEditcms($id);
 
		if($result_module){
			$data['fetchmodule'] = $result_module;
			}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('cms');
		}
		$data['main_content'] = 'cms/editCms';
		$this->load->view('admin/layout', $data);
		}
	}
	
	function deletecmsbanner(){
		  $id = $this->input->post('delete');
		  $this->db->where('cmsid',$id);
		  $this->db->delete('tbl_cms');
	}
	public function editBanner($id=false){
		$this->load->model('cms/App_cms_model');
		$user_id=$this->session->userdata('s_user_id');
		$state_id = $this->uri->segment(4);
			if($this->input->post()) {
			$static_pageData1 = $this->input->post();
			$static_pageData2 =modifyUserIpDetail($user_id);			
			if($_FILES['mainimage']['name']!=''){
			$target_dir = "./images/cms/";
			$target_file = $target_dir.time().$_FILES['mainimage']['name'];
			$target_file1 = $_FILES['mainimage']['name'];
			if(move_uploaded_file($_FILES['mainimage']['tmp_name'],$target_file)){
				$images_arr = time().$target_file1;
			}
			$static_pageData1['banner_image'] = $images_arr;
			} else {
			$static_pageData1['banner_image'] = $this->input->post('old_banner_image');
			}
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->App_cms_model->updatebanner_page($static_pageData,$state_id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('cms/viewbanner/'.$this->uri->segment(3));
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('cms');
					}
				} else {
					$result_module = $this->App_cms_model->fetchEditbanner($state_id);
					if($result_module['status']=='true'){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('cms/viewbanner/'.$this->uri->segment(3));
					}
					
					$data['main_content'] = 'cms/editBanner';
					$this->load->view('admin/layout', $data);
				}
	}
	
	public function viewbanner($id=false){
		$this->load->model('cms/App_cms_model');
		$data['view_banner'] = $this->App_cms_model->fetchbannerList($id);
		//pr($data);
		$data['main_content'] = 'cms/viewbanner';
	    $this->load->view('admin/layout', $data);
	}
	
	/*=== for unique Language name ===================== */
	public function check_cms_slug(){
      $this->load->model('cms/App_cms_model');
	  $c_name = $this->input->get('slug');
	  $id = $this->uri->segment(3);
      $get_result = $this->App_cms_model->check_slugExist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
}
