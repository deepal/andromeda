<?php
	session_start();
	$user = $_SESSION['user'];
	require_once("../config/dbcon.php");
	$dbcon = new DBConnection();
	$con = $dbcon->connect();
	
	if(!$stmt=$con->prepare("insert into user_votes values (?,?)")){
		echo mysql_error($con);
	}
	if(!$stmt2=$con->prepare("update projects set p_votes=p_votes+1 where p_id = ? ")){
		echo mysqli_error($con);	
	}

	$stmt->bind_param('ii',$user['user_id'],$_SESSION['current_pid']);
	$stmt2->bind_param('i',$_SESSION['current_pid']);
	$stmt->execute();
	$stmt2->execute();
	echo 'done';
?>