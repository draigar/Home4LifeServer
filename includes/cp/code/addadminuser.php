<?php
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
	if (trim($_POST["txtemail"])=="") {
		$_MSG[] = "Please enter email address.";
		$error = 1;		
	}elseif (!isValidEmail(trim($_POST["txtemail"]))) {
		$_MSG[] = "Please enter valid email address";
		$error = 1;
	}
	if (trim($_POST["txtUserName"])=="") {
		$_MSG[] = "Please enter username.";
		$error = 1;		
	}
	elseif(strlen(trim($_POST["txtUserName"]))<4 || strlen(trim($_POST["txtUserName"]))>10)
	{
		$_MSG[] = "Username must be 4-10 alphanumeric characters.";
		$error = 1;
	}
	if (trim($_POST["txtPassword"])=="") {
		$_MSG[] = "Please enter password.";
		$error = 1;
	}
	elseif(strlen(trim($_POST["txtPassword"]))<4 || strlen(trim($_POST["txtPassword"]))>10)
	{
		$_MSG[] = "Password must be 4-10 alphanumeric characters.";
		$error = 1;
	}
	if (trim($_POST["txtPassword"])!=trim($_POST["txtConfirmPassword"]))
	{
		$_MSG[] = "Retype password must match with actual password.";
		$error = 1;
	}
	
	if (empty($error)){ //no error then
	$_sql = "SELECT user_id FROM login_info WHERE username='".$_POST["txtUserName"]."'";
	$rs=$_CONN->Execute($_sql);
	if($rs && $rs->RecordCount()>0)
	{
		$_MSG[] = "Username already exist.";
		$error = 1;
	    if($rs)
		 $rs->close();
	}	
	if (empty($error)){ //no error then
	$_sql = "SELECT email_id FROM users WHERE email_id='".trim($_POST['txtemail'])."'";
	$rs=$_CONN->Execute($_sql);
	if($rs && $rs->RecordCount()>0)
	{
		$_MSG[] = "This email already exist.";
		$error = 1;
	  if($rs)
		$rs->close();
	}	
	}
	
 	if(empty($error))
  	{
		 $_sql="INSERT into users (fname,lname,address1,address2,country_id,state_id,city_id,phone,mobile,usertype,status,
		zipcode,email_id, permissions,subpermissions,super_user,create_date,last_update)
			values('".addslashes(trim($_POST['txtFirstName']))."',
			'".addslashes(trim($_POST['txtLastName']))."',
			'".addslashes(trim($_POST['txtaddr1']))."',
			'".addslashes(trim($_POST['txtaddr2']))."', 
			'".trim($_POST['cmbCountry'])."',
			'".trim($_POST['txtState'])."',
			'".trim($_POST['txtCity'])."',
			'".addslashes(trim($_POST['txtPhone']))."',
			'".addslashes(trim($_POST['txtMobile']))."','ADMIN','A',
			'".addslashes(trim($_POST['txtzipCode']))."','".addslashes(trim($_POST['txtemail']))."',
			'".(count($_POST["menus"])?implode(",",$_POST["menus"]):"")."',
			'".(count($_POST["submenus"])?implode(",",$_POST["submenus"]):"")."',
			 'N', now(), now())";
			
			$isAllQueryExecuted=$_CONN->Execute($_sql);
			if($isAllQueryExecuted)
			{       
				$userID=$_CONN->Insert_ID();
			     $_sql =  "INSERT into login_info(user_id,username,password,status,create_date)
				 VALUES(".$userID.",'".$_POST["txtUserName"]."',md5('".$_POST["txtPassword"]."'),'A',NOW())";
							 
				$rslogin = $_CONN->Execute($_sql);		 
			}
			if($isAllQueryExecuted && $rslogin)
			{
			    header("Location: ".$_DIR['site']['adminurl']."adminuser".$atend."success".$_DELIM."1".$baratend);
				exit(); 
			}
				
		}		
   }		
}
$_sql="select country_id,name from country order by name";
$country=getOptions($_sql,$_POST['cmbCountry']);		
?>
