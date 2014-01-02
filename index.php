<?php 

	session_start();
	echo session_id()."<br>";
	if(isset($_SESSION['user'])){
		print_r($_SESSION['user']);
	}
	else{
		echo "session variable not set";
	}
?>

<html>
	<head><title>Home</title></head>
	<body>
		<a href="<?php session_destroy();?>">Logout</a>
	</body>
</html>



