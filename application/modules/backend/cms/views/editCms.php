<style>
.bgnone {
	background-color: transparent;
}
</style>
<script>
function getState(val,id) {
	//alert(val);
	//alert(id);
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>cms/ajax_language_list",
	data:'country_id='+val,
	success: function(data){
		$("#state-list"+id).html(data);
	}
	});
}
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_cms');?>
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
        <li class="active"><?php echo lang('update_cms');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php //pr($fetchmodule); ?>
            <form method="post" action="<?php echo base_url('cms/editCms/'.$fetchmodule[0]['cmsid']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if(!empty($fetchmodule[0])){?>
				<div class="box-body">
				<div class="form-group">
					  <label for=""><?php echo lang('title_name');?></label>
					  <input type="text" class="form-control" id="title_name" name="title_name" placeholder="Title Name" value="<?php echo $fetchmodule[0]['cmsTitle']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('slug');?></label>
					  <input type="text" class="form-control" id="slug" name="slug" placeholder="CMS Slug" value="<?php echo $fetchmodule[0]['cmsSlug']; ?>">
					</div>
				 
					<div class="form-group">
					  <label for=""><?php echo lang('description');?></label>
					  <textarea id="description" name="description" class="form-control ckeditor"><?php echo $fetchmodule[0]['cmsShortDesc']; ?>
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('long_description');?>*</label>
					  <textarea id="long_description" name="long_description" class="form-control ckeditor"><?php echo $fetchmodule[0]['cmsLongDesc']; ?></textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('image_upload');?></label>
					  <input type="file" name="mainimage" id="mainimage" multiple />
					  </div>
					  <?php if(!empty($fetchmodule[0]['cmsBanner'])){ ?>
					  <div class="form-group">
						<img src="<?php echo base_url();?>images/cms/<?php echo $fetchmodule[0]['cmsBanner'];?>" id="deletecmbanner<?php echo $fetchmodule[0]['cmsBanner']; ?>" style="width:100px;" />
					  </div>
					  <?php }else{ ?>
						<img src="<?php echo base_url();?>/images/noimage.jpg" />
					  <?php } ?>
					  <input type="hidden" value="<?php echo $fetchmodule[0]['cmsBanner'];?>" name="editbanner" />
					<div class="form-group">
					  <label for=""><?php echo lang('meta_title');?></label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="CMS Meta Title" value="<?php echo $fetchmodule[0]['metaTitle']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_keyword');?></label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="CMS Meta Keyword" value="<?php echo $fetchmodule[0]['metaKeyword']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_description');?></label>
					  <input type="text" maxlength="165" class="form-control" id="meta_description" name="meta_description" placeholder="CMS Meta Description" value="<?php echo $fetchmodule[0]['metaDescription']; ?>">
					</div>
				</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('cms');?>" class="btn btn-danger">Cancel</a>
              </div>
			  <?php }else{
					//echo $fetchmodule['message'];
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
			   'business_category_id': {required: true},
			   'country_id[]': {required: true},
			   'language_id': {required: true},
			   'cms_type': {required: true},
			   'title_name': {required: true},
			   'slug': {
				   required: true,
				   remote: {
					   url: "<?php echo base_url();?>cms/check_cms_slug/<?php echo $fetchmodule[0]['id']; ?>",
						}
			   },
			   'description': {required: true},
			   'meta_title': {required: true},
			   'meta_keyword': {required: true},
			   'meta_description': {required: true}
			},
    submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	function ajaxdelete(deletecon){
	var ok = confirm("Are you sure to Delete this entry?")
	if (ok)
		{
			$.ajax({
			url: "<?php echo base_url(); ?>" + "cms/deletecmsbanner",
			data:{'delete': deletecon},
			type: "POST",
			success: function(data) 
			{
				$("#deletebanner" + deletecon).remove();
				$("#deletecmbanner" + deletecon).remove();
			}
			});
		}
	}
 </script>