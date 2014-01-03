<?php 
	setcookie("PHPSESSID","",time()-3600,"/");
	session_destroy();
	header("location:login.php");
?>