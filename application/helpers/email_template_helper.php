<?php 
 if(!function_exists('callBack'))
	{
		function callBack($name){
			
			//print_r($post); 
			
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
			  <tbody>
				<tr>
				  <td align="center">
				  <table  border="0" cellspacing="0" cellpadding="0" align="center"  width="100%">
			  <tbody>
					<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
							</tr>
							<tr align="left">
							<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
							</tr>
				<tr>
				<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Thank you for showing your interest in Oman visa. Our Customer care Executive will get in touch with you shortly.
				</td>
				</tr>
				
				<tr>
				<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">You made the right choice, we are the industry leaders in providing Oman visa, while our Customer Care Executive get in touch with you, you may also want to try our self service option, which is a hassle free service to apply for a visa. The step by step will help you in submitting your documents with us.
				</td>
				</tr>
				
				   <tr>
				<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">You may also want to write to us at under mentioned email id. In case of emergency you can also connect with us on Skype by link mentioned on the website.
				</td>
				</tr>
				
					 <tr>
				<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Thank you for your patience.
				</td>
				</tr>
				
					 <tr>
				<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
				</td>
				</tr>
					<tr>
				<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
				</td>
				</tr>
				
					<tr>
				<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theomanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theomanvisa.com</a>
				</td>
				</tr>
				
				
			  </tbody>
			</table>
				  </td>
				</tr>
			  </tbody>
			</table>';
					return $html;
		}
	}
	
	if(!function_exists('getVisaRejectTeplate'))
	{
		function getVisaRejectTeplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
						<html>
						<head>
						<meta charset="utf-8">
						<title>The Oman Visa</title>
						</head>

						<body bgcolor="#d6d6d6">

						<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
						  <tbody>
							<tr>
							  <td align="center">
							  <table  border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
						  <tbody>
							<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
							</tr>
							<tr align="left">
							<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
							</tr>
							<tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We are regret to inform you that your Oman visa application has been rejected
							</td>
							</tr>
							
							<tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Unfortunately, the UAE authorities do not give reasons for rejecting visa applications, so we cannot provide specific reasons why your application was unsuccessful.
							</td>
							</tr>
							
							  <tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We thank you for the opportunity to serve you.  In case you have any questions, please do not hesitate to ask.  Thanks.
							</td>
							</tr>
							

								 <tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
							</td>
							</tr>
								<tr>
							<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
							</td>
							</tr>
							
								<tr>
							<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
							</td>
							</tr>
							
							
						  </tbody>
						</table>
							  
							  
							  </td>
							</tr>
						  </tbody>
						</table>



						</body>
						</html>';
					return $html;
		}
	}
	
	if(!function_exists('getVisaApprovedTeplate'))
	{
		function getVisaApprovedTeplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
					<html>
					<head>
					<meta charset="utf-8">
					<title>The Oman Visa</title>
					</head>

					<body bgcolor="#d6d6d6">


					<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
					  <tbody>
						<tr>
						  <td align="center"><table  border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
					  <tbody>
						<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
						</tr>
						<tr align="left">
						<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
						</tr>
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We are pleased to inform you that your Oman visa application has been accepted and the visa has been granted.  Please find attached E-visa.
						</td>
						</tr>
						
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">You have to print it and show wherever required e.g. booking a ticket, Oman airport, Oman immigration.
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We thank you for the opportunity to serve you.  In case you have any questions, please do not hesitate to ask.  Thanks.
						</td>
						</tr>
						

							 <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
						</td>
						</tr>
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
						</td>
						</tr>
						
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
						</td>
						</tr>
						
						
					  </tbody>
					</table></td>
						</tr>
					  </tbody>
					</table>
					</body>
					</html>';
					return $html;
		}
	}
