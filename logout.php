<?php 
	session_start();
	
	if(isset($_SESSION['login-provider']) && $_SESSION['login-provider']=='google'){
		header("location:oauth/google/google-login.php?logout");
	}
	$_SESSION = array();
	setcookie("PHPSESSID","",time()-3600,"/");
	session_destroy();
	header("location:login.php");
?>