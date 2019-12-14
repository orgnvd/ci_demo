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
        <?php echo 'Manage Contact Forms';?>
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
					<li class="active"><?php echo 'Contact Forms manage';?></li>
					
			 
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					 
					  <th><?php echo lang('ca_name');?></th>
					  <th><?php echo 'Email';?></th>
					  <th><?php echo 'Phone';?></th>
 
					  <th><?php echo 'Message';?></th>
					  <th><?php echo 'Date';?></th>
					  <th><?php echo lang('action');?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(!empty($resultset)){
						//$value = $resultset['list'];
						foreach($resultset as $value){
					?>

						<tr>
							
							<td><?php echo @$value['name'];?></td>
							<td><?php echo @$value['email'];?></td>
							<td><?php echo @$value['phone'];?></td>
	 
							<td><?php echo @$value['message'];?></td>
							<td><?php echo @$value['created_date'];?></td>
							<td>
							<a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "contactforms/cedit/" . $value['id']; ?>" style="padding: 0px 4px;" data-original-title="View Contact"><i class="fa fa-edit"></i></a>  
							<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url() . "contactforms/deletetecontact/" . $value['id']; ?>" style="padding: 0px 4px;" data-original-title="Delete Cms" onclick="return confirm('Are you sure? you want to delete.')"><i class="fa fa-trash"></i></a> 
													
							</td>
						</tr>
					<?php }
					
					}?>
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
  <!-- /.content-wrapper =====================-->

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
                {"aTargets": [0], "bSortable": false},
                {"aTargets": [3], "bSortable": false},
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
					url: '<?php echo base_url();?>users/updateStatus/',
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