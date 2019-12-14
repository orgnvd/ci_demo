<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_cms');?>
        <small><?php echo lang('add_cms');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('cms');?>">CMS</a></li>
        <li class="active"><?php echo lang('add_cms');?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('add_cms');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <form method="post" action="<?php echo base_url('cms/addCms');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">
				<div class="box-body">
				<div class="form-group">
					  <label for=""><?php echo lang('country');?></label>
					 <select name="country_id" class="form-control select2" style="width: 100%;">
					 <option value=""><?php echo lang('select_country');?></option>
					 <?php 
					 foreach($country as $con)
					 { ?>
					 <option value="<?php echo $con->country_id;?>"><?php echo $con->country_name;?></option>
					 <?php } ?>
					  
					  
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('select_language');?></label>
					 <select name="country_language_id" class="form-control select2" style="width: 100%;">
					  <option value="1">English</option>
					  <option value="2">Japanese</option>
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('select_type');?></label>
					 <select name="cms_type" class="form-control select2" style="width: 100%;">
					  <option value="1">Home Page</option>
					  <option value="2">Inner Page</option>
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('title_name');?></label>
					  <input type="text" class="form-control" id="title_name" name="title_name" placeholder="Title Name" value="<?php echo set_value('title_name'); ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('slug');?></label>
					  <input type="text" class="form-control" id="slug" name="slug" placeholder="CMS Slug" value="<?php echo set_value('slug'); ?>">
					</div>
					
					<div class="form-group">
					  <label for=""><?php echo lang('description');?></label>
					  <textarea id="description" name="description" class="form-control">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_title');?></label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="CMS Meta Title" value="<?php echo set_value('meta_title'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_keyword');?></label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="CMS Meta Keyword" value="<?php echo set_value('meta_keyword'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_description');?></label>
					  <input type="text" maxlength="165" class="form-control" id="meta_description" name="meta_description" placeholder="CMS Meta Description" value="<?php echo set_value('meta_description'); ?>">
					</div>
					<div id="container">
					<p id="add_field"><a href="javascript:void(0)"><span>Click To Add Banner</span></a></p>
					</div>
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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

var counter = 0;

$(function(){

 $('p#add_field').click(function(){

 counter += 1;

 $('#container').append(

 '<fieldset id="field_' + counter + '"><label>Banner ' + counter + '</label>'

 + '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1">Banner Name</label><input type="text" class="form-control datepicker" id="field1_' + counter + '" name="banner_name[]"  /></div></div></div>'

 + '<div class="row"><div class="col-md-12 "><div class="form-group"><label for="exampleInputEmail1">Banner Title</label><input type="text" class="form-control datepicker" id="field1_' + counter + '" name="banner_title[]"  /></div></div></div>'
 
 + '<div class="row"><div class="col-md-12 "><div class="form-group"><label for="exampleInputEmail1">Banner Link</label><input type="text" class="form-control datepicker" id="field1_' + counter + '" name="banner_link[]"  /></div></div></div>'

 + '<input name="mainimage[]" type="file" id="mainimage' + counter + '" />'

 

+ '<a href="javascript:void(0);" onclick="removeRow('+counter+');">Delete</a> </fieldset>' );



 });

});

function removeRow(removeNum) 

{ 

$('#field_'+removeNum).remove(); 

} 

</script>
  <script type="text/javascript">
  $(document).ready(function() {
  $("#frm_subadmin").validate({
            rules: {
               name: "required",
                url: "required",
                sequence: "required"
            },
            messages: {
                name: "Module Name is required",
                url: "Module URL is required",
                sequence: "Module Sequence is required"
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>