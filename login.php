<!doctype html>
<?php

	session_start();
		class DBConnection2{
		private $con;
		private $userdata, $result;
		
		public function connect(){
			$this->con = new mysqli("localhost","root","","andromeda_db");
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
			$this->result = $stmt->get_result();
			return $this->result;
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
			
			return $timestamp;
		}
		
		public function getUserData($result){
			$userdata = $result->fetch_assoc();
			return $userdata;
		}
	}
	
	require_once 'config/portalconfig.php';
	require_once 'config/dbcon.php';
	require_once 'oauth/google/google-login.php';
	
	
	if(isset($_SESSION['login']) && $_SESSION['login']==true){
		header('location:home.php');
	}
	

	
	class Sessions{
		public static function setSessionState($userdata){
			unset($userdata['password']);
			unset($userdata['timestamp']);
			$_SESSION['user']=$userdata;
			$_SESSION['login']=true;
			$_SESSION['login-type']='regular';
		}
	}
	
	if(isset($_POST['username']) && isset($_POST['password']) && !isset($_SESSION['oauth_user'])){
		$dbcon = new DBConnection2();
		$dbcon->connect();
		$username= strip_tags(stripslashes(trim($_POST['username'])));
		$password = strip_tags(stripcslashes($_POST['password']));
		echo "<script>alert($username);</script>";
		$result = $dbcon->getUser($username,$password);
		if(mysqli_num_rows($result)==1){
			$user = $dbcon->getUserData($result);
			if(isset($user)){
				Sessions::setSessionState($user);
				session_commit();
				header("location:home.php");
			}
		}
		else if(mysqli_num_rows($result)==0){
			echo "Login error! Username or Password incorrect!";
		}
		else{
			die("Unknown Error occured!");
		}
	}

?>
<html>
	<head>
    	<title>Login - Andromeda</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/login-styles.css" rel="stylesheet" type="text/css">
        <script>
			
		</script>
    </head>
	<body>
            <div id="login-form">
            	<form id="login" method="post" action="" onSubmit="return validate();">
                    <h1><img src="images/logo.png"></h1>
                    <fieldset id="inputs">
                        <input id="username" name="username" type="text" placeholder="Username" autofocus required>   
                        <input id="password" name="password" type="password" placeholder="Password" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" id="submit" value="Login">
                        <a href="">Forgot your password?</a><a href="signup.php">Register</a>
                    </fieldset>
                    <table>
                    
                    
                        <tr><td><a href="<?php echo $authUrl;?>"><img src="images/social/google.png"></a></td><td><a href=""><img src="images/social/linkedin.png"></a></td></tr>
                        <tr><td><a href=""><img src="images/social/facebook.png"></a></td><td><a href=""><img src="images/social/twitter.png"></a></td></tr>     
                    </table>
                </form>
               	
            </div>
    </body>
</html>
