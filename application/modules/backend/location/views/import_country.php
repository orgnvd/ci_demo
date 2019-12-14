<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
<?php if($this->session->flashdata('success_message')){ ?>
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Success!</strong> <?php echo $this->session->flashdata('success_message'); ?>
	</div>
<?php }else if($this->session->flashdata('error_message')){ ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Oops!</strong> <?php echo $this->session->flashdata('error_message'); ?>
	</div>
<?php } ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('import_country_csv');?>
      </h1>
	 </section>
      
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
				<div class="box-header with-border">
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li ><a href="<?php echo base_url('location');?>"><?php echo lang('location_list');?></a></li>
					<li class="active"><?php echo lang('import_country_csv');?></li>
	
					<a href="<?php echo base_url('public/front/csvFormat/country/csv_country.csv'); ?>" style="float:right;">
					<?php echo lang('download_csv');?>
					</a>
				</ol>
            </div>
            <!-- /.box-header -->
			<form method="post" name="business_category" id="b_category" action="<?php echo base_url('location/importCountry');?>" enctype="multipart/form-data">
				<div class="box-body">

			
					<div class="form-group">
						
						<div class="form-group">
							<label for="exampleInputFile"><?php echo lang('import_city');?></label>
							<div class="input-group" style="width:30%;">
								<input type="text" name="sadsadsd" class="form-control"  readonly>
								<label class="input-group-btn">
									<span class="btn btn-default">
										Browse&hellip; <input type="file" name="sadsadsd" style="display: none;" >
									</span>
								</label>
							</div>	
							<div class="clearfix"></div>
								<label id="image-error" class="error" for="image"> </label>
									<div class="clearfix"></div>
							<?php echo form_error('image');?>
						</div>
					</div>
				
				
				<button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('location');?>"  class="btn btn-danger">Cancel</a>
				</div>
			</form>	
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>

  $(function () {
   $("#example1").DataTable( {
		aaSorting: [],
		pageLength: 25,
		paging: true,
		bFilter: true,
		bInfo: false,
		bSortable: true,
		bRetrieve: true,
		aoColumnDefs: [
                {"aTargets": [0], "bSortable": true},
                {"aTargets": [1], "bSortable": true},
                {"aTargets": [2], "bSortable": true},
                {"aTargets": [3], "bSortable": true},
                {"aTargets": [4], "bSortable": true},
                {"aTargets": [5], "bSortable": true},
                {"aTargets": [6], "bSortable": true},
                {"aTargets": [7], "bSortable": false}
            ]
	
	});
  });
  
  

</script>
  <script>
  $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              //if( log ) alert(log);
          }

      });
  });
  
});
  </script>