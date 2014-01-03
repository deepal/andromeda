<!doctype html>
<?php
	session_start();
	require_once("config/portalconfig.php");
	if(!isset($_SESSION['user'])){
		header('location:login.php');	
	}
?>
<html>
	<head>
    	<title>Projects - Project Portal</title>
        <link href="css/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
        <link href="css/homepage-styles.css" media="screen" rel="stylesheet" type="text/css">
        <script src="js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </head>
    <body>
    
    	<div id="header-panel">
            <nav class="navbar navbar-default nav-panel-custom" role="navigation">
            	<a class="navbar-brand" href="">Project Portal</a> 
            	<form class="navbar-form navbar-right" action="logout.php">
	            	<div class="btn-group">
					  <button type="button" class="btn btn-default">
						<?php 
							if(isset($_SESSION['user'])){
								echo "Signed in as ".$_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];								
							}
							else{
								session_commit();
								header("location:login.php");							
							}
						?>
					  </button>
					  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <span class="glyphicon glyphicon-cog"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="#">Edit Profile</a></li>
					    <li><a href="#">Settings</a></li>
					    <li class="divider"></li>
					    <li><a href="logout.php">Sign out</a></li>
					  </ul>
					</div>
            	</form>      		

            </nav>
            
        </div>
        <div id="wrapper">
			<div id="sidebar">
        		sdfsdfs
	        </div>
		        
		    <div id="contents">
		        sdfsdfs
		    </div>
        </div>

        
        <div id="footer">
        
        </div>
        
    </body>
</html>