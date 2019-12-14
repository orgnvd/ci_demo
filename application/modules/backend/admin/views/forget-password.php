<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>The Alstone Visa | Log in</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/AdminLTE.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/blue.css">

	<style>

	.error{

		color: red;

	}

	</style>

	<script src="<?php echo base_url();?>public/admin/js/bootstrap.min.js"></script>

  

	<script src="<?php echo base_url();?>public/admin/js/jquery-1.9.1.js"></script>

	<script src="<?php echo base_url();?>public/admin/js/jquery.validate.js"></script>

	<script>

	$(document).ready(function() {

		$("#commentForm").validate({

			rules: {

				username: "required",

				password: "required"				

			},

			messages: {

				username: "Please enter your username",

				password: "Please enter your password"

			},

			

			submitHandler: function(form) {

			  form.submit();

			}

			

		});

	});

	 /* $.validator.setDefaults({

		submitHandler: function() {

			form.submit();

		}

	}); */ 

	</script>

	

</head>

<body class="hold-transition login-page" >

<div class="login-box">

  <div class="login-logo">

    <a href="<?php echo base_url('dashboard');?>">Al<b>stone</b></a>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Please Enter emall-id or username</p>



    <form id="commentForm"  action="<?php echo base_url('admin/forgot_pass');?>" method="post">

		  <div class="form-group has-feedback">

			<input type="text" class="form-control" name="forgot_pass" placeholder="Email">

			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

		  </div>
        <div class="col-xs-12">

		<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>
		  

     

    </form>
	</div>

	

</div>





</body>

</html>

