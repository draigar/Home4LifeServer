<?php
if(!empty($_GET['id']) && $_GET['act']=="del"){   //Delete Action
	$_sql = "SELECT sub_id FROM eb_subscriber WHERE sub_id=".$_GET['id'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) { 
		$_MSG[] = "";
		$error = 1;
	} //if ($rs->EOF)
	if ($rs) 	$rs->close();

	if (!$error) { 
		$_sql = "delete from eb_subscriber where sub_id=".$_GET['id'];
		$_CONN->Execute($_sql);
		header("Location: ".$_DIR['site']['adminurl']."sub_event.php?suc".$_DELIM."3");
		exit();
	} //if (empty($error))
} //if(!empty($_GET['id']) && $_GET['act']=="del")

if(empty($_POST["txtName"]))
	$_POST["txtName"] = $_GET["txtName"];
if(empty($_POST["cmbAction"]))
	$_POST["cmbAction"] = $_GET["cmbAction"];
if(empty($_POST["txtFromDate"]))
	$_POST["txtFromDate"] = $_GET["txtFromDate"];
if(empty($_POST["txtToDate"]))
	$_POST["txtToDate"] = $_GET["txtToDate"];
if(empty($_POST["cmbEvent"]))
	$_POST["cmbEvent"] = $_GET["cmbEvent"];

if(empty($_POST['num']))
	$_POST['num'] = $_GET['num'];
if(empty($_POST['nid']))
	$_POST['nid'] = $_GET['nid'];
if(empty($_POST['id']))
	$_POST['id'] = $_GET['id'];
if(empty($_POST['txtEventName']))
	$_POST['txtEventName'] = $_GET['txtEventName'];
if(empty($_POST['txtFirmName']))
	$_POST['txtFirmName'] = $_GET['txtFirmName'];
if(empty($_POST['txtFromDate']))
	$_POST['txtFromDate'] = $_GET['txtFromDate'];
if(empty($_POST['txtToDate']))
	$_POST['txtToDate'] = $_GET['txtToDate'];		

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10); 												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getsubeveids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getsubevebyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"nid"=>$_POST["nid"],"id"=>$_POST["id"],"txtEventName"=>$_POST["txtEventName"],"txtFirmName"=>$_POST["txtFirmName"],"txtFromDate"=>$_POST["txtFromDate"],"txtToDate"=>$_POST["txtToDate"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Jay end========================

//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
if ($_GET["suc"]==2)
	$success = "Record(s) Has Been Successfully Updated.";
if ($_GET["suc"]==3)
	$success = "Record Has Been Successfully Deleted.";
	
$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='ACTION' and `condition`!='P' order by `condition`";
$action = getOptions($_sql, @$_POST["cmbAction"]);

$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='ACTION' and `condition`!='L' order by `condition`";
$actionlist = getOptions($_sql, @$_POST["cmbEventList"]);

?>