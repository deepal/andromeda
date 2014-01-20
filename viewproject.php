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
<title>Projects - Project Portal</title>

      
      <!-- /.modal --> 
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
	<p></p>
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
            <li><a class="btn-dropdown-item" href="myhome.php">My Home</a></li>
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
            <form role="form" method="post" action="addproject.php" onSubmit="alert(document.getElementById('pcatagory').value">
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
     
     
      <?php
            if(isset($_GET['pid'])){
				$pid = $_GET['pid'];
				$_SESSION['current_pid']=$pid;
			}
            require_once ('config/dbcon.php');
            $dbcon = new DBConnection();
            $con = $dbcon->connect();
            if(!$pstmt=$con->prepare('select p_name,p_desc,p_votes,p_views,user_id,firstname,lastname,email,cat_name from projects,users,catagories where projects.p_id= ? and projects.p_catagory=catagories.cat_id and projects.p_author=users.user_id')){
                    die(mysqli_error($con));
                }
			else{
				$pstmt->bind_param('i',$pid);
				$pstmt->execute();
				$presult = $pstmt->get_result();
				$precord = $presult->fetch_assoc();
			}
			$tquery = "select tag from project_tags where p_id='".$pid."'";
			$tresult =  mysqli_query($con,$tquery);
			$tagslist = array();
			while($tagrecord = $tresult->fetch_assoc()){
				array_push($tagslist,$tagrecord['tag']);	
			}

	  
	  ?>      
      
        <div id="projectlist" class="panel panel-default">
        <div class="panel-heading">
        	
          <h2 class="panel-title panel-title-custom">Project Details</h2>
         
        </div>
        
        <div class="panel-body panel-body-custom"> <span id="notice"></span>
          <div id="project-details" class="col-xs-12 col-sm-9 col-md-9 col-lg-10 contents-custom">
            <div id="project-header"> <?php echo $precord['p_name']?> </div>
            <div id="project-desc">
				<div style="clear:both;"><?php echo nl2br($precord['p_desc'])?></div> 
            	<div id="likebutton-div">
                	<?php echo "<button type='button' ";		 
						$q = "select * from user_votes where voted_project_id='".$_SESSION['current_pid']."' and user_id='".$_SESSION['user']['user_id']."'";
						$voteres = mysqli_query($con,$q) or die(mysqli_error($con));
						if(mysqli_num_rows($voteres)!=0){
							echo "disabled='disabled' class='btn btn-info likebutton' ";
						}
						else if ($_SESSION['user']['user_id']==$precord['user_id']){
							echo "disabled='disabled' class='btn btn-default likebutton' ";
						}
						else{
							echo "class='btn btn-info likebutton' ";
						}
                     	echo "id='like-project' ><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp;&nbsp;Vote project</button>";
					?>
                    
                </div>
                <script>
				
					(function($){
						$(document).ready(function(e) {
                            $.ajax({
								type:"GET",
								url:"action/projectactions.php",
								data:{action='view'},
								
								success: function(response){
									toastr.success(response,":)");
								}
								
							});
                        });
					})(jQuery);
					
					$(document).ready(function(e) {
						
						
						
                        $("#like-project").click(function(){
								
							$.post( "action/likeproject.php" );		
							$this = $(this);
							$this.attr("disabled", "disabled");
							toastr.info($("#project-header").text(),"You voted the project");
								
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
                
              <div id="project-author">
                <div id="profile-pic"><img src="images/profile-pics/user1.png" alt="Not found!" class="img-rounded img-custom"/></div>
                <div id="author-profile"> <span id="author-name"><?php echo "<a href='viewprofile.php?user=".$precord['user_id']."'>".$precord['firstname']." ".$precord['lastname']."</a>"?></span><br> <span id="author-email"><a href="mailto:someone@example.com" target="_top"><?php echo $precord['email'] ?></a></span></div>
              </div>
              
              
              
              
              
            </div>
          </div>
          <div id="project-actions">
          	<?php
            	if(!$stmt1=$con->prepare("select p_id,member_id from project_member where p_id=? and member_id=?")){
					die(mysqli_error($con));	
				}
				else{
					$stmt1->bind_param('ii',$pid,$_SESSION['user']['user_id']);
					$stmt1->execute();
					$joinres = $stmt1->get_result();	
				}
				
				if(!$stmt2=$con->prepare("select p_id,follower_id from project_follower where p_id=? and follower_id=?")){
					die(mysqli_error($con));	
				}
				else{
					$stmt2->bind_param('ii',$pid,$_SESSION['user']['user_id']);
					$stmt2->execute();
					$followres = $stmt2->get_result();	
				}
				
			?>
          	<ul class="nav nav-stacked">
                <li class="spaced-list"><button id="btn-join" 
                	<?php 
						if(mysqli_num_rows($joinres)!=0){
							echo "disabled='disabled' class='btn btn-block btn-default' ";
						}	
						else{
							echo "class='btn btn-block btn-danger' ";	
						}
					?>
                	class="btn  btn-danger" role="button"><span class="glyphicon glyphicon-plus-sign"></span>
						<?php 
							if(mysqli_num_rows($joinres)!=0){ 
								echo "&nbsp;&nbsp;Joined";
							}
							else
							{ 
								echo "&nbsp;&nbsp;Join Project";
							}
						?>
                        </button></li>
                        
                <li><button id="btn-follow" 
					<?php 
						if(mysqli_num_rows($followres)!=0){
							echo "disabled='disabled' class='btn btn-block btn-default' ";
						}
						else{
							echo "class='btn btn-block btn-danger' ";
						}
					?>
                    role="button"><span class="glyphicon glyphicon-bookmark"></span>
                    	<?php 
							if(mysqli_num_rows($followres)!=0){ 
								echo "&nbsp;&nbsp;Following";
							}
							else
							{ 
								echo "&nbsp;&nbsp;Follow";
							}
						?>
                    
                    </button></li>
            </ul>
          </div>
   			<!-- content of the follow/join popover-->
            
            <div id="join-confirmation" class="hidden">
                <span id="join-form" class="form-inline">
                	<p>Are you sure?</p>
                	<button id="join-yes" class="btn btn-success btn-xs">Yes</button>
               		<button id="join-no"  class="btn btn-danger btn-xs">No</button>
                </span>
            </div>
            
            <div id="follow-confirmation" class="hidden">
            	<span id="follow-form" class="form-inline">
                    <p>Are you sure?</p>
                    <button id="follow-yes" class="btn btn-success btn-xs">Yes</button>
                    <button id="follow-no" class="btn btn-danger btn-xs">No</button>
                </span>
            </div>
            
            <!-- -->
          <script>		 
		  		
				$(document).ready(function(e) {
					/*
					$("#btn-follow").popover({
						html:true,
						placement:'left',
						trigger:'click',
						container:'body',
						content:$("#follow-confirmation").html()
					});
					
					
					$("#btn-follow").popover("hide");
					
					$("#btn-join").popover({
						html:true,
						placement:'left',
						trigger:'click',
						container:'body',
						content:$("#join-confirmation").html()
						
					});
					
					$("#btn-join").popover("hide"); */
					
					
					$("#btn-join").click(function(e) {
						$.ajax({
							type:"GET",
							url:"action/projectactions.php",
							data:{action:"join"},
							
							success: function(response){
								toastr.success("<?php echo $precord['p_name']; ?>","You are now a member!");
								$("#btn-join").attr("disabled","disabled");
								$("#btn-join").popover("hide");
							}
						});
						event.preventDefault();
                    });
					
					$("#btn-follow").click(function(e) {
						$.ajax({
							type:"GET",
							url:"action/projectactions.php",
							data:{action:"follow"},
							
							success: function(response){
								toastr.success("<?php echo $precord['p_name']; ?>","You are now following !");
								$("#btn-follow").attr("disabled","disabled");
								$("#btn-follow").popover("hide");
							}
						});
						event.preventDefault();	
						
                    });
					
					
                });
				
		  </script>
        </div>
        
        </div>
      
          <!-- InstanceEndEditable --> 
      
    </div>
  	
  </div>
</div>
<div id="footer"> </div>
</body>
<!-- InstanceEnd --></html>