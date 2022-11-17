<?php
if($_APP_LIVE=="Y") {
	$_GET["id"]=finding_id_from_url("id",$_DELIM);
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
	$_GET["suc"]=finding_id_from_url("suc",$_DELIM);
}
if(!empty($_GET['id']) && $_GET['act']=="del") //Delete Action
{
	//Include Get Country Query file
	$_sql="SELECT country_id FROM country WHERE country_id=".$_GET['id'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if ($rs) //Close the recordset
		$rs->close();

	//user
	  if(empty($error)) {
	       
		$_sql="SELECT state_id FROM state WHERE country_id='".$_GET['id']."'";
		//Execute Query
		$rs = $_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0) { //Exist
			$success = "Country can not be deleted as dependancy of state ID";
			$error = 1;
		} //if (!$rs || $rs->EOF)
		if($rs)
			$rs->close();
	}
	//region

	if (empty($error)) { //no error then
		$_sql="DELETE FROM country WHERE country_id='".$_GET['id']."'";
		//Execute Query
		$_CONN->Execute($_sql);
		
		//Delete Successfull Message String
		$success = "Country has been deleted successfully";

	} //if (empty($error))
	
} //if(!empty($_GET['id']) && $_GET['act']=="del")

if(empty($_POST["num"]))
	$_POST["num"] = $_GET["num"];
	
//==============Code added by Vikram=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}												//number of pages that will fit into a group																									
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10);  		//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10;  												//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getcountryids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getcountrybyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"]);						//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Vikram end========================

//Check for err variable available in querystring
if (!empty($_GET["err"]))
	$_MSG[] = message($_GET["err"]);
	
if ($_GET["suc"]==1)
	$success = "Country added successfully.";
if ($_GET["suc"]==2)
	$success = "Country updated successfully.";	
?>