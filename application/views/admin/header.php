<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The Oman Visa | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/skins/_all-skins.min.css">
  
	<script src="<?php echo base_url();?>public/admin/js/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url();?>public/admin/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>public/admin/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/admin/js/ckeditor/ckeditor.js"></script>
<style type="text/css">
.log-drop{
	width:163px !important;
}

.user-footer{
	padding:0 !important;
}
.dropdown-menu>li>a {
    color: #367faa;
    padding: 8px 0px;
    text-align: center;
}

.dropdown-menu>li:hover a{
    background-color: #367faa;
    color: #fff;
}

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('dashboard');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-cc-visa"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
			<img src="<?php echo base_url();?>images/image/logo.png" />
	  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
			  <?php 
				$session = getuserDetailFromSession();
				if($session['s_loginStatus'] == 'true'){
					$name = $session['s_first_name']." ".$session['s_last_name'];
				}else{
					$name="";
				}
			  ?>
              <span class="hidden-xs">Welcome! <?php echo @$name;?></span>
            </a>
			<ul class="dropdown-menu log-drop">
              <!-- User image -->
              <!-- Menu Footer-->
              <li class="user-footer">
				<a href="<?php echo base_url('admin/logout');?>"><!--<i class="fa fa-circle-o text-aqua"></i>-->
				<span>Logout</span></a>
              </li>
			  
            </ul>
            
          </li>
		  <?php $lang = $this->session->userdata('site_lang');
		  
		  ?>
        </ul>
      </div>
    </nav>
  </header>
