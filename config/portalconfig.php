<?php
	
	define('ROOT','');
	
	function redirectTo($page){
		session_commit();
		header("location:$page");
	}
?>