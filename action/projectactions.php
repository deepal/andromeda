
<?php

	session_start();
	session_regenerate_id();
	
	
	
	$action = (isset($_POST['action']) && !empty($_POST['action']))?$_POST['action']:'none';
	
	switch($action){
		case 'join' : joinProject();break;
		case 'follow' : followProject();break;
		case 'view' : viewProject();break;
		case 'leave' : leaveProjects();break;
		case 'unfollow' : unfollowProjects();break;
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
	
	function leaveProjects(){
		require_once("../config/dbcon.php");
		$projectlist = $_POST['projects'];
		$dbcon = new DBConnection();
		$userid = $_SESSION['user']['user_id'];
		$con = $dbcon->connect();
		$q = "DELETE FROM project_member WHERE p_id = ? and member_id = ?";
		foreach($projectlist as $projectid){
			if(!$stmt=$con->prepare($q)){
				die(mysqli_errno($con));
			}
			$stmt->bind_param("ii",$projectid,$userid);
			$stmt->execute();	
		}
		//now lets update the myprojects list
		$userid = $_SESSION['user']['user_id'];
		if(!$stmt = $con->prepare("select projects.p_id,p_name,p_desc from projects,project_member where project_member.member_id = ? and projects.p_id=project_member.p_id")){
			die(mysqli_error($con));	
		}
		$stmt->bind_param('i',$userid);
		$stmt->execute();
		$result = $stmt->get_result();
		
		while($row = $result->fetch_assoc()){
			echo "<a href='projecthome.php?pid=".$row['p_id']."'><li><label><input type='checkbox' name='chkproject' value='".$row['p_id']."'/></label>".$row['p_name']."</li></a>";
		}
	}
	
	function unfollowProjects(){
		require_once("../config/dbcon.php");
		$projectlist = $_POST['projects'];
		$dbcon = new DBConnection();
		$userid = $_SESSION['user']['user_id'];
		$con = $dbcon->connect();
		$q = "DELETE FROM project_follower WHERE p_id = ? and follower_id = ?";
		foreach($projectlist as $projectid){
			if(!$stmt=$con->prepare($q)){
				die(mysqli_errno($con));
			}
			$stmt->bind_param("ii",$projectid,$userid);
			$stmt->execute();	
		}
		//now lets update the myprojects list
		$userid = $_SESSION['user']['user_id'];
		if(!$stmt = $con->prepare("select projects.p_id,p_name,p_desc from projects,project_follower where project_follower.follower_id = ? and projects.p_id=project_follower.p_id")){
			die(mysqli_error($con));	
		}
		$stmt->bind_param('i',$userid);
		$stmt->execute();
		$result = $stmt->get_result();
		
		while($row = $result->fetch_assoc()){
			echo "<a href='projecthome.php?pid=".$row['p_id']."'><li><label><input type='checkbox' name='chkfproject' value='".$row['p_id']."'/></label>".$row['p_name']."</li></a>";
		}
	}
?>