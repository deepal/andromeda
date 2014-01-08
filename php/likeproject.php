<?php
	session_start();
	$user = $_SESSION['user'];
	require_once('../config/dbcon.php');
	$dbcon = new DBConnection();
	$con = $dbcon->connect();
	
	if($stmt=$con->prepare("insert into user_votes values (?,?); update projects set p_votes=p_votes+1 where p_id = ? ;")){
		echo 'failed';
	}
	else{
		$stmt->bind_param('iii',$user['user_id'],$_SESSION['current_pid'],$_SESSION['current_pid']);
		$stmt->execute();
		echo 'done';
	}
?>