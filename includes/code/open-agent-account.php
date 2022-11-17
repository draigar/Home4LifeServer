<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"]=="Submit" && $_POST["step"]=="7" && $_POST['hidAction']=="validate")
{   
	if (trim($_POST["cmbTitle"])=="") {
		$_MSG[1] = " <font color='red'>Please select title.</font>";
		$error = 1;
	}
	if (trim($_POST["txtFirst"])=="") {
		$_MSG[2] = " <font color='red'>Please enter first name.</font>";
		$error = 1;
	}
	if (trim($_POST["txtLast"])=="") {
		$_MSG[3] = " <font color='red'>Please enter the last name.</font>";
		$error = 1;
	}
	if (trim($_POST["txtEmail"])=="") {
		$_MSG[4] = " <font color='red'>Please enter the email address.</font>";
		$error = 1;
	}
	else if(!isValidEmail(trim($_POST["txtEmail"]))){
	    $_MSG[4] = " <font color='red'>Please enter the valid email address.</font>";
	    $error = 1;
	} else {
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
			$_MSG[4] = " <font color='red'>Email address already exist, Please enter another email address.</font>";
			$error = 1;
		}
	}	
	if ($_POST["cmbDate"]=="" || $_POST["cmbMonth"]=="" || $_POST["cmbYear"]=="") {
		$_MSG[5] = " <font color='red'>Please select the date of birth.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBirthPlace"])=="") {
		$_MSG[8] = " <font color='red'>Please enter the place of birth.</font>";
		$error = 1;
	}
	if (trim($_POST["txtSSN"])=="") {
		$_MSG[9] = " <font color='red'>Please enter ssn No/Identity No.</font>";
		$error = 1;
	}
	if (trim($_POST["txtTypeID"])=="") {
		$_MSG[10] = " <font color='red'>Please enter type of ID.</font>";
		$error = 1;
	}
	if (trim($_POST["txtIssExpDate"])=="") {
		$_MSG[11] = " <font color='red'>Please enter Issued/expiry date.</font>";
		$error = 1;
	}
	if (trim($_POST["txtIssAuth"])=="") {
		$_MSG[12] = " <font color='red'>Please enter Issuing Authority.</font>";
		$error = 1;
	}
	if (trim($_POST["txtIssCountry"])=="") {
		$_MSG[13] = " <font color='red'>Please enter country of issuing ssn No/Identity No.</font>";
		$error = 1;
	}
	if (trim($_POST["txtHAddress"])=="") {
		$_MSG[14] = " <font color='red'>Please enter home address.</font>";
		$error = 1;
	}
	if (trim($_POST["txtHCity"])=="") {
		$_MSG[15] = " <font color='red'>Please enter home city.</font>";
		$error = 1;
	}
	if (trim($_POST["txtHState"])=="") {
		$_MSG[16] = " <font color='red'>Please enter home state.</font>";
		$error = 1;
	}
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[18] = " <font color='red'>Please select home country.</font>";
		$error = 1;
	}
	if (trim($_POST["txtTelephone"])=="") {
		$_MSG[19] = " <font color='red'>Please enter home telephone.</font>";
		$error = 1;
	}
	
	if($error) {
	  	$_POST["step"]="0";
  	}else{
	$_POST["step"]="7";
	}
}


if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input2"]=="Submit" && $_POST["step"]=="2" && $_POST['hidAction1']=="validate1")
{   
	if (trim($_POST["txtBName"])=="") {
		$_MSG[30] = " <font color='red'>Please enter business name.</font>";
		$error = 1;
	}
	if (trim($_POST["cmbPosition"])=="") {
		$_MSG[31] = " <font color='red'>Please select business type.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBAddress"])=="") {
		$_MSG[32] = " <font color='red'>Please enter business address.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBCity"])=="") {
		$_MSG[33] = " <font color='red'>Please enter business city.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBState"])=="") {
		$_MSG[34] = " <font color='red'>Please enter business state.</font>";
		$error = 1;
	}
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[36] = " <font color='red'>Please select business country.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBTelephone"])=="") {
		$_MSG[37] = " <font color='red'>Please enter business telephone No.</font>";
		$error = 1;
	}
	if($error) {
	  	$_POST["step"]="7";
  	}else{
	$_POST["step"]="2";
	}
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input1"]=="Submit" && $_POST["step"]=="3" && $_POST['hidAction2']=="validate2")
{   
	if (trim($_POST["txtACCName"])=="") {
		$_MSG[20] = " <font color='red'>Please enter bank account name.</font>";
		$error = 1;
	}
	if (trim($_POST["txtACCNo"])=="") {
		$_MSG[21] = " <font color='red'>Please enter bank account no.</font>";
		$error = 1;
	}
	if (trim($_POST["cmbAType"])=="") {
		$_MSG[22] = " <font color='red'>Please select account type.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBankName"])=="") {
		$_MSG[23] = " <font color='red'>Please enter benificiary bank.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBankRout"])=="") {
		$_MSG[24] = " <font color='red'>Please enter bank rounting.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBankAdd"])=="") {
		$_MSG[25] = " <font color='red'>Please enter bank address.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBankCity"])=="") {
		$_MSG[26] = " <font color='red'>Please enter bank city.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBankState"])=="") {
		$_MSG[27] = " <font color='red'>Please enter bank state.</font>";
		$error = 1;
	}
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[29] = " <font color='red'>Please select bank country.</font>";
		$error = 1;
	}
	
	if($error) {
	  	$_POST["step"]="2";
  	}else{
	$_POST["step"]="3";
	}
}


$success=false;
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input3"]=="Submit" && $_POST["step"]=="4" && $_POST['hidAction3']=="validate3")
  {     
	if (trim($_POST["txtUName"])=="") {
		$_MSG[38] = " <font color='red'>Please enter login name.</font>";
		$error = 1;
	}	
	else if(strlen(trim($_POST["txtUName"]))<4 || strlen(trim($_POST["txtUName"]))>20){ 
	    $_MSG[38] = " <font color='red'>Username between 4-20 characters.</font>";
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
			$_MSG[38] = " <font color='red'>UserName already exist ,Please enter another user name.</font>";
			$error = 1;
		}
	}
	if (trim($_POST["txtPassword"])=="") {
		$_MSG[39] = " <font color='red'>Please enter password.</font>";
		$error = 1;
	}
	elseif(($mgs=check_valid_password(trim($_POST["txtPassword"]),trim($_POST["txtUName"])))!=1)
	 { 
		$_MSG[39] = $mgs;
		$error = 1;
	 }
	
	if (trim($_POST["txtConfirm"])=="") {
		$_MSG[40] = " <font color='red'>Please enter confirm password.</font>";
		$error = 1;
	}
	else if(trim($_POST["txtPassword"])!=trim($_POST["txtConfirm"])){
	    $_MSG[40] = " <font color='red'>Confirm password should equal to the original password.</font>";
		$error = 1;
	}
	
	/*$_sql = "SELECT login_id FROM merchant_info WHERE username='".trim($_POST["txtUName"])."'";           				
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0){ //state Exist
		$_MSG[38] = "<img src='".$_DIR['site']['url']."images/arrow.gif' style='float:left'> UserName already exist ,Please enter another user name.</font><br>";
		$error = 1;
	} */
	
 if(empty($error)){ 
		
		 $_sql = "insert into temp_merchant(title,fname,lname,mname,email,user_type,dateofbirth,placeofbirth,ssn,typeofid,issued_exp_date,auth_issueby,
	         ssn_issue_country,status,business_name,business_type,other_business_type,acc_create_date)
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
			'I',
			'".trim($_POST['txtBName'])."',
			'".trim($_POST['cmbPosition'])."',
			'".trim($_POST['txtBOther'])."',
			NOW())";

		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){ 
		  $intID=$_CONN->Insert_ID();
		   $_sql = "insert into temp_merchant_address(address_type,change_req_id,address1,address2,city,state,lga,country_id,phone1,phone2)
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
			   $_sql = "insert into temp_merchant_address(address_type,change_req_id,address1,address2,city,state,lga,country_id,phone1,fax,website)
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
			    $_sql = "insert into temp_bank_info(change_req_id,account_name,account_no,account_type,bank_name,bank_routing_no,bank_swiftcode,
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
			   $_sql = "insert into temp_merchant_info(change_req_id,username,password,create_date)
	 values('".$intID."',
			'".trim($_POST['txtUName'])."',
			'".$_POST['txtPassword']."',
			 NOW())";
			 $isAllQueryExecuted4 = $_CONN->Execute($_sql);
			 if($isAllQueryExecuted4){ 
			    send_newagent_admin_email();	
                 header("location: ".$_DIR["site"]["url"]."thank_you.php");
			     exit();
			   }
		     }
		   }
		 }
	   }			
				
	 }
	 if($error) {
	  	$_POST["step"]="3";
  	}else{
	$_POST["step"]="4";
	}
}

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
	
$_sql = "SELECT state_id, state_name FROM state ORDER BY state_id";
	$state = getOptions($_sql, @$_POST["cmbCountry"]);	
?>