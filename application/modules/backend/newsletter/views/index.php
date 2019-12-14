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
        <?php echo lang('newsletter_list');?>
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
					<li class="active"><?php echo lang('newsletter_list');?></li>
					</ol>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Phone</th>
               
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($news_list)){ 
					$i=1;
					foreach($news_list as $value){?>
					<tr>
						<td><?php echo $value['email'];?></td>
						<td><?php echo $value['phone'];?></td>
 
						<td>
						<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "newsletter/deleteNewsletter/" . $value['id']; ?>" style="padding: 0px 4px;" data-original-title="Delete Newsletter" onclick="return confirm('Are you sure? you want to delete.')"><i class="fa fa-trash"></i></a> 
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
                $.post('<?php echo base_url() ?>newsletter/ajax_getnewslettersstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {
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
		bFilter: true,    	bInfo: false,
		bSortable: true,
		bRetrieve: true,
		aoColumnDefs: [
                {"aTargets": [0], "bSortable": true},
                {"aTargets": [1], "bSortable": true},
            ]
	});
  });
</script>