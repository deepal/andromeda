<!doctype html>
<?php
	session_start();
	session_regenerate_id();
	define("MAX_NO_PER_PAGE",7);
	require_once("config/portalconfig.php");
	if(!isset($_SESSION['user'])){
		header('location:login.php');	
	}
?>
<html><!-- InstanceBegin template="/Templates/home.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->
<title>View Profile - Project Portal</title>
<!-- InstanceEndEditable -->

<link href="css/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/homepage-styles.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/toastr.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/bootstrap.icon-large.css" media="screen" rel="stylesheet" type="text/css">
<script src="js/bootstrap-tooltip.js" type="text/javascript"></script>
<script src="js/bootstrap-popover.js" type="text/javascript"></script>

<!--   <link href="css/tablesorter.css" media="screen" rel="stylesheet" type="text/css"> -->
<script src="js/jquery.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="js/jquery.tablesorter.js"></script> -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/alert.js"></script>
<script src="js/toastr.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body onLoad="document.getElementById('search-q').focus();">
<?php
        if(isset($_SESSION['add-project']) && $_SESSION['add-project']=="success"){
            echo "<script>toastr.success('Project Idea has been published successfully!','Success');</script>";
            unset($_SESSION['add-project']);	
        }
		
		if(isset($_SESSION['results']) && $_SESSION['results']=="none"){
			
			//disable sorting menu items since there is nothing to display or sort
			
            unset($_SESSION['results']);	
        }
    ?>

<!--these are notification panels-->

<div id="notification-div" class="hidden">
	<a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    
</div>

<div id="inbox-div" class="hidden">
	<a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
    <a href=""><p>notif</p></a>
</div>

<div class="profile-pop" class="hidden">

</div>

<script>
	$(document).ready(function(e) {
        $("#notifications").popover({
			placement:'bottom',
			html:true,
			trigger:'click',
			content:$("#notification-div").html()
		});
		
		$("#notifications").focusout(function(e) {
         	$("#notifications").popover("hide");  
		});
		
		$("#inbox-msg").focusout(function(e) {
         	$("#inbox-msg").popover("hide");   
		});

		
		$("#notifications").popover("hide");
		
		$("#notifications").click(function(event){
			$("#inbox-msg").popover('hide');/*
			if($("#notification-item").attr("class")=="active"){
				$("#notification-item").attr("class","");
			}
			else {
				$("#notification-item").attr("class","active");
				$("#inbox-item").attr("class","");
			}*/
			event.preventDefault();
		});
		
		$("#inbox-msg").popover({
			placement:'bottom',
			html:true,
			trigger:'click',
			content:$("#inbox-div").html()
		});
		
		$("#inbox-msg").popover("hide");
		
		$("#inbox-msg").click(function(event){
			$("#notifications").popover('hide');
			/*
			if($("#inbox-item").attr("class")=="active"){
				$("#inbox-item").attr("class","");
			}
			else {
				$("#inbox-item").attr("class","active");
				$("#notification-item").attr("class","");
			}*/
			
			event.preventDefault();
		});
		
    });
</script>

<!-- end of notification panels -->

<div id="header-panel">
  <nav class="navbar navbar-default navbar-fixed-top nav-panel-custom" role="navigation"> <a class="navbar-brand" href="home.php"><span><img src="images/logo.png"></span></a>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <ul class="nav nav-pills notifications">
          <li id="notification-item"><a id="notifications" href="" role="button">Notifications&nbsp;&nbsp;<span class="badge pull-right">5</span></span></a></li>
          <li id="inbox-item"><a id="inbox-msg" href="" role="button">Inbox&nbsp;&nbsp;<span class="badge pull-right">5</span></span></a></li>
        </ul>
      </li>
      <script>$('#notif').popover('hide')</script>
      <li class="dropdown">
        <form class="navbar-form" action="profile.php">
          <div class="btn-group">
            <button type="submit" class="btn btn-default"> &nbsp;&nbsp<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp
            <?php 
                                    if(isset($_SESSION['user'])){
                                        echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']."&nbsp;&nbsp";								
                                    }
                                    else{
                                        session_commit();
                                        header("location:login.php");							
                                    }
                                ?>
            </button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-cog"></span> <span class="sr-only">Toggle Dropdown</span> </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Settings</a></li>
              <li class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sign out</a></li>
            </ul>
          </div>
        </form>
      </li>
    </ul>
  </nav>
