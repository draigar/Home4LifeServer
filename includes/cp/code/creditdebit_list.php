<?php
if(!empty($_GET['aid']) && $_GET['act']=="del"){
	$_sql="DELETE from transaction WHERE trans_id=".$_GET['aid'];
	if ($_CONN->Execute($_sql)) { 
		$success = "Record Deleted Successfully";
	}else{	
	     $_MSG[] = "";
		 $error = 1;
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
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getcredit_debitids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getcredit_debitbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"&id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
	
//==========Code added by Jay end========================
$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";
$month=getOptions($_sql,$_POST['cmbMonth']);		

$where = " WHERE n.status='C' ";
	
if(trim($_POST['cmbUserAgent']) && trim($_POST['txtUserId'])){ 
	$where .= " and n.user_type ='".$_POST['cmbUserAgent']."' AND n.user_id ='".$_POST['txtUserId']."'";
}
if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){ 
	$frmary= explode("-",$_POST['txtFromDate']);
	$fromdate = $frmary[2]."-".$frmary[0]."-".$frmary[1];

	$toary= explode("-",$_POST['txtToDate']);
	$todate = $toary[2]."-".$toary[0]."-".$toary[1];

	$where .= " and date_format(n.trans_date,'%Y-%m-%d')>='".$fromdate."' && date_format(n.trans_date,'%Y-%m-%d')<= '".$todate."'";
}

//Credited amount
$_sql="SELECT sum(if((n.action='C' or ((n.added_by=0 || n.added_by='') and n.which='R')),n.amount,0)) as debited,
sum(
	if(
		(n.action='D' and 
			(
				( (n.added_by=0 || n.added_by='') and n.which!='R') or (n.added_by!='' and n.added_by!='0')   
			) 
		),n.amount,0)) as credited FROM transaction n ".$where;
$rs=$_CONN->Execute($_sql);
if ($rs && $rs->RecordCount()>0) {
	$credit=$rs->fields['credited'];
	$debit=$rs->fields['debited'];
}
if($rs) $rs->close();
$balance=$credit-$debit;
	
//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
?>