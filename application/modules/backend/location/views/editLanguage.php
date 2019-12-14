<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_language');?>
        
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
		<li ><a href="<?php echo base_url('location/language');?>">Language</a></li>
        <li class="active"><?php echo lang('update_language');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <form method="post" action="<?php echo base_url('location/editLanguage/'.$fetchmodule[0]['language_id']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule[0]){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('update_language');?></label>
					  <input type="text" class="form-control" id="language_name" name="language_name" placeholder="Language Name" value="<?php echo $fetchmodule[0]['language_name']; ?>">
					</div>
					 <div class="form-group">
					  <label for=""><?php echo lang('add_language_code');?></label>
					  <input type="text" class="form-control" id="language_code" name="language_code" placeholder="Language Code" value="<?php echo $fetchmodule[0]['language_code']; ?>">
					  </div>
					<div class="form-group">
					  <label for="">Country Name</label>
					  <select id="select-state" multiple name="country_id[]" class="demo-default">
						<option value="">Select a Country...</option>
						
						<?php
						
						
						foreach($countries as $country) {
						?>
						<option value="<?php echo $country->country_id; ?>" <?php if(in_array($country->country_id,$fetchmodule[0]['country'])) { echo "selected";} ?> ><?php echo $country->country_name; ?></option>
						<?php
						}
						?>
						
					</select>
					</div>	
					</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('location/language');?>" class="btn btn-danger">Cancel</a>
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
  <script type="text/javascript">
  $(document).ready(function() {
  $("#frm_subadmin").validate({
	  ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
	  rules: {
			   'country_id[]': {required: true},
				'language_name': {
					required: true,
				 remote: {
					   url: "<?php echo base_url();?>location/check_language_name/<?php echo $fetchmodule[0]['language_id']; ?>",
						} 
				},
				'language_code': {required: true}
            },
    submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>