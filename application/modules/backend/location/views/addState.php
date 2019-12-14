<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_state');?>
        
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
		<li ><a href="<?php echo base_url('location/state');?>/<?php echo $this->uri->segment(3);?>">State</a></li>
        <li class="active"><?php echo lang('add_state');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <!--<form method="post" action="<?php echo base_url('location/addState');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">-->
			<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('location/addState', $attributes); ?>
				<div class="box-body">
					  <div class="form-group">
					  <label for=""><?php echo lang('state_name');?>*</label>
					  <input type="text" class="form-control" id="state_name" name="state_name" placeholder="State Name" value="<?php echo set_value('state_name'); ?>">
					</div>
					<input type="hidden" name="country_id" value="<?php echo $this->uri->segment(3);?>" />
					
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				 <a href="<?php echo base_url('location/state');?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Cancel</a>
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
               state_name: {
				required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_state_name",
						} 
				},
            },
            messages: {
                state_name: {
				required: 'State Name is required',
				remote: 'State already used.'
			}
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>