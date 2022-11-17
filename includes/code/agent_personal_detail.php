<?php
//$_GET['nid']  = finding_id_from_url('nid', $_DELIM);
$_sql = "select user_id,flag from temp_merchant where user_id=".$_SESSION['login']['userid'];
$rs  = $_CONN->Execute($_sql);
if($rs && !$rs->EOF){
   $uid  = $rs->fields['user_id']; 
   $flag = $rs->fields['flag']; 
}

$user_id = $_SESSION['login']['userid'];
if (empty($user_id)) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['url']."agent-sign-in".$baratend);
} else { 
   $_sql = "select merchant.*,bank_info.*,merchant_info.* from merchant 
            left join bank_info on bank_info.user_id = merchant.user_id 
			left join merchant_info on merchant_info.user_id = merchant.user_id 
			 where merchant.user_id=".$user_id;	
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['url']."agent-sign-in".$baratend);		
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
		$_POST["txtBankLga"] 		  	= $rs->fields["lga"];
		$_POST["txtBankZip"] 		    = $rs->fields["zip"];
		$_POST["cmbCountry"]            = $rs->fields["country_id"];
		$_POST["cmbType"]          		= $rs->fields["trans_charge_type"];
		
		$_POST["txtUName"]              = $rs->fields["username"];
		$_POST["txtPassword"] 		  	= $rs->fields["password"];
		$_POST["cmbSetPer"] 		  	= $rs->fields["settle_period"];
		$_POST['hidMID']			    = $rs->fields["merchant_id"];
		$_POST['txtMerKey']			    = $rs->fields["merchant_key_id"];
		$_POST['rd1']       			= $rs->fields["gateway_mode"];
		
		$_sql = "select * from merchant_address  
             where merchant_address.user_id=".$user_id;
		$rs1 = $_CONN->Execute($_sql);
		while(!$rs1->EOF){
		  if($rs1->fields["address_type"]=='RS'){ 
			  $_POST["txtHAddress"] 		= $rs1->fields["address1"];
			  $_POST["txtHAddress1"] 		= $rs1->fields["address2"];
			  $_POST["txtHCity"] 			= $rs1->fields["city"];
			  $_POST["txtHState"] 			= $rs1->fields["state"];
			  $_POST["txtHLga"] 			= $rs1->fields["lga"];
			  $_POST["txtHZip"] 			= $rs1->fields["postcode"];
			  $_POST["cmbCountry"] 			= $rs1->fields["country_id"];
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
			  $_POST["cmbCountry"] 			= $rs1->fields["country_id"];
			  $_POST["cmbCountry1"] 		= $rs1->fields["country_id"];
			  $_POST["cmbCountry2"] 		= $rs1->fields["country_id"];
			  $_POST["txtBTelephone"] 		= $rs1->fields["phone1"];
			  $_POST["txtBWeb"] 			= $rs1->fields["website"];
			  $_POST["txtBFax"] 			= $rs1->fields["fax"];
		  }
		  $rs1->MoveNext();
		}		
	}
	$_POST['txtTraCharg']			= $rs->fields["trans_charges"];
	$_POST['txtRefCharg']			= $rs->fields["refund_charges"];
}

if($_SERVER['REQUEST_METHOD'] == "POST")

