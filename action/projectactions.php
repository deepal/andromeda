
<?php

	session_start();
	session_regenerate_id();
	
	
	
	$action = (isset($_GET['action']) && !empty($_GET['action']))?$_GET['action']:'none';
	
	switch($action){
		case 'join' : joinProject();break;
		case 'follow' : followProject();break;
		case 'view' : viewProject();break;
	}
	
	function viewProject(){
		require_once("../config/dbcon.php");
		$dbcon = new DBConnection();
		$con = $dbcon->connect() or die(mysqli_connect_error());
		
		$project_id = $_SESSION['current_pid'];
		if(!$stmt = $con->prepare("UPDATE projects SET p_views=p_views+1 WHERE p_id= ?")){
			echo "error".mysqli_error($con);
		}
		else{
			$stmt->bind_param("s",$project_id);
			$stmt->execute();
			echo "done";
		}
		
	}
	
	function joinProject(){
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
	
	function followProject(){
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