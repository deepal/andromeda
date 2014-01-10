<?php
	require_once("../config/dbcon.php");
	$db = new DBConnection();
	$cur = $db->connect();
	if(isset($_GET['search']) && $_GET['search']!=""){
		$search =$_GET['search'];
		if(!$st=$cur->prepare("select user_id,firstname,lastname,email,profile_pic_path from users where username like ? or firstname like ? or lastname like ? or email like ? and user_id != 0")){
			die("error");	
		}
		else{
			$su = "%$search%";
			$sf = "%$search%";
			$sl = "%$search%";
			$se = "%$search%";
			$st->bind_param('ssss',$su,$sf,$sl,$se) or die(mysqli_error($cur));
			$st->execute();
			$result = $st->get_result();
			$return_result = "";
			$n=0;
			while($row=$result->fetch_assoc()){
				echo "<div class='panel panel-success member-tile'><div class='panel-body'>";
				echo $row['firstname']." ".$row['lastname'];
				echo "</div></div>";
			}
		}
	}
	else{
		$result=mysqli_query($cur,"select user_id,firstname,lastname,email,profile_pic_path from users where user_id != 0");
		$return_result = "";
		while($row=$result->fetch_assoc()){
			echo "<div class='panel panel-success member-tile'><div class='panel-body'>";
			echo $row['firstname']." ".$row['lastname'];
			echo "</div></div>";
		}
		
	}
	
?>

    