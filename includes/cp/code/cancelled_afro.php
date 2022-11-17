<?php
if($_APP_LIVE=="Y") {
 $_GET['aid']  = finding_id_from_url('aid', $_DELIM);
 $_GET['act']  = finding_id_from_url('act', $_DELIM);
 $_GET['err']  = finding_id_from_url('err', $_DELIM);
 $_GET['success']  = finding_id_from_url('success', $_DELIM);
 $_GET['oby']  = finding_id_from_url('oby', $_DELIM);
 $_GET['srt']  = finding_id_from_url('srt', $_DELIM);
 $_GET['num']  = finding_id_from_url('num', $_DELIM);
}

if(!empty($_GET['aid']) && $_GET['act']=="res"){ 
	$_sql = "SELECT afro_id FROM afro_lotto WHERE afro_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) { 
		$_MSG[] = "Invalid Id, Please try with valid id.";
		$error = 1;
	} 	
	if ($rs) 
		$rs->close();
	
	if (!$error) { 
		$_sql="UPDATE afro_lotto SET status='A' WHERE afro_id=".$_GET['aid'];
		$_CONN->Execute($_sql);
		header("Location: ".$_DIR['site']['adminurl']."cancelled_afro".$atend."success".$_DELIM."4".$baratend);
		exit(); 
	}
} 

if(empty($_POST["num"]))
   $_POST["num"]=$_GET["num"];

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10);   												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getcancelled_afroids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getcancelled_afrobyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
	
//==========Code added by Jay end========================
$_sql="select country_id,name from country order by name";
$country=getOptions($_sql,$_POST['cmbCountry']);		
$_sql="select `condition`,value from gcm where condition_type='MEM_STATUS' and `condition`!='U' order by `condition`";
$memstatus=getOptions($_sql,$_POST['cmbStatus']);		

//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
if ($_GET["err"]==2) {
	$_MSG[] = "The Lotto game is started, You can't now edit this game.";
	$error  = 1;
}
if ($_GET["success"]==1)
	$success = "The Afro Lotto has been successfully Added.";
if ($_GET["success"]==2)
	$success = "The Afro Lotto has been successfully Updated.";
if ($_GET["success"]==3)
	$success = "The Afro Lotto has been successfully Deleted.";
if ($_GET["success"]==4)
	$success = "The Afro Lotto has been successfully Resume.";

?>