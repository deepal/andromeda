<?php 
 // this starts the session 
 session_start(); 
 
 // this sets variables in the session 
 $_SESSION['color']='red'; 
 $_SESSION['size']='small'; 
 $_SESSION['shape']='round'; 
 
 echo  $_SESSION['color']."<br>";
 echo  $_SESSION['size']."<br>";
 print "<br>Done";
 ?> 