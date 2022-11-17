<?php
if($_APP_LIVE=="Y") $_GET["mid"]=finding_id_from_url("mid",$_DELIM);
//$_GET['nid']  = finding_id_from_url('nid', $_DELIM);
$_sql = "select cf_type,cf_amount from comiss_fees";
 $rsCF = $_CONN->Execute($_sql);
 if($rsCF && !$rsCF->EOF){ 
   while(!$rsCF->EOF){
     $cf_amount[]   = $rsCF->fields['cf_amount'];
	 $cf_type[]     = $rsCF->fields['cf_type'];
	$rsCF->MoveNext();
	}
 }
  if(empty($_POST["txtTraCharg"])){
    $_POST["txtTraCharg"] = $cf_amount[0];
  }
  if(empty($_POST["txtRefCharg"])){
    $_POST["txtRefCharg"] = $cf_amount[1];
  }
   $cf_type0 = $cf_type[0];
   $cf_type1 = $cf_type[1];
   
if (empty($_GET['mid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."pendingagentuser".$atend."err".$_DELIM."1".$baratend);
} else { 
   $_sql = "select temp_merchant.*,temp_bank_info.*,temp_merchant_info.* from temp_merchant  
            left join temp_bank_info on temp_bank_info.change_req_id = temp_merchant.request_id 
			left join temp_merchant_info on temp_merchant_info.change_req_id = temp_merchant.request_id  
			 where temp_merchant.request_id=".$_GET['mid'];	
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."pendingagentuser".$atend."err".$_DELIM."1".$baratend);
	}
	elseif( $_SERVER['REQUEST_METHOD'] != "POST" ) {
	
		$_POST["cmbTitle"]         		= $rs->fields["title"];
		$_POST["txtFirst"] 		  		= $rs->fields["fname"];
		$_POST["txtMiddle"] 			= $rs->fields["mname"];
		
		$_POST["txtLast"] 			= $rs->fields["lname"];
		$_POST["txtEmail"] 			= $rs->fields["email"];
		
		$fdate 				   = $rs->fields["dateofbirth"];
		$arr1 				   = explode("-",$fdate); 
		$_POST["cmbDate"]      = $arr1[2];
		$_POST["cmbMonth"]     = $arr1[1];
		$_POST["cmbYear"]      = $arr1[0];
		
		$_POST["txtBirthPlace"]         = $rs->fields["placeofbirth"];
		$_POST["txtSSN"] 		  		= $rs->fields["ssn"];
		$_POST["txtTypeID"] 			= $rs->fields["typeofid"];
		$_POST["txtIssExpDate"]         = $rs->fields["issued_exp_date"];
		$_POST["txtIssAuth"] 		  	= $rs->fields["auth_issueby"];
		$_POST["txtIssCountry"] 		= $rs->fields["ssn_issue_country"];
		
		$_POST["txtBName"]              = $rs->fields["business_name"];
		$_POST["cmbPosition"]           = $rs->fields["business_type"];
		$_POST["txtBOther"]             = $rs->fields["other_business_type"];
		
		
		$_POST["txtACCName"]            = $rs->fields["account_name"];
		$_POST["txtACCNo"] 		  		= $rs->fields["account_no"];
		$_POST["cmbAType"] 			    = $rs->fields["account_type"];
		$_POST["txtBankName"]           = $rs->fields["bank_name"];
		$_POST["txtBankRout"] 		  	= $rs->fields["bank_routing_no"];
		$_POST["txtSwift"] 		        = $rs->fields["bank_swiftcode"];
		$_POST["txtBOtherCode"]         = $rs->fields["bank_othercode"];
		$_POST["txtBankAdd"] 		  	= $rs->fields["address1"];
		$_POST["txtBankAdd1"] 		    = $rs->fields["address2"];
		$_POST["txtBankCity"]           = $rs->fields["city"];
		$_POST["txtBankState"] 		  	= $rs->fields["state"];
		$_POST["txtBankZip"] 		    = $rs->fields["zip"];
		$_POST["txtBankLga"] 		    = $rs->fields["lga"];
		$_POST["cmbCountry"]            = $rs->fields["country_id"];
		
		$_POST["txtUName"]              = $rs->fields["username"];
		$_POST["hidPass"] 		  	    = $rs->fields["password"];
		$_POST['hidImage']			    = $rs->fields["userimage"];
		
		$_sql = "select * from temp_merchant_address   
             where temp_merchant_address.change_req_id=".$_GET['mid'];
		$rs1 = $_CONN->Execute($_sql);
		while(!$rs1->EOF){
		  if($rs1->fields["address_type"]=='RS'){ 
			  $_POST["txtHAddress"] 		= $rs1->fields["address1"];
			  $_POST["txtHAddress1"] 		= $rs1->fields["address2"];
			  $_POST["txtHCity"] 			= $rs1->fields["city"];
			  $_POST["txtHState"] 			= $rs1->fields["state"];
			  $_POST["txtHLga"] 			= $rs1->fields["lga"];
			  $_POST["txtHZip"] 			= $rs1->fields["postcode"];
			  $_POST["cmbCountry1"] 		= $rs1->fields["country_id"];
			  $_POST["txtTelephone"] 		= $rs1->fields["phone1"];
			  $_POST["txtHmob"] 			= $rs1->fields["phone2"];
		  }	
		  if($rs1->fields["address_type"]=='BS'){ 
			  $_POST["txtBAddress"] 		= $rs1->fields["address1"];
			  $_POST["txtBAddress1"] 		= $rs1->fields["address2"];
			  $_POST["txtBCity"] 			= $rs1->fields["city"];
			  $_POST["txtBState"] 			= $rs1->fields["state"];
			  $_POST["txtBLga"] 			= $rs1->fields["lga"];
			  $_POST["txtBZip"] 			= $rs1->fields["postcode"];
			  $_POST["cmbCountry2"] 		= $rs1->fields["country_id"];
			  $_POST["txtBTelephone"] 		= $rs1->fields["phone1"];
			  $_POST["txtBWeb"] 			= $rs1->fields["website"];
			  $_POST["txtBFax"] 			= $rs1->fields["fax"];
		  }
		  $rs1->MoveNext();
		}
		
	}
	 
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   $success = false;
	if (trim($_POST["cmbTitle"])=="") {
		$_MSG[] = " Please select title.";
		$error = 1;
	}
	if (trim($_POST["txtFirst"])=="") {
		$_MSG[] = " Please enter first name.";
		$error = 1;
	}
	if (trim($_POST["txtLast"])=="") {
		$_MSG[] = " Please enter the last name.";
		$error = 1;
	}
	if (trim($_POST["txtEmail"])=="") {
		$_MSG[] = " Please enter the email address.";
		$error = 1;
	}
	else if(!isValidEmail(trim($_POST["txtEmail"]))){
	    $_MSG[] = " Please enter the valid email address.";
	    $error = 1;
	}
	$_sql = "select user_id,email from merchant where email='".$_POST['txtEmail']."'";
    $succ_main = $_CONN->Execute($_sql);  
	if($succ_main && !$succ_main->EOF){
	   $main_email  = $succ_main->fields['email'];
	}
	if($_POST['txtEmail']==$main_email){
	    $_MSG[] = "Duplicate email address.";
	    $error = 1;
	}
	if (trim($_POST["cmbDate"])=="") {
		$_MSG[] = " Please select the day of birth.";
		$error = 1;
	}
	if (trim($_POST["cmbMonth"])=="") {
		$_MSG[] = " Please select the month of birth.";
		$error = 1;
	}
	if (trim($_POST["cmbYear"])=="") {
		$_MSG[] = " Please select the year of birth.";
		$error = 1;
	}
	if (trim($_POST["txtBirthPlace"])=="") {
		$_MSG[] = " Please enter the place of birth.";
		$error = 1;
	}
	if (trim($_POST["txtSSN"])=="") {
		$_MSG[] = " Please enter ssn No/Identity No.";
		$error = 1;
	}
	if (trim($_POST["txtTypeID"])=="") {
		$_MSG[] = " Please enter type of ID.";
		$error = 1;
	}
	if (trim($_POST["txtIssExpDate"])=="") {
		$_MSG[] = " Please enter Issued/expiry date.";
		$error = 1;
	}
	if (trim($_POST["txtIssAuth"])=="") {
		$_MSG[] = " Please enter Issuing Authority.";
		$error = 1;
	}
	if (trim($_POST["txtIssCountry"])=="") {
		$_MSG[] = " Please enter country of issuing ssn No/Identity No.";
		$error = 1;
	}
	if (trim($_POST["txtHAddress"])=="") {
		$_MSG[] = " Please enter home address.";
		$error = 1;
	}
	if (trim($_POST["txtHCity"])=="") {
		$_MSG[] = " Please enter home city.";
		$error = 1;
	}
	if (trim($_POST["txtHState"])=="") {
		$_MSG[] = " Please enter home state.";
		$error = 1;
	}
	
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[] = " Please select home country.";
		$error = 1;
	}
	if (trim($_POST["txtTelephone"])=="") {
		$_MSG[] = " Please enter home telephone.";
		$error = 1;
	}
	if (trim($_POST["txtBName"])=="") {
		$_MSG[] = " Please enter business name.";
		$error = 1;
	}
	if (trim($_POST["cmbPosition"])=="") {
		$_MSG[] = " Please select business type.";
		$error = 1;
	}
	if (trim($_POST["txtBAddress"])=="") {
		$_MSG[] = " Please enter business address.";
		$error = 1;
	}
	if (trim($_POST["txtBCity"])=="") {
		$_MSG[] = " Please enter business city.";
		$error = 1;
	}
	if (trim($_POST["txtBState"])=="") {
		$_MSG[] = " Please enter business state.";
		$error = 1;
	}
	
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[] = " Please select business country.";
		$error = 1;
	}
	if (trim($_POST["txtBTelephone"])=="") {
		$_MSG[] = " Please enter business telephone No.";
		$error = 1;
	}
	if (trim($_POST["txtACCName"])=="") {
		$_MSG[] = " Please enter bank account name.";
		$error = 1;
	}
	if (trim($_POST["txtACCNo"])=="") {
		$_MSG[] = " Please enter bank account no.";
		$error = 1;
	}
	if (trim($_POST["cmbAType"])=="") {
		$_MSG[] = " Please select account type.";
		$error = 1;
	}
	if (trim($_POST["txtBankName"])=="") {
		$_MSG[] = " Please enter benificiary bank.";
		$error = 1;
	}
	/*if (trim($_POST["txtBankRout"])=="") {
		$_MSG[] = " Please enter bank rounting.";
		$error = 1;
	}*/
	if (trim($_POST["txtBankAdd"])=="") {
		$_MSG[] = " Please enter bank address.";
		$error = 1;
	}
	if (trim($_POST["txtBankCity"])=="") {
		$_MSG[] = " Please enter bank city.";
		$error = 1;
	}
	if (trim($_POST["txtBankState"])=="") {
		$_MSG[] = " Please enter bank state.";
		$error = 1;
	}
	
	if (empty($error)) { 
	   
	   $_START_MERCH_ID;
				
				$_sql = "SELECT max(merchant_id)+1 as merchant_id from merchant";
				$rs1 = $_CONN->Execute($_sql);
					if($rs1 && !$rs1->EOF) {				
						$merchant_id 	= $rs1->fields['merchant_id'];
						if(empty($merchant_id))
							$merchant_id	=$_START_MERCH_ID;
						
					}else{					
						$merchant_id	=$_START_MERCH_ID;
					}
					if($rs1)
						$rs1->close();
	  
	    if($_POST['rd1']=='A'){ 
		
		  $securCode = ($_POST["cmbDate"]<=9?"0":"").$_POST["cmbDate"].($_POST["cmbMonth"]<=9?"0":"").$_POST["cmbMonth"].substr($_POST["cmbYear"],2,2);
		
	    $_sql = "insert into merchant(title,fname,lname,mname,email,user_type,dateofbirth,placeofbirth,ssn,typeofid,issued_exp_date,auth_issueby,
	         ssn_issue_country,status,business_name,business_type,other_business_type,merchant_id,trans_charges,trans_charge_type,
			 refund_charges,refund_charge_type,settle_period,security_code,acc_create_date)
	 values('".trim($_POST['cmbTitle'])."',
			'".trim($_POST['txtFirst'])."',
			'".trim($_POST['txtLast'])."',
			'".trim($_POST['txtMiddle'])."',
			'".trim($_POST['txtEmail'])."',
			'M',
			'".$_POST["cmbYear"]."-".$_POST["cmbMonth"]."-".$_POST["cmbDate"]."',
			'".trim($_POST['txtBirthPlace'])."',
			'".trim($_POST['txtSSN'])."',
			'".trim($_POST['txtTypeID'])."',
			'".trim($_POST['txtIssExpDate'])."',
			'".trim($_POST['txtIssAuth'])."',
			'".trim($_POST['txtIssCountry'])."',
			'A',
			'".trim($_POST['txtBName'])."',
			'".trim($_POST['cmbPosition'])."',
			'".trim($_POST['txtBOther'])."',
			'".$merchant_id."',
			'".trim($_POST['txtTraCharg'])."',
			'".$cf_type0."',
			'".trim($_POST['txtRefCharg'])."',
			'".$cf_type1."',
			'".trim($_POST['cmbSetPer'])."',
			'".$securCode."',
			NOW())";

		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){ 
		  $intID=$_CONN->Insert_ID();
		   $_sql = "insert into merchant_address(address_type,user_id,address1,address2,city,state,lga,postcode,country_id,phone1,phone2)
	 values('RS',
			'".$intID."',
			'".trim($_POST['txtHAddress'])."',
			'".trim($_POST['txtHAddress1'])."',
			'".trim($_POST['txtHCity'])."',
			'".trim($_POST['txtHState'])."',
			'".trim($_POST['txtHLga'])."',
			'".trim($_POST['txtHZip'])."',
			'".trim($_POST['cmbCountry'])."',
			'".trim($_POST['txtTelephone'])."',
			'".trim($_POST['txtHmob'])."')";
			$isAllQueryExecuted1 = $_CONN->Execute($_sql); 
			if($isAllQueryExecuted1){ 
			   $_sql = "insert into merchant_address(address_type,user_id,address1,address2,city,state,lga,postcode,country_id,phone1,fax,website)
	 values('BS',
			'".$intID."',
			'".trim($_POST['txtBAddress'])."',
			'".trim($_POST['txtBAddress1'])."',
			'".trim($_POST['txtBCity'])."',
			'".trim($_POST['txtBState'])."',
			'".trim($_POST['txtBLga'])."',
			'".trim($_POST['txtBZip'])."',
			'".trim($_POST['cmbCountry'])."',
			'".trim($_POST['txtBTelephone'])."',
			'".trim($_POST['txtBFax'])."',
			'".trim($_POST['txtBWeb'])."')";
			$isAllQueryExecuted2 = $_CONN->Execute($_sql);
			if($isAllQueryExecuted2){ 
			    $_sql = "insert into bank_info(user_id,account_name,account_no,account_type,bank_name,bank_routing_no,bank_swiftcode,
				         bank_othercode,address1,address2,city,state,lga,zip,cpramary,country_id)
	 values('".$intID."',
			'".trim($_POST['txtACCName'])."',
			'".trim($_POST['txtACCNo'])."',
			'".trim($_POST['cmbAType'])."',
			'".trim($_POST['txtBankName'])."',
			'".trim($_POST['txtBankRout'])."',
			'".trim($_POST['txtSwift'])."',
			'".trim($_POST['txtBOtherCode'])."',
			'".trim($_POST['txtBankAdd'])."',
			'".trim($_POST['txtBankAdd1'])."',
			'".trim($_POST['txtBankCity'])."',
			'".trim($_POST['txtBankState'])."',
			'".trim($_POST['txtBankLga'])."',
			'".trim($_POST['txtBankZip'])."',
			'Y',
			'".trim($_POST['cmbCountry'])."')";
			$isAllQueryExecuted3 = $_CONN->Execute($_sql);
			if($isAllQueryExecuted3){ 
			   $_sql = "insert into merchant_info(user_id,username,password,create_date)
	 values('".$intID."',
			'".trim($_POST['txtUName'])."',
			'".trim($_POST["hidPass"])."',
			 NOW())";
			 $isAllQueryExecuted4 = $_CONN->Execute($_sql);
			 if($isAllQueryExecuted4){  
			   
			   
				      $_sql = "update merchant_info SET pass_expiry_date=date_add(NOW(),INTERVAL 30 day) where user_id='".$intID."'";
			            $isAllQueryExecuted6 = $_CONN->Execute($_sql);
						  
						    $_sql = "update merchant SET trans_charge_type='".$_POST["cmbType"]."',trans_charges='".$_POST["txtTraCharg"]."' where user_id='".$intID."'";
							   $_CONN->Execute($_sql);
			                  			$_sql = "SELECT 
								m.fname,m.lname,m.email,l.username,l.password  
							 FROM 
								merchant_info l, merchant m
							 WHERE
								l.user_id ='".$intID."'
							 AND l.user_id=m.user_id";
										$rs2 = $_CONN->Execute($_sql);		
										//if( count(@$rs2[strtolower($_POST["txtUser"])])>0 ) {
											 $emailComponent[0]	=@$rs2->fields['username'];
											 $emailComponent[1]	=@$rs2->fields['password'];
											 $emailComponent[2]	=@$rs2->fields['fname'];
											 $emailComponent[3]	=@$rs2->fields['email'];
											//*********************************Get Email Template ************************************
												//Get Admin forgotpassword template
												 $_sql="SELECT name,content FROM emailtemplate WHERE page_id=13";
												//Execute Query
												$rs = $_CONN->Execute($_sql);
												if ($rs && $rs->RecordCount()>0){ //Record exist
													$msg=$rs->fields['content'];
												} //if ($rs && $rs->RecordCount()>0)
												if($rs)
												$rs->close();
												//$msg=str_replace("#FIRSTNAME#", $emailComponent[2], $msg);
												$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
												$msg=str_replace("#LOGINNAME#", $emailComponent[0], $msg);
												$msg=str_replace("#PASSWORD#", $emailComponent[1], $msg);
												$msg=str_replace("#FIRSTNAME#", $emailComponent[2], $msg);
												//$msg=str_replace("#COORDINATECARD#", $buffer, $msg);
											//*********************************Get Email Template ************************************
										
											//******************************** Send MAIL CODE START **********************************
											$ofEmail['to']      = $emailComponent[3];
											$ofEmail['subject'] = $_OFFICAILSITENAME." Login Information";
											$ofEmail['message'] = stripslashes($msg);
											$ofEmail['from']    = $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
												$mailsuccess 	= 	sendEmail($ofEmail,true); 
										 //if( count(@$rs2[strtolower($_POST["txtEmail"])])>0 ) 							
										if($mailsuccess){
											 $success=true;  
										  }	 
									
									   $_sql = "delete from temp_merchant where request_id=".$_GET['mid'];
											$del = $_CONN->Execute($_sql);
											if($del){
											   $_sql = "delete from temp_merchant_info where change_req_id=".$_GET['mid'];
											   $del1 = $_CONN->Execute($_sql);
											   if($del1){
												   $_sql = "delete from temp_bank_info where change_req_id=".$_GET['mid'];
												   $del2 = $_CONN->Execute($_sql);
												   if($del2){
													  $_sql = "delete from temp_merchant_address where change_req_id=".$_GET['mid']." and address_type='RS'";
													  $del3 = $_CONN->Execute($_sql);
													  if($del3){
														 $_sql = "delete from temp_merchant_address where change_req_id=".$_GET['mid']." and address_type='BS'";
														 $del4 = $_CONN->Execute($_sql);
													  }
												  }
											   }
											}
									header("Location: ".$_DIR['site']['adminurl']."pendingagentuser".$atend."suc".$_DELIM."1".$baratend);		
								       exit();
								
							  }
			            }
				     }
			      }
		        }
		      }
		if($_POST['rd1']=='I'){
	                
					   include_once($_DIR['admininc']['queries']."get_suc_mail.sql");
						$rs2 = $_CONN->Execute($_sql);		
						//if( count(@$rs2[strtolower($_POST["txtUser"])])>0 ) {
							 $emailComponent[0]	=@$rs2->fields['fname'];
							 $emailComponent[1]	=@$rs2->fields['email'];
							//*********************************Get Email Template ************************************//
								//Get Admin forgotpassword template
								 $_sql="SELECT name,content FROM emailtemplate WHERE page_id=14";
								//Execute Query
								$rs = $_CONN->Execute($_sql);
								if ($rs && $rs->RecordCount()>0){ //Record exist
									$msg=$rs->fields['content'];
								} //if ($rs && $rs->RecordCount()>0)
								if($rs)
								$rs->close();
								//$msg=str_replace("#FIRSTNAME#", $emailComponent[2], $msg);
								$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
								$msg=str_replace("#FIRSTNAME#", $emailComponent[0], $msg);
								$msg=str_replace("#MESSAGE#", $_POST['txtDurationday'], $msg);
							//*********************************Get Email Template ************************************//
						
							//******************************** Send MAIL CODE START **********************************// 
							$ofEmail['to']      = $emailComponent[1];
							$ofEmail['subject'] = $_OFFICAILSITENAME." Login Information";
							$ofEmail['message'] = stripslashes($msg);
							$ofEmail['from']    = $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
								$rssuccess 	= 	sendEmail($ofEmail,true); 
						 //if( count(@$rs2[strtolower($_POST["txtEmail"])])>0 ) 							
						if($rssuccess){
							 $success=true;  
						  }	 
						 $_sql = "delete from temp_merchant where request_id=".$_GET['mid'];
						$del = $_CONN->Execute($_sql);
						if($del){
						   $_sql = "delete from temp_merchant_info where change_req_id=".$_GET['mid'];
						   $del1 = $_CONN->Execute($_sql);
						   if($del1){
							   $_sql = "delete from temp_bank_info where change_req_id=".$_GET['mid'];
							   $del2 = $_CONN->Execute($_sql);
							   if($del2){
								  $_sql = "delete from temp_merchant_address where change_req_id=".$_GET['mid']." and address_type='RS'";
								  $del3 = $_CONN->Execute($_sql);
								  if($del3){
									 $_sql = "delete from temp_merchant_address where change_req_id=".$_GET['mid']." and address_type='BS'";
									 $del4 = $_CONN->Execute($_sql);
									  }
								  }
							   }
							}
					header("Location: ".$_DIR['site']['adminurl']."pendingagentuser".$atend."suc".$_DELIM."3".$baratend);		
				   exit();
	   }
   }
} //if($_SERVER['REQUEST_METHOD'] == "POST")

$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='MONTHS'  ORDER BY `condition`";
	$month = getOptions($_sql, @$_POST["cmbMonth"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='SETTLE_DAYS'  ORDER BY `condition`";
	$set_perd = getOptions($_sql, @$_POST["cmbSetPer"]);	
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='BUISINESS_TYPE'  ORDER BY `condition`";
	$business_type = getOptions($_sql, @$_POST["cmbPosition"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='TITLE'  ORDER BY `condition`";
	$title = getOptions($_sql, @$_POST["cmbTitle"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='ACC_TYPE'  ORDER BY `condition`";
	$acc_type = getOptions($_sql, @$_POST["cmbAType"]);
	
$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country = getOptions($_sql, @$_POST["cmbCountry"]);
	
$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country1 = getOptions($_sql, @$_POST["cmbCountry1"]);
	
	$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country2 = getOptions($_sql, @$_POST["cmbCountry2"]);	
?>