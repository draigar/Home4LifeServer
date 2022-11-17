<?php
if(!empty($_GET['id']) && $_GET['act']=="del"){    
	include_once($_DIR['admininc']['queries']."getstatedata.sql");
	$rs = $_CONN->Execute($_sql);
	
	if ($rs) 
		$rs->close();
	
	if(empty($error)) {
		 $_sql = "SELECT city_id FROM city WHERE state_id='".$_GET['id']."'";
		$rs = $_CONN->Execute($_sql);
		if($rs->RecordCount()>0)
		{
			$_MSG[] = "Could not be deleted record as found dependencies in other table.";
			$error = 1;
		}
		if ($rs) 
			$rs->close();	
	}	
	if(empty($error)) {
		$_sql="SELECT user_id FROM user WHERE state_id='".$_GET['id']."'";
		
		$rs = $_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0) { 
			$_MSG[] = "Could not be deleted record as found dependencies in other table.</font>";
			$error = 1;
		} 
		if($rs)
			$rs->close();
	} 
	if (empty($error)) { 
		 $_sql="DELETE FROM state where state_id=".$_GET['id'];
		if($_CONN->Execute($_sql))
		$success = "The state has been successfully deleted from the database.";
	} 
} 

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:$_REC_PER_PAGE);  		//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getstateids.sql";	//This will spcify the fiel which will give us only the ids of the state
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getstatebyids.sql";//This is the query file which will give us the state inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array();											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Jay end========================

//Check for err variable available in querystring
if (!empty($_GET["err"]))
	$_MSG[] = message($_GET["err"]);
	
if ($_GET["suc"]==1)
	$success = "The State Has Been Successfully Added.";
if ($_GET["suc"]==2)
	$success = "The State Has Been Successfully Updated.";	
?>