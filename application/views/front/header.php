<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Oman Visa</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>fonts.css"/>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>style.css"/>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>swiper.min.css">
<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>comman.js"></script>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>owl.carousel.css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>owl.theme.css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>owl.transitions.css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>animate.css" />
<script type="text/javascript" src="<?php echo JS_PATH; ?>owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>animate.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>parallax.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.easing.1.3.js"></script>

<link href="<?php echo CSS_PATH;?>validationEngine.jquery.css" type="text/css" rel="stylesheet"/>  
<script defer="defer" src="<?php echo JS_PATH; ?>validationEngine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script defer="defer" src="<?php echo JS_PATH; ?>validationEngine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<!-- chat plugin -->
<!-- <script async="true" src="https://static.optinchat.com/optinchat.js" id="oc_script" convid="069ii1VvKLUzcA9rgAiUsfDCCtS2"></script> -->
<!-- End -->
 
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validate.js"></script>
<script>					 
	//Select2
	$.getScript('<?php echo JS_PATH; ?>select2.min.js',function(){
	  var select = $('.select2').select2();
	  $("#tagPicker").select2({
		closeOnSelect:false
	  });
	});        
	$(document).ready(function() {});
</script>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>response.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>select2.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>select2-bootstrap.css">


  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110790131-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-110790131-1');

</script>


 

</script>
</head>
<body>
<?php 
		$current_class = $this->router->fetch_class();
		$current_method = $this->router->fetch_method();
		
		if($current_method == 'thankyou' && $current_class == 'contact'){
		?>
		<!-- Google Code for contact us page Conversion Page -->

 

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 825127575;

var google_conversion_label = "90FtCN7SkXoQl-W5iQM";

var google_remarketing_only = false;

/* ]]> */

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/825127575/?label=90FtCN7SkXoQl-W5iQM&amp;guid=ON&amp;script=0"/>

</div>

</noscript>


		<?php
		}
		if($current_method == 'applicationSummary' && $current_class == 'applicationform'){
		?>
		<!-- Google Code for payment page Conversion Page -->

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 825127575;

var google_conversion_label = "-mEICM7dkXoQl-W5iQM";

var google_remarketing_only = false;

/* ]]> */

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/825127575/?label=-mEICM7dkXoQl-W5iQM&amp;guid=ON&amp;script=0"/>

</div>

</noscript>


		<?php 
		}
		?>
<div class="fullwidth">
<div class="header_outer">
<div class="header">
<div class="wrapper">
<div class="logo">
<a href="<?php echo base_url(); ?>"><img src="<?php echo IMG_PATH; ?>logo.png"/></a>
</div>
<!--end logo-->

<div class="logo_right">

<div class="mobile_menu"><a href="javascript:;"><img src="<?php echo IMG_PATH; ?>mobile_menu.png"/></a></div>


<!--div class="upper_logo_right">
<ul>
<li><span><img src="<?php echo IMG_PATH; ?>live-chat.png" class="ic_main" /><img src="<?php echo IMG_PATH; ?>live_chat_hover.png" class="ic_hover" /></span><a href="javascript:;">Live Chat</a></li>
<li><span><img src="<?php echo IMG_PATH; ?>message.png" class="ic_main" /><img src="<?php echo IMG_PATH; ?>message_hover.png" class="ic_hover" /></span><a href="mailto:contact@instadubaivisa.com">contact@instadubaivisa.com</a></li>
<li><span><img src="<?php echo IMG_PATH; ?>mobile.png" class="ic_main" /><img src="<?php echo IMG_PATH; ?>mobile_hover.png" class="ic_hover" /></span>Toll Free: <a href="javascript:;">1800-2000-144</a></li>
</ul>
</div-->
<!--end upper_logo_right-->
<div class="lower_logo_right">
<div class="mobilelogo">
<a href="<?php echo base_url(); ?>"><img src="<?php echo IMG_PATH; ?>logo.png"/></a>
<div class="close_menu"><a href="javascript:;"><img src="<?php echo IMG_PATH; ?>close.png"/></a></div>
</div>
<?php $page = $this->uri->segment(3); ?>
<?php $page1 = $this->uri->segment(1); ?>
<ul>
<li <?php echo (($this->router->class =='home' && $this->router->method =='index') ? 'class="active"' :''); ?>><a href="<?php echo base_url(); ?>">Home</a></li>    
<li <?php echo (($page1 =='about-us') ? 'class="active"' :''); ?>> 
<a href="<?php echo site_url("about-us");?>"> About Us </a></li>    
<li  <?php echo (($page1 =='track-application') ? 'class="active"' :''); ?> > 
<a href="<?php echo base_url(); ?>track-application">Track Application</a></li>     
<li  <?php echo (($page1 =='how-to-apply') ? 'class="active"' :''); ?>> 
<a href="<?php echo site_url("how-to-apply");?>"> How to Apply   </a></li>  
<li <?php echo (($page1 =='types-of-visa') ? 'class="active"' :''); ?>> <a href="<?php echo base_url(); ?>types-of-visa">Types of Visa  </a></li>   
<li <?php echo (($page1 =='contact-us') ? 'class="active"' :''); ?> > <a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
</ul>
</div>
<!--end lower_logo_right-->
</div>
<!--end logo_right-->
<script>
$(document).ready(function () {
	//registration form validation
	$('#btnSubmit1').click(function(){
		$("#callback").validationEngine({promptPosition : "topRight:-100", scroll: false});
		if($("#callback").validationEngine('validate')) {
			return true;
		} else { 
			return true;
		}
	});
	
});

