
<?php
$success = false;
if($_SERVER['REQUEST_METHOD']=="POST" ){ 
$success=false;
	if (trim($_POST["txtOldPassword"])=="") { 
		$_MSG[] = "Please enter old password.";
		$error = 1;
	 } 

	if (trim($_POST["txtNewPassword"])=="") { 
		$_MSG[] = "Please enter new password.";
		$error = 1;
	 } 
	 elseif(strlen(trim($_POST["txtNewPassword"]))<4 || strlen(trim($_POST["txtNewPassword"]))>10)
	 { 
		$_MSG[] = "Password must be 4-10 alphanumeric characters.";
		$error = 1;
	 }
	 if(trim($_POST["txtNewPassword"])!=trim($_POST["txtConfirmPassword"]))
	 {
		$_MSG[] = "Confirm password must match with new password.";
		$error = 1;
	 }
	 
if(!empty($_POST["txtOldPassword"])) {

 $_sql="SELECT user_id 	
		 FROM login_info
		 WHERE
			password = md5('".trim($_POST["txtOldPassword"])."')
		AND user_id=".$_SESSION['login']['userid'];
			$rs=$_CONN->Execute($_sql);			
 			if(!$rs||$rs->EOF){
				$_MSG[] = "Invalid old password.";
				$error = 1;
			}
			if($rs)
			$rs->close();
		  	
  }
	  	
	if(empty($error)){
	   $_sql = "UPDATE  login_info 
	 		SET
		 	password		=md5('".trim($_POST['txtNewPassword'])."'),
			last_update	=NOW()
		   WHERE user_id=".$_SESSION['login']['userid'];
				 $isAllQueryExecuted=$_CONN->Execute($_sql);
				  //Execute Query
			if($isAllQueryExecuted)
			{
			 $success = "Password Has Been Successfully Updated.";
			//	header("Location: ".$_DIR['site']['adminurl']."changePassword".$atend."suc".$_DELIM."2".$baratend);
			//	exit();
			}
			
	}
}


?>


