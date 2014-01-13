<?php

	session_start();
	session_regenerate_id();
	echo "cu:".$current_user;
	echo "pi:".$project_id;
	echo "action:".$action;
	
	
	
	$action = (isset($_GET['action']) && !empty($_GET['action']))?$_GET['action']:'none';
	
	switch($action){
		case 'join' : joinProject($project_id);break;
		case 'follow' : followProject($project_id);break;
	}
	
	function joinProject($project_id){
		$current_user = $_SESSION['user']['user_id'];
		$project_id = $_SESSION['current_pid'];
		require_once("../config/dbcon.php");
		$dbcon = new DBConnection();
		$con = $dbcon->connect(); 
		if(!$stmt = $con->prepare("insert into project_member (p_id,member_id) select ?,? from (select 1) t where not exists (select * from project_member where p_id=? and member_id=?)")){
			echo mysqli_error($con);
		}
		else{
			$stmt->bind_param('iiii',$project_id,$current_user,$project_id,$current_user);
			$stmt->execute();
			echo 'join succeed';
		}
	}
	
	function followProject($project_id){
		$current_user = $_SESSION['user']['user_id'];
		$project_id = $_SESSION['current_pid'];
		require_once("../config/dbcon.php");
		$dbcon = new DBConnection();
		$con = $dbcon->connect(); 
		if(!$stmt = $con->prepare("insert into project_follower (p_id,follower_id) select ?,? from (select 1) t where not exists (select * from project_follower where p_id=? and follower_id=?)")){
			echo mysqli_error($con);
		}
		else{
			$stmt->bind_param('iiii',$project_id,$current_user,$project_id,$current_user);
			$stmt->execute();
			echo 'follow succeed';	
		}
	}
?>