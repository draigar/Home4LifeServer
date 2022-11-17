<?php

if(empty($_POST['id']))

	$_POST['id'] = $_GET['id'];

if(empty($_POST["num"]))

   $_POST["num"]=$_GET["num"];



//==============Code added by Jay=========================

	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number

	if($postCurrentPageNum == "")												//If no page number exist then consider it first page

		{$postCurrentPageNum = 1;}																										

	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:50);   												//Numbers of reults needs to be displayed in every pages

	$pagesPerGroup			= 25; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20

	$getAllIdsqry 			= $_DIR['admininc']['queries']."getnaira_entriesdids.sql";	//This will spcify the fiel which will give us only the ids of the country

	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query

	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated

	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getnaira_entriesbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string

	$doPrevNext 			= true;												//This says do we need next and previous button

	$hiddenPostVar			= array("num"=>$_POST["num"],"&id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed

	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |

	//Now pass these parameters to pagination function

	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);

	

//==========Code added by Jay end========================

$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";

$month=getOptions($_sql,$_POST['cmbMonth']);		

$_sql="select `condition`,value from gcm where condition_type='METHOD' order by `condition`";

$method=getOptions($_sql,$_POST['cmbMethod']);		





//Check for err variable available in querystring

if ($_GET["err"]==1) {

	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";

	$error  = 1;

}

if ($_GET["success"]==1)

	$success = "Naira Lotto Has Been Successfully Suspended.";

?>