if(!function_exists('getVisaInProcessTeplate'))
	{
		function getVisaInProcessTeplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
						<html>
						<head>
						<meta charset="utf-8">
						<title>The Oman Visa</title>
						</head>

						<body bgcolor="#d6d6d6">


						<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
						  <tbody>
							<tr>
							  <td align="center">
							  <table  border="0" cellspacing="0" cellpadding="0" align="center"  width="100%">
						  <tbody>
							<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
							</tr>
							<tr align="left">
							<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
							</tr>
							<tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Your application for Oman visa has been submitted successfully. It will take (Working days depending on what type of visa they have applied for) for the visa to get processed. We will update you once your application is processed.
							</td>
							</tr>
							
							<tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Thank you for your time and understanding.
							</td>
							</tr>

								 <tr>
							<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
							</td>
							</tr>
								<tr>
							<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
							</td>
							</tr>
							
								<tr>
							<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
							</td>
							</tr>
							
							
						  </tbody>
						</table>
							  </td>
							</tr>
						  </tbody>
						</table>







						</body>
						</html>';
					return $html;
		}
	}

	if(!function_exists('getStage2Teplate'))
	{
		function getStage2Teplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
					<html>
					<head>
					<meta charset="utf-8">
					<title>The Oman Visa</title>
					</head>

					<body bgcolor="#d6d6d6">


					<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
					  <tbody>
						<tr>
						  <td align="center"><table  border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
					  <tbody>
						<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
						</tr>
						<tr align="left">
						<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
						</tr>
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Greetings from The Oman Visa.
Thank you for showing your interest in Oman visa. You made the right choice, we are the industry leaders in providing Oman visa.
						</td>
						</tr>
						
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We glad that you have given us the opportunity to process your Oman visa application. 
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please note - Friday & Saturday are non-working days. In case of any further documents require by Immigration will we send email to you.
						</td>
						</tr>
						 <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please feel free to approach us for any doubt or query. 
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please be informed that your application is under process, as soon as the visa will approved - we&apos;ll send the soft copy of visa to your email.
						</td>
						</tr>
						

						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
						</td>
						</tr>
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
						</td>
						</tr>
						
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
						</td>
						</tr>
						
						
					  </tbody>
					</table></td>
						</tr>
					  </tbody>
					</table>
					</body>
					</html>';
					return $html;
		}
	}
	
	if(!function_exists('getStage3Teplate'))
	{
		function getStage3Teplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
					<html>
					<head>
					<meta charset="utf-8">
					<title>The Oman Visa</title>
					</head>

					<body bgcolor="#d6d6d6">


					<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
					  <tbody>
						<tr>
						  <td align="center"><table  border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
					  <tbody>
						<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
						</tr>
						<tr align="left">
						<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
						</tr>
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Greetings from The Oman Visa.
Thank you for showing your interest in Oman visa. You made the right choice, we are the industry leaders in providing Oman visa.
						</td>
						</tr>
						
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We glad that you have given us the opportunity to process your Oman visa application. 
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Apologies..!! As the processing is taking longer than normal we appreciate your patience and cooperation.
						</td>
						</tr>
						 <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please note - Friday & Saturday are non-working days. In case of any further documents require by Immigration will we send email to you.  
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please feel free to approach us for any doubt or query. 
						</td>
						</tr>
						

						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
						</td>
						</tr>
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
						</td>
						</tr>
						
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
						</td>
						</tr>
						
						
					  </tbody>
					</table></td>
						</tr>
					  </tbody>
					</table>
					</body>
					</html>';
					return $html;
		}
	}
	
	
	if(!function_exists('getStage4Teplate'))
	{
		function getStage4Teplate($name){
			$CI = &get_instance();
			$base_url = $CI->config->base_url();
			
			$html = '<!doctype html>
					<html>
					<head>
					<meta charset="utf-8">
					<title>The Oman Visa</title>
					</head>

					<body bgcolor="#d6d6d6">


					<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
					  <tbody>
						<tr>
						  <td align="center"><table  border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
					  <tbody>
						<tr>
							  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/includes/images/logo.png" alt="" title="" style="border:0;"/></a></td>
						</tr>
						<tr align="left">
						<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
						</tr>
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We are pleased to inform you that your Oman visa application has been accepted and the visa has been granted.  Please find attached E-visa.
You have to print it and show wherever required e.g. booking a ticket, Oman airport, Oman immigration.
						</td>
						</tr>
						
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please note - Please provide us the following documents after you return from Oman.
Entry and Exit Stamps and boarding pass&apos;s scanned copies on priority.
						</td>
						</tr>
						
						  <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Please Provide below mention now - 
Local contact #
Hotel Booking Details #
Return Date from Oman - 
						</td>
						</tr>
						 <tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">We thank you for the opportunity to serve you.  In case you have any questions, please do not hesitate to ask.  Thanks. 
						</td>
						</tr>
						<tr>
						<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
						</td>
						</tr>
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Oman Visa Team
						</td>
						</tr>
						
							<tr>
						<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@theOmanvisa.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@theOmanvisa.com</a>
						</td>
						</tr>
						
						
					  </tbody>
					</table></td>
						</tr>
					  </tbody>
					</table>
					</body>
					</html>';
					return $html;
		}
	}


	
	if(!function_exists('sendEmail'))
	{
		function sendEmail($from=false,$to=false,$subject=false,$body=false,$attchement=false)
		{
			$CI = &get_instance();

			$CI->load->library('email');

			$config['protocol'] = 'sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$CI->email->initialize($config);                 
 
			$CI->email->from('noreply@theomanvisa.com', 'The Oman Visa'); 
			$CI->email->to($to);
			//$CI->email->bcc('homesh.pal@csipl.net'); 
			$CI->email->subject($subject); 
			$CI->email->message($body);
			if(trim($attchement) != '')
			{
				$CI->email->attach($attchement);
			}
			
			return $CI->email->send();
		}
		
	}