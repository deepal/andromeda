<?php
	
	define('ROOT','');
	
	$homepage = "myhome.php";
	
	function redirectTo($page){
		session_commit();
		header("location:$page");
	}
?>