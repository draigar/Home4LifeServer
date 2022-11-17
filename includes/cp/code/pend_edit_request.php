<?php
if($_APP_LIVE=="Y") $_GET["mid"]=finding_id_from_url("mid",$_DELIM);
$_sql = "select user_id from temp_merchant where request_id=".$_GET['mid'];
$rs = $_CONN->Execute($_sql);
if($rs && !$rs->EOF){
  $user_id = $rs->fields['user_id'];
}
if($rs)
 $rs->close();

$_sql = "select merchant.*,date_format(dateofbirth,'%D %M %Y') as dateofbirth,gcm.value from merchant 
         left join gcm on gcm.condition = merchant.title 
         where condition_type='TITLE' and user_id=".$user_id;
$rsMain  = $_CONN->Execute($_sql);
if($rsMain && !$rsMain->EOF){
        $title         	= $rsMain->fields["value"];
		$fname 		  	= $rsMain->fields["fname"];
		$mname 			= $rsMain->fields["mname"];
		$lname 			= $rsMain->fields["lname"];
		$email 			= $rsMain->fields["email"];
		$dateofbirth 	= $rsMain->fields["dateofbirth"];
		$birthplace     = $rsMain->fields["placeofbirth"];
		$ssn 		  	= $rsMain->fields["ssn"];
		$type_id 		= $rsMain->fields["typeofid"];
		$exp_date       = $rsMain->fields["issued_exp_date"];
		$authh_issue_by = $rsMain->fields["auth_issueby"];
		$issue_country 	= $rsMain->fields["ssn_issue_country"];
		$merchant_id    = $rsMain->fields["merchant_id"];
		$gateway_mode   = $rsMain->fields["gateway_mode"];
}
 $_sql = "select merchant_address.*,country.name,state.state_name,lga.lga_name from merchant_address 
         left join country on country.country_id = merchant_address.country_id 
		 left join state on state.state_id = merchant_address.state  
		 left join lga on lga.lga_id = merchant_address.lga 
         where address_type='RS' and user_id=".$user_id;
$rsMain  = $_CONN->Execute($_sql);
if($rsMain && !$rsMain->EOF){
          $haddress1 		= $rsMain->fields["address1"];
		  $haddress2 		= $rsMain->fields["address2"];
		  $hcity 			= $rsMain->fields["city"];
		  $hstate 			= $rsMain->fields["state_name"];
		  $hpostcode 		= $rsMain->fields["postcode"];
		  $hcountry 		= $rsMain->fields["name"];
		  $hphone1 		    = $rsMain->fields["phone1"];
		  $hphone2 			= $rsMain->fields["phone2"];
		  $hlga 			= $rsMain->fields["lga_name"];
}

$_sql = "select merchant.*,gcm.value from merchant left join gcm on gcm.condition = merchant.business_type  
         where condition_type='BUISINESS_TYPE' and user_id=".$user_id;
$rsMain  = $_CONN->Execute($_sql);
if($rsMain && !$rsMain->EOF){
        $business_name         	= $rsMain->fields["business_name"];
		$business_type1 		= $rsMain->fields["value"];
		$other_business_type 	= $rsMain->fields["other_business_type"];
}

$_sql = "select merchant_address.*,country.name,state.state_name,lga.lga_name from merchant_address 
         left join country on country.country_id = merchant_address.country_id 
		 left join state on state.state_id = merchant_address.state  
		 left join lga on lga.lga_id = merchant_address.lga 
         where address_type='BS' and user_id=".$user_id;
$rsMain  = $_CONN->Execute($_sql);
if($rsMain && !$rsMain->EOF){
          $baddress1 		= $rsMain->fields["address1"];
		  $baddress2 		= $rsMain->fields["address2"];
		  $bcity 			= $rsMain->fields["city"];
		  $bstate 			= $rsMain->fields["state_name"];
		  $bpostcode 		= $rsMain->fields["postcode"];
		  $bcountry 		= $rsMain->fields["name"];
		  $bphone1 		    = $rsMain->fields["phone1"];
		  $bfax 			= $rsMain->fields["fax"];
		  $bwebsite 		= $rsMain->fields["website"];
		  $blga 			= $rsMain->fields["lga_name"];
}
 

//$_GET['nid']  = finding_id_from_url('nid', $_DELIM);
if (empty($_GET['mid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."change_request".$atend."err".$_DELIM."1".$baratend);
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
		header("Location: ".$_DIR['site']['adminurl']."change_request".$atend."err".$_DELIM."1".$baratend);
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
		
		$_POST["txtUName"]              = $rs->fields["username"];
		$_POST["txtPassword"] 		  	= $rs->fields["password"];
		$_POST['hidImage']			    = $rs->fields["userimage"];
		$_POST['rd']			        = $rs->fields["gateway_mode"];
		
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
	
	if (trim($_POST["txtTelephone"])=="") {
		$_MSG[] = " Please enter home telephone.";
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
	
	if (trim($_POST["txtBTelephone"])=="") {
		$_MSG[] = " Please enter business telephone No.";
		$error = 1;
	}
	
	if (empty($error)) { 
	  
	    if($_POST['rd1']=='A'){
	    $_sql = "update 
						merchant 
				 set
				 		business_type='".trim($_POST['cmbPosition'])."',
						other_business_type='".trim($_POST['txtBOther'])."',
						gateway_mode='".trim($_POST['rd'])."',
						lastupdated=NOW() 
				WHERE user_id=".$user_id;

		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){ 
		  $_sql = "update 
						merchant_address  
				 set
				 		address1='".trim($_POST['txtHAddress'])."',
						address2='".trim($_POST['txtHAddress1'])."',
						city='".trim($_POST['txtHCity'])."',
						state='".trim($_POST['txtHState'])."',
						lga='".trim($_POST['txtHLga'])."',
						postcode='".trim($_POST['txtHZip'])."',
						phone1='".trim($_POST['txtTelephone'])."',
						phone2='".trim($_POST['txtHmob'])."' 
				WHERE user_id=".$user_id." and address_type='RS'";
			$isAllQueryExecuted1 = $_CONN->Execute($_sql); 
			if($isAllQueryExecuted1){ 
			   $_sql = "update 
						merchant_address  
				 set
				 		address1='".trim($_POST['txtBAddress'])."',
						address2='".trim($_POST['txtBAddress1'])."',
						city='".trim($_POST['txtBCity'])."',
						state='".trim($_POST['txtBState'])."',
						lga='".trim($_POST['txtBLga'])."',
						postcode='".trim($_POST['txtBZip'])."',
						phone1='".trim($_POST['txtBTelephone'])."',
						fax='".trim($_POST['txtBFax'])."',
						website='".trim($_POST['txtBWeb'])."' 
				WHERE user_id=".$user_id." and address_type='BS'";
			$isAllQueryExecuted2 = $_CONN->Execute($_sql);
			if($isAllQueryExecuted2){ 
			    $_sql = "update 
						temp_merchant  
				 set
				 		flag='N' 
						
				WHERE user_id=".$user_id;
                
			 $isAllQueryExecuted4 = $_CONN->Execute($_sql);
			 if($isAllQueryExecuted4){  
			 
			     $_sql = "delete from temp_merchant where user_id=".$user_id;
					$del = $_CONN->Execute($_sql);
					if($del){
					   	  $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='RS'";
							  $del3 = $_CONN->Execute($_sql);
							  if($del3){
								 $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='BS'";
								 $del4 = $_CONN->Execute($_sql);
							  }
						  }
			
		       header("Location: ".$_DIR['site']['adminurl']."pend_view_request".$atend."suc".$_DELIM."1".$baratend);
		       exit();
			    }
		      }
		    }
		  }
		 }
		
		
		if($_POST['rd1']=='I'){
	    $_sql = "delete from temp_merchant where user_id=".$user_id;
		$del = $_CONN->Execute($_sql);
		if($del){
			 $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='RS'";
			  $del3 = $_CONN->Execute($_sql);
			  if($del3){
				 $_sql = "delete from temp_merchant_address where user_id=".$user_id." and address_type='BS'";
				 $del4 = $_CONN->Execute($_sql);
				 
				 $_sql = "SELECT 
					fname,lname,email 
				 FROM 
					merchant 
				 WHERE
					user_id=".$user_id;
					$rs2 = $_CONN->Execute($_sql);		
					//if( count(@$rs2[strtolower($_POST["txtUser"])])>0 ) {
					
						 $emailComponent[0]	=@$rs2->fields['fname'];
						 $emailComponent[1]	=@$rs2->fields['email'];
						//*********************************Get Email Template ************************************//
							//Get Admin forgotpassword template
							 $_sql="SELECT name,content FROM emailtemplate WHERE page_id=10";
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
							$success 	= 	sendEmail($ofEmail,true); 
					//if( count(@$rs2[strtolower($_POST["txtEmail"])])>0 ) 							
					if($success){
						 $success=true;  
					//	 header("Location: ".$_DIR['site']['url']."thankyou.php");
					//	 exit(); 
					}	
					header("Location: ".$_DIR['site']['adminurl']."pend_view_request.php?suc".$_DELIM."3");
					exit();
			  }
		   }
	   }
   }
		
} //if($_SERVER['REQUEST_METHOD'] == "POST")
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='BUISINESS_TYPE'  ORDER BY `condition`";
	$business_type = getOptions($_sql, @$_POST["cmbPosition"]);
	
$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='ACC_TYPE'  ORDER BY `condition`";
	$acc_type = getOptions($_sql, @$_POST["cmbAType"]);
	
$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
	$country = getOptions($_sql, @$_POST["cmbCountry"]);
?>