<?php
if($_APP_LIVE=="Y") $_GET['mid']  = finding_id_from_url('mid', $_DELIM);

$_sql = "select cf_type,cf_amount from comiss_fees";
 $rsCF = $_CONN->Execute($_sql);
 if($rsCF && !$rsCF->EOF){ 
   while(!$rsCF->EOF){
     $cf_type[]     = $rsCF->fields['cf_type'];
	$rsCF->MoveNext();
	}
 }
 
if (empty($_GET['mid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."agentuser".$atend."err".$_DELIM."1".$baratend);
} else { 
   $_sql = "select merchant.*,bank_info.*,merchant_info.* from merchant 
            left join bank_info on bank_info.user_id = merchant.user_id 
			left join merchant_info on merchant_info.user_id = merchant.user_id 
			 where merchant.user_id=".$_GET['mid'];	
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."agentuser".$atend."err".$_DELIM."1".$baratend);
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
		$_POST['txtTraCharg']			= $rs->fields["trans_charges"];
		$_POST['txtRefCharg']			= $rs->fields["refund_charges"];
		$_POST['txtMerKey']			    = $rs->fields["merchant_key_id"];
		$_POST['rd1']       			= $rs->fields["gateway_mode"];
		
		$_sql = "select * from merchant_address  
             where merchant_address.user_id=".$_GET['mid'];
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
	 
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
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
	$_sql = "select request_id,email from temp_merchant where email='".$_POST['txtEmail']."' and request_id!=".$_GET['mid'];
		$succ_tmp = $_CONN->Execute($_sql);
		if($succ_tmp && !$succ_tmp->EOF){
		   $tmp_email  = $succ_tmp->fields['email'];
		}
		$_sql = "select user_id,email from merchant where email='".$_POST['txtEmail']."' and user_id!=".$_GET['mid'];
		$succ_main = $_CONN->Execute($_sql);  
		if($succ_main && !$succ_main->EOF){
		   $main_email  = $succ_main->fields['email'];
		}
		if($_POST['txtEmail']==$tmp_email || $_POST['txtEmail']==$main_email){
	    $_MSG[] = " Email ID already exist ,Please enter another email address.";
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
	if (trim($_POST["cmbCountry1"])=="") {
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
	if (trim($_POST["cmbCountry2"])=="") {
		$_MSG[] = " Please select bank country.";
		$error = 1;
	}
	/*if (trim($_POST["txtConfirm"])=="") {
		$_MSG[] = " Please enter confirm password.";
		$error = 1;
	}
	if(trim($_POST["txtPassword"])!=trim($_POST["txtConfirm"])){
	    $_MSG[] = " Confirm password should equal to the original password.";
		$error = 1;
	}*/
	
	/*if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"])) // Image is empty
	{ 
		if (strtolower($_FILES["txtImage".$i]["type"])!="image/jpg" && strtolower($_FILES["txtImage".$i]["type"])!="image/pjpeg" && strtolower($_FILES["txtImage".$i]["type"])!="image/jpeg")  //Image is not jpg or gif 
		{
			$_MSG[] = " The image must be JPG/JPEG.";
			$error = 1;		
		}
	}		
	
	if (empty($error)) {
		if(!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"])){
			chmod($_DIR['inc']['event_images'],0777); 

			$old_image =$_POST["hidImage"];
			if(!empty($old_image) && file_exists($_DIR['inc']['user_image']."t".$old_image)) {
						unlink($_DIR['inc']['user_image']."t".$old_image);					
			}
			if(!empty($old_image) && file_exists($_DIR['inc']['user_image'].$old_image)) {
						unlink($_DIR['inc']['user_image'].$old_image);
			}						
	//		$_POST["hidImage"]=$original;		
			$original=date("Hismdy").".".funcheckfiletype($_FILES["txtImage"]["name"]);
			$dims = getimagesize($_FILES["txtImage"]["tmp_name"]);
			if($dims[0] > 100) {						
				$image = $_FILES["txtImage"]["tmp_name"];
				setsize("85x100");
				resize($newwidth, $newheight, $_DIR['inc']['user_image']."t".$original);
			}
			else
				copy($_FILES["txtImage"]["tmp_name"],$_DIR['inc']['user_image']."t".$original);
			if($dims[0] > 420) {						
				$image = $_FILES["txtImage"]["tmp_name"];
				setsize("420x300");
				resize($newwidth, $newheight, $_DIR['inc']['user_image'].$original);
			}
			else
				copy($_FILES["txtImage"]["tmp_name"],$_DIR['inc']['user_image'].$original);	
			chmod($_DIR['inc']['user_image'],0755);
		}else 
			$original = $_POST["hidImage"];
	}		
*/
	if (empty($error)) { 
	  if(!empty($_POST["cmbDate"]) && !empty($_POST["cmbMonth"]) && !empty($_POST["cmbYear"])) { 
			$birthdate = $_POST["cmbYear"]."-".$_POST["cmbDate"]."-".$_POST["cmbMonth"];
	  }
		 $_sql = "update 
						merchant 
				 set
				 		title='".trim($_POST['cmbTitle'])."',
						fname='".trim($_POST['txtFirst'])."',
						lname='".trim($_POST['txtLast'])."',
						mname='".trim($_POST['txtMiddle'])."',
						email='".trim($_POST['txtEmail'])."',
						dateofbirth='".$birthdate."',
						placeofbirth='".trim($_POST['txtBirthPlace'])."',
						ssn='".trim($_POST['txtSSN'])."',
						typeofid='".trim($_POST['txtTypeID'])."',
						issued_exp_date='".trim($_POST['txtIssExpDate'])."',
						auth_issueby='".trim($_POST['txtIssAuth'])."',
						ssn_issue_country='".trim($_POST['txtIssCountry'])."',
						business_name='".trim($_POST['txtBName'])."',
						business_type='".trim($_POST['cmbPosition'])."',
						other_business_type='".trim($_POST['txtBOther'])."',
						settle_period='".trim($_POST['cmbSetPer'])."', 
						trans_charges='".trim($_POST["txtTraCharg"])."', 
						trans_charge_type='".$_POST["cmbType"]."', 
						merchant_key_id='".trim($_POST['txtMerKey'])."', 
						gateway_mode='".$_POST['rd1']."',
						lastupdated=NOW()
				WHERE user_id=".@$_GET['mid'];
						
		//Execute Query
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
						country_id='".trim($_POST['cmbCountry'])."',
						phone1='".trim($_POST['txtTelephone'])."',
						phone2='".trim($_POST['txtHmob'])."',
						lastupdated=NOW() 
				WHERE user_id=".@$_GET['mid']." and address_type='RS'";
				
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
						country_id='".trim($_POST['cmbCountry'])."',
						phone1='".trim($_POST['txtBTelephone'])."',
						fax='".trim($_POST['txtBFax'])."',
						website='".trim($_POST['txtBWeb'])."',
						lastupdated=NOW() 
				WHERE user_id=".@$_GET['mid']." and address_type='BS'";
				
				$isAllQueryExecuted2 = $_CONN->Execute($_sql);
				if($isAllQueryExecuted2){ 
				
				  $_sql = "update 
						bank_info   
				 set
				 		account_name='".trim($_POST['txtACCName'])."',
						account_no='".trim($_POST['txtACCNo'])."',
						account_type='".trim($_POST['cmbAType'])."',
						bank_name='".trim($_POST['txtBankName'])."',
						bank_routing_no='".trim($_POST['txtBankRout'])."',
						bank_swiftcode='".trim($_POST['txtSwift'])."',
						bank_othercode='".trim($_POST['txtBOtherCode'])."',
						address1='".trim($_POST['txtBankAdd'])."',
						address2='".trim($_POST['txtBankAdd1'])."',
						city='".trim($_POST['txtBankCity'])."',
						state='".trim($_POST['txtBankState'])."',
						lga='".trim($_POST['txtBankLga'])."',
						zip='".trim($_POST['txtBankZip'])."',
						country_id='".trim($_POST['cmbCountry'])."',
						dtupdtimestamp=NOW() 
				WHERE user_id=".@$_GET['mid'];
				$isAllQueryExecuted3 = $_CONN->Execute($_sql);
				
				header("Location: ".$_DIR['site']['adminurl']."agentuser".$atend."suc".$_DELIM."2".$baratend);
			    exit();					   
			 }
		  }
	   }
	} //if (empty($error))
		
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