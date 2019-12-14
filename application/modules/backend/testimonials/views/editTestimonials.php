<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_testimonials');?>
        
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
        <li ><a href="<?php echo base_url('testimonials');?>"><?php echo lang('testimonials');?></a></li>
        <li class="active"><?php echo lang('update_testimonials');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form method="post" action="<?php echo base_url('testimonials/editTestimonials/'.$fetchmodule[0]['id']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule[0]){?>
				<div class="box-body">
				
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_title');?></label>
					  <input type="text" class="form-control" id="title" name="title" placeholder="Testimonial Title" value="<?php echo $fetchmodule[0]['title']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('description');?></label>
					  <textarea id="description" name="description" class="form-control ckeditor"><?php echo $fetchmodule[0]['description']; ?>
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('publish_date');?></label>
					  <input type="text" class="form-control datepicker" id="datefrom" name="publish_date" value="<?php echo $fetchmodule[0]['publish_date']; ?>" />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_sequence');?></label>
					  <input type="text" maxlength="2" class="form-control" id="sequence" name="sequence" placeholder="Testimonials Sequence" value="<?php echo $fetchmodule[0]['sequence']; ?>" onkeypress="return isNumberKey(event)">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonial_banner_image');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
					  <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?php echo $fetchmodule[0]['image'];?>" />
					  <?php if(!empty($fetchmodule[0]['image'])) { ?>
					  <img src="<?php echo base_url();?>/images/testimonials/<?php echo $fetchmodule[0]['image'];?>" width="200px" />
					  <?php } else { ?>
					  <img src="<?php echo base_url();?>/images/noimage.jpg" />
					  <?php } ?>
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_name');?></label>
					  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $fetchmodule[0]['name']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_company');?></label>
					  <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $fetchmodule[0]['company_name']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_designation');?></label>
					  <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $fetchmodule[0]['designation']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonial_user_image');?></label>
					  <input type="file" name="mainimage1" id="mainimage1" size="20" />
					  <span class="imagesize">(Image size should be 95 x 94)</span>
					  <input type="hidden" name="old_banner_image1" id="old_banner_image1" value="<?php echo $fetchmodule[0]['user_image'];?>" />
					  <?php if(!empty($fetchmodule[0]['user_image'])) { ?>
					  <img src="<?php echo base_url();?>/images/testimonials/<?php echo $fetchmodule[0]['user_image'];?>" width="200px" />
					  <?php } else { ?>
					  <img src="<?php echo base_url();?>/images/noimage.jpg" />
					  <?php } ?>
					</div>

				</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('testimonials');?>" class="btn btn-danger">Cancel</a>
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
            ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
			    'title': {required: true},
			    'name': {required: true},
			    'sequence': {required: true}
			},
			submitHandler: function(form) {
			  form.submit();
			}
			
		});
	$('#datefrom').datepicker({ format: 'yyyy-mm-dd' });
    $('#dateend').datepicker({ format: 'yyyy-mm-dd' });
	});
	  
  </script>
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/selectize.default.css">
  <script src="<?php echo base_url();?>public/admin/js/selectize.js"></script>
  <script src="<?php echo base_url();?>public/admin/js/index.js"></script>
  <script>
				var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
				var $select = $('#select-state').selectize({
					plugins: ['remove_button'],
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});
	</script>
  <script>
	function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return false;

	return true;
	}
	</script>
	<script src="<?php echo base_url() . "public/admin/css/datepicker/bootstrap-datepicker.js" ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . "public/admin/css/datepicker/datepicker3.css" ?>">