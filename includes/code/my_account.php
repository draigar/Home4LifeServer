<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["step"]=="5") {
	
	if($_POST["aftererror"]=="1") $_POST["txtEmail"]=$_POST["txtNewEmail"];
	
	$sql="select login_id from login_info where username='".trim($_POST["txtEmail"])."'";
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
		$emailexist=true;	
		$error = 1;
	}
	if($rs) $rs->close();
	
	if(empty($error)) {
	
			$birthDate = $_POST["cmbYear"]."-".$_POST["cmbMonth"]."-".$_POST["cmbDate"];
						
			$_sql="INSERT INTO users (
				title,fname,lname,birthdate,
				gender,address1,address2,city_id,
				state_id,country_id,phone,
				usertype,create_date,member_status
			) values (
				'".$_POST['cmbTitle']."',
				".trim($_CONN->qstr($_POST['txtFirstName'])).",
				".trim($_CONN->qstr($_POST['txtLastName'])).",
				'".$birthDate."',
				'".$_POST['cmbGender']."',
				".trim($_CONN->qstr($_POST['txtAddress1'])).",
				".trim($_CONN->qstr($_POST['txtAddress2'])).",
				".trim($_CONN->qstr($_POST['txtCity'])).",
				".trim($_CONN->qstr($_POST['txtState'])).",
				".$_DEFAULT_COUNTRY_ID.",
				".trim($_CONN->qstr($_POST['txtTelephone'])).",
				'MEMBER',now(),'U'
			)";
						
			if($_CONN->Execute($_sql)){			
				$intID = $_CONN->Insert_ID();
				$password=get_random_password();				
				$_sql = "insert into login_info (user_id,username,password,status,create_date)
				values (".$intID.",".trim($_CONN->qstr($_POST['txtEmail'])).",'".$password."','A',NOW())";
				$isExecuted = $_CONN->Execute($_sql); 
				if($isExecuted) {
					send_welcome_email();
					@header("Location: ".$_DIR['site']['url']."steps.php?step=6");
					exit();
				} else{
					
					//Make the column and its value array for putting in whereclause for deleting that row
					$whereCluaseVals	= array();
					$whereCluaseVals['user_id'] = $intID;
					rollBackIt("users", $whereCluaseVals);//Call userdefined roolbakit function in function.sys
					
					$error = 1;
				}
			 }
			 
	}
	
}
if(empty($_POST["step"]) && $_GET["step"]=="6") {
	$_POST["step"]="6";
}
?>