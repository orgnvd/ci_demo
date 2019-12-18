 <?php 
	$session = getuserDetailFromSession();
	
	//pr($session); die;
	if($session['s_loginStatus'] == 'true'){
		$name = $session['s_first_name']." ".$session['s_last_name'];
	}else{
		$name="";
	}
	
	$accessRoleID = $session['s_user_role'];
	?>
 
 <script>
 $(document).ready(function()
{
	var url = window.location.href;
	var link = url.split('/').slice(-1);
	$('.treeview-menu li').find('a[href$="'+link+'"]').parent('li').addClass('current');
});
 $(function(){
	$('.treeview-menu').find('.current').parent().css('display','block');
 })
 </script>
 
<style>
.skin-blue .treeview-menu>li.current>a{
    color: #fff;
}
</style>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <div class="user-panel">

      </div>
      <?php if($accessRoleID ==2){ ?> 
	  <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
	 </ul>
	  <?php } else if($accessRoleID == 3){ ?> 
	 <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
	</ul>
	 
	 <?php } else{ ?>
      <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Country</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li>
				<a href="<?php echo base_url('location');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Country";?>
				</a>
			</li>
		   </ul>
        </li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="display: none;"> 
              <li><a href="<?php echo base_url('cms');?>"><i class="fa fa-table"></i> All Pages</a></li>
               <li><a href="<?php echo base_url('cms/addCms');?>"><i class="fa fa-plus-square-o"></i> Add New Page</a></li>
            </ul>
         </li>
		<!--<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage User Role</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
		<li><a href="<?php echo base_url('users');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Manage Users";?></a></li>
		</ul>
        </li>-->
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Testimonials</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('testimonials');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Testimonials";?></a></li>
		  </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Contact Forms</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('contactforms');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Call Back";?></a></li>
			<li><a href="<?php echo base_url('contactforms/contact');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Contact";?></a></li>
		  </ul>
        </li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dashboard/add'); ?>"><i class="fa fa-circle-o"></i> General</a></li>
            </ul>
         </li>
      </ul>
	  <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>