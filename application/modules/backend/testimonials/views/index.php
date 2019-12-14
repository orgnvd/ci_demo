<style>
.bgnone {
	background-color: transparent;
}
#example1 td span:last-child {
    display: none;
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
        <?php echo lang('testimonials_list');?>
      </h1>
	 </section>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
			<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li class="active"><?php echo lang('testimonials_list');?></li>
					<a href="<?php echo base_url('testimonials/addTestimonials');?>">
					<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_testimonials');?></button>
				</a>
				</ol>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th><?php echo lang('testimonials_name');?></th>
				  <th><?php echo lang('testimonials_title');?></th>
				 
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($news_list)){ 
					$i=1;
					foreach($news_list as $key=>$value){?>
					<tr>
						<td><?php echo $value['name'];?></td>
						<td><?php echo $value['title'];?></td>
						 
						 
						<td>
						<div class="static_page_status_<?php echo $value['id'] ?>">
						<?php if ($value['is_active'] == '1') { ?>
						<a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $value['id'] ?>" static_pagestatus="<?php echo $value['is_active'] ?>" class="label-success statuslabel label label-default status_active"> Active </a>
						<?php } else { ?>
						<a title="De-activate"  href="javascript:void(0);" static_pageid="<?php echo $value['id'] ?>" static_pagestatus="<?php echo $value['is_active'] ?>" class="label-danger statuslabel label label-default status_active"> De-active </a>
						<?php } ?></div>
						</td>
						<td>
						<a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "testimonials/editTestimonials/" . $value['id']; ?>" style="padding: 0px 4px;" data-original-title="Edit Testimonials"><i class="fa fa-edit"></i></a>  
						<!--<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "testimonials/deleteTestimonials/" . $value['id']; ?>" style="padding: 0px 4px;" data-original-title="Delete Testimonials" onclick="return confirm('Are you sure? you want to delete.')"><i class="fa fa-trash"></i></a>--> 
						</td>
					</tr>
                <?php $i++; } }?>
                </tbody>
               </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(document).ready(function() {

        //$("#example1").DataTable();

        $(document).on('click', '.status_active', function() {

			static_page_id = $(this).attr('static_pageid');

            status = $(this).attr('static_pagestatus');

            if (status == '1') {

                status = '1';

                var r = confirm("Are you sure you want to De-activate");

            } else {

                var r = confirm("Are you sure you want to Activate");

            }

            if (r == true) {



                $.post('<?php echo base_url() ?>testimonials/ajax_gettestimonialssstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {

                    if (data) {

                        $('.static_page_status_' + static_page_id).html(data);

                    }



                });

            }

        });
		});
  

  $(function () {
   $("#examples1").DataTable( {
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
                {"aTargets": [6], "bSortable": false}
            ]
	
	});
  });

</script>
