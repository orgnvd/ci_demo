<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_cms');?>
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
        <li ><a href="<?php echo base_url('cms');?>"><?php echo lang('cms');?></a></li>
        <li class="active"><?php echo lang('add_cms');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('cms/addCms', $attributes); ?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('title_name');?>*</label>
					  <input type="text" class="form-control" id="title_name" name="title_name" placeholder="Title Name" value="<?php echo set_value('title_name'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('sub_title_name');?></label>
					  <input type="text" class="form-control" id="sub_title_name" name="sub_title_name" placeholder="Sub Title Name" value="<?php echo set_value('sub_title_name'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('slug');?>*</label>
					  <input type="text" class="form-control" id="slug" name="slug" placeholder="CMS Slug" value="<?php echo set_value('slug'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('description');?>*</label>
					  <textarea id="description" name="description" class="form-control ckeditor">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('long_description');?>*</label>
					  <textarea id="long_description" name="long_description" class="form-control ckeditor">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('image_upload');?></label>
					  <input name="mainimage" type="file" id="mainimage" multiple />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_title');?>*</label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="CMS Meta Title" value="<?php echo set_value('meta_title'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_keyword');?>*</label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="CMS Meta Keyword" value="<?php echo set_value('meta_keyword'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_description');?>*</label>
					  <input type="text" maxlength="165" class="form-control" id="meta_description" name="meta_description" placeholder="CMS Meta Description" value="<?php echo set_value('meta_description'); ?>">
					</div>
					</div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('cms');?>" class="btn btn-danger">Cancel</a>
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
  var unique = $('#select-words-unique').selectize({
					create: true,
					createFilter: function(input) {
						input = input.toLowerCase();
						return $.grep(unique.getValue(), function(value) {
							return value.toLowerCase() === input;
						}).length == 0;
					}
				})[0].selectize;
				
	
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
                $.post('./ajax_country_list', { 'language_id' : $(this).val() } , function(jsondata) {
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
    /* Only Letter Only Script */
	$.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-zA-Z][a-zA-Z .,'-]*$/.test(value);
	}, "Letters only please");
	
	/* No Space allow Script */
	$.validator.addMethod("noSpace", function(value, element) { 
	 return  value.trim() != ""; 
	}, "Space are not allowed");
	
	/* File Upload Extension Script */
	$.validator.addMethod("extension", function(value, element, param) {
	param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
	}, $.validator.format("Please enter a value with a valid extension."));
	
  $(document).ready(function() {
  $("#frm_subadmin").validate({
            ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
			   'cms_type': {required: true},
			   'title_name': {required: true},
			   'slug': {
				   required: true,
				   remote: {
					   url: "<?php echo base_url();?>cms/check_cms_slug",
						}
			   },
			   'description': {required: true},
			   'meta_title': {required: true},
			   'meta_keyword': {required: true},
			   'meta_description': {required: true},
			   'mainimage[]': {required: true}
			},
			  submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
 </script>
  