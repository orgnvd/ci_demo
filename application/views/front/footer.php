<div class="footer">
<div class="wrapper">
<div class="top_footer"><span>Follow us on</span>
<ul>
<li><a href="javascript:;" class="tw"></a></li>
<li><a href="javascript:;" class="fb"></a></li>
<li><a href="javascript:;" class="lin"></a></li>
</ul>
</div>
<div class="upper_logo_right">
<ul>
<li><span><img src="<?php echo IMG_PATH; ?>message.png" class="ic_main" /><img src="<?php echo IMG_PATH; ?>message_hover.png" class="ic_hover" /></span><a href="mailto:info@thedubaivisa.com">info@theomanvisa.com</a></li>
<li><span style="vertical-align: top;   padding-top:10px;">Connect to:</span><a href="skype:live:info@theomanvisa.com"><img src="<?php echo IMG_PATH; ?>sky.png" /></a></li>
<!--li><span><img src="<?php echo IMG_PATH; ?>mobile.png" class="ic_main" /><img src="<?php echo IMG_PATH; ?>mobile_hover.png" class="ic_hover" /></span>Toll Free: <a href="javascript:;">1800-2000-144</a>  <a href="skype:info@thedubaivisa.com?call">Start chat</a></li-->
</ul>
</div>
<div class="middle_footer">
<?php $page = $this->uri->segment(3); ?>
<ul>
<li <?php echo (($this->router->class =='home' && $this->router->method =='index') ? 'class="active"' :''); ?>><a href="<?php echo base_url(); ?>">Home</a></li>
<li <?php echo (($page =='about') ? 'class="active"' :''); ?>><a href="<?php echo site_url("about-us");?>">About Us</a></li>
<li><a href="<?php echo base_url(); ?>track-application">Track Application</a></li>
<li <?php echo (($page =='howto') ? 'class="active"' :''); ?>><a href="<?php echo site_url("how-to-apply");?>">How to Apply</a></li>
<li <?php echo (($this->router->class =='cmspages' && $this->router->method =='choosevisa') ? 'class="active"' :''); ?>><a href="<?php echo base_url("types-of-visa"); ?>">Types of Visa</a></li>
<li <?php echo (($page =='complaints') ? 'class="active"' :''); ?>><a href="<?php echo site_url("complaints");?>"> Complaints</a></li>
<li <?php echo (($page =='remark') ? 'class="active"' :''); ?>><a href="<?php echo site_url("remarks");?>">Remarks</a></li>
<li <?php echo (($this->router->class =='contact' && $this->router->method =='index') ? 'class="active"' :''); ?>><a href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>
</ul>           
</div>



<div class="footer_bottom">
<!--div class="footer_bottom1"><p></div-->
<div class="footer_bottom2">
<ul>
<li>©2017 The Oman Visa All Rights Reserved.</p></li>|
<li <?php echo (($page =='terms') ? 'class="active"' :''); ?>><a href="<?php echo site_url("term-and-conditions");?>">Terms & Conditions      </a></li>
<li <?php echo (($page =='privacy') ? 'class="active"' :''); ?>><a href="<?php echo site_url("privacy-policy");?>">   Privacy Policy  </a></li>
 
</ul>
</div>
<!--
<div class="footer_bottom3"><img src="<?php echo IMG_PATH; ?>live-chat1.png"/></div>
<div class="clr"></div>-->
<div class="middle_footer">
<ul>
<li>
<a> <b>Powered by</b> Executive Visa Assistance </a></li>
</ul>
</div>
</div>

<div class="dispclim"><p>Disclaimer: The Oman Visa neither represents any Government Department of UAE, nor does it linked with any UAE Embassy abroad. This is a private visa agency, which caters visa processing services related to United Arab Emirates and Charges a Consulting fee. Prospective applicants may also obtain UAE visas from the Government website without paying any consulting service charges.</p></div>

</div>
<!--end wrapper-->
</div>
<!--end footer-->

<script type="text/javascript" src="<?php echo JS_PATH; ?>swiper.jquery.min.js"></script>
 
  <script>
    var swiper = new Swiper('.swiper-container', {
        pagination:false,
		slidesPerView: 2,
		speed: 1000,
		loop: true,
        paginationClickable: true,
		autoplayDisableOnInteraction: false,
        direction: 'vertical',
		autoplay: false,
		nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30
    });
    </script>
	<script>
		var close = document.getElementsByClassName("closebtn");
		var i;

		for (i = 0; i < close.length; i++) {
			close[i].onclick = function(){
				var div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function(){ div.style.display = "none"; }, 600);
			}
		}
	</script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/596449201dc79b329518d99e/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>