</script>
<script type="text/javascript">
	$(document).ready (function(){
			function removeError(){$(".formError").remove()};
		});
	 });
</script>

<script type="text/javascript">
$(document).ready(function() {
  $("#frm_popup").validate({
            rules: {
			   'nationality_id': {required: true},
			   'country_id': {required: true}
			},
			  submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
</script>
<div class="clr"></div>
<div class="call_back">
<div class="call_btn"><img src="<?php echo IMG_PATH; ?>call.png"/></div>
<div class="request_content">
<?php  $attributes = array('id' => 'callback', 'name' => 'callback');
    echo form_open_multipart('contact/requestCall', $attributes); ?>
<input type="text" data-prompt-position="topLeft:40,20" class="validate[required],custom[onlyLetterSp],maxSize[30] rightpop_input1" name="txtName"  value="<?php echo set_value('txtName');?>" Placeholder="Name"/>
<input type="text" name="txtEmail"  data-prompt-position="topLeft:40,20" class="validate[required,custom[email]] rightpop_input2" value="<?php echo set_value('txtEmail');?>" Placeholder="E-mail"/>
<input type="text"  class="validate[required],minSize[10],maxSize[12] rightpop_input3" name="txtPhone" value="<?php echo set_value('txtPhone');?>" data-prompt-position="topLeft:40,20"  placeholder="Phone"/>
<input type="text" class="rightpop_input4"  name="txtSubject" value="<?php echo set_value('txtSubject');?>" data-prompt-position="topLeft:40,20"  placeholder="Subject"/>
<textarea  name="txtMessage" class="rightpop_input5" data-prompt-position="topLeft:40,20"  placeholder="Message"><?php echo set_value('txtMessage');?></textarea>
<button type="submit" id="btnSubmit1">Submit</button>
</form>
</div>
<div class="clr"></div>
</div>
<!--end xcall_back-->
</div>
<!--end wrapper-->
</div>
<!--end header-->
</div>
<!--end header_outer-->
</div>



<div class="fixed_apply click_popup"><img src="<?php echo IMG_PATH; ?>apply-new.png" /></div>



<div class="apply_popup_overlay"></div>

<div class="apply_popup_outer">


<div class="apply_popup">
<div class="cls_pop"><img src="<?php echo IMG_PATH; ?>close.png" /></div>

<div class="inner_section2_right_inner">
<?php $attributes = array('id' => 'frm_popup', 'name'=>'frm_popup');
			echo form_open_multipart('visafilter/search', $attributes); ?>
<p>Choose your Nationality</p>
	<select name ="nationality_id" class="select2" id="nationality_id" style="width: 100%;">
		<option value=""><?php echo "Select";?></option>
		<?php 
		if(!empty($fetchnatinality)){ 
			foreach($fetchnatinality as $values){?>
			<option value="<?php echo $values->country_id;?>"><?php echo $values->country_name;?></option>
		<?php }
		}
		?>
	</select>

<p>I am living in</p>
	<select name ="country_id" class="select2" id="country_id" style="width: 100%;">
		<option value=""> Select </option>
		<?php 
		if(!empty($fetchcountry)){ 
			foreach($fetchcountry as $value){?>
			<option value="<?php echo $value->country_id;?>"><?php echo $value->country_name;?></option>
		<?php }
		}
		?>
	</select>
<button type="submit">Get Started</button>
</form>
</div>
<!--end inner_section2_right_inner-->

<div class="clr"></div>
</div>
<!--end apply_popup-->


</div>
<!--end apply_popup_outer-->