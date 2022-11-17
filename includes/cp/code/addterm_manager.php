<?php
if($_APP_LIVE=="Y") {
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
	$_GET["id"]=finding_id_from_url("id",$_DELIM);
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Add To Terminal") {
	$count=count($_POST['chkAction']);
	if($count<=0){
	   $_MSG[] = "Please select at least one record to proceed."; 	
	   $error=1;	
	} else {
		$flaginserted=false;
		for($i=0;$i<$count;$i++) {
			$sql="select max(term_id) as terminal_id from terminal_agent";
			$rs=$_CONN->Execute($sql);
			if( $rs && $rs->fields["terminal_id"]>0 ) $terminal_id=$rs->fields["terminal_id"]+1;
			else $terminal_id=1001;
			if($rs) $rs->close();
			$_sql = "INSERT INTO terminal_agent(term_id,agent_id,status,create_date) 
						VALUES('".$terminal_id."','".$_POST['chkAction'][$i]."','A',now())";
			if($_CONN->Execute($_sql))
				$flaginserted=true;
		}
		if(!$flaginserted) 
			$error="Unknown error occured while processing request.";
		else	
			$success="Records Updated Successfully.";
	}
}

if(!empty($_GET['id']) && $_GET['act']=="add"){
	$sql="select max(term_id) as terminal_id from terminal_agent";
	$rs=$_CONN->Execute($sql);
	if( $rs && $rs->fields["terminal_id"]>0 ) $terminal_id=$rs->fields["terminal_id"]+1;
	else $terminal_id=1001;		
	$_sql = "INSERT INTO terminal_agent(term_id,agent_id,status,create_date) 
						VALUES('".$terminal_id."','".$_GET['id']."','A',now())";
	if($_CONN->Execute($_sql))
	  $success="Records Updated Successfully.";
	else
	  $error="Unknown error occured while processing request.";
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
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getterm_agntids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getterm_agntbyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
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