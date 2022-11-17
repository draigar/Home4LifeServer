<?php
  $_sql = "select merchant.*,bank_info.*,merchant_info.*,gcm.value from merchant 
            left join gcm on gcm.condition = merchant.title 
            left join bank_info on bank_info.user_id = merchant.user_id 
			left join merchant_info on merchant_info.user_id = merchant.user_id 
			 where merchant.user_id=".$_GET['id']." and condition_type='TITLE'";	
	$rs = $_CONN->Execute($_sql);
	if($rs && !$rs->EOF){
		$cmbTitle         		= $rs->fields["value"];
		$txtFirst 		  		= $rs->fields["fname"];
		$txtMiddle 			= $rs->fields["mname"];
		$txtLast 			= $rs->fields["lname"];
		$txtEmail 			= $rs->fields["email"];
		$fdate 				   = $rs->fields["dateofbirth"];
		$txtBirthPlace         = $rs->fields["placeofbirth"];
		$txtSSN 		  		= $rs->fields["ssn"];
		$txtTypeID 			= $rs->fields["typeofid"];
		$txtIssExpDate         = $rs->fields["issued_exp_date"];
		$txtIssAuth 		  	= $rs->fields["auth_issueby"];
		$txtIssCountry 		= $rs->fields["ssn_issue_country"];
		
		$txtBName              = $rs->fields["business_name"];
		$txtBOther             = $rs->fields["other_business_type"];
		
		
		$txtACCName            = $rs->fields["account_name"];
		$txtACCNo 		  		= $rs->fields["account_no"];
		$txtBankName           = $rs->fields["bank_name"];
		$txtBankRout 		  	= $rs->fields["bank_routing_no"];
		$txtSwift 		        = $rs->fields["bank_swiftcode"];
		$txtBOtherCode         = $rs->fields["bank_othercode"];
		$txtBankAdd 		  	= $rs->fields["address1"];
		$txtBankAdd1 		    = $rs->fields["address2"];
		$txtBankCity           = $rs->fields["city"];
		$txtBankState 		  	= $rs->fields["state"];
		$txtBankZip 		    = $rs->fields["zip"];
		$cmbCountry            = $rs->fields["country_id"];
		
		$txtUName              = $rs->fields["username"];
		$txtPassword 		  	= $rs->fields["password"];
		$merchant_id			    = $rs->fields["user_id"];
}
$_sql = "select gcm.value from merchant   
         left join gcm on gcm.condition = merchant.business_type  
             where merchant.user_id=".$_GET['id']." and condition_type='BUISINESS_TYPE'";
	$rsB = $_CONN->Execute($_sql);
	if($rsB && !$rsB->EOF){ 
       $cmbPosition           = $rsB->fields["value"];
	}	
 $_sql = "select gcm.value from bank_info    
         left join gcm on gcm.condition = bank_info.account_type  
             where bank_info.user_id=".$_GET['id']." and condition_type='ACC_TYPE'";
	$rsBK = $_CONN->Execute($_sql);
	if($rsBK && !$rsBK->EOF){ 
       $cmbAType           = $rsBK->fields["value"];
	}		 

$_sql = "select merchant_address.*,country.name from merchant_address  
           left join country on country.country_id = merchant_address.country_id 
             where address_type='RS' and merchant_address.user_id=".$_GET['id'];
	  $rs1 = $_CONN->Execute($_sql);
	  if($rs1 && !$rs1->EOF){ 
		  $txtHAddress 		= $rs1->fields["address1"];
		  $txtHAddress1 		= $rs1->fields["address2"];
		  $txtHCity 			= $rs1->fields["city"];
		  $txtHState 			= $rs1->fields["state"];
		  $txtHZip 			= $rs1->fields["postcode"];
		  $cmbCountry1 			= $rs1->fields["name"];
		  $txtTelephone 		= $rs1->fields["phone1"];
		  $txtHmob 			= $rs1->fields["phone2"];
}	
$_sql = "select * from merchant_address  
	    where address_type='BS' and merchant_address.user_id=".$_GET['id'];
	$rs2 = $_CONN->Execute($_sql);
	if($rs2 && !$rs2->EOF){ 
			  $txtBAddress 		= $rs2->fields["address1"];
			  $txtBAddress1 		= $rs2->fields["address2"];
			  $txtBCity 			= $rs2->fields["city"];
			  $txtBState 			= $rs2->fields["state"];
			  $txtBZip 			= $rs2->fields["postcode"];
			  $cmbCountry2 			= $rs2->fields["country_id"];
			  $txtBTelephone 		= $rs2->fields["phone1"];
			  $txtBWeb 			= $rs2->fields["website"];
			  $txtBFax 			= $rs2->fields["fax"];
}
		

/*
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='MONTHS'  ORDER BY `condition`";
	$month = getOptions($_sql, @$cmbMonth"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='BUISINESS_TYPE'  ORDER BY `condition`";
	$business_type = getOptions($_sql, @$cmbPosition"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='TITLE'  ORDER BY `condition`";
	$title = getOptions($_sql, @$cmbTitle"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='ACC_TYPE'  ORDER BY `condition`";
	$acc_type = getOptions($_sql, @$cmbAType"]);
	
$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country = getOptions($_sql, @$cmbCountry"]);
	
	$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country1 = getOptions($_sql, @$cmbCountry1"]);
	
	$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country2 = getOptions($_sql, @$cmbCountry2"]);*/
?>