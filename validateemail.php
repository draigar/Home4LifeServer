<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection	ini_set('max_execution_time', 7000);
getDataFromDB();
function getDataFromDB() { 
  if($_GET["email"]){
  	$email=$_GET["email"];
  	$psql="select login_id from login_info where ".($_GET["act"]=="exist"?"user_id!=".$_SESSION['login']['userid']." and ":"")." username='".$email."'";
  	$res=mysql_query ($psql);
  }
  if($_GET["mobile"]){
  	$mobile=$_GET["mobile"];
  	$psql="select user_id from users where ".($_GET["act"]=="exist"?"user_id!=".$_SESSION['login']['userid']." and ":"")." phone='".$mobile."'";
  	$res=mysql_query ($psql);
  }  
  if(mysql_num_rows($res)>0) print "S|0";
  else print "E|0";
}	   
?>