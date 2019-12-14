 
<!-- Middle Section -->

<div class="section08 add-bg-clr contact-main">
    <div class="container-fluid">
        <div class="row">
          <div class="add-brdr ">
            <h2>Contact <b>Details</b></h2>
          </div>  
          <div class="contact-sec">
            <div class="col-md-6">
                <div class="con-item">
                    <h4>Corporate Office</h4>
                    <h2>Get in touch</h2>
                    <div class="con-address">
                        <address>
                            <b>Phone</b>
                            <span><a href="tel:+91-11-41232400">+91-11-41232400</a></span>
                        </address>
                         <address>
                            <b>Fax</b>
                            <span><a href="tel:+ 91-11-41232412">+ 91-11-41232412</a></span>
                        </address>
                         <address>
                            <b>Our Address</b>
                            <p>"ALSTONE HOUSE"</p>
                            <span>2E/7, Block E 2, Jhandewalan Extension <br>
                            Jhandewalan, New Delhi-110055 (INDIA)</span>
                           
                        </address>
                         <address>
                            <b>E-mail</b>
                            <span><a href="mailto:info@alstoneindia.com">info@alstoneindia.com</a></span>
                            <span><a href="mailto:ask@alstoneindia.com">ask@alstoneindia.com</a></span>
                        </address>
                        <div class="map-wrpr">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.485187689526!2d77.19964331505079!3d28.645187690259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5d23794ac1%3A0x9055ba5f2074cb19!2sALSTONE%20HOUSE!5e0!3m2!1sen!2sin!4v1574329354525!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="con-item right-sec">
                    <h4>Corporate Office</h4>
                    <h2>Get in touch</h2>
                    <div class="con-address">
                         <address>
                            <b>Alstone International</b>
                            <span>1393, Langha Road Industrial Area Dehradun Uttaranchal (INDIA)</span>
                        </address>
                          <address>
                            <b>Alstone Industries Pvt. Ltd.</b>
                            <span>Plot No. 420, Village Keshwana, Ricco Road, Tehsil Kotputli, Distt.<br> 
                            Jaipur, Rajasthan (INDIA)</span>
                        </address>

                        <div class="map-wrpr">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.485187689526!2d77.19964331505079!3d28.645187690259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5d23794ac1%3A0x9055ba5f2074cb19!2sALSTONE%20HOUSE!5e0!3m2!1sen!2sin!4v1574329354525!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
          </div>    
        </div>
	</div>
</div>

<div class="container-fluid img-con" style="background-image: url(<?php echo IMG_PATH; ?>cont-img.png);">
	<div class="row">
		<div class="enquiry">
			<div class="col-md-6" data-aos="fade-left">
				<div class="form-fill">
					<h2>Feedback /  <b> Enquiry</b></h2>
					<?php
							$post = $this->input->post();
							$value = $this->session->flashdata('contact');
							$neg =   $this->session->flashdata('neg');
							if(!empty($post_error) && empty($value)){
								$err = $post_error;
							}
						?>
						<?php if(!empty($value)): ?>
							<div class="alert success">
							  <span class="closebtn">&times;</span>  
							  <strong>Success!</strong> <?php echo $value;?>
							</div>	
						<?php endif;?> 
						<?php if(!empty($err)): ?>
							<div class="alert">
							  <span class="closebtn">&times;</span>  
							  <strong>Oops!</strong> <?php echo $err;?>
							</div>	
						<?php endif;?> 
						<?php if(!empty($neg)): ?>
							<div class="alert">
							  <span class="closebtn">&times;</span>  
							  <strong>Oops!</strong> <?php echo $neg;?>
							</div>	
						<?php endif;?> 
					<?php  $attributes = array('id' => 'contactus', 'name' => 'contactus');
						echo form_open_multipart('contact', $attributes); ?>
					<ul class="list-unstyled">
						<li><input type="text" name="txtName"  placeholder=" Name *"></li>                    
						<li><input type="text" name="txtPhone"   placeholder="Mobile *"></li>  
						<li><input type="email" name="txtEmail" placeholder="Email *"></li>  
						<li><input type="text" placeholder="State *" name="txtstate" ></li>                       
						<li>
							<select name="country" id="cntry">
							 <option>Country</option>
							 <option>India</option>
							 <option>Canada</option>
							 <option>US</option>
							 <option>UK</option>
							 <option>London</option>		
						    </select> 
					   </li>                   
					
						<li>
							<span class="gender">Gender *</span>
							<div class="radio">
								<input id="male" name="radio" type="radio" value="Male" checked>
								<label for="male" class="radio-label">Male</label>
							</div>
							 <div class="radio">
								<input id="female" name="radio" type="radio" value="Female">
								<label  for="female" class="radio-label">Female</label>
							</div>
						</li> 
						<li><textarea placeholder="Message *" name="txtMessage" ></textarea></li>
						<li><button type="submit" name="btnSubmit" value="ok">Send</button></li>
					</ul>
					</form>
				</div>
			</div> 
		  </div>
	</div>
</div>
 



 