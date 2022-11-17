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

//----------------------------Admin 
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Reset Password" && $_POST['cmbType']!="G" ){
	if(count($_POST['chkAction'])<=0){
		 $_MSG[] = "Please select atleast one record.";
		 $error=1;
	}else{
		for($i=0;$i<count($_POST['chkAction']);$i++){
			$newPass = get_random_password();
			$_sql="UPDATE login_info SET password='".$newPass."' WHERE user_id=".$_POST['chkAction'][$i]; 
			send_reset_email($msg,$_POST['chkAction'][$i],"");
			$rsSuccessful= $_CONN->Execute($_sql);
		}
		if($rsSuccessful){
			$success="Password Updated Successfully.";
		}
	}
}
if(!empty($_GET['aid']) && $_GET['act']=="res" && $_POST['cmbType']!="G" ){
		$newPass = get_random_password();
		$_sql = "UPDATE login_info SET password='".$newPass."' WHERE user_id=".$_GET['aid'];
		send_reset_email($msg,$_GET['aid'],"");
		if($_CONN->Execute($_sql)){
			$success="Password Updated Successfully.";
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
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10);   												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getlockunlockids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getlockunlockbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"&id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
	
//==========Code added by Jay end========================
		
$_sql="select `condition`,value from gcm where condition_type='MEM_STATUS' and `condition` not in('U','C') order by `condition`";
$memstatus=getOptions($_sql,$_POST['cmbStatus']);		

//Check for err variable available in querystring
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
if ($_GET["success"]==1)
	$success = "Record Has Been Successfully Added.";
if ($_GET["success"]==2)
	$success = "Record Has Been Successfully Updated.";
	

function send_reset_email($msg,$userid,$flag) {
	global $_CONN, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL;
	
	if($flag=="G"){
		$sql="select username,password,merchant.email as email_id FROM merchant_info
			LEFT JOIN merchant on merchant.user_id = merchant_info.user_id
			where merchant_info.user_id='".$userid."'";
	}else{
		$sql="select username,password,users.email_id FROM login_info
			LEFT JOIN users on users.user_id = login_info.user_id
			where login_info.user_id='".$userid."'";
	}
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
		$username		=$rs->fields['username'];
		$password		=$rs->fields['password'];
		$email_id		=$rs->fields['email_id'];
	}
	if($rs)		$rs->close();
	
	$msg=str_replace("#USERNAME#", $username, $msg);
	$msg=str_replace("#PASSWORD#", $password, $msg);

	$ofEmail['to']      =   $email_id;
	$ofEmail['subject'] = 	stripslashes($subject);
	$ofEmail['message'] = 	"New Password For Your Account:";
	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";
	sendEmail($ofEmail);
}

?>