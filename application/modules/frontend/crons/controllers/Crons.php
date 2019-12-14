<?php

error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Crons extends CI_Controller {
	
	 public function __construct() {
		parent::__construct(); 
		$this->load->model('cms/App_cms_model');
		$this->load->library('form_validation');
		$this->load->library('email');  
		$this->load->helper(array('form', 'url', 'captcha','email'));
		$this->lang->load('contact');
	} 

	/**
	* @ Function Name  	: index
	* @ Function Params	: 
	* @ Function Purpose : cron email to customers.
	* @ Function Returns: 
	*/
	public function index(){
		$this->db->select("tbl_application_temp.id , tbl_application_temp.email");
		$this->db->from("tbl_application_temp"); 
		// $this->db->where('tbl_application_temp.notified', '0');
		$this->db->where("tbl_application_temp.created_date < NOW() - INTERVAL 1 HOUR AND tbl_application_temp.notified = '0' ");
		$getdata = $this->db->get();
		$data = $getdata->result_array();
		//print_r($data); die;
		if(!empty($data)){
			foreach ($data as $data){
			    $ids = $data['id'];  
			    $emails = $data['email'];
			   #send email 
			   $sent = $this->_sendRegConfirm($ids , $emails);
			   if($sent){
					$query = "update tbl_application_temp set notified ='1' WHERE id='$ids'";
					$this->db->query($query);  
					//echo $this->db->last_query();
			   }
			}
		}
	}
	
	
	/**
	 * @ Function Name		: 	_sendRegConfirm
	 * @ Function Params	:  	email input
	 * @ Function Purpose 	: 	send email mail notification
	 * @ Function Returns	:  	true/false 
	 */
	 
	private function _sendRegConfirm($ids , $emails) { 

		$url = SITE_URL.'applicationform/completeReg/'.$ids;
		$subject = "Registration Pending";
		 $message = '';
		 $message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		 $message .= '<tr>';
		 $message .= '<td height="26" style="font-family:Tahoma, Arial, sans-serif; font-size:14px;color:#828282;"><strong>Dear Customer </strong>,</td>';
		 $message .= '</tr>';
		 $message .= '<tr>';
		 $message .= '<td style="font-family:Tahoma, Arial, sans-serif; font-size:14px; color:#828282; line-height:15px; padding-bottom:10px;">Your application has not been completed. We request you please fill the application form again to our website or you can complete the application registration from the previews using following <a href="'.$url.'">click here</a> to complete the steps . </td>';
		 $message .= '</tr>';
		 $message .= '<tr>';
		 $message .= '<td height="5"></td>';
		 $message .= '</tr>';
		 $message .= '<tr>';
		$message .= '<td align="left">';
		$message .= '<table width="287" border="0" bgcolor="#ddd" cellspacing="1" cellpadding="6" style="font-family: "Roboto", sans-serif;">';
		$message .= '</table>';
		$message .= '</td>';
		$message .= '</tr>';

		    $from_email = "noreply@theomanvisa.com"; 
			//$list = array('info@thedubaivisa.com','homesh.pal@csipl.com');
			//Load email library 
			$this->load->library('email'); 
			$this->email->from($from_email, 'The Dubai Visa'); 
			$this->email->to($emails);
		    $this->email->bcc('info@theomanvisa.com,support@theomanvisa.com'); 
			$this->email->subject($subject); 
			$this->email->message($message);
			$this->email->set_mailtype('html');
			//Send mail 
			if($this->email->send()){
				return '1';
			}else{ 
				  show_error($this->email->print_debugger());
				  return '0'; 
			}	
	}
	
}