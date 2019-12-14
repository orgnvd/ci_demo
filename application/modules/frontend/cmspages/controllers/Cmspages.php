<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Cmspages extends CI_Controller {

	

	function __construct() {

        parent::__construct();

		$this->load->model('cmspages/Cmsmodel');

	}

	function page($id) {

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

        $data['cmsContent'] = $this->Cmsmodel->editBox($id);

		$data['main_content'] = 'cmspages/cmsview';

		$this->load->view('front/layout', $data);

    }



	public function aboutus($id=False){

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

		$data['cmsContent'] = $this->Cmsmodel->editBox('about');

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$this->load->model('visafilter/Visafiltermodel');

		$data['main_content'] = 'cmspages/cmsview';

		$this->load->view('front/layout', $data);

	}

	public function howto(){

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$this->load->model('visafilter/Visafiltermodel');

		$data['main_content'] = 'cmspages/how_to_apply';

		$this->load->view('front/layout', $data);

	}

	public function contact(){

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$this->load->model('visafilter/Visafiltermodel');

		$data['main_content'] = 'cmspages/contact_us';

		$this->load->view('front/layout', $data);

	}

	public function complaints(){

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$this->load->model('visafilter/Visafiltermodel');

		$data['main_content'] = 'cmspages/complaints';

		$this->load->view('front/layout', $data);

	}

		public function remark(){

		$this->load->model('cms/App_cms_model');

		$cms_object = new App_cms_model();

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$this->load->model('visafilter/Visafiltermodel');

		$data['main_content'] = 'cmspages/remark';

		$this->load->view('front/layout', $data);

	}

		public function privacy(){

		$data['main_content'] = 'cmspages/privacy';

		$this->load->view('front/layout', $data);

	}

	

	public function terms(){

		$data['main_content'] = 'cmspages/terms';

		$this->load->view('front/layout', $data);

	}

	public function faq(){

		$data['main_content'] = 'cmspages/faq';

		$this->load->view('front/layout', $data);

	}

	public function sitemap(){

		$data['main_content'] = 'cmspages/sitemap';

		$this->load->view('front/layout', $data);

	}

	public function choosevisa(){

		$this->load->model('cms/App_cms_model');

		$this->load->model('visafilter/Visafiltermodel');

		$cms_object = new App_cms_model();

		$data['fetchcountry'] = $this->App_cms_model->fetchcountry();

		$data['fetchnatinality'] = $this->App_cms_model->fetchnatinality();

		$data['category_list'] = $this->Visafiltermodel->getCategoryList();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nationality_id', 'Following', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['title'] = "Search Results";

		$country    =   $this->input->post('country_id');

		$nationality    =   $this->input->post('nationality_id');

		$data['visaresults'] = $this->Visafiltermodel->searchContent($country,$nationality);

		$data['main_content'] = 'cmspages/choose-visa';

		$this->load->view('front/layout', $data);

	}

}

