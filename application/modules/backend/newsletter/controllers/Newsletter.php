<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Newsletter extends CI_Controller {
	function __construct() {
        parent::__construct();
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }

	public function index(){
		$this->load->model('newsletter/App_newsletter_model');
		$data['news_list'] = $this->App_newsletter_model->getNewsletterList();
		//pr($data['news_list']);
		$data['main_content'] = 'newsletter/index';
		$this->load->view('admin/layout', $data);
	}
	public function deleteNewsletter($id=""){
		$this->load->model('newsletter/App_newsletter_model');
		if($id!=''){
			$getStatus = $this->App_newsletter_model->checknewsletterExist($id);
			if ($getStatus == 1) {
				if($this->App_newsletter_model->deletenewsletter($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('newsletter');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('newsletter');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('newsletter');
			exit();
		}
	}
	public function ajax_getnewslettersstatus() {
	    $this->load->model('newsletter/App_newsletter_model');
        $get_status = $this->App_newsletter_model->status_active_inacive($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
}
