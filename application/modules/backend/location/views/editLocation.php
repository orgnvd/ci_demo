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
    <section class="content-header">
      <h1>
        <?php echo lang('update_location');?>
        
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
        <li ><a href="<?php echo base_url('location');?>">Location</a></li>
        <li class="active"><?php echo lang('update_location');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('location/editLocation/'.$fetchmodule['resultset']->country_id);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule['status']=='true'){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('add_continent');?>*</label>
					<select name="continent_id" id="continent_id" class="form-control">
						<option value="">Select a Continent</option>
						<option value="1" <?php if($fetchmodule['resultset']->continent_id == 1) { echo "selected"; } ?>>Asia</option>
						<option value="2" <?php if($fetchmodule['resultset']->continent_id == 2) { echo "selected"; } ?>>Africa</option>
						<option value="3" <?php if($fetchmodule['resultset']->continent_id == 3) { echo "selected"; } ?>>Antarctica</option>
						<option value="4" <?php if($fetchmodule['resultset']->continent_id == 4) { echo "selected"; } ?>>Australia</option>
						<option value="5" <?php if($fetchmodule['resultset']->continent_id == 5) { echo "selected"; } ?>>Europe</option>
						<option value="6" <?php if($fetchmodule['resultset']->continent_id == 6) { echo "selected"; } ?>>North America</option>
						<option value="7" <?php if($fetchmodule['resultset']->continent_id == 7) { echo "selected"; } ?>>South America</option>
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('country_name');?></label>
					  <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Country Name" value="<?php echo $fetchmodule['resultset']->country_name; ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('country_key');?></label>
					  <input type="text" class="form-control" id="country_key" name="country_key" placeholder="Country Key" value="<?php echo $fetchmodule['resultset']->country_key; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('add_image');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
					  <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?php echo $fetchmodule['resultset']->country_logo;?>" />
					  <img src="<?php echo base_url();?>/images/country/<?php echo $fetchmodule['resultset']->country_logo;?>" />
					</div>
					</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('location');?>" class="btn btn-danger">Cancel</a>
              </div>
			  <?php }else{
					echo $fetchmodule['message'];
				}?>
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
  $(document).ready(function() {
  $("#frm_subadmin").validate({
		rules: {
			    'country_name': {
					required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_country_name_edit/<?php echo $fetchmodule['resultset']->country_id; ?>",
						} 
				},
				'country_key': {required: true}
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>