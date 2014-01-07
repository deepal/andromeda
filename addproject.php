
<?php
	session_start();
	require_once("config/dbcon.php");

	$projecttitle = $_POST['ptitle'];
	$projectdesc = $_POST['pdesc'];
	$projectcatagory = $_POST['pcatagory'];
	$projecttags = $_POST['ptags'];
	$projectauthor = $_SESSION['user']['user_id'];
	
	
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
	
	
	header("location:home.php");
?>

