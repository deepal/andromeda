<!doctype html>
<?php
			if(isset($_POST['username']) && isset($_POST['password']) && !isset($_COOKIE['sessid'])){
				$con = mysql_connect('localhost','root','','projectportal');
				$username = strip_tags(stripslashes(trim($_POST['username'])));
				$password = strip_tags(stripcslashes($_POST['password']));
				
				setcookie("sessid","1",time()+60*60*24,"/");
				header("location:index.php");
			}
			else{
				header("location:index.php");	
			}
?>
<html>
	<head>
    	<title>Login - Project Portal</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/login-styles.css" rel="stylesheet" type="text/css">
        
    </head>
	<body>
            <div id="login-form">
            	<form id="login" method="post" action="" onSubmit="return validate();">
                    <h1>Project Portal</h1>
                    <fieldset id="inputs">
                        <input id="username" name="username" type="text" placeholder="Username" autofocus required>   
                        <input id="password" name="password" type="password" placeholder="Password" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" id="submit" value="Login">
                        <a href="">Forgot your password?</a><a href="signup.php">Register</a>
                    </fieldset>
                </form>
            </div>
    </body>
</html>
