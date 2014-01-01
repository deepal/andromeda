<!doctype html>
<?php
	class DBConnection{
		private $con;
		
		public function connect(){
			$this->con = new mysqli("localhost","root","","projectportal-bootstrap");
			if(!$this->con){
				die("Could not connect to database ! Error no.".mysqli_errno($this->con));	
			}
		}
		
		public function getUser($username, $password){
			$con = $this->con;
			$timestamp = $this->getUserTimestamp($username);
			echo $timestamp;
			$hashpass = md5($password.$timestamp);
			if(!$stmt = $con->prepare('SELECT * FROM users WHERE username = ? AND password = ?')){
				echo "Error";	
			}
			$stmt->bind_param('ss',$username,$hashpass);
			$stmt->execute();
			
			return $stmt->get_result();
		}
		
		private function getUserTimestamp($username){
			$con = $this->con;
			if(!$stmt = $con->prepare('SELECT timestamp FROM users WHERE username = ?')){
				echo "Error";	
			}
			$stmt->bind_param('s',$username);
			$stmt->execute();
			
			$res=$stmt->get_result();
			$timestamp="";
			while($row=$res->fetch_assoc()){
				$timestamp = $row['timestamp'];
				break;
			}
			
			#echo $timestamp;
			return $timestamp;
		}

	}
	if(isset($_POST['username']) && isset($_POST['password'])){
		$dbcon = new DBConnection();
		$dbcon->connect();
		#$username = $_POST['username'];
		$username= strip_tags(stripslashes(trim($_POST['username'])));
		#$password = $_POST['password'];
		$password = strip_tags(stripcslashes($_POST['password']));
		echo "<script>alert($username);</script>";
		$result = $dbcon->getUser($username,$password);
		while ($row = $result->fetch_assoc()) {
			#echo "DOne!";
			#setcookie("sessid","1",time()+60*60*24,"/");
			session_start();
			header("location:index.php");
		}
	
	}

?>
<html>
	<head>
    	<title>Login - Project Portal</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/login-styles.css" rel="stylesheet" type="text/css">
        <script>
			
		</script>
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
