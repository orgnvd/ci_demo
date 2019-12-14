<style>
.bgnone {
	background-color: transparent;
}
</style>
<script>
function getState(val) {
	//alert(val);
	//alert(id);
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>cms/ajax_country_list",
	data:'language_id='+val,
	success: function(data){
		$("#select-state").html(data);
	}
	});
}
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_testimonials');?>
        
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
        <li class="active"><?php echo lang('add_testimonials');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <form method="post" action="<?php echo base_url('testimonials/addTestimonials');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">
				<div class="box-body">
				 
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_title');?>*</label>
					  <input type="text" class="form-control" id="title" name="title" placeholder="Testimonial Title" value="<?php echo set_value('title'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('description');?>*</label>
					  <textarea id="description" name="description" class="form-control ckeditor">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('publish_date');?></label>
					  <input type="text" class="form-control datepicker" id="datefrom" name="publish_date" />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_sequence');?></label>
					  <input type="text" maxlength="2" class="form-control" id="sequence" name="sequence" placeholder="Testimonials Sequence" value="<?php echo set_value('sequence'); ?>" onkeypress="return isNumberKey(event)">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonial_banner_image');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_name');?>*</label>
					  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_company');?>*</label>
					  <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo set_value('company_name'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonials_designation');?>*</label>
					  <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo set_value('designation'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('testimonial_user_image');?></label>
					  <input type="file" name="mainimage1" id="mainimage1" size="20" />
					  <span class="imagesize">(Image size should be 95 x 94)</span>
					</div>
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('testimonials');?>" class="btn btn-danger">Cancel</a>
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
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/selectize.default.css">
  <script src="<?php echo base_url();?>public/admin/js/selectize.js"></script>
  <script src="<?php echo base_url();?>public/admin/js/index.js"></script>
 <script>
	$('.select-tags').selectize({
		plugins: ['remove_button'],
		persist: true,
		render: {
			item: function(data, escape) {
				return '<div>' + escape(data.text) + '</div>';
			}
		},
		
	});
	$(document).ready(function() {
            //initialize selectize for both fields
            
            $("#district").selectize();
 
            // onchange
            $("#province_id").change(function() {
                $.post('<?php echo base_url();?>cms/ajax_country_list', { 'language_id' : $(this).val() } , function(jsondata) {
					var htmldata = '';
                    var new_value_options   = '[';
                    for (var key in jsondata) {
                        htmldata += '<option value="'+jsondata[key].country_id+'">'+jsondata[key].country_name+'</option>';
 
                        var keyPlus = parseInt(key) + 1;
                        if (keyPlus == jsondata.length) {
                            new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'}';
                        } else {
                            new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'},';
                        }
                    }
                    new_value_options   += ']';
 
                    //convert to json object
                    new_value_options = eval('(' + new_value_options + ')');
                    if (new_value_options[0] != undefined) {
                        // re-fill html select option field 
                        $("#district").html(htmldata);
                        // re-fill/set the selectize values
                        var selectize = $("#district")[0].selectize;
 
                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache['option'] = {};
                        selectize.renderCache['item'] = {};
 
                        selectize.addOption(new_value_options);
 
                        //selectize.setValue(new_value_options[0].value);
                        selectize.setValue(new_value_options.value);
                    }
 
                }, 'json');
            });
        });

	</script>
  
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
  