{
	if (trim($_POST["txtHAddress"])=="") {
		$_MSG[1] = " <font color='red'>Please enter home address.</font>";
		$error = 1;
	}
	if (trim($_POST["txtHCity"])=="") {
		$_MSG[2] = " <font color='red'>Please enter home city.</font>";
		$error = 1;
	}
	if (trim($_POST["txtHState"])=="") {
		$_MSG[3] = " <font color='red'>Please enter home state.</font>";
		$error = 1;
	}
	
	if (trim($_POST["txtTelephone"])=="") {
		$_MSG[6] = " <font color='red'>Please enter home telephone.</font>";
		$error = 1;
	}
	
	
	if (trim($_POST["cmbPosition"])=="") {
		$_MSG[7] = " <font color='red'>Please select business type.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBAddress"])=="") {
		$_MSG[8] = " <font color='red'>Please enter business address.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBCity"])=="") {
		$_MSG[9] = " <font color='red'>Please enter business city.</font>";
		$error = 1;
	}
	if (trim($_POST["txtBState"])=="") {
		$_MSG[10] = " <font color='red'>Please enter business state.</font>";
		$error = 1;
	}
	
	if (trim($_POST["txtBTelephone"])=="") {
		$_MSG[13] = " <font color='red'>Please enter business telephone No.</font>";
		$error = 1;
	}
	
	if (empty($error)) {  
		
	 if($user_id == $uid){ 
	     
	      $_sql = "delete from temp_merchant where user_id=".$user_id;
			$del = $_CONN->Execute($_sql);
			if($del){
				  $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='RS'";
				  $del3 = $_CONN->Execute($_sql);
				  if($del3){
					 $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='BS'";
					 $del4 = $_CONN->Execute($_sql); 
					 if($del4){ 
					    $_sql = "insert into temp_merchant(user_id,status,business_type,other_business_type,flag,gateway_mode,acc_create_date)
						 values('".$user_id."',
								'I',
								'".trim($_POST['cmbPosition'])."',
								'".trim($_POST['txtBOther'])."',
								'Y',
								'".trim($_POST['rd1'])."',
								NOW())";
					
							$isAllQueryExecuted = $_CONN->Execute($_sql); 
							if($isAllQueryExecuted){ 
							  $intID=$_CONN->Insert_ID();
							   $_sql = "insert into temp_merchant_address(user_id,address_type,change_req_id,address1,address2,city,state,postcode,phone1,phone2)
						 values('".$user_id."',
								'RS',
								'".$intID."',
								'".trim($_POST['txtHAddress'])."',
								'".trim($_POST['txtHAddress1'])."',
								'".trim($_POST['txtHCity'])."',
								'".trim($_POST['txtHState'])."',
								'".trim($_POST['txtHZip'])."',
								'".trim($_POST['txtTelephone'])."',
								'".trim($_POST['txtHmob'])."')";
								$isAllQueryExecuted1 = $_CONN->Execute($_sql); 
								if($isAllQueryExecuted1){ 
								  $_sql = "insert into temp_merchant_address(user_id,address_type,change_req_id,address1,address2,city,state,postcode,phone1,fax,website)
						 values('".$user_id."',
								'BS',
								'".$intID."',
								'".trim($_POST['txtBAddress'])."',
								'".trim($_POST['txtBAddress1'])."',
								'".trim($_POST['txtBCity'])."',
								'".trim($_POST['txtBState'])."',
								'".trim($_POST['txtBZip'])."',
								'".trim($_POST['txtBTelephone'])."',
								'".trim($_POST['txtBFax'])."',
								'".trim($_POST['txtBWeb'])."')";
								$isAllQueryExecuted2 = $_CONN->Execute($_sql);
								
								  $success=true;
								  $success = "Your request has been successfully submitted for approval.....";
								 }
							  }
					    
					 }
			     }

		      } 
	   }
	   else if($user_id != $uid)
	   {  
	        
			  $_sql = "insert into temp_merchant(user_id,status,business_type,other_business_type,flag,gateway_mode,acc_create_date)
	 values('".$user_id."',
	        'I',
			'".trim($_POST['cmbPosition'])."',
			'".trim($_POST['txtBOther'])."',
			'Y',
			'".trim($_POST['rd1'])."',
			NOW())";

		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){ 
		  $intID=$_CONN->Insert_ID();
		   $_sql = "insert into temp_merchant_address(user_id,address_type,change_req_id,address1,address2,city,state,postcode,phone1,phone2)
	 values('".$user_id."',
	        'RS',
			'".$intID."',
			'".trim($_POST['txtHAddress'])."',
			'".trim($_POST['txtHAddress1'])."',
			'".trim($_POST['txtHCity'])."',
			'".trim($_POST['txtHState'])."',
			'".trim($_POST['txtHZip'])."',
			'".trim($_POST['txtTelephone'])."',
			'".trim($_POST['txtHmob'])."')";
			$isAllQueryExecuted1 = $_CONN->Execute($_sql); 
			if($isAllQueryExecuted1){ 
			   $_sql = "insert into temp_merchant_address(user_id,address_type,change_req_id,address1,address2,city,state,postcode,phone1,fax,website)
	 values('".$user_id."',
	        'BS',
			'".$intID."',
			'".trim($_POST['txtBAddress'])."',
			'".trim($_POST['txtBAddress1'])."',
			'".trim($_POST['txtBCity'])."',
			'".trim($_POST['txtBState'])."',
			'".trim($_POST['txtBZip'])."',
			'".trim($_POST['txtBTelephone'])."',
			'".trim($_POST['txtBFax'])."',
			'".trim($_POST['txtBWeb'])."')";
			$isAllQueryExecuted2 = $_CONN->Execute($_sql);
			
			  $success=true;
		      $message = "Your information has been successfully updated. Please wait untile our support team contact with you.....";
			 }
		  }
			  
	       
	   }
	 
	} //if (empty($error))
		
} 
$_sql = "select gcm.value,merchant_key_id from merchant left join gcm on gcm.condition = merchant.settle_period where condition_type='SETTLE_DAYS' and merchant.user_id=".$user_id;
  $rsSP  = $_CONN->Execute($_sql);


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