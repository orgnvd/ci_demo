<?php
class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function switchLanguage() {
		$language = $this->input->post('language');
        $language = ($language != "") ? $language : "english";
		if($language){
			$this->setSiteLanguage($language);
		}
        
    }
	public function setSiteLanguage($language=false){
		if($language){
			$return = array();
			$result = $this->session->set_userdata('site_lang', $language);
			if($result){
				$return['status'] = 'false';
			}else{
				$return['status'] = 'true';
			}
			echo json_encode($return); die;
		}
	}
	
}