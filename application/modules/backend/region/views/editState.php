<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_state');?>
        
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
        <li class="active"><?php echo lang('update_state');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('location/editState/'.$this->uri->segment(3).'/'.$fetchmodule['resultset']->state_id);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule['status']=='true'){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('state_name');?></label>
					  <input type="text" class="form-control" id="state_name" name="state_name" placeholder="State Name" value="<?php echo $fetchmodule['resultset']->state_name; ?>">
					</div>
					
					</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('location/state');?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Cancel</a>
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
               state_name: {
				required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_state_name/<?php echo $fetchmodule['resultset']->state_id; ?>",
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