<?php
if($_SERVER['HTTP_HOST']=='192.168.1.4'){
	return (object)array(
			'database'=>(object)array(
				'hostname'=>'localhost',
				'database'=>'db_omanvisa',
				'username'=>'phpdbusr',
				'password'=>'$76hYts8'
				));
	
}else if($_SERVER['HTTP_HOST']=='staging.csipl.net'){
	return (object)array(
			'database'=>(object)array(
				'hostname'=>'localhost',
				'database'=>'stagingc_instadubai',
				'username'=>'stagingc_dbuser',
				'password'=>'123456'
				));
}else{
	return (object)array(
		'database'=>(object)array(
		'hostname'=>'localhost',
		'database'=>'dubaivis_main',
		'username'=>'dubaivis_main',
		'password'=>'7JQn!u_MP%ZE '
	));
	
	
}



