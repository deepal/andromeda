<!doctype html>
<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		$con = mysql_connect('localhost','root','','projectportal');
		$username = strip_tags(stripslashes(trim($_POST['username'])));
		$password = strip_tags(stripcslashes($_POST['password']));
		echo $username;
		echo "<br>".$password;
	}
?>
<html>
	<head>
    	<title>Login - Project Portal</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
    </head>
	<body>
    	<div id="login-box">
        	<div id="header">
            	<h2>Login to Project Portal</h2>
            </div>
            <div id="login-form">
            	<form id="loginform" method="post" onSubmit="return validate();" action="">
                	<div class="input-group">
                    	<span class="input-group-addon glyphicon glyphicon-user"></span>                  
                    	<input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group">
                    	<span class="input-group-addon glyphicon glyphicon-eye-open"></span>
                    	<input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="btn btn-xs">
                    	<input type="submit" value="Login"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
