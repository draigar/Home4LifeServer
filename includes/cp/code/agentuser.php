<?php
if($_APP_LIVE=="Y") {
 $_GET['aid']  = finding_id_from_url('aid', $_DELIM);
 $_GET["suc"]  = finding_id_from_url('suc', $_DELIM);
 $_GET["err"]  = finding_id_from_url('err', $_DELIM);
 $_GET['success']  = finding_id_from_url('success', $_DELIM);
 $_GET['oby']  = finding_id_from_url('oby', $_DELIM);
 $_GET['srt']  = finding_id_from_url('srt', $_DELIM);
 $_GET['num']  = finding_id_from_url('num', $_DELIM);
 $_GET['mid']  = finding_id_from_url('mid', $_DELIM);
 $_GET['act']  = finding_id_from_url('act', $_DELIM);
}

if(!empty($_GET['mid']) && $_GET['act']=="app"){
  $_sql="SELECT user_id FROM merchant WHERE user_id=".$_GET['mid'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if (!$rs || $rs->EOF) { //User Not Exist
		$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
		$error = 1;
	} //if (!$rs || $rs->EOF)	
	if ($rs) //Close the recordset
		$rs->close();
	
	if (empty($error)) { //no error then
		
		$_sql="update merchant set status = 'A' WHERE user_id=".$_GET['mid'];		
		//Execute Query
		$approve = $_CONN->Execute($_sql);
		if($approve){
		   $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='RS'";
		   $approve1 = $_CONN->Execute($_sql);
		   if($approve1){
		      $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		      $approve2 = $_CONN->Execute($_sql);
			  if($approve2){
			     $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		         $approve3 = $_CONN->Execute($_sql);
				 if($approve3){
				    $_sql="update merchant_info set status = 'A' WHERE user_id=".$_GET['mid'];
		            $approve4 = $_CONN->Execute($_sql);
					if($approve4){
					   $_sql="update bank_info set status = 'A' WHERE user_id=".$_GET['mid'];
		               $approve5 = $_CONN->Execute($_sql);
					   if($approve5){
					       $success = "The merchant has been activate successfully.";
					   }
					}
				 }
			  }
		   }  
		}
		
	}
}

if(!empty($_GET['mid']) && $_GET['act']=="del"){
  $_sql="SELECT user_id FROM merchant WHERE user_id=".$_GET['mid'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if (!$rs || $rs->EOF) { //User Not Exist
		$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
		$error = 1;
	} //if (!$rs || $rs->EOF)	
	if ($rs) //Close the recordset
		$rs->close();
	
	if (empty($error)) { //no error then
		
		//Insert Record into User table				
		//Include User Query file
		 $_sql="update merchant set status = 'D',lastupdated=NOW() WHERE user_id=".$_GET['mid'];		
		//Execute Query
		$can = $_CONN->Execute($_sql);
		if($can){
		   $_sql="update merchant_address set status = 'D' WHERE user_id=".$_GET['mid']." and address_type='RS'";
		   $can1 = $_CONN->Execute($_sql);
		   if($can1){
		      $_sql="update merchant_address set status = 'D' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		      $can2 = $_CONN->Execute($_sql);
			  if($can2){
			     $_sql="update merchant_address set status = 'D' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		         $can3 = $_CONN->Execute($_sql);
				 if($can3){
				    $_sql="update merchant_info set status = 'I' WHERE user_id=".$_GET['mid'];
		            $can4 = $_CONN->Execute($_sql);
					if($can4){
					   $_sql="update bank_info set status = 'D' WHERE user_id=".$_GET['mid'];
		               $can5 = $_CONN->Execute($_sql);
					   if($can5){
					       $success = "The merchant has been cancelled successfully.";
					   }
					}
				 }
			  }
		   }  
		}
	}
}

if(!empty($_GET['mid']) && $_GET['act']=="susp"){
  $_sql="SELECT user_id FROM merchant WHERE user_id=".$_GET['mid'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if (!$rs || $rs->EOF) { //User Not Exist
		$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
		$error = 1;
	} //if (!$rs || $rs->EOF)	
	if ($rs) //Close the recordset
		$rs->close();
	
	if (empty($error)) { //no error then
		
		//Insert Record into User table				
		//Include User Query file
		$_sql="update merchant set status = 'S' WHERE user_id=".$_GET['mid'];		
		//Execute Query
		$can = $_CONN->Execute($_sql);
		if($can){
		   $_sql="update merchant_address set status = 'S' WHERE user_id=".$_GET['mid']." and address_type='RS'";
		   $can1 = $_CONN->Execute($_sql);
		   if($can1){
		      $_sql="update merchant_address set status = 'S' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		      $can2 = $_CONN->Execute($_sql);
			  if($can2){
			     $_sql="update merchant_address set status = 'S' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		         $can3 = $_CONN->Execute($_sql);
				 if($can3){
				    $_sql="update merchant_info set status = 'S' WHERE user_id=".$_GET['mid'];
		            $can4 = $_CONN->Execute($_sql);
					if($can4){
					   $_sql="update bank_info set status = 'S' WHERE user_id=".$_GET['mid'];
		               $can5 = $_CONN->Execute($_sql);
					   if($can5){
					       $success = "The merchant has been suspended successfully.";
					   }
					}
				 }
			  }
		   }  
		}
	}
}

if(!empty($_GET['mid']) && $_GET['act']=="apppp"){
  $_sql="SELECT user_id FROM merchant WHERE user_id=".$_GET['mid'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if (!$rs || $rs->EOF) { //User Not Exist
		$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
		$error = 1;
	} //if (!$rs || $rs->EOF)	
	if ($rs) //Close the recordset
		$rs->close();
	
	if (empty($error)) { //no error then
		
		$_sql="update merchant set status = 'A' WHERE user_id=".$_GET['mid'];		
		//Execute Query
		$appppp = $_CONN->Execute($_sql);
		if($appppp){
		   $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='RS'";
		   $appppp1 = $_CONN->Execute($_sql);
		   if($appppp1){
		      $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		      $appppp2 = $_CONN->Execute($_sql);
			  if($appppp2){
			     $_sql="update merchant_address set status = 'A' WHERE user_id=".$_GET['mid']." and address_type='BS'";
		         $appppp3 = $_CONN->Execute($_sql);
				 if($appppp3){
				    $_sql="update merchant_info set status = 'A' WHERE user_id=".$_GET['mid'];
		            $appppp4 = $_CONN->Execute($_sql);
					if($appppp4){
					   $_sql="update bank_info set status = 'A' WHERE user_id=".$_GET['mid'];
		               $appppp5 = $_CONN->Execute($_sql);
					   if($appppp5){
					       $success = "The merchant has been activate successfully.";
					   }
					}
				 }
			  }
		   }  
		}
		
	}
}
/*if(!empty($_GET['mid']) && $_GET['act']=="del")
{
	$_sql = "SELECT user_id, userimage FROM merchant WHERE user_id=".$_GET['mid'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) {
		$_MSG[] = "";
		$error = 1;
	}
	else 
		$user_images = $rs->fields["userimage"];
	if ($rs)
		$rs->close();
	if (!$error) {
		if(!empty($user_images) && file_exists($_DIR['inc']['user_image'].$user_images))
		{
				unlink($_DIR['inc']['user_image'].$user_images);
				unlink($_DIR['inc']['user_image']."t".$user_images);
		}
		$_sql = "delete from merchant where user_id=".$_GET['mid'];
		$del = $_CONN->Execute($_sql);
		if($del){
		   $_sql = "delete from merchant_info where user_id=".$_GET['mid'];
		   $del1 = $_CONN->Execute($_sql);
		   if($del1){
		       $_sql = "delete from bank_info where user_id=".$_GET['mid'];
			   $del2 = $_CONN->Execute($_sql);
			   if($del2){
			      $_sql = "delete from merchant_address where user_id=".$_GET['mid']." and address_type='RS'";
				  $del3 = $_CONN->Execute($_sql);
				  if($del3){
				     $_sql = "delete from merchant_address where user_id=".$_GET['mid']." and address_type='BS'";
					 $del4 = $_CONN->Execute($_sql);
				  }
			  }
		   }
		}
		header("Location: ".$_DIR['site']['adminurl']."view_merchant.php?suc".$_DELIM."3");
		exit();
	}
}*/


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
	$getAllIdsqry 			= $_DIR['admininc']['queries']."getagentuserids.sql";	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getagentuserbyids.sql";//This is the query file which will give us the country inforation by passing the ids got from just above string
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