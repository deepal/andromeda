<!doctype html>
<?php
	if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
		$email = strip_tags(stripslashes(trim($_POST['email'])));
		$firstname = strip_tags(stripslashes(trim($_POST['firstname'])));
		$lastname = strip_tags(stripslashes(trim($_POST['lastname'])));
		$pass1 = strip_tags(stripslashes(trim($_POST['pass1'])));
		$pass2 = strip_tags(stripslashes(trim($_POST['pass2'])));
		
		query = "insert into users values '$'"
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
    
    </head>
    <body>
    	<div id="signup-div">
        	<h2>Sign up for Project Portal</h2>
        	<form id="signup-form" method="post" action="" onSubmit="return validate();">
            	<table>
                	<tr>
                    	<td>Firstname</td><td><input type="text" name="firstname"/></td>
                    </tr>
                    <tr>
                    	<td>Last Name</td><td><input type="text" name="lastname"/></td>
                    </tr>
                    <tr>
                    	<td>Email</td><td><input type="text" name="email"/></td>
                    </tr>
                    <tr>
                    	<td>Password</td><td><input type="text" name="pass1"/></td>
                    </tr>
                    <tr>
                    	<td>Retype Password</td><td><input type="password" name="pass2"/></td><br>
                    </tr>
                    <tr>
                    	<td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>