<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_banner');?>
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
        <li class="active"><?php echo lang('update_banner');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('cms/editBanner/'.$this->uri->segment(3).'/'.$fetchmodule['resultset']->id);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule['status']=='true'){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('banner_name');?></label>
					  <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Banner Name" value="<?php echo $fetchmodule['resultset']->banner_name; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('banner_title');?></label>
					  <input type="text" class="form-control" id="banner_title" name="banner_title" placeholder="Banner Title" value="<?php echo $fetchmodule['resultset']->banner_title; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('banner_link');?></label>
					  <input type="text" class="form-control" id="banner_link" name="banner_link" placeholder="Banner Link" value="<?php echo $fetchmodule['resultset']->banner_link; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('banner_image');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
					  <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?php echo $fetchmodule['resultset']->banner_image;?>" />
					  <img src="<?php echo base_url();?>/images/cms/<?php echo $fetchmodule['resultset']->banner_image;?>" width="200px" />
					</div>
					</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('cms/viewbanner');?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Cancel</a>
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
               banner_name: "required",
                banner_title: "required",
                banner_link: "required"
            },
            messages: {
                banner_name: "Title Name is required",
                banner_title: "Slug is required",
                banner_link: "Meta Title is required"
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>