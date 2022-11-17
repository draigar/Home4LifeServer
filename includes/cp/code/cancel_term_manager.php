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


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Add To Terminal") {
	$count=count($_POST['chkAction']);
	if($count<=0){
	   $_MSG[] = "Please select at least one record to proceed."; 	
	   $error=1;	
	} else {
		for($i=0;$i<$count;$i++) {
		echo	$_sql = "INSERT INTO terminal_agent(agent_id) VALUES('".$_POST['chkAction'][$i]."')";
			$rsSuccessful = $_CONN->Execute($_sql);
		}
		if($rsSuccessful){
			$success="Records Updated Successfully.";
		}
	}
}

if(!empty($_GET['id']) && $_GET['act']=="add"){
		echo	$_sql = "INSERT INTO terminal_agent(agent_id) VALUES('".$_GET['id']."')";
		$rsSuccessful = $_CONN->Execute($_sql);

		if($rsSuccessful){
			$success="Records Updated Successfully.";
		}
}


if(empty($_POST['num']))
	$_POST['num'] = $_GET['num'];
if(empty($_POST['nid']))
	$_POST['mid'] = $_GET['mid'];
if(empty($_POST['id']))
	$_POST['id'] = $_GET['id'];
if(empty($_POST['txtMerID']))
	$_POST['txtMerID'] = $_GET['txtMerID'];
if(empty($_POST['txtFirst']))
	$_POST['txtFirst'] = $_GET['txtFirst'];
if(empty($_POST['txtLast']))
	$_POST['txtLast'] = $_GET['txtLast'];
if(empty($_POST['txtEmail']))
	$_POST['txtEmail'] = $_GET['txtEmail'];
if(empty($_POST['txtBName']))
	$_POST['txtBName'] = $_GET['txtBName'];
if(empty($_POST['cmbPosition']))
	$_POST['cmbPosition'] = $_GET['cmbPosition'];		

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10); 												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getcancel_term_managerids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getcancel_term_managerbyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"mid"=>$_POST["mid"],"id"=>$_POST["id"],"txtMerID"=>$_POST["txtMerID"],"txtFirst"=>$_POST["txtFirst"],"txtLast"=>$_POST["txtLast"],"txtEmail"=>$_POST["txtEmail"],"txtBName"=>$_POST["txtBName"],"cmbPosition"=>$_POST["cmbPosition"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Jay end========================

//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
if ($_GET["suc"]==1)
	$success = "The Agent Has Been Successfully Added.";
if ($_GET["suc"]==2)
	$success = "The Agent Has Been Successfully Updated.";
if ($_GET["suc"]==3)
	$success = "The Agent Has Been Successfully Deleted.";	
?>
