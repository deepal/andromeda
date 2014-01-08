<!doctype html>
<?php
	session_start();
	define("MAX_NO_PER_PAGE",7);
	require_once("config/portalconfig.php");
	if(!isset($_SESSION['user'])){
		header('location:login.php');	
	}
	
?>
<html><!-- InstanceBegin template="/Templates/home.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Projects - Project Portal</title>

      
      <!-- /.modal --> 
      <!-- InstanceEndEditable -->

<link href="css/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/homepage-styles.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/toastr.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/bootstrap.icon-large.css" media="screen" rel="stylesheet" type="text/css">
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
    
    
<div id="header-panel">
  <nav class="navbar navbar-default navbar-fixed-top nav-panel-custom" role="navigation"> <a class="navbar-brand" href="home.php"><span>PROJECT PORTAL</span></a>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <ul class="nav nav-pills notifications">
          <li class="dropdown-toggle" data-toggle="dropdown"><a href=""><span id="notif" class="glyphicon glyphicon-bell"><span class="badge">5</span></span></a></li>
          <div class="dropdown-menu pull-left " role="menu">
            <div class="panel panel-default">
              <div class="panel-body"> Panel content </div>
              <div class="panel-footer">Panel footer</div>
            </div>
          </div>
          <li class="dropdown-toggle" data-toggle="dropdown"><a href=""><span class="glyphicon glyphicon-inbox"><span class="badge">5</span></span></a></li>
          <div class="dropdown-menu pull-left" role="menu"> <a href="#">Hover over me</a> </div>
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
            <li><a class="btn-dropdown-item" href="#">Members</a></li>
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
              <input type="text" class="form-control wide400px" id="search-q" name="search-q" placeholder="Search" value="<?php echo isset($_GET['search-q'])? $_GET['search-q']: "";?>">
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
      <!-- InstanceBeginEditable name="Main-body" -->
      <div id="projectdetails" class="panel panel-default">
      <?php
            if(isset($_GET['pid'])){
				$pid = $_GET['pid'];
				$_SESSION['current_pid']=$pid;
			}
			else{
				
			}
            require_once ('config/dbcon.php');
            $dbcon = new DBConnection();
            $con = $dbcon->connect();
            if(!$pstmt=$con->prepare('select p_name,p_desc,p_votes,p_views,user_id,firstname,lastname,email,cat_name,tag from projects,users,catagories,project_tags where projects.p_id= ? and projects.p_catagory=catagories.cat_id and projects.p_id=project_tags.p_id and projects.p_author=users.user_id')){
                    die(mysqli_error($con));
                }
                else{
                        $pstmt->bind_param('s',$pid);
                        $pstmt->execute();
                        $presult = $pstmt->get_result();
                        $precord = $presult->fetch_assoc();
                }
				$tagslist = array();
				while($tagrecord = $presult->fetch_assoc()){
					array_push($tagslist,$tagrecord['tag']);	
				}

	  
	  ?>
        <div class="panel-heading">
          <h2 class="panel-title panel-title-custom">Project details</h2>
        </div>
        <div class="panel-body panel-body-custom"> <span id="notice"></span>
          <div id="project-details" class="col-xs-12 col-sm-9 col-md-9 col-lg-10 contents-custom">
            <div id="project-header"> <?php echo $precord['p_name']?> </div>
            <div id="project-desc"> 
			
				<div style="clear:both;"><?php echo nl2br($precord['p_desc'])?></div> 
            	<div id="likebutton-div">
                	<?php echo "<button type='button' ";
                    	
						 
							$q = "select * from user_votes where user_id='".$_SESSION['user']['user_id']."'";
							echo "";
							$voteres = mysqli_query($con,$q) or die(mysqli_error($con));
							if(mysqli_num_rows($voteres)!=0){
								echo "disabled='disabled'";
							}
							
						
                        
                     echo "id='like-project' class='btn btn-info likebutton'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp;&nbsp;Like this project</button>";
					 ?>
                </div>
                <script>
					$(document).ready(function(e) {
                        $("#like-project").click(function(){
							$.post( "php/likeproject.php" );		
							$this = $(this);
							$this.val("<span class='glyphicon glyphicon-thumbs-up'></span>&nbsp;&nbsp;Liked");
							$this.attr("disabled", "disabled");
							
						});
                    });
				</script>
            </div>
            
            <div id="project-footer">
              <div id="project-info"> <span id="p-catagory"><span>Catagory : </span><?php echo $precord['cat_name']?></span> <span id="p-tags"><br><span>Tags : </span>
                <?php 
                                $tagcount = count($tagslist);
                                foreach($tagslist as $index => $tag){
                                    echo "<a href='home.php?search-q=".urlencode(stripslashes(strip_tags($tag)))."'>".$tag."</a>";
                                    if($index+1 != $tagcount){
                                        echo ", ";
                                    }
                                }
                            
                            ?>
                </span> </div>
                <span style="font-weight:bold;">Suggested by:</span>
              <div id="project-author">
                <div id="profile-pic"><img src="images/user.jpg" alt="Not found!" class="img-rounded img-custom"/></div>
                <div id="author-profile"> <span id="author-name"><?php echo "<a href='viewprofile.php?user=".$precord['user_id']."'>".$precord['firstname']." ".$precord['lastname']."</a>"?></span><br> <span id="author-email"><a href="mailto:someone@example.com" target="_top"><?php echo $precord['email'] ?></a></span> </div>
              </div>
            </div>
          </div>
          <div id="project-actions">
          
          	<ul class="nav nav-stacked">
                <li class="spaced-list"><button class="btn  btn-danger"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Join Project</button></li>
                <li><button class="btn btn-block btn-danger"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;Follow</button></li>
            </ul>
          </div>
          
          	
          
        </div>
      </div>
      <!-- InstanceEndEditable --> 
    </div>
  	
  </div>
</div>
<div id="footer"> </div>
</body>
<!-- InstanceEnd --></html>