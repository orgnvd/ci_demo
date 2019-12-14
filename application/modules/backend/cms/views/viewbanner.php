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
      <h1><?php echo lang('banner_list');?></h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
				 <ol class="breadcrumb bgnone">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
        <li><a href="<?php echo base_url('cms');?>"><i class="fa fa-dashboard"></i> <?php echo lang('cms_list');?></a></li>
        <li class="active"><?php echo lang('banner_list');?></li>
      </ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped dataTables">
                <thead>
                <tr>
                  <th><?php echo lang('s_no');?></th>
                  <th><?php echo lang('banner_name');?></th>
                  <th><?php echo lang('banner_title');?></th>
                  <th><?php echo lang('banner_link');?></th>
                  <th><?php echo lang('banner_image');?></th>
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($view_banner)){ 
					$i=1;
					foreach($view_banner as $banner){?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $banner->banner_name;?></td>
						<td><?php echo $banner->banner_title;?></td>
						<td><?php echo $banner->banner_link;?></td>
						<td><img src="<?php echo base_url();?>/images/cms/<?php echo $banner->banner_image;?>" width="200px" /></td>
						<td>
						<div class="static_page_status_<?php echo $banner->id ?>">

                        <?php if ($banner->is_active == '1') { ?>

                        <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $banner->id ?>" static_pagestatus="<?php echo $banner->is_active ?>" class="label-success statuslabel label label-default status_active"> Active </a>

                        <?php } else { ?>

                        <a title="De-activate"  href="javascript:void(0);" static_pageid="<?php echo $banner->id ?>" static_pagestatus="<?php echo $banner->is_active ?>" class="label-danger statuslabel label label-default status_active"> De-active </a>

                        <?php } ?></div>
						
						</td>
						<td>
						<a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "cms/editBanner/" .$this->uri->segment(3).'/'. $banner->id; ?>" style="padding: 0px 4px;" data-original-title="Edit Banner"><i class="fa fa-edit"></i></a>  
						<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "cms/deleteBanner/" .$this->uri->segment(3).'/'. $banner->id; ?>" style="padding: 0px 4px;" data-original-title="Delete Banner" onclick="return confirm('Are you sure? you want to delete.')"><i class="fa fa-trash"></i></a> 
												
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



                $.post('<?php echo base_url() ?>cms/ajax_getbannerstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {

                    if (data) {

                        $('.static_page_status_' + static_page_id).html(data);

                    }



                });

            }

        });
		});
  
  $(function () {
    $("#example1").DataTable();
  });
</script>