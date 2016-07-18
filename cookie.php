<?php
define('EMAIL','rtandukar@gmail.com');
define('PASSWORD','rajesh');

if( isset($_COOKIE['remember']) && $_COOKIE['remember'] ==1){
		$_SESSION['islogin'] = true;
		$_SESSION['userinfo']= array('email' => EMAIL);
		
	}