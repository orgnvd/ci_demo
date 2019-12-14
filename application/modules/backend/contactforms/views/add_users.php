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
        <?php echo 'Contact Queries';?>
        
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
				<li ><a href="<?php echo base_url('contactforms');?>"><?php echo 'Contact Queries';?></a></li>
				<li class="active"><?php echo 'View Form';?></li>
			  </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php @$userinfo = $admin_user;
			 //pr($userinfo); 
			?>
			
			
			 
			<input type="hidden" name="idddd" value="<?php echo @$userinfo[0]['id'];?>">
				<div class="box-body">
					
					<div class="form-group">
					  <label for=""><?php echo lang('ca_name');?>*</label>
					  <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo @$userinfo[0]['name']; ?>">
					</div>
					  
					<div class="form-group">
					  <label for=""><?php echo lang('ca_email');?>*</label>
					  <input type="text" class="form-control" id="email" name="email" placeholder="Email-id" value="<?php echo @$userinfo[0]['email']; ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo 'Phone'; ?>*</label>
					  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo @$userinfo[0]['phone']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo 'Message';?></label>
					  <textarea id="description" name="description" class="form-control ckeditor"><?php echo $userinfo[0]['message']; ?>
						</textarea>
					</div>
					
					 
				 
					
					
					
				</div>
              <!-- /.box-body -->

              <div class="box-footer">
				<a href="<?php echo base_url('contactforms');?>" class="btn btn-danger">Cancel</a>
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