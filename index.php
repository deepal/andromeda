<!doctype html/>
<?php
	if(isset($_COOKIE['sessid'])){
		echo "You are signed in";
	}
	else{
		header("location:login.php");
	}
?>

<html>
	<head>
    	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="screen">
    </head>
</html>


