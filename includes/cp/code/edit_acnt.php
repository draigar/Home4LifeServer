<?php
if($_APP_LIVE=="Y") $_GET["aid"]=finding_id_from_url("aid",$_DELIM);
if($_APP_LIVE=="Y") $_GET["typ"]=finding_id_from_url("typ",$_DELIM);

if (empty($_GET['aid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."unverified_acnt".$atend."err".$_DELIM."1".$baratend);
} else { 
     $_sql="SELECT * FROM users left join login_info on users.user_id=login_info.user_id WHERE users.user_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."unverified_acnt".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST") {
		$_POST["txtFirstName"]        		= $rs->fields["fname"];
		$_POST["txtLastName"] 		  		= $rs->fields["lname"];
		$_POST["txtaddr1"] 		    	= $rs->fields["address1"];
		$_POST["txtaddr2"] 		    	= $rs->fields["address2"];
		$_POST["cmbCountry"] 		    	= $rs->fields["country_id"];
		$_POST["txtState"] 		    	= $rs->fields["state_id"];
		$_POST["txtCity"] 		    	= $rs->fields["city_id"];
		$_POST["txtemail"] 		    	= $rs->fields["email_id"];
		$_POST["txtzipCode"] 		    	= $rs->fields["zipcode"];
		$_POST["txtPhone"] 		    	= $rs->fields["phone"];
		$_POST["txtMobile"] 		    	= $rs->fields["mobile"];		
		$_POST["rdostatus"] 		   	= $rs->fields["status"];
		$_POST["txtUserName"]           =$rs->fields["username"];
		$_POST["cmbOfficeName"]   	   =$rs->fields["office_id"];

		$_POST["txtIDType"]   	   =$rs->fields["id_name"];
		$_POST["txtIDNumber"]   	   =$rs->fields["id_number"];
		$_POST["cmbStatus"]   	   =$rs->fields["member_status"];
		
		$issue = explode("-",$rs->fields["id_issuedate"]);
		$_POST["txtIssueDt"]  = $issue[1]."-".$issue[2]."-".$issue[0];

		$exp = explode("-",$rs->fields["id_expdate"]);
		$_POST["txtExpDate"]   = $exp[1]."-".$exp[2]."-".$exp[0];

		}
}

if($_SERVER['REQUEST_METHOD'] == "POST"){	
	if (trim($_POST["txtFirstName"])=="") {
		$_MSG[] = "Please enter first name.";
		$error = 1;
	}
	if (trim($_POST["txtLastName"])=="") { 
		$_MSG[] = "Please enter last name.";
		$error = 1;
	}
	if (trim($_POST["txtaddr1"])=="") {
		$_MSG[] = "Please enter address.";
		$error = 1;		
	}
	if (trim($_POST["txtCity"])=="") {
		$_MSG[] = "Please enter city.";
		$error = 1;		
	}
	if (trim($_POST["txtState"])=="") {
		$_MSG[] = "Please enter state.";
		$error = 1;		
	}
	if (trim($_POST["cmbCountry"])=="") {
		$_MSG[] = "Please select country.";
		$error = 1;		
	}
	if (trim($_POST["txtPhone"])=="" && trim($_POST["txtMobile"])=="") {
		$_MSG[] = "Please enter atleast one contact number.";
		$error = 1;		
	}elseif(trim($_POST["txtMobile"])!="" && !is_numeric(trim($_POST["txtMobile"])) ){
		$_MSG[] = "Please enter valid numeric mobile number.";
		$error = 1;		
	}
	if (trim($_POST["txtemail"])) {
	   $_sql="select user_id from users where user_id!=".$_GET["aid"]." and email_id ='".$_POST["txtemail"]."'";
		$rs=$_CONN->Execute($_sql);
		if($rs && !$rs->EOF){
			$_MSG[] = "This email id already exists Please try something else.";
			$error = 1;
		}		
	}
	if (trim($_POST["txtemail"])=="") {
		$_MSG[3] = "Please enter email address.";
		$error = 1;		
	}elseif (!isValidEmail(trim($_POST["txtemail"]))) {
		$_MSG[3] = "Please enter valid email address.";
		$error = 1;
	}
	if (trim($_POST["txtIDType"])=="") {
		$_MSG[] = "Please enter ID type.";
		$error = 1;
	}
	if (trim($_POST["txtIDNumber"])=="") { 
		$_MSG[] = "Please enter ID number.";
		$error = 1;
	}
	if (trim($_POST["txtIssueDt"])=="") {
		$_MSG[] = "Please enter Issue Date.";
		$error = 1;		
	}
	if (trim($_POST["txtExpDate"])=="") {
		$_MSG[] = "Please enter Expiry Date.";
		$error = 1;		
	}
	if (trim($_POST["cmbStatus"])=="") {
		$_MSG[] = "Please select status.";
		$error = 1;		
	}
		
	if (empty($error)) {
	$issue = explode("-",trim($_POST["txtIssueDt"]));
	$issueDate = $issue[2]."-".$issue[0]."-".$issue[1];
	$exp = explode("-",trim($_POST["txtExpDate"]));
	$expDate = $exp[2]."-".$exp[0]."-".$exp[1];


	 $_sql = "UPDATE 
				users 
			SET 				
				fname 			  = '".addslashes(trim($_POST['txtFirstName']))."',
				lname 			  = '".addslashes(trim($_POST['txtLastName']))."',
				address1          = '".trim($_POST["txtaddr1"] )."',
				address2          = '".trim($_POST["txtaddr2"] )."',
				country_id        = '".$_POST['cmbCountry']."', 
				state_id          = '".$_POST['txtState']."',
                city_id   		  = '".$_POST['txtCity']."',
				email_id	      = '".trim($_POST['txtemail'])."',
				zipcode	    	  = '".trim($_POST['txtzipCode'])."',
				phone	     	  = '".trim($_POST['txtPhone'])."',
				mobile	     	  = '".trim($_POST['txtMobile'])."',								

                id_name   		  = '".trim($_POST['txtIDType'])."',
				id_number	      = '".trim($_POST['txtIDNumber'])."',
				id_issuedate	  = '".$issueDate."',
				id_expdate	      = '".$expDate."',
				member_status  	  = '".trim($_POST['cmbStatus'])."',								

				last_update       = NOW() 
			WHERE 
			     user_id = ".$_GET['aid'];
		$isAllQueryExecuted = $_CONN->Execute($_sql);
		if($isAllQueryExecuted){  
			header("Location: ".$_DIR['site']['adminurl']."unverified_acnt".$atend."success".$_DELIM."2".$baratend);
			exit();
		}
	}		
}
if($_GET['typ']=="U"){
	$_sqlTyp="select `condition`,value from gcm where condition_type='MEM_STATUS'  order by `condition`";
}elseif($_GET['typ']=="V"){
	$_sqlTyp="select `condition`,value from gcm where condition_type='MEM_STATUS' and `condition` not in('U') order by `condition`";
}elseif($_GET['typ']=="S"){
	$_sqlTyp="select `condition`,value from gcm where condition_type='MEM_STATUS' and `condition` not in('U') order by `condition`";
}elseif($_GET['typ']=="C"){
	$_sqlTyp="select `condition`,value from gcm where condition_type='MEM_STATUS' and `condition` not in('U') order by `condition`";
}
$memstatus = getOptions($_sqlTyp, @$_POST["cmbStatus"]);

 $_sql = "SELECT country_id, name FROM country order by name";
$country = getOptions($_sql, @$_POST["cmbCountry"]);
?>