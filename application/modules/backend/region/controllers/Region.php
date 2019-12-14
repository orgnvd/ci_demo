<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		$this->load->model('region/Regionmodel');
		$data['module_list'] = $this->Regionmodel->getLocationList();
		$data['main_content'] = 'region/index';
		$this->load->view('admin/layout', $data);
	}
	
	public function state($id=false){
		$this->load->model('region/Regionmodel');
		$data['view_state'] = $this->Regionmodel->fetchstateList($id);
		$data['main_content'] = 'region/state';
		$this->load->view('admin/layout', $data);
	}
	
	public function mapcountry($id=false){
		$this->load->model('region/Regionmodel');
		$data['view_mapping'] = $this->Regionmodel->fetchmappingList($id);
		$data['main_content'] = 'region/mapcountry';
		$this->load->view('admin/layout', $data);
	}
	
	public function language(){
		$this->load->model('region/Regionmodel');
		$data['view_language'] = $this->Regionmodel->fetchlanguageList();
		$data['main_content'] = 'region/language';
		$this->load->view('admin/layout', $data);
	}
	
	public function fontcolor(){
		$this->load->model('region/Regionmodel');
		$font_list =  $this->Regionmodel->fetchfontList();
		foreach($font_list as $key=>$val){
		$country = '';	
		$country = $this->Regionmodel->getCountryDetail1($val['id']);
		$font_list[$key]['country'] = $country;
		}
		$data['view_font'] = $font_list;
		//pr($data); exit;
		$data['main_content'] = 'region/fontcolor';
		$this->load->view('admin/layout', $data);
	}
	
	public function city($id=false){
		$this->load->model('region/Regionmodel');
		$state_id = $this->uri->segment(4);
		$data['view_city'] = $this->Regionmodel->fetchcityList($state_id);
		$data['main_content'] = 'region/city';
		$this->load->view('admin/layout', $data);
	}
	

	
	/*=== for unique country name ===================== */
	public function check_country_name(){
      $this->load->model('region/Regionmodel');
	  $c_name = $this->input->get('country_name');
      $get_result = $this->Regionmodel->check_countryExist($c_name);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
	public function check_country_name_edit(){
	  $id = $this->uri->segment(3);
	  $this->load->model('region/Regionmodel');
	  $c_name = $this->input->get('country_name');
	  $get_result = $this->Regionmodel->check_countryEditExist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
	/*=== for unique state name ===================== */
	public function check_state_name(){
      $this->load->model('region/Regionmodel');
	  $id = $this->uri->segment(3);
	  $c_name = $this->input->get('state_name');
      $get_result = $this->Regionmodel->check_stateExist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
	/*=== for unique state name ===================== */
	public function check_city_name(){
      $this->load->model('region/Regionmodel');
	  $id = $this->uri->segment(3);
	  $c_name = $this->input->get('city_name');
      $get_result = $this->Regionmodel->check_cityExist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
	/*=== for unique Language name ===================== */
	public function check_language_name(){
      $this->load->model('region/Regionmodel');
	  $id = $this->uri->segment(3);
	  $c_name = $this->input->get('language_name');
	  $get_result = $this->Regionmodel->check_languageExist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }
	
	public function addLocation(){
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('country_name', 'Country Name', 'required|is_unique[tbl_country.country_name]');
		$this->form_validation->set_rules('country_key', 'Country Key', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['main_content'] = 'region/addLocation';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			if(!empty($_FILES['mainimage']['name'])){
                $config['upload_path'] = 'images/country/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['max_width']      = '32';
				$config['max_heigth']      = '16';
				$config['min_width']      = '31';
				$config['min_heigth']      = '15';*/
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage')){
                    $uploadData = $this->upload->data();
					$post_value1['country_logo'] = $uploadData['file_name'];
				} else { 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('region/addLocation');
                } 
            }else{
                $post_value1['country_logo'] = '';
            }
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->Regionmodel->insertModule($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
			}
			
		}else{
			
			$data['main_content'] = 'region/addCms';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function addState($id=false){
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('state_name', 'State Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['main_content'] = 'region/addState';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$country_id = $this->input->post('country_id');
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->Regionmodel->insertState($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region/state/'.$country_id);
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
			}
			
		}else{
			
			$data['main_content'] = 'region/addState';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function addMapping($id=false){
		$this->load->model('cms/App_cms_model');
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('country_id[]', 'Country Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['countries'] = $this->App_cms_model->fetchcountry();
			$data['main_content'] = 'region/addMapping';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$language_id = $this->input->post('language_id');
			$post_value = $this->input->post();
			$inserted = $this->Regionmodel->insertMapping($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region/mapcountry/'.$language_id);
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
			}
			
		}else{
			$data['main_content'] = 'region/addMapping';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function addLanguage($id=false){
		$this->load->model('cms/App_cms_model');
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('language_name', 'Language Name', 'required');
		$this->form_validation->set_rules('country_id[]', 'Country Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['countries'] = $this->App_cms_model->fetchcountry();
			$data['main_content'] = 'region/addLanguage';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$country_id = $this->input->post('country_id');
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			//pr($post_value1); exit;
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->Regionmodel->insertLanguage($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region/language');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
			}
			
		}else{
			
			$data['main_content'] = 'region/addLanguage';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function addFont($id=false){
		$this->load->model('cms/App_cms_model');
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('country_id[]', 'Country Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['countries'] = $this->App_cms_model->fetchcountry();
			$data['category'] = $this->App_cms_model->fetchcategory();
			$data['main_content'] = 'location/addFont';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			//pr($post_value1); exit;
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->Regionmodel->insertFont($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region/fontcolor');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region/fontcolor');
			}
			
		}else{
			
			$data['main_content'] = 'region/addFont';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function addCity($id=false){
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('city_name', 'City Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
			$data['main_content'] = 'region/addCity';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$country_id = $this->input->post('country_id');
			$state_id = $this->input->post('state_id');
			$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();
			$post_value = array_merge($post_value1, $post_value2);
			$inserted = $this->Regionmodel->insertCity($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('region/city/'.$country_id.'/'.$state_id);
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
			}
			
		}else{
			
			$data['main_content'] = 'region/addCity';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function deleteLocation($id=""){
		$this->load->model('region/Regionmodel');
		if($id!=''){
			$getStatus = $this->Regionmodel->checklocationExist($id);
			if ($getStatus == 1) {
				if($this->Regionmodel->deletelocation($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('region');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('region');
			exit();
		}
	}
	
	public function deleteState($id=""){
		$this->load->model('region/Regionmodel');
		if($id!=''){
			$state_id = $this->uri->segment(4);
			$getStatus = $this->Regionmodel->checkstateExist($state_id);
			if ($getStatus == 1) {
				if($this->Regionmodel->deletestate($state_id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('region/state/'.$this->uri->segment(3));
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region/state/'.$this->uri->segment(3));
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('region/state/'.$this->uri->segment(3));
			exit();
		}
	}
	
	public function deleteLanguage($id=""){
		$this->load->model('region/Regionmodel');
		if($id!=''){
			$getStatus = $this->Regionmodel->checklanguageExist($id);
			if ($getStatus == 1) {
				if($this->Regionmodel->deletelanguage($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('region/language');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region/language');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('region/language');
			exit();
		}
	}
	
	public function deleteCity($id=""){
		$this->load->model('region/Regionmodel');
		if($id!=''){
			$city_id = $this->uri->segment(5);
			$getStatus = $this->Regionmodel->checkcityExist($city_id);
			if ($getStatus == 1) {
				if($this->Regionmodel->deletecity($city_id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			exit();
		}
	}
	
	
	
	public function ajax_getlocationstatus() {
		$this->load->model('region/Regionmodel');
		$getStatus = $this->Regionmodel->checkconditionExist($_POST);
		if($getStatus == 0)
		{
        $get_status = $this->Regionmodel->status_active_inacive($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        } } else { ?>
		<a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> State is activate Please check </a>
		<?php }
        exit;
    }
	
	public function ajax_getstatestatus() {
		$this->load->model('region/Regionmodel');
        $get_status = $this->Regionmodel->status_active_inacive_state($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function ajax_getlanguagestatus() {
		$this->load->model('region/Regionmodel');
        $get_status = $this->Regionmodel->status_active_inacive_language($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function ajax_getfontstatus() {
		$this->load->model('region/Regionmodel');
        $get_status = $this->Regionmodel->status_active_inacive_font($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function ajax_getcitystatus() {
		$this->load->model('region/Regionmodel');
        $get_status = $this->Regionmodel->status_active_inacive_city($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function editLocation($id=false){
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
			if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData3 =createUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					if(!empty($_FILES['mainimage']['name'])){
                $config['upload_path'] = 'images/country/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['max_width']      = '32';
				$config['max_heigth']      = '16';
				$config['min_width']      = '31';
				$config['min_heigth']      = '15';*/
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage')){
                    $uploadData = $this->upload->data();
					$static_pageData1['country_logo'] = $uploadData['file_name'];
				} else { 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('region/editLocation/'.$id);
                } 
            }else{
                $static_pageData1['country_logo'] = $this->input->post('old_banner_image');
            }
					$static_pageData = array_merge($static_pageData1, $static_pageData2,$static_pageData3);
					$updateStatus = $this->Regionmodel->updatelocation_page($static_pageData,$id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('region');
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region');
					}
				} else {
					$result_module = $this->Regionmodel->fetchEditlocation($id);
					if($result_module['status']=='true'){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region');
					}
					
					$data['main_content'] = 'region/editLocation';
					$this->load->view('admin/layout', $data);
				}
	}
	
	public function editState($id=false){
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		$state_id = $this->uri->segment(4);
			if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->Regionmodel->updatestate_page($static_pageData,$state_id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('region/state/'.$this->uri->segment(3));
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/state/'.$this->uri->segment(3));
					}
				} else {
					$result_module = $this->Regionmodel->fetchEditstate($state_id);
					if($result_module['status']=='true'){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/state/'.$this->uri->segment(3));
					}
					
					$data['main_content'] = 'region/editState';
					$this->load->view('admin/layout', $data);
				}
	}
	
	public function editLanguage($id=false){
		$this->load->model('cms/App_cms_model');
		$this->load->model('region/Regionmodel');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('language_name', 'Language Name', 'required');
		$this->form_validation->set_rules('country_id[]', 'Country Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == True){
		if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					//pr($static_pageData1); exit;
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->Regionmodel->updatelanguage_page($static_pageData,$id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('region/language/'.$this->uri->segment(3));
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/language/'.$this->uri->segment(3));
					}
		} }else {
					$result_country = $this->App_cms_model->fetchcountry();
					$data['countries'] = $result_country;
					$result_module = $this->Regionmodel->fetchEditlanguage($id);
					foreach($result_module as $key=>$val_post)
					{
						$cms_country = '';
						$cms_country=$this->Regionmodel->getMapCountryDetail($val_post['language_id']);
					}
					$result_module[$key]['country'] = $cms_country;
					//pr($result_module); exit;
					if($result_module){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/language/'.$this->uri->segment(3));
					}
					$data['main_content'] = 'region/editLanguage';
					$this->load->view('admin/layout', $data);
				}
	}
	
	public function editFont($id=false){
		$this->load->model('cms/App_cms_model');
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					//pr($static_pageData1); exit;
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->Regionmodel->updatefont_page($static_pageData,$id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('region/fontcolor');
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/fontcolor');
					}
				} else {
					$result_country = $this->App_cms_model->fetchcountry();
					$result_category = $this->App_cms_model->fetchcategory();
					$data['countries'] = $result_country;
					$data['category'] = $result_category;
					$result_module = $this->Regionmodel->fetchEditfont($id);
					foreach($result_module as $key=>$val_post)
					{
						$cms_country = '';
						$cms_country=$this->Regionmodel->getMapCountryFontDetail($val_post['id']);
					}
					$result_module[$key]['country'] = $cms_country;
					//pr($result_module); exit;
					if($result_module){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/fontcolor');
					}
					
					$data['main_content'] = 'region/editFont';
					$this->load->view('admin/layout', $data);
				}
	}
	
	public function editCity($id=false){
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		$state_id = $this->uri->segment(5);
			if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->Regionmodel->updatecity_page($static_pageData,$state_id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
					}
				} else {
					$result_module = $this->Regionmodel->fetchEditcity($state_id);
					if($result_module['status']=='true'){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('region/city/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
					}
					
					$data['main_content'] = 'region/editCity';
					$this->load->view('admin/layout', $data);
				}
		}
	/*
	* import CSV state detail and 
	*/	
	
	public function statecsv(){
		$data['main_content'] = 'region/import_state';
		$this->load->view('admin/layout', $data);
	}
	
	public function citycsv(){
		$data['main_content'] = 'region/import_city';
		$this->load->view('admin/layout', $data);
	}
	
	public function countrycsv(){
		$data['main_content'] = 'region/import_country';
		$this->load->view('admin/layout', $data);
	}
	
	public function importState(){
		$this->load->library('csvimport');
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		if(!empty($_FILES['sadsadsd']['name'])){
			$filename = explode('.', $_FILES['sadsadsd']['name']);
			
			$config['upload_path'] = 'csv/dealer/';
			$config['allowed_types'] = 'csv';
			$config['file_name'] = date('Y-m-d').'-'.$filename[0];
			$config['max_size'] = '1000';
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('sadsadsd')) {
				$data = $this->upload->display_errors();
				$this->session->set_flashdata('error_message', lang('csv_message'));
				redirect('region');
			} else {
				$file_data = $this->upload->data();
				$file_path = 'csv/dealer/'.$file_data['file_name'];
				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);
					$dealar_array = array();
					$inserted = '';
					foreach ($csv_array as $row) {
						$country_id = $row['country'];
						$state = $row['state'];
						$result = $this->Regionmodel->getstateExistDetail($country_id, $state);
						if($result['status'] == 'true'){

						}else{
							$insert_data = array(
								'country_id'=>$row['country'],
								'state_name'=>$row['state'],
								
							);
							$createdBy = createUserIpDetail($user_id);
							$record = array_merge($insert_data, $createdBy);
							$tt = $this->Regionmodel->insert_csv_state($record);
							$inserted = $tt;
						}
					}
					if($inserted){
						
						$this->session->set_flashdata('success_message', lang('state_imported'));
						redirect('region');
					}else{ 
						$this->session->set_flashdata('success_message', lang('state_exits'));
						redirect('region');
					}
					
				} else 
					$this->session->set_flashdata('error_message', lang('csv_message'));
					redirect('region');
			}	
		}
	}
	
	public function importCity(){
		$this->load->library('csvimport');
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		if(!empty($_FILES['sadsadsd']['name'])){
			$filename = explode('.', $_FILES['sadsadsd']['name']);
			
			$config['upload_path'] = 'csv/dealer/';
			$config['allowed_types'] = 'csv';
			$config['file_name'] = date('Y-m-d').'-'.$filename[0];
			$config['max_size'] = '1000';
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('sadsadsd')) {
				$data = $this->upload->display_errors();
				$this->session->set_flashdata('error_message', lang('csv_message'));
				redirect('region');
			} else {
				$file_data = $this->upload->data();
				$file_path = 'csv/dealer/'.$file_data['file_name'];
				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);
					$dealar_array = array();
					$inserted = '';
					foreach ($csv_array as $row) {
						$country_id = $row['country'];
						$state = $row['state'];
						$city = $row['city'];
						$result = $this->Regionmodel->getcityExistDetail($country_id, $state,$city);
						if($result['status'] == 'true'){

						}else{
							$insert_data = array(
								'country_id'=>$row['country'],
								'state_id'=>$row['state'],
								'city_name'=>$row['city'],
								
							);
							$createdBy = createUserIpDetail($user_id);
							$record = array_merge($insert_data, $createdBy);
							$tt = $this->Regionmodel->insert_csv_city($record);
							$inserted = $tt;
						}
					}
					if($inserted){
						
						$this->session->set_flashdata('success_message', lang('city_imported'));
						redirect('region');
					}else{ 
						$this->session->set_flashdata('success_message', lang('city_exits'));
						redirect('region');
					}
					
				} else 
					$this->session->set_flashdata('error_message', lang('csv_message'));
					redirect('region');
			}	
		}
	}
	
	public function importCountry(){
		$this->load->library('csvimport');
		$this->load->model('region/Regionmodel');
		$user_id=$this->session->userdata('s_user_id');
		if(!empty($_FILES['sadsadsd']['name'])){
			$filename = explode('.', $_FILES['sadsadsd']['name']);
			
			$config['upload_path'] = 'csv/dealer/';
			$config['allowed_types'] = 'csv';
			$config['file_name'] = date('Y-m-d').'-'.$filename[0];
			$config['max_size'] = '1000';
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('sadsadsd')) {
				$data = $this->upload->display_errors();
				$this->session->set_flashdata('error_message', lang('csv_message'));
				redirect('region');
			} else {
				$file_data = $this->upload->data();
				$file_path = 'csv/dealer/'.$file_data['file_name'];
				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);
					$dealar_array = array();
					$inserted = '';
					foreach ($csv_array as $row) {
						$country = $row['country'];
						$result = $this->Regionmodel->getcountryExistDetail($country);
						if($result['status'] == 'true'){

						}else{
							$insert_data = array(
								'country_name'=>$row['country'],
							);
							$createdBy = createUserIpDetail($user_id);
							$record = array_merge($insert_data, $createdBy);
							$tt = $this->Regionmodel->insert_csv_country($record);
							$inserted = $tt;
						}
					}
					if($inserted){
						
						$this->session->set_flashdata('success_message', lang('country_imported'));
						redirect('region');
					}else{ 
						$this->session->set_flashdata('success_message', lang('country_exits'));
						redirect('region');
					}
					
				} else 
					$this->session->set_flashdata('error_message', lang('csv_message'));
					redirect('region');
			}	
		}
	}
	
	
}
