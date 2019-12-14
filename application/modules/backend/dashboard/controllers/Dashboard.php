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
}
/* End of file Program.php *//* Location: ./application/controllers/admin/Program.php */