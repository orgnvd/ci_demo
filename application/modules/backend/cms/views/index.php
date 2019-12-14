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
      <h1><?php echo lang('cms_list');?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li class="active"><?php echo lang('cms_list');?></li>
					<a href="<?php echo base_url('cms/addCms');?>">
					<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_cms');?></button>
				</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('title_name');?></th>
                  <th><?php echo lang('slug');?></th>
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($module_list)){ 
					$i=1;
					foreach($module_list as $key=>$value){?>
					<tr>
						<td><?php echo $value['cmsTitle'];?></td>

						<td><?php echo $value['cmsSlug'];?></td>
						<td>
						<div class="static_page_status_<?php echo $value['cmsid'] ?>">
                        <?php if ($value['cmsStatus'] == '1') { ?>
                        <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $value['cmsid'] ?>" static_pagestatus="0"  class="label-success statuslabel label label-default status_active"> Active </a>
                        <?php } else { ?>
                        <a title="De-activate"  href="javascript:void(0);" static_pageid="<?php echo $value['cmsid'] ?>" static_pagestatus="1"  class="label-danger statuslabel label label-default status_active"> De-active </a>
                        <?php } ?></div>
						</td>
						<td>
						<a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "cms/editCms/" . $value['cmsid']; ?>" style="padding: 0px 4px;" data-original-title="Edit Cms"><i class="fa fa-edit"></i></a>
						<a class="btn btn-danger"  href="<?php echo base_url('cms/deleteCms/'.$value['cmsid']);?>" title="Delete" onclick="return confirm('Are you sure want to delete?')" style="padding: 0px 4px;" ><i class="fa fa-trash"></i></a> 
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

     $("#example1").DataTable();

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



                $.post('<?php echo base_url() ?>cms/ajax_getcmsstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {

                    if (data) {

                        $('.static_page_status_' + static_page_id).html(data);

                    }



                });

            }

        });
		});
  

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
                {"aTargets": [5], "bSortable": false}
            ]
	
	});
  });
  
  $(document).ready(function() {
        $(document).on('click', '.status_active', function() {
			row_id = $(this).attr('row_id');
            status = $(this).attr('status');
            if (status == '1') {
                var r = confirm("Are you sure you want to Activate");
            } else {
                var r = confirm("Are you sure you want to De-Activate");
            }
            if (r == true){
                $.ajax({
					url: '<?php echo base_url();?>category/updateStatus/',
					type: 'POST',
					datatype: 'json',
					data: {'row_id':row_id,'status':status},
					success: function(response){
						if(response){
						obj = JSON.parse(response);
						$('.row_status_'+row_id).html(obj.data);	
						}
					},
					error: function(){
					}
				});
            }
        });
	});

</script>

