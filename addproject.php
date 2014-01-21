
<?php
	session_start();
	session_regenerate_id();
	require_once("config/dbcon.php");

	if(!isset($_SESSION['login']) || $_SESSION['login']==false){
		require_once('logout.php');
	}

	$projecttitle = $_POST['ptitle'];
	$projectdesc = $_POST['pdesc'];
	$projectcatagory = (is_null($_POST['pcatagory']) || !isset($_POST['pcatagory']))?0:$_POST['pcatagory'];
	$projecttags = $_POST['ptags'];
	if($_SESSION['login-type']=='regular'){
		$projectauthor = $_SESSION['user']['user_id'];
	}
	else if($_SESSION['login-type']=='oauth'){
		if($_SESSION['login-provider']=='google'){
			
		}
	}
	
	$dbcon = new DBConnection();
	
	$con = $dbcon->connect();
	
	if(!$stmt = $con->prepare("INSERT INTO projects VALUES ('',?,?,?,?,'0','0',CURRENT_TIMESTAMP(),'0','0','0')")){
		die(mysqli_error($con));	
	}
	$stmt->bind_param('ssii',$projecttitle,$projectdesc,$projectcatagory,$projectauthor);
	$stmt->execute() or die(mysqli_error($con));
	
	$taglist = explode(";",$projecttags);
	
	$pidquery = "select max(p_id) as p_id from projects";
	$pidres = mysqli_query($con,$pidquery) or die(mysqli_error($con));
	if(mysqli_num_rows($pidres)==1){
		$row = $pidres->fetch_assoc();	
	}
	$prid = $row['p_id'];
	
	foreach($taglist as $tag){
		if(!$stmt = $con->prepare("INSERT INTO project_tags VALUES (?,?)")){
			die(mysqli_error($con));	
		}	
		$stmt->bind_param('is',$prid,$tag);
		$stmt->execute() or die(mysqli_error($con));
	}
	
	$_SESSION['add-project']="success";
	
	
	header("location:".$_SERVER['HTTP_REFERER']);
?>

