<style>
.bgnone {
	background-color: transparent;
}

</style>


<div class="content-wrapper">
<?php if($this->session->flashdata('error_image')){ ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
		<strong>Oops!</strong> <?php echo $this->session->flashdata('error_image'); ?>
	</div>
<?php } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('ca_adduser');?>
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <ol class="breadcrumb bgnone">
				<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
				<li ><a href="<?php echo base_url('users');?>"><?php echo lang('ca_user_manage');?></a></li>
				<li class="active"><?php echo lang('ca_adduser');?></li>
			  </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php @$userinfo = $admin_user['list'];
				//pr($userinfo); 
			?>
			
			
			<?= validation_errors(); ?>
			<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('users/process', $attributes); ?>
			<input type="hidden" name="idddd" value="<?php echo @$userinfo['id'];?>">
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('ca_user_type');?>*</label>
						<select class="form-control" id="user_role_id" name="user_role_id" >
							<option value=""><?php echo lang('ca_usertype')?> </option>
							<?php if(!empty($resultset['role'])){
								foreach($resultset['role'] as $roleValue){
								?>
								<option value="<?php echo $roleValue->id;?>" <?php if(@$userinfo['user_role_id'] == $roleValue->id){echo "selected";}?>><?php echo $roleValue->user_role;?> </option>
							<?php }
							}?>
						</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('ca_country');?>*</label>
						<select class="form-control" id="country_name" name="country_name" >
							<option value=""><?php echo lang('ca_usercountry')?> </option>
							<?php
							if(!empty($resultset['country'])){
								foreach($resultset['country'] as $cValue){
								?>
								<option value="<?php echo $cValue->country_id;?>" <?php if(@$userinfo['country_id'] == $cValue->country_id){echo "selected";}?>><?php echo $cValue->country_name;?> </option>
							<?php }
							}?>
						</select>
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('ca_name');?>*</label>
					  <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo @$userinfo['first_name'].' '.@$userinfo['last_name']; ?>">
					</div>
					  
					<div class="form-group">
					  <label for=""><?php echo lang('ca_email');?>*</label>
					  <input type="text" class="form-control" id="email" name="email" placeholder="Email-id" value="<?php echo @$userinfo['user_email']; ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('ca_username');?>*</label>
					  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo @$userinfo['user_name']; ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('ca_password');?>*</label>
					  <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo @$userinfo['user_password']; ?>">
					</div>
					<?php if(@$userinfo['id'] ==''){?>
					<div class="form-group">
					  <label for=""><?php echo lang('ca_conf_password');?>*</label>
					  <input type="text" class="form-control" id="cpasswrod" name="cpasswrod" placeholder="Confirm password" value="<?php echo @$userinfo['user_password']; ?>">
					</div>
					<?php }?>
					<div class="form-group">
					  <label for=""><?php echo lang('ca_mobile');?>*</label>
					  <input type="text" class="form-control" id="mobile"  maxlength="12" name="mobile" placeholder="Mobile Number" value="<?php echo @$userinfo['user_mobile']; ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('ca_Address');?>*</label>
					  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo @$userinfo['address']; ?>">
					</div>
					
					
					
				</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('users');?>" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

        

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
 <script type="text/javascript">

	function finishAjax(id, response){

  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 
  $(document).ready(function() {
   $("#frm_subadmin").validate({
		rules: {
			    'country_name': {
					required: true
					/*  remote: {
							url: "<?php //echo base_url();?>location/check_country_name",
							}  */
				},
				'user_role_id': {required: true},
				'email': {required: true},
				'username': {required: true},
				'password': {required: true},
				'cpasswrod': {equalTo: "#password"},
				'mobile': {required: true}
				
            },
    submitHandler: function(form) {
			  form.submit();
			}
			
		}); 
	});
	  
  </script>