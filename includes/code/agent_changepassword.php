<?php

$success=false;

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Change Password"){

	if (trim($_POST["txtOldPass"])=="") { 

		$_MSG[] = "Please enter current password.";

		$error = 1;

	 } 

	if (trim($_POST["txtNewPass"])=="") { 

		$_MSG[] = "Please enter new password.";

		$error = 1;

	 } 
	 else
	 { 
	 	echo $mgs=check_valid_password(trim($_POST["txtNewPass"]),$_SESSION['login']['username's]);
		$_MSG[] = $mgs;
		$error = 1;
		exit;
	 }

	if (trim($_POST["txtConfirmPass"])=="") {

		$_MSG[] =  "Please enter confirm password.";

		$error = 1;

	}elseif(trim($_POST["txtNewPass"])!=trim($_POST["txtConfirmPass"]))

	 {

		$_MSG[] = "The Confirm password must match with new password.";

		$error = 1;

	 }

	if(!empty($_POST["txtOldPass"])) {

			  $_sql="SELECT	user_id 	

					FROM 	merchant_info 

					WHERE	password = '".trim($_POST["txtOldPass"])."' 

					AND merchant_info.user_id=".$_SESSION['login']['userid'];

				$rs=$_CONN->Execute($_sql);			

				if(!$rs||$rs->EOF){

					$_MSG[] = "The Current password doesn't match.";

					$error = 1;

				}

				if($rs)

				$rs->close();

	  }

	

	if(empty($error)){

	  $_sql = "UPDATE  merchant_info  

	 		SET

		 	password= '".trim($_POST['txtNewPass'])."',

			last_update	=NOW()

		    WHERE merchant_info.user_id=".$_SESSION['login']['userid'];

			$isAllQueryExecuted=$_CONN->Execute($_sql);

			if($isAllQueryExecuted){  

				

				 $success="Your password has been Successfully Updated.";

				 $_POST["txtOldPass"]="";

				 $_POST["txtNewPass"]="";

				 $_POST["txtConfirmPass"]="";

			}  else {

				$_MSG[] = "Unknown error occured while processing request.";

				$error = 1;

			}

	}

}	

?>