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
        <?php echo "Add Nationality"; ?>
        
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
        <li ><a href="<?php echo base_url('region');?>">Region</a></li>
        <li class="active"><?php echo  'Nationality' ;?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <!--<form method="post" action="<?php echo base_url('location/addLocation');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">-->
			<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('region/addLocation', $attributes); ?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('add_continent');?>*</label>
					<select name="continent_id" id="continent_id" class="form-control">
						<option value="">Select a Continent</option>
						<option value="1">Asia</option>
						<option value="2">Africa</option>
						<option value="3">Antarctica</option>
						<option value="4">Australia</option>
						<option value="5">Europe</option>
						<option value="6">North America</option>
						<option value="7">South America</option>
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo 'Nationality' ;?>*</label>
					  <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Country Name" value="<?php echo set_value('country_name'); ?>">
					  </div>
					  <div class="form-group">
					  <label for=""><?php echo lang('country_key');?>*</label>
					  <input type="text" class="form-control" id="country_key" name="country_key" placeholder="Country Key" value="<?php echo set_value('country_key'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('add_image');?>*</label>
					  <input name="mainimage" type="file" id="mainimage" />
					  <span class="imagesize">(Image size should be 32 x 16)</span>
					</div>
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('location');?>" class="btn btn-danger">Cancel</a>
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
				'continent_id': {required: true},
			    'country_name': {
					required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_country_name",
						} 
				},
				'country_key': {required: true},
				mainimage: "required"
            },
    submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>