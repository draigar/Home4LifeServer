<?php 
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
	
	else 
	{
	   $_sql = "select request_id,email from temp_merchant where email='".$_POST['txtEmail']."'";
		$succ_tmp = $_CONN->Execute($_sql);
		if($succ_tmp && !$succ_tmp->EOF){
		   $tmp_email  = $succ_tmp->fields['email'];
		}
		$_sql = "select user_id,email from merchant where email='".$_POST['txtEmail']."'";
		$succ_main = $_CONN->Execute($_sql);  
		if($succ_main && !$succ_main->EOF){
		   $main_email  = $succ_main->fields['email'];
		}
	  if($_POST['txtEmail']==$tmp_email || $_POST['txtEmail']==$main_email){
	    $_MSG[] = " Email ID already exist ,Please enter another email address.";
	    $error = 1;
	   }
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
	if (trim($_POST["txtBankRout"])=="") {
		$_MSG[] = " Please enter bank rounting.";
		$error = 1;
	}
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
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[] = " Please select bank country.";
		$error = 1;
	}
	if (trim($_POST["txtUName"])=="") {
		$_MSG[] = " Please enter username.";
		$error = 1;
	}
	else{ 
	  $_sql = "select request_id,username from temp_merchant_info where username='".$_POST['txtUName']."'";
		$succ_tmp = $_CONN->Execute($_sql);
		if($succ_tmp && !$succ_tmp->EOF){
		   $tmp_uname  = $succ_tmp->fields['username'];
		}
		$_sql = "select user_id,username from merchant_info where username='".$_POST['txtUName']."'";
		$succ_main = $_CONN->Execute($_sql);  
		if($succ_main && !$succ_main->EOF){
		   $main_uname  = $succ_main->fields['username'];
		}
	if($_POST['txtUName']==$tmp_uname || $_POST['txtUName']==$main_uname){
	    $_MSG[] = " <font color='red'>UserName already exist ,Please enter another user name.</font>";
	    $error = 1;
		}
	}
	
	if (trim($_POST["txtPassword"])=="") {
		$_MSG[] = " Please enter password.";
		$error = 1;
	}
	$_sql = "select `condition`,value from gcm where condition_type='PASSPOLICY'";
	  $rsGCM  = $_CONN->Execute($_sql);
	  if($rsGCM && !$rsGCM->EOF){ 
	   while(!$rsGCM->EOF){ 
	       if($MAX_LEN == $rsGCM->fields['condition']){
		   		if(strlen($_POST["txtPassword"]) > $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){						
						$_MSG[] = " <font color='red'>Password Length should be less than  ".$rsGCM->fields['value']." characters.</font>";
						$error = 1;
				}
		   }else if($MIN_LEN == $rsGCM->fields['condition']){
		   		if(strlen($_POST["txtPassword"]) < $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){						
						$_MSG[] = " <font color='red'>Password Length should be greater than  ".$rsGCM->fields['value']." characters.</font>";
						$error = 1;
				}
		   }else if($MIN_LCHAR == $rsGCM->fields['condition']){
		   				
				$varLChar =0;
				$varPassword = trim($_POST["txtPassword"]);
				$varNewString =  $varPassword;
				
				for($i=0;$i<strlen($varPassword);$i++){
						$varTempChar = 	substr($varNewString,0,1);						
						$varNewString = substr($varNewString,1,strlen($varNewString)-1);
						$varAsciiValue = ord($varTempChar);						
						if($varAsciiValue>=97 && $varAsciiValue <= 122)
							$varLChar++;
				}
				
				if($varLChar < $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){
						$_MSG[] = " <font color='red'>Password should have ".$rsGCM->fields['value']." minimum number of Lower characters.</font>";
						$error = 1;
				}
		   }else if($MIN_UCHAR == $rsGCM->fields['condition']){
		   				
				$varUChar =0;
				$varPassword = trim($_POST["txtPassword"]);
				$varNewString =  $varPassword;				
				for($i=0;$i<strlen($varPassword);$i++){
						$varTempChar = 	substr($varNewString,0,1);						
						$varNewString = substr($varNewString,1,strlen($varNewString)-1);
						$varAsciiValue = ord($varTempChar);
					
						if($varAsciiValue >=65 && $varAsciiValue <= 90)
							$varUChar++;
				}
				
				if($varUChar < $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){
						$_MSG[] = " <font color='red'>Password should have ".$rsGCM->fields['value']." minimum number of Upper characters.</font>";
						$error = 1;
				}
		   }else if($MIN_NCHAR == $rsGCM->fields['condition']){ 
		   				
				$varNChar =0;
				$varPassword = trim($_POST["txtPassword"]);
				$varNewString =  $varPassword;
				
				for($i=0;$i<strlen($varPassword);$i++){
						$varTempChar = 	substr($varNewString,0,1);						
						$varNewString = substr($varNewString,1,strlen($varNewString)-1);
						$varAsciiValue = ord($varTempChar);
						
						if($varAsciiValue>=48 && $varAsciiValue <= 57)
							$varNChar++;
				}
				
				if($varNChar < $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){
						$_MSG[] = " <font color='red'>Password should have ".$rsGCM->fields['value']." minimum number of Numeric characters.</font>";
						$error = 1;
				}
		   }else if($MIN_SCHAR == $rsGCM->fields['condition']){ 
		   				
				$varNChar =0;
				$varPassword = trim($_POST["txtPassword"]);
				$varNewString =  $varPassword;
				
				for($i=0;$i<strlen($varPassword);$i++){
						$varTempChar = 	substr($varNewString,0,1);						
						$varNewString = substr($varNewString,1,strlen($varNewString)-1);
						$varAsciiValue = ord($varTempChar);
						
						if(($varAsciiValue>=58 && $varAsciiValue <= 64) || ($varAsciiValue>=32 && $varAsciiValue <= 47) || ($varAsciiValue>=91 && $varAsciiValue <= 96) || ($varAsciiValue>=123 && $varAsciiValue <= 127))
							$varNChar++;
				}
				
				if($varNChar < $rsGCM->fields['value'] && $rsGCM->fields['value'] !=0){
						$_MSG[] = " <font color='red'>Password should have ".$rsGCM->fields['value']." minimum number of special characters.</font>";
						$error = 1;
				}
		   }
		   else if($ALLOW_USERNAME == $rsGCM->fields['condition']  && "N" == $rsGCM->fields['value']){		   
		   			$varPassword = trim($_POST["txtPassword"]);
					$varUserName = trim($_POST["txtUName"]);
					$varTemp = substr_count($varPassword,$varUserName);					
					if ($varTemp > 0) {
						$_MSG[] = " <font color='red'>User name is not allowed in password</font>";
						$error = 1;
					}
			}

			 $rsGCM->MoveNext();
		 } 
	  }
	  if (trim($_POST["txtConfirm"])=="") {
		$_MSG[] = " Please enter confirm password.";
		$error = 1;
	  }
	  else if(trim($_POST["txtPassword"])!=trim($_POST["txtConfirm"])){
	    $_MSG[] = " <font color='red'>Confirm password should equal to the original password.</font>";
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
	  
	    $_sql = "insert into merchant(title,fname,lname,mname,email,user_type,dateofbirth,placeofbirth,ssn,typeofid,issued_exp_date,auth_issueby,
	         ssn_issue_country,status,business_name,business_type,other_business_type,merchant_id,trans_charge_type,trans_charges,acc_create_date)
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
			'".trim($_POST['cmbType'])."',
			'".trim($_POST['txtTraCharg'])."',
			NOW())";

		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){ 
		  $intID=$_CONN->Insert_ID();
		   $_sql = "insert into merchant_address(address_type,user_id,address1,address2,city,state,lga,country_id,phone1,phone2)
	 values('RS',
			'".$intID."',
			'".trim($_POST['txtHAddress'])."',
			'".trim($_POST['txtHAddress1'])."',
			'".trim($_POST['txtHCity'])."',
			'".trim($_POST['txtHState'])."',
			'".trim($_POST['txtHLga'])."',
			'".trim($_POST['cmbCountry'])."',
			'".trim($_POST['txtTelephone'])."',
			'".trim($_POST['txtHmob'])."')";
			$isAllQueryExecuted1 = $_CONN->Execute($_sql); 
			if($isAllQueryExecuted1){ 
			   $_sql = "insert into merchant_address(address_type,user_id,address1,address2,city,state,lga,country_id,phone1,fax,website)
	 values('BS',
			'".$intID."',
			'".trim($_POST['txtBAddress'])."',
			'".trim($_POST['txtBAddress1'])."',
			'".trim($_POST['txtBCity'])."',
			'".trim($_POST['txtBState'])."',
			'".trim($_POST['txtBLga'])."',
			'".trim($_POST['cmbCountry'])."',
			'".trim($_POST['txtBTelephone'])."',
			'".trim($_POST['txtBFax'])."',
			'".trim($_POST['txtBWeb'])."')";
			$isAllQueryExecuted2 = $_CONN->Execute($_sql);
			if($isAllQueryExecuted2){ 
			    $_sql = "insert into bank_info(user_id,account_name,account_no,account_type,bank_name,bank_routing_no,bank_swiftcode,
				         bank_othercode,address1,address2,city,state,lga,cpramary,country_id)
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
			'Y',
			'".trim($_POST['cmbCountry'])."')";
			$isAllQueryExecuted3 = $_CONN->Execute($_sql);
			if($isAllQueryExecuted3){ 
			   $_sql = "insert into merchant_info(user_id,username,password,create_date)
	 values('".$intID."',
			'".trim($_POST['txtUName'])."',
			'".trim($_POST['txtPassword'])."',
			 NOW())";
			 $isAllQueryExecuted4 = $_CONN->Execute($_sql);
			 if($isAllQueryExecuted4){  
			 
							$_sql = "SELECT 
								m.fname,m.lname,m.email,l.username,l.password  
							 FROM 
								merchant_info l, merchant m
							 WHERE
								l.username ='".$_POST['txtUName']."'
							 AND l.user_id=m.user_id";
							$rs2 = $_CONN->Execute($_sql);		
							//if( count(@$rs2[strtolower($_POST["txtUser"])])>0 ) {
								 $emailComponent[0]	=@$rs2->fields['username'];
								 $emailComponent[1]	=$_POST['txtPassword'];
								 $emailComponent[2]	=@$rs2->fields['fname'];
								 $emailComponent[3]	=@$rs2->fields['email'];
								//*********************************Get Email Template ************************************//
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
								//*********************************Get Email Template ************************************//
							
								//******************************** Send MAIL CODE START **********************************// 
								$ofEmail['to']      = $emailComponent[3];
								$ofEmail['subject'] = $_OFFICAILSITENAME." Login Information";
								$ofEmail['message'] = stripslashes($msg);
								$ofEmail['from']    = $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
									$mailsuccess 	= 	sendEmail($ofEmail,true); 
							 //if( count(@$rs2[strtolower($_POST["txtEmail"])])>0 ) 							
							if($mailsuccess){
								 $success=true;  
								
							}	
						 header("Location: ".$_DIR['site']['adminurl']."agentuser.php?suc".$_DELIM."1");
					   exit();
					 
				     }
			      }
		        }
		      }
		  }
    }
} //if($_SERVER['REQUEST_METHOD'] == "POST")

$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='MONTHS'  ORDER BY `condition`";
	$month = getOptions($_sql, @$_POST["cmbMonth"]);
	
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