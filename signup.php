<!doctype html>
<?php
	function validatePassword($pass1,$pass2){
		if($pass1==$pass2){
			$pass1 = md5($pass1.time());
			return $pass1;	
		}
		else{
			return false;	
		}
	}
	
	if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['username'])){
		$email = strip_tags(stripslashes(trim($_POST['email'])));
		$firstname = strip_tags(stripslashes(trim($_POST['firstname'])));
		$lastname = strip_tags(stripslashes(trim($_POST['lastname'])));
		$pass1 = strip_tags(stripslashes(trim($_POST['password1'])));
		$pass2 = strip_tags(stripslashes(trim($_POST['password2'])));
		$username = strip_tags(stripslashes(trim($_POST['username'])));

		$con = mysqli_connect("localhost","root","","projectportal-bootstrap") or die("could not connect!");
		$pass1 = validatePassword($pass1,$pass2);
		if($pass1 != false){
			$str = "insert into users values ('','$username','$pass1','$firstname','$lastname','$email','".time()."')";
			echo $str;
			if(!mysqli_query($con,$str)){
				header("location:error.php");
			}
			else{
				mysqli_close($con);
				header("location:login.php");
			}
		}
		else{
			echo "<script>alert(\"Passwords do not match !!\")</script>";
		}
		
	}
	else{
		echo "All fields need to be filled!";
	}
	
	
?>
<html>
	<head><title>Sign up</title>
    	<script type="text/javascript">
			function validate(){
				var email = document.forms['email'].value;
				var password1 = document.forms['pass1'].value;
				var password2 = document.forms['pass2'].value;
				var firstname = document.forms['firstname'].value;
				var lastname = document.forms['lastname'].value;
				
				if(email==null || password1==null || password2 == null || firstname == null || lastname == null){
					alert("All fields required to be filled !");
					return false;
				}
				return true;
			}
		</script>
    	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/signup-styles.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
    	<div id="signup-div">
        	<div id="header-line"><h3>Learn by doing...Let's Sign up!</h3>
        	</div>
			<form id="signup-form" method="post" action="" onSubmit="return validate();">
            	<div class="form-group input-style">
                  <label for="username">Username</label>
                  <input name="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group input-style">
                  <label for="password1">Password</label>
                  <input name="password1" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group input-style">
                  <label for="password2">Retype Password</label>
                  <input name="password2" type="password" class="form-control" placeholder="Retype Password">
                </div>
                <div class="form-group input-style">
                  <label for="firstname">First name</label>
                  <input name="firstname" type="text" class="form-control" placeholder="Firstname">
                </div>
                <div class="form-group input-style">
                  <label for="lastname">Last name</label>
                  <input name="lastname" type="text" class="form-control" placeholder="Lastname">
                </div>
                <div class="form-group input-style">
                  <label for="email">CSE Email address</label>
                  <input name="email" type="text" class="form-control" placeholder="Email">
				</div>
				<button class="btn btn-info btn-lg" type="submit">Sign up</button>
            </form>
        </div>
    </body>
</html>