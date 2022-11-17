<?php
if($_APP_LIVE=="Y") {
	$_GET["aid"]=finding_id_from_url("aid",$_DELIM);
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
	$_GET["err"]=finding_id_from_url("err",$_DELIM);
}

if(!empty($_GET['aid']) && $_GET['act']=="can") {
	$_sql="UPDATE transaction SET status='L' WHERE trans_id=".$_GET['aid'];
	if ($_CONN->Execute($_sql)) { 
		$success = "The Transaction has been cancelled successfully.";
	}else{	
	     $_MSG[] = "";
		 $error = 1;
	}
}

if(!empty($_GET['aid']) && $_GET['act']=="com") { 
	$error="";
	$_sql="SELECT t.amount,t.user_id,t.which,f.user_id as fuser_id FROM transaction t 
	LEFT JOIN trans_fund_to f ON f.trans_id=t.trans_id WHERE t.trans_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0) {
		$tuser_id=$rs->fields['user_id'];
		$which=$rs->fields['which'];
		$amount=$rs->fields['amount'];
		$fuser_id=$rs->fields['fuser_id'];
	} else {
		$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
		$error=1;
	}
	if($rs) $rs->close();
	if(!$error && $fuser_id) {
		$balance1=get_user_balance($fuser_id);
		if($amount>$balance1) {
			$_MSG[] = "Insufficient fund available in user account.";
			$error=1;
		}
	}
	if(!$error) {
		$_sql="UPDATE transaction SET status='C',vision_voucher_no='".$_SESSION['login']['userid']."' WHERE trans_id=".$_GET['aid'];
		if ($_CONN->Execute($_sql)) { 
			if($which=="T") {
				$identifier=get_identifier_number();
				$balance1-=$amount;
				$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".$amount."','".$fuser_id."','D','C','',0,0,0,'T','U','".$balance1."')";
				if(!$_CONN->Execute($sql)) { 
					$_sql="UPDATE transaction SET status='P' WHERE trans_id=".$_GET['aid'];
					$_CONN->Execute($_sql);
					$_MSG[] = "Unknown error occured while processing request. Please try again.";
					$error=1;
				} else {
					$intID = $_CONN->Insert_ID();
					$_sql="UPDATE trans_fund_to SET from_trans_id='".$intID."' WHERE trans_id=".$_GET['aid'];
					$_CONN->Execute($_sql);
					if($tuser_id) send_email_credit_fund($tuser_id,$amount);
					if($fuser_id) send_email_debit_fund($fuser_id,$amount);
					$success = "The Transaction has been completed successfully.";
				}
			} else $success = "The Transaction has been completed successfully.";
		} else {
	    	$_MSG[] = "Unknown error occured while processing request. Please try again.";
			$error=1;
		}
	}
}

if(empty($_POST['id']))
  $_POST['id'] = $_GET['id'];
if(empty($_POST["num"]))
  $_POST["num"]=$_GET["num"];

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:$_REC_PER_PAGE);   												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getsus_transactionids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getsus_transactionbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"&id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
//==========Code added by Jay end========================

$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";
$month=getOptions($_sql,$_POST['cmbMonth']);		
//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
?>