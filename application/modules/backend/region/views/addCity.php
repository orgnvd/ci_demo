<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_city');?>
        
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
        <li class="active"><a href="<?php echo base_url('location');?>"><?php echo lang('location_list');?></a></li>
		<li class="active"><a href="<?php echo base_url('location/state');?>/<?php echo $this->uri->segment(3);?>"><?php echo lang('state_list');?></a></li>
        <li ><a href="<?php echo base_url('location/city');?>/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>">City</a></li>
        <li class="active"><?php echo lang('add_city');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <!--<form method="post" action="<?php echo base_url('location/addCity');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">-->
			<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('location/addCity', $attributes); ?>
				<div class="box-body">
					  <div class="form-group">
					  <label for=""><?php echo lang('city_name');?>*</label>
					  <input type="text" class="form-control" id="city_name" name="city_name" placeholder="City Name" value="<?php echo set_value('city_name'); ?>">
					</div>
					<input type="hidden" name="country_id" value="<?php echo $this->uri->segment(3);?>" />
					<input type="hidden" name="state_id" value="<?php echo $this->uri->segment(4);?>" />
					
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				 <a href="<?php echo base_url('location/city');?>/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" class="btn btn-danger">Cancel</a>
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
  $(document).ready(function() {
  $("#frm_subadmin").validate({
            rules: {
               city_name: {
				required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_city_name",
						} 
				}
            },
            messages: {
                city_name: {
				required: 'City Name is required',
				remote: 'City already used.'
			}
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>