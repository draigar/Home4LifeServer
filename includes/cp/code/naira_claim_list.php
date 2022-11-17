<?php
if($_APP_LIVE=="Y") {
 $_GET['id']  = finding_id_from_url('id', $_DELIM);
 $_GET['aid']  = finding_id_from_url('aid', $_DELIM);
 $_GET['act']  = finding_id_from_url('act', $_DELIM);
 $_GET['err']  = finding_id_from_url('err', $_DELIM);
 $_GET['success']  = finding_id_from_url('success', $_DELIM); 
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Mark Complete") {
	$count=count($_POST['chkAction']);
	if($count<=0){
	   $_MSG[] = "Please select at least one record to proceed."; 	
	   $error=1;	
	} else {
		for($i=0;$i<$count;$i++) {
			$_sql = "UPDATE claimed SET complete='Y' where claimed_id=".$_POST['chkAction'][$i];
			$rsSuccessful = $_CONN->Execute($_sql);
		}
		if($rsSuccessful){
			$success="The claim entry has been marked complete Successfully.";
		}
	}
}

if(!empty($_GET['id']) && $_GET['act']=="com"){
	$_sql = "UPDATE claimed SET complete='Y' where claimed_id=".$_GET['id'];
	$rsSuccessful = $_CONN->Execute($_sql);

	if($rsSuccessful){
		$success="Records Updated Successfully.";
	}
}
	
		
if(!empty($_GET['aid']) && $_GET['act']=="deact"){

	$_sql = "SELECT claimed_id FROM claimed WHERE claimed_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) { 
		$_MSG[] = "Invalid Id, Please try with valid id.";
		$error = 1;
	} 	
	if ($rs) $rs->close();

	if (!$error) { 
		$_sql="DELETE FROM claimed WHERE claimed_id=".$_GET['aid'];
		$_CONN->Execute($_sql);
		header("Location: ".$_DIR['site']['adminurl']."naira_claim_list".$atend."success".$_DELIM."3".$baratend);
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
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getnaira_claimlistids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getnaira_claimlistbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string
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
if ($_GET["success"]==1)
	$success = "The Draw of Naira Lotto has been successfully Claimed.";
if ($_GET["success"]==2)
	$success = "The Naira Lotto has been successfully Updated.";
if ($_GET["success"]==3)
	$success = "The Claimed entry has been successfully Deleted.";
?>