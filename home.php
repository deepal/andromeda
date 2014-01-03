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
            	<a class="navbar-brand logo-text" href="">Project Portal</a> 
            	<form class="navbar-form navbar-right" action="logout.php">
	            	<div class="btn-group">
					  <button type="button" class="btn btn-default">
						<?php 
							if(isset($_SESSION['user'])){
								echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];								
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
			<div class="row">
				<div id="sidebar" class="col-xs-6 col-sm-3 col-md-2 col-lg-2 sidebar-custom">
					<div class="well">
						<button type="button" class="btn btn-primary btn-block btn-dropdown" data-toggle="collapse" data-target="#home-link">Home</button>
						<div id="home-link" class="collapse in">
							<ul class="nav nav-pills nav-stacked list-group collapse-div">
								<li><a class="btn-dropdown-item" href="#">Profile</a></li>
								<li><a class="btn-dropdown-item" href="#">Messages</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-primary btn-block btn-dropdown" data-toggle="collapse" data-target="#users-link">Users</button>
						<div id="users-link" class="collapse in">
							<ul class="nav nav-pills nav-stacked list-group collapse-div">
								<li><a class="btn-dropdown-item" href="#">Profile</a></li>
								<li><a class="btn-dropdown-item" href="#">Messages</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-primary btn-block btn-dropdown" data-toggle="collapse" data-target="#projects">Projects</button>
						<div id="projects" class="collapse in">
							<ul class="nav nav-pills nav-stacked list-group collapse-div">
								<li><a class="btn-dropdown-item" href="#">Profile</a></li>
								<li><a class="btn-dropdown-item" href="#">Messages</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-primary btn-block btn-dropdown" data-toggle="collapse" data-target="#projects">Projects</button>
						<div id="projects" class="collapse in ">
							<ul class="nav nav-pills nav-stacked list-group collapse-div">
								<li><a class="btn-dropdown-item" href="#">Profile</a></li>
								<li><a class="btn-dropdown-item" href="#">Messages</a></li>
							</ul>
						</div>
					</div>
		        </div>
			        
			    <div id="project-listing" class="col-xs-12 col-sm-9 col-md-10 col-lg-10 contents-custom">
			    	<div id="control-panel">
			    		<div class="btn-group sortlist">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								Sort <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
			    		<form class="form-inline searchform" method="get" role="form" action="">
			    			<div class="form-group">
			    				<input type="text" class="form-control" name="search-q" placeholder="Search">
			    			</div>
			    			<div class="form-group">
			    				<button type="submit" class="btn btn-default">Go</button>
			    			</div>
			    		</form>
			    		
			    	</div>
			        <div id="projectlist" class="panel panel-default">
			        	<div class="panel-heading">
				        	<h2 class="panel-title panel-title-custom">Recent Project Ideas</h2>				        	
			        	</div>
			        	
			        	<div class="panel-body panel-body-custom">
			        		sdfsdf
			        	</div>
			        </div>
			    </div>
			</div>
        </div>
        
        <div id="footer">
        
        </div>
        
    </body>
</html>