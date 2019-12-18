<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {

	

	function __construct() {

        parent::__construct();

        $this->load->model('dashboard/Dashboadmodel');

		if(getSessionData() =='true'){

			return true;

		}else{

			redirect('admin');

		}

    }

	public function index()
	{
		//$data['applicant_count'] = $this->Dashboadmodel->getApps();
		$data['testmonial_count'] = $this->Dashboadmodel->getTestimonial();
		//pr($data['count']); die("fdsaf");
		$data['main_content'] = 'dashboard/dashboard';
		$this->load->view('admin/layout', $data);
	}


	

	public function add()
	{
		$data['list'] = $this->Dashboadmodel->getList();
		// pr($data['updated']); die();	
		$data['main_content'] = 'dashboard/addsite';
		$this->load->view('admin/layout', $data);
	}

	
	public function update()
	{
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('site_title', 'Title', 'required');
       
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    if ($this->form_validation->run() == FALSE){
             redirect('dashboard/add'); 
        } else {
            if($this->input->post()){

                if(!empty($_FILES['logo']['name'])){
                    $config['upload_path'] = 'images/logo';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
                    $config['file_name'] = time() . date('Ymd');
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('logo')){
                        $uploadData = $this->upload->data();
                        $logo = $uploadData['file_name'];
                    } else {
                         $this->session->set_flashdata('error_image', lang('error_image'));
                         redirect('dashboard/add');  
                    }
                } else {
                    $logo =  $this->input->post('old_logo');
                }
            }

            $post_value = $this->input->post();
            // pr($post_value); die();
            $updated = $this->Dashboadmodel->update($post_value, $logo);

            if($updated){
                    $this->session->set_flashdata('success_message', lang('insert_message'));
                    redirect('dashboard/add');
                }else{
                    $data['main_content'] = 'dashboard/addsite';
                    $this->load->view('admin/layout', $data);
                }
        }
	}



}

/* End of file Program.php */
/* Location: ./application/controllers/admin/Program.php */