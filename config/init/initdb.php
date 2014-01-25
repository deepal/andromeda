<?php
	$file = "andromeda_db.sql";
	$query = "";
	$dbfile = fopen($file,"r");
	if(file_exists($file) && filesize($file)){
		while(!feof($dbfile)){
			$query = $query.fgets($dbfile);	
		}
	}
	else{
		echo "Database file does not exists or is empty !";	
	}
	
	require_once("../dbcon.php");
	$dbcon = new DBConnection();
	$con = $dbcon->connect();
	
	$query = "CREATE DATABASE andromeda_test;".$query;
	
	if(!mysqli_query($con,$query)){
		die(mysqli_error($con));	
	}
	
	echo "Success";
	
	
	
?>