<?php
if($_APP_LIVE=="Y") {
 $_GET['nid']  = finding_id_from_url('nid', $_DELIM);
 $_GET['act']  = finding_id_from_url('act', $_DELIM);
 $_GET['err']  = finding_id_from_url('err', $_DELIM);
 $_GET['suc']  = finding_id_from_url('suc', $_DELIM);
 $_GET['oby']  = finding_id_from_url('oby', $_DELIM);
 $_GET['srt']  = finding_id_from_url('srt', $_DELIM);
 $_GET['num']  = finding_id_from_url('num', $_DELIM);
}
if(!empty($_GET['nid']) && $_GET['act']=="del")
{
	$_sql = "SELECT faq_id, image FROM faq WHERE faq_id=".$_GET['nid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) {
		$_MSG[] = "";
		$error = 1;
	}
	else 
		$faq_image = $rs->fields["image"];
	if ($rs)
		$rs->close();
	if (!$error) {
		if(!empty($faq_image) && file_exists($_DIR['inc']['faq_image'].$faq_image))
		{
				unlink($_DIR['inc']['faq_image'].$faq_image);
				unlink($_DIR['inc']['faq_image']."t".$faq_image);
		}
		$_sql = "delete from faq where faq_id=".$_GET['nid'];
		$_CONN->Execute($_sql);
		header("Location: ".$_DIR['site']['adminurl']."faq".$atend."suc".$_DELIM."3".$baratend);
		exit();
	}
}
if(empty($_POST['num']))
	$_POST['num'] = $_GET['num'];
if(empty($_POST['nid']))
	$_POST['nid'] = $_GET['nid'];
if(empty($_POST['id']))
	$_POST['id'] = $_GET['id'];

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10); 												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getfaqids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getfaqbyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"nid"=>$_POST["nid"],"id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed
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
	$success = "The faq Record Has Been Successfully Added.";
if ($_GET["suc"]==2)
	$success = "The faq Record Has Been Successfully Updated.";
if ($_GET["suc"]==3)
	$success = "The faq Record Has Been Successfully Deleted.";	
?>