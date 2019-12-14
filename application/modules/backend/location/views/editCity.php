<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_city');?>
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
        <li class="active"><?php echo lang('update_city');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('location/editCity/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$fetchmodule['resultset']->city_id);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule['status']=='true'){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('city_name');?></label>
					  <input type="text" class="form-control" id="city_name" name="city_name" placeholder="City Name" value="<?php echo $fetchmodule['resultset']->city_name; ?>">
					</div>
					
					</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('location/city');?>/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" class="btn btn-danger">Cancel</a>
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
               city_name: {
				required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_city_name/<?php echo $fetchmodule['resultset']->city_id; ?>",
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