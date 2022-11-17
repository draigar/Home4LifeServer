<?php
if($_APP_LIVE=="Y"){
$_GET["bid"]=finding_id_from_url("bid",$_DELIM);
$_GET["act"]=finding_id_from_url("act",$_DELIM);
}


$success = false;
if(!empty($_GET['bid']) && $_GET['act']=="del") //Delete Action
{
	$_sql = "SELECT banner_id,banner_image FROM bottombanner WHERE banner_id=".$_GET['bid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) { //User Not Exist
		$_MSG[] = "";
		$error = 1;
	} 
	else
		$img = $rs->fields["banner_image"];
	if ($rs) 
		$rs->close();

	if (!$error) { 
		
		if(!empty($img) && file_exists($_DIR['inc']['bottum_image'].$img))
		{
			unlink($_DIR['inc']['bottum_image'].$img);
		}
		$_sql="DELETE FROM bottombanner WHERE banner_id=".$_GET['bid'];
		$_CONN->Execute($_sql);
		header("Location: ".$_DIR['site']['adminurl']."bottumbannerlist.php?suc".$_DELIM."3");
		exit();
	}
} 
if(empty($_POST['num']))
	$_POST['num'] = $_GET['num'];
if(empty($_POST['id']))
	$_POST['id'] = $_GET['id'];
if(empty($_POST['bid']))
	$_POST['bid'] = $_GET['bid'];

//==============Code added by Vikram=========================
$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
if($postCurrentPageNum == "")												//If no page number exist then consider it first page
	{$postCurrentPageNum = 1;}																										
$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10);												//Numbers of reults needs to be displayed in every pages
$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
$getAllIdsqry 			= $_DIR['admininc']['queries']."getbottumbannerids.sql";	//This will spcify the fiel which will give us only the ids of the country
$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
$getDataByIdsqry 		= $_DIR['admininc']['queries']."getbottumbannerbyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
$doPrevNext 			= true;												//This says do we need next and previous button
$hiddenPostVar			= array("num"=>$_POST["num"],"bid"=>$_POST["bid"],"id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed
$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
//Now pass these parameters to pagination function
$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Vikram end========================

if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
if ($_GET["suc"]==1)
	$success = "The Banner Record Has Been Successfully Added.";
if ($_GET["suc"]==2)
	$success = "The Banner Record Has Been Successfully Updated.";
if ($_GET["suc"]==3)
	$success = "The Banner Record Has Been Successfully Deleted.";	
?>