<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		$this->load->model('testimonials/App_testimonials_model');
		$news = $this->App_testimonials_model->getTestimonialsList();
		 
		$data['news_list'] = $news;
		//pr($data['news_list']);
		$data['main_content'] = 'testimonials/index';
		$this->load->view('admin/layout', $data);
	}
	
	public function addTestimonials(){
	 $this->load->model('cms/App_cms_model');
		 $this->load->model('testimonials/App_testimonials_model');
		//$this->load->model('cms/App_cms_model');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('name', 'Testimonials Title', 'required');
		$this->form_validation->set_rules('company_name', 'Testimonials Title', 'required');
		$this->form_validation->set_rules('sequence', 'Testimonials Sequence', 'required');
		$this->form_validation->set_rules('description', 'Testimonials Description', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			 $data['countries'] = $this->App_cms_model->fetchcountry();
			$data['main_content'] = 'testimonials/addTestimonials';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			if($_FILES['mainimage']['name']!=''){
			$target_dir = "./images/testimonials/";
			$target_file = $target_dir.time().$_FILES['mainimage']['name'];
			$target_file1 = $_FILES['mainimage']['name'];
			if(move_uploaded_file($_FILES['mainimage']['tmp_name'],$target_file)){
				$images_arr = time().$target_file1;
			}
			$post_value1['image'] = $images_arr;
			} else{
			$post_value1['image'] = '';	
			}
			
			if(!empty($_FILES['mainimage1']['name'])){
                $config['upload_path'] = 'images/testimonials/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['max_width']      = '1920';
				$config['max_heigth']      = '574';
				$config['min_width']      = '1919';
				$config['min_heigth']      = '573';*/
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage1')){
                    $uploadData = $this->upload->data();
					$post_value1['user_image'] = $uploadData['file_name'];
					$configImageResize = array(
						'source_image' => $config['upload_path'] . $uploadData['file_name'],
						'new_image' => 'images/testimonials/thumb/',
						'maintain_ratio' => true,
						'width' => 57,
						'height' => 57
							);
					$this->load->library('image_lib');
					$this->image_lib->initialize($configImageResize);
					$this->image_lib->resize();
					$this->image_lib->clear();
                }else{ 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('testimonials/addTestimonials');
                } 
            }else{
                $post_value1['user_image'] = '';
            }
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->App_testimonials_model->insertTestimonials($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('testimonials');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('testimonials');
			}
			
		}else{
			$data['countries'] = $this->App_testimonials_model->fetchcountry();
			$data['main_content'] = 'testimonials/addTestimonials';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function deleteTestimonials($id=""){
		$this->load->model('testimonials/App_testimonials_model');
		if($id!=''){
			$getStatus = $this->App_testimonials_model->checktestimonialsExist($id);
			if ($getStatus == 1) {
				if($this->App_testimonials_model->deletetestimonials($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('testimonials');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('testimonials');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('testimonials');
			exit();
		}
	}
	
	public function ajax_gettestimonialssstatus() {
	$this->load->model('testimonials/App_testimonials_model');
        $get_status = $this->App_testimonials_model->status_active_inacive($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function editTestimonials($id=false){
	//echo $id; die;
		$this->load->model('cms/App_cms_model');
		$this->load->model('testimonials/App_testimonials_model');
			if($this->input->post()) {
					$static_pageData1 = $this->input->post();
					if($_FILES['mainimage']['name']!=''){
					$target_dir = "./images/testimonials/";
					$target_file = $target_dir.time().$_FILES['mainimage']['name'];
					$target_file1 = $_FILES['mainimage']['name'];
					if(move_uploaded_file($_FILES['mainimage']['tmp_name'],$target_file)){
						$images_arr = time().$target_file1;
					}
					$static_pageData1['image'] = $images_arr;
					} else {
					$static_pageData1['image'] = $this->input->post('old_banner_image');
					}
					
			if(!empty($_FILES['mainimage1']['name'])){
                $config['upload_path'] = 'images/testimonials/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage1')){
                    $uploadData = $this->upload->data();
					$static_pageData1['user_image'] = $uploadData['file_name'];
					$configImageResize = array(
						'source_image' => $config['upload_path'] . $uploadData['file_name'],
						'new_image' => 'images/testimonials/thumb/',
						'maintain_ratio' => true,
						'width' => 57,
						'height' => 57
							);
					$this->load->library('image_lib');
					$this->image_lib->initialize($configImageResize);
					$this->image_lib->resize();
					$this->image_lib->clear();
                }else{ 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('banner/editBanner/'.$id);
					} 
				}else{
				   $static_pageData1['user_image'] = $this->input->post('old_banner_image1');
				}
				$static_pageData = $static_pageData1;
					$updateStatus = $this->App_testimonials_model->updatetestimonials_page($static_pageData,$id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('testimonials');
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('testimonials');
					}
				} else {
					$result_country = $this->App_cms_model->fetchcountry();
					$data['countries'] = $result_country;
					$result_module = $this->App_testimonials_model->fetchEditTestimonials($id);
					//pr($result_module); exit;
					foreach($result_module as $key=>$val_post)
						{
							$cms_country = '';
							$cms_country=$this->App_testimonials_model->getCountryDetail($val_post['id']);
						}
					$result_module[$key]['country'] = $cms_country;
					//pr($result_module); exit;
					if($result_module){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('testimonials');
					}
					
					$data['main_content'] = 'testimonials/editTestimonials';
					$this->load->view('admin/layout', $data);
				}
	}
	
}
