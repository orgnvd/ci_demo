<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	* @ Function Name		: __construct
	* @ Function Params	: 
	* @ Function Purpose 	: initilizing variable and providing pre functionalities
	* @ Function Returns	: 
	*/
	public function __construct() {
		parent::__construct(); 
		$this->load->model('contact/Contactmodel');
		$this->load->library('form_validation');
		$this->load->library('email');  
		$this->load->helper(array('form', 'url','email'));
		$this->lang->load('contact');
	}
	
	
	/**
	* @ Function Name		: index
	* @ Function Params	: 
	* @ Function Purpose 	: Managing contact information 
	* @ Function Returns	: 
	*/
	
	public function index()
	{
		
		
		$list_emails = array($this->config->item('admin_email'));
		//pr($list_emails); die;
		$data = array();
		$submit = $this->input->post('btnSubmit');
		$data['post'] ='';
		$postData = $this->input->post();
		if(!empty($postData)){
				$rul = array( 
					array(
						'field' => 'txtName',
						'label' => 'Name',
						'rules' => 'required'
					),
					array(
						'field' => 'txtEmail',
						'label' => 'Email Address',
						'rules' => 'required'
					),
					array(
						'field' => 'txtMessage',
						'label' => 'Message', 
						'rules' => 'required'
					)
				);
				$this->form_validation->set_rules($rul);
				if ($this->form_validation->run() == TRUE ) {
					$POST = $this->input->post();
					$post = $this->input->post();
					$insert_id = $this->Contactmodel->addContactData($post);
					@$send = $this->contactmail($POST);
                    if ($send=='1') {
                        $this->session->set_flashdata('contact', 'Your Message has been sent successfully. We shall get back to you soon.');
                         
						redirect('contact/thankyou');
                    } else {
                        $this->session->set_flashdata('neg', 'There is some error while sending the message. Please try again!');
                    }
				}else if(strtoupper($this->session->userdata('captchaWord')) != strtoupper($this->input->post('captchaCode'))){ 
					 $data['post_error'] = 'You have entered an invalid value for the captcha.'; 
				}
				else { 
					 $data['post_error'] = 'Please fill up all mandatory fields properly.'; 
                }
			}
			
			$userCaptcha   = set_value('captcha');
			$word 		   = $this->session->userdata('captchaWord');

			$vals = array(
				'img_path' 				=> './public/captcha/',
				'img_url'  				=> base_url() . 'public/captcha/',
				'font' 	   				=> './application/helpers/monofont.ttf',
				'image_width' 			=> 118,
				'image_height' 			=> 33,
				'characters_on_image' 	=> 6,
				'expiration'			=> 7200
				);
				
			/* Generate the captcha */

            $data['title'] 			= "Contact Us"; 
			$data['main_content'] = 'contact/contact';
			$this->load->view('front/layout', $data);
	}
	
	/**
	* @ Function Name		: thankyou
	* @ Function Params	: 
	* @ Function Purpose 	: Success form submition
	* @ Function Returns	: 
	*/
	
	public function thankyou(){
	 
 
		$data['title'] 			= "Contact Us"; 
		$data['main_content'] = 'contact/thank-you';
		$this->load->view('front/layout', $data);
 
	}
	
	/**
	* @ Function Name		: contactmail
	* @ Function Params	: 
	* @ Function Purpose 	: Send contact information mail to admin
	* @ Function Returns	: 
	*/
	
	private function contactmail($post){
		 //pr($post); die('===');
		$name=$post['txtName'];
		$phone= $post['txtPhone'];
		$email= $post['txtEmail'];
		$state= $post['txtstate'];				
		$country= $post['country'];					
		$gender= $post['radio'];
		$message = $post['txtMessage'];
		$formsubject = "Contact Enquiry And Feedback";
		$formmessage= $post['txtMessage'];
		//$to = 'homeshr1@gmail.com';
		$from    = $email;
		$email_id = $to;
		$email_list = array('homesh@newvisiondigital.co', 'shashi.v@newvisiondigital.co','shreya@newvisiondigital.co');
        $subject  = $formsubject;		
		#SMTP
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'relay.csipl.net',
				'smtp_port' => 25,
				'smtp_timeout' => 7,
				'smtp_user' => 'auth-cs@csipl.net',
				'smtp_pass' => 'change@12',
				'charset'   => 'utf-8',
				'newline'   => "\r\n",
				'mailtype'  => 'html',
				'validate'  => TRUE
			);
			
			$message = '';
			$message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        	$message .= '<tr>';
        	$message .= '<td height="26" style="font-family:Tahoma, Arial, sans-serif; font-size:11px;color:#828282;"><strong>Dear Admin</strong>,</td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td style="font-family:Tahoma, Arial, sans-serif; font-size:11px; color:#828282; line-height:15px; padding-bottom:10px;">There is a contact form submission on your website. below are the details submitted by the user.</td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td height="5"></td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td align="left">';
        	$message .= '<table width="100%" border="0" bgcolor="#ddd" cellspacing="1" cellpadding="6" style="font-family: "Roboto", sans-serif;">';
        	$message .= '<tr  bgcolor="#000000">';
        	$message .= '<td style="border-top:#1D7DC6 solid 0px; font-size:16px; color:#ffffff; font-family: "Roboto", sans-serif; font-weight:normal; font-family: "Roboto", sans-serif; " colspan="2"><strong style="color:#FFF;">Contact Information</strong></td>';
        	$message .= '</tr>';
        	$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Name:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' .@$name . '</td>';
			$message .= '</tr>';
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Email:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' .@$email . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Phone:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$phone . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Gender:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$gender . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>State:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$state . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Country:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$country . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Subject:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$formsubject. '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  valign="top" style="color:#535258; font-weight:normal; " width="100"><strong>Message:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @nl2br($formmessage). '</td>';
			$message .= '</tr>'; 
			$message .= '</table>';
			$message .= '</td>';
			$message .= '</tr>';
			
			$from_email = "info@site4clientdemo.com.co"; 
			//Load email library 
			$this->load->library('email'); 
			$this->email->from($from_email, 'Contact Email'); 
			$this->email->to($email_list);
		   // $this->email->bcc('homeshr1@gmail.com'); 
			$this->email->subject($subject); 
			$this->email->message($message);
			$this->email->set_mailtype('html');
			//Send mail 
			if($this->email->send()){
				$this->load->helper('email_template');
				$email_template = callBack($post['txtName']); 
				sendEmail($from_email,$email,'Thank you for Query',$email_template);
				return '1';
			}else{ 
				 //show_error($this->email->print_debugger());
				  return '0'; 
			}		
    }
	
	 
	
	 public function send_mail() { 
         $from_email = "info@site4clientdemo.com.co"; 
         $to_email = "homesh.pal@csipl.net"; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'INSTA'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
		 $this->email->set_mailtype('html');
         $this->email->message('<p>Testing the email class.</p>'); 
		 
   
         //Send mail 
         if($this->email->send()){
			 	echo "send";  die("fdas");
		 }else{
			   echo "error";  die("fdas");
		 }
      } 
}
?>