</div>
<div id="wrapper">
  <div class="row">
    <div id="sidebar" class="col-xs-6 col-sm-3 col-md-3 col-lg-2 sidebar-custom">
      <div class="well">
        <button type="button" class="btn btn-primary btn-block btn-dropdown" data-toggle="collapse" data-target="#home-link"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</button>
        <div id="home-link" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="index.php">News Feed</a></li>
            <li><a class="btn-dropdown-item" href="myhome.php">My Projects</a></li>
            <li><a class="btn-dropdown-item" href="viewarch.php">Archievements</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-success btn-block btn-dropdown" data-toggle="collapse" data-target="#projects"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Projects</button>
        <div id="projects" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="home.php">New Project Ideas</a></li>
            <li><a class="btn-dropdown-item" href="#">Ongoing Projects</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-warning btn-block btn-dropdown" data-toggle="collapse" data-target="#users-link"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;People</button>
        <div id="users-link" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="members.php">Members</a></li>
            <li><a class="btn-dropdown-item" href="#">Ask a question</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-info btn-block btn-dropdown custom-color" data-toggle="collapse" data-target="#resources"><span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;Resources</button>
        <div id="resources" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="#">Discussion forums</a></li>
            <li><a class="btn-dropdown-item" href="#">Sharing Center</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    
    
    <div id="project-listing" class="col-xs-12 col-sm-9 col-md-9 col-lg-10 contents-custom">
    
      <div id="control-panel">
        <div class="form-group suggestproject">
          <button class="btn btn-success "  data-toggle="modal" data-target="#projectidea"> <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Suggest a project idea </button>
        </div>
        
        
        
        
        
        <form class="form-inline searchform wide400px" method="get" role="form" action="home.php">
        	<div class="input-group">
              <input type="text" class="form-control wide400px" id="search-q" name="search-q" placeholder="Search Projects" value="<?php echo isset($_GET['search-q'])? $_GET['search-q']: "";?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-primary sortlist"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div><!-- /input-group -->  
        </form>
        
        <!-- InstanceBeginEditable name="content-header-panel" -->

        <!-- InstanceEndEditable -->
      </div>
    
	
	
    
      
      <div class="modal fade" id="projectidea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Suggest a Project Idea</h4>
            </div>
            <form role="form" method="post" action="addproject.php" onSubmit="return validate();">
              <div class="modal-body">
                <div class="form-group">
                  <label for="ptitle">Project Title</label>
                  <input class="form-control" type="text" id="ptitle" name="ptitle">
                </div>
                <div class="form-group">
                  <label for="pdesc">Description</label>
                  <textarea id="pdesc" name="pdesc" class="form-control" cols="20" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="pcatagory">Catagory</label>
                  <select id="pcatagory" class="form-control" name="pcatagory">
                    <option value="" disabled="disabled" selected="selected">Select catagory</option>
                    <?php
						require_once("config/dbcon.php");
						$dbcon = new DBConnection();
						$con = $dbcon->connect();
						$res = mysqli_query($con,"select * from catagories order by cat_name");
						while($row=$res->fetch_assoc()){
							echo "<option value=\"".$row['cat_id']."\">".$row['cat_name']."</option>";	
						}
					?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ptags">Tags(Seperate each with semicolons)</label>
                  <input class="form-control" type="text" id="ptags" name="ptags">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
      </div>
      <!-- /.modal -->
      
     
     
      <div id="projectlist" class="panel panel-default">
        <div class="panel-heading">
        	<!-- InstanceBeginEditable name="ContentPanelHeading" -->
          <h2 class="panel-title panel-title-custom">Project Portal Members</h2>
          <!-- InstanceEndEditable -->
        </div>
        <div class="panel-body panel-body-custom"> <span id="notice"></span>
        <!-- InstanceBeginEditable name="Main-body" -->
        	<div id="membersearch-div">
            	
            	<form id="member-search">
                	<div class="input-group">
                    		<input id="search-m" class="form-control" type="text" placeholder="Search members">
                        	<span class="input-group-btn"><button id="searchbtn" class="btn btn-info" type="submit" class="form-control">Go</button></span>
                    </div>
            	</form>
            </div>
            
            <script>
				$(document).ready(function(e) {
					$.ajax({
						type:"GET",
						url:"action/filter_members.php",
						success: function(data){
							$("#membersearch-results").html(data);
						}
					});
				});
			</script> 	
                 
            <div id="membersearch-results">
           		
            </div>
            
            
            <script>
				$(document).ready(function(e) {					
                    $("#search-m").keyup(function(event){
						var deepal = $("#search-m").val();
						$.ajax({
							type: "GET",
							url: "action/filter_members.php",
							data: { search : deepal  },
							success: function(data){
								$("#membersearch-results").html(data);
							}
						})
						event.preventDefault();
					});
					
					$("#member-search").submit(function(event){
						event.preventDefault();
					});
					
                });
			</script>   
		
      
      <!-- InstanceEndEditable --> 
      </div>
      
      
    </div>
  	
  </div>
</div>
<div id="footer"> </div>
</body>
<!-- InstanceEnd --></html>