<!doctype html>
<?php
	session_start();
	
	session_regenerate_id();
	define("MAX_NO_PER_PAGE",7);
	require_once("../config/portalconfig.php");
	if(!isset($_SESSION['user'])){
		header('location:login.php');	
	}
?>
<html>
<head>

<!-- TemplateBeginEditable name="doctitle" -->
<title>Projects - Project Portal</title>
<!-- TemplateEndEditable -->

<link href="../css/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<link href="../css/homepage-styles.css" media="screen" rel="stylesheet" type="text/css">
<link href="../css/toastr.css" media="screen" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.icon-large.css" media="screen" rel="stylesheet" type="text/css">
<script src="../js/bootstrap-tooltip.js" type="text/javascript"></script>
<script src="../js/bootstrap-popover.js" type="text/javascript"></script>

<!--   <link href="css/tablesorter.css" media="screen" rel="stylesheet" type="text/css"> -->
<script src="../js/jquery.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="js/jquery.tablesorter.js"></script> -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/alert.js"></script>
<script src="../js/toastr.js" type="text/javascript"></script>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
  <nav class="navbar navbar-default navbar-fixed-top nav-panel-custom" role="navigation"> <a class="navbar-brand" href="../home.php"><span><img src="../images/logo.png"></span></a>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <ul class="nav nav-pills notifications">
          <li id="notification-item"><a id="notifications" href="" role="button">Notifications&nbsp;&nbsp;<span class="badge pull-right">5</span></span></a></li>
          <li id="inbox-item"><a id="inbox-msg" href="" role="button">Inbox&nbsp;&nbsp;<span class="badge pull-right">5</span></span></a></li>
        </ul>
      </li>
      <script>$('#notif').popover('hide')</script>
      <li class="dropdown">
        <form class="navbar-form" action="../profile.php">
          <div class="btn-group">
            <button type="submit" class="btn btn-default"> &nbsp;&nbsp<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp
            <?php 
                                    if(isset($_SESSION['login-type'])){
                                    	if($_SESSION['login-type']=='regular'){
											echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];
										}
										else if($_SESSION['login-type']=='oauth'){
											echo $_SESSION['oauth_user']['name'];
										}
									}
									else{
										require_once('logout.php');	
									}
                                ?>
            </button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-cog"></span> <span class="sr-only">Toggle Dropdown</span> </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Settings</a></li>
              <li class="divider"></li>
              <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sign out</a></li>
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
            <li><a class="btn-dropdown-item" href="../index.php">News Feed</a></li>
            <li><a class="btn-dropdown-item" href="../myhome.php">My Home</a></li>
            <li><a class="btn-dropdown-item" href="../viewarch.php">Archievements</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-success btn-block btn-dropdown" data-toggle="collapse" data-target="#projects"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Projects</button>
        <div id="projects" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="../home.php">New Project Ideas</a></li>
            <li><a class="btn-dropdown-item" href="#">Ongoing Projects</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-warning btn-block btn-dropdown" data-toggle="collapse" data-target="#users-link"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;People</button>
        <div id="users-link" class="collapse in">
          <ul class="nav nav-pills nav-stacked list-group collapse-div">
            <li><a class="btn-dropdown-item" href="../members.php">Members</a></li>
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
        
        
        
        
        
        <form class="form-inline searchform wide400px" method="get" role="form" action="../home.php">
        	<div class="input-group">
              <input type="text" class="form-control wide400px" id="search-q" name="search-q" placeholder="Search Projects" value="<?php echo isset($_GET['search-q'])? $_GET['search-q']: "";?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-primary sortlist"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div><!-- /input-group -->  
        </form>
        
        <!-- TemplateBeginEditable name="content-header-panel" -->
        <div class="btn-group sortlist">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-sort"></span>&nbsp;&nbsp;Sort&nbsp;&nbsp;<span class="caret"></span> </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <?php 
				
				if(!isset($_GET['sort'])){
					$_GET['sort']='mr';	
				}
			
				$params="";
				foreach ($_GET as $var=>$val){
					if ($var == 'sort'){
						$val='mr';
					}
					$params=$params.$var."=".$val."&&";
				}	
				echo "<li id='sort1'><a href='".$_SERVER['PHP_SELF']."?".$params."'><span class='glyphicon glyphicon-fire'></span>&nbsp;&nbsp;Most recent</a></li>";
			
				
				
				$params="";
				foreach ($_GET as $var=>$val){
						if ($var == 'sort') {
							$val='tr';
						}
						$params=$params.$var."=".$val."&&";
				}
				echo "<li id='sort2'><a href='".$_SERVER['PHP_SELF']."?".$params."'><span class='glyphicon glyphicon-star'></span>&nbsp;&nbsp;Top rated</a></li>";
				
				
				
				$params="";
				foreach ($_GET as $var=>$val){
					if ($var == 'sort') {
						$val='mv';
					}
					$params=$params.$var."=".$val."&&";
				}
				echo "<li id='sort3'><a href='".$_SERVER['PHP_SELF']."?".$params."'><span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;Most Viewed</a></li>";
              
              ?>
          </ul>
        </div>
        <!-- TemplateEndEditable -->
      </div>
    
	
	
    
      
      <div class="modal fade" id="projectidea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Suggest a Project Idea</h4>
            </div>
            <form role="form" method="post" action="../addproject.php" onSubmit="alert(document.getElementById('pcatagory').value">
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
						require_once("../config/dbcon.php");
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
      
     
     <!-- TemplateBeginEditable name="Main-body" -->
      <div id="projectlist" class="panel panel-default">
        <div class="panel-heading">
        	
          <h2 class="panel-title panel-title-custom">Recent Project Ideas</h2>
         
        </div>
        <div class="panel-body panel-body-custom"> <span id="notice"></span>
        
          <table id="projects-table" class="table-responsive" cellspacing='0'>
            <!-- cellspacing='0' is important, must stay --> 
            	<!-- test -->
            <!-- Table Header -->
            <thead>
              <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Catagory</th>
                <th>Tags</th>
                <th>Author</th>
                <th>Date</th>
              </tr>
            </thead>
            <!-- Table Header --> 
            
            <!-- Table Body -->
            <tbody>
              <?php
					#$no=1;
					if(isset($_GET['search-q'])){
						$sq = strip_tags(stripslashes(trim($_GET['search-q'])));
						if(isset($_GET['sort'])){
							if ($_GET['sort']=='mr') {
								if($sq!=""){
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author and p_name like ? union select projects.p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,project_tags,catagories,users where p_catagory=cat_id and user_id=p_author and projects.p_id=project_tags.p_id and tag = ? order by p_post_date desc";
								}
								else{
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_post_date desc";
								
								}
							}
							
							if ($_GET['sort']=='tr') {
								if($sq!=""){
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author and p_name like ? union select projects.p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,project_tags,catagories,users where p_catagory=cat_id and user_id=p_author and projects.p_id=project_tags.p_id and tag= ? order by p_votes desc";
								}
								else{
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_votes desc";
							
								}
							}
							
							if ($_GET['sort']=='mv') {
								if($sq!=""){
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author and p_name like ? union select projects.p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,project_tags,catagories,users where p_catagory=cat_id and user_id=p_author and projects.p_id=project_tags.p_id and tag= ? order by p_views desc";
								}
								else{
									$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_views desc";
							
								}
							}
							
						}
/*						else{
							if($sq!=""){
								$query = "77777777777777select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author and p_name like '%".$sq."%' union select projects.p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,project_tags,catagories,users where p_catagory=cat_id and user_id=p_author and projects.p_id=project_tags.p_id and tag='".$sq."' order by p_post_date desc";
							}
							else{
								$query = "888888888888select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_post_date desc";
							
							}
						}*/
						
						
					}
					else{
						
						if(isset($_GET['sort'])){
							
							if ($_GET['sort']=='mr') {
								$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_post_date desc";
									
								}
								
							if ($_GET['sort']=='tr') {
								$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_votes desc";
								
								}
								
							if ($_GET['sort']=='mv') {
								$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_views desc";
								
								}	
						}
						else{
							$query = "select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date,p_votes,p_views from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_post_date desc";
								
						}
						
						
						//$query = "14141414141414select p_id,p_desc,p_name,cat_name,firstname,lastname,p_post_date from projects,catagories,users where p_catagory=cat_id and user_id=p_author order by p_post_date desc";	
					}
					
						
						if(strpos($query,'?')!=false){
							if(!$stmt=$con->prepare($query)){
								die("Error occured : ".mysqli_error());
							}
							else{
								$sq1='%'.$sq.'%';
								$stmt->bind_param('ss',$sq1,$sq) or die("EEEEEE: ".mysqli_error($con));
								
								$pres = $stmt->execute();
								$pres=$stmt->get_result();
							}
						}
						else{
							$pres = mysqli_query($con,$query) or die(mysqli_error($con));
						}
					
						
						
					
					$rowcount = mysqli_num_rows($pres);
					//$_GET['page']=2;
					if(mysqli_num_rows($pres)!=0){
						if(isset($_GET['search-q']) && $_GET['search-q'] != ""){
							echo "<script>foundresults($rowcount);</script>";	
						}
						$row_offset=0;
						if(!isset($_GET['page'])){
							$_GET['page']=1;	
						}
						if(isset($_GET['page'])){
							$pageno=$_GET['page'];
							$row_offset=($pageno-1)*MAX_NO_PER_PAGE;
							$max=$pageno*MAX_NO_PER_PAGE;
							$pres->data_seek(($row_offset));
							$no=$row_offset+1;
							while($row = $pres->fetch_assoc()){
								if($no % 2 == 0){
									echo "<tr class=\"even\">";
								}
								else{
									echo "<tr>";	
								}
								
								//this is an inefficient way..find a work around later.
									
								$tagquery = "select tag from project_tags where p_id=".$row['p_id'];
								$tagres = mysqli_query($con,$tagquery) or die(mysqli_errno($con));
								
								
								
								//
								echo "<td>".$no."</td>";
								echo "<td><a data-toggle='collapse' data-parent='' href='#collapse".$no."'>".$row['p_name']."<div id='collapse".$no.
								"' class='panel-collapse collapse link-custom'></a><div class='panel-body collapsed-project-description well well-lg'>".nl2br(substr($row['p_desc'],0,300)).
								" .... <br>".
								"<div class='bottom-panel'>".
								"<div class='bottom-panel-desc-left'>".
									"<span class='bottom-panel-desc-votes'><span class='votes'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp;".$row['p_votes']."</span></span>".
									"<span class='bottom-panel-desc-views'><span class='views'><span class='glyphicon glyphicon-eye-open'></span>&nbsp;".$row['p_views']."</span></span>".
								"</div>".
								
								"<div class='bottom-panel-desc-right'>".
									"<a href='viewproject.php"."?pid=".$row['p_id']."' class='button pill'>Read more &raquo;</a>".
								"</div></div></div></div></td>";
								
								echo "<td>".$row['cat_name']."</td>";
								echo "<td>";	
								$tagcount = mysqli_num_rows($tagres);
								if($tagcount!=0){
									$tagno=1;
									while($tgrow=$tagres->fetch_assoc()){
										echo $tgrow['tag'];	
										if($tagno!=$tagcount){
											echo ", ";
										}
										$tagno=$tagno+1;
									}
								}
								echo "</td>";
								echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
								echo "<td>".$row['p_post_date'];
								echo "</tr>";
								$no=$no+1;
								if($no > $max){
									break;
								}
								
							}
						}
					}
					else{
						echo "<script>showAlert();</script>";
						$_SESSION['results']='none';
					}
					
				?>
            </tbody>
            <!-- Table Body -->
            
          </table>
          

          
    	
    
          <div id="pagelist">
            <div>
              <?php
						if($rowcount>MAX_NO_PER_PAGE){
							$pagescount = intval(ceil(($rowcount/MAX_NO_PER_PAGE)));
							echo "<ul class=\"pagination\">";
							
							if(!isset($_GET['sort'])){     //// $_GET['sort'] is not set
								if(isset($_GET['search-q'])){
									if($_GET['page']<=1){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";	
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&page=".($_GET['page']-1)."\">&laquo;</a></li>";	
									}
									for($x=0;$x<$pagescount;$x++){
										echo "<li ";
										if(($x+1)==$_GET['page']){
											echo " class=\"active\"";	
										}
										echo "><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&page=".($x+1)."\">".($x+1)."</a></li>";
									}
									if($_GET['page']>=$pagescount){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&page=".($_GET['page']+1)."\">&raquo;</a></li>";
									}
								}
								
								
								else{
									if($_GET['page']<=1){
										echo "<li class=\"disabled\"><a href=\"#\">&laquo;</a></li>";	
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."\">&laquo;</a></li>";	
									}
									for($x=0;$x<$pagescount;$x++){
										echo "<li ";
										if(($x+1)==$_GET['page']){
											echo " class=\"active\"";	
										}
										echo "><a href=\"".$_SERVER['PHP_SELF']."?page=".($x+1)."\">".($x+1)."</a></li>";
									}
									if($_GET['page']>=$pagescount){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($_GET['page']+1)."\">&raquo;</a></li>";
									}
								}
							}
							else{								// $_GET['sort'] is set
								if(isset($_GET['search-q'])){
									if($_GET['page']<=1){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&sort=".$_GET['sort']."&&page=".($_GET['page']-1)."\">&laquo;</a></li>";
									}
									for($x=0;$x<$pagescount;$x++){
										echo "<li ";
										if(($x+1)==$_GET['page']){
											echo " class=\"active\"";
										}
										echo "><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&sort=".$_GET['sort']."&&page=".($x+1)."\">".($x+1)."</a></li>";
									}
									if($_GET['page']>=$pagescount){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?search-q=".$_GET['search-q']."&&sort=".$_GET['sort']."&&page=".($_GET['page']+1)."\">&raquo;</a></li>";
									}
								}
								
								
								else{
									if($_GET['page']<=1){
										echo "<li class=\"disabled\"><a href=\"#\">&laquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?sort=".$_GET['sort']."&&page=".($_GET['page']-1)."\">&laquo;</a></li>";
									}
									for($x=0;$x<$pagescount;$x++){
										echo "<li ";
										if(($x+1)==$_GET['page']){
											echo " class=\"active\"";
										}
										echo "><a href=\"".$_SERVER['PHP_SELF']."?sort=".$_GET['sort']."&&page=".($x+1)."\">".($x+1)."</a></li>";
									}
									if($_GET['page']>=$pagescount){
										echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
									}
									else{
										echo "<li><a href=\"".$_SERVER['PHP_SELF']."?sort=".$_GET['sort']."&&page=".($_GET['page']+1)."\">&raquo;</a></li>";
									}
								}
							}
							
							
							
							
							echo "</ul>";
						}
							
					?>
              
              <!--
                    <ul class="pagination">
                      <li class="disabled"><a href="#">&laquo;</a></li>
                      <!--<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li> --><!--
                      <li class="disabled"><a href="#">&raquo;</a></li> 
                    </ul>      --> 
            </div>
          </div>
        </div>
         
      </div>
     <!-- TemplateEndEditable --> 
      
    </div>
  	
  </div>
</div>
<div id="footer"> </div>
</body>
</html>