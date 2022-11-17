<?php

$success=false;

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Update New Security Code"){

	if(!empty($_POST["txtOldSecurityCode"])) {

		  $_sql="SELECT	user_id FROM merchant WHERE security_code = '".trim($_POST["txtOldSecurityCode"])."' AND user_id=".$_SESSION['login']['userid'];

		  $rs=$_CONN->Execute($_sql);			

		  if(!$rs||$rs->EOF){

			$_MSG[] = "You have entered wrong old security code, Please correct it.";

			$error = 1;

		  }

		  if($rs) $rs->close();

	  } else {

	  	$_MSG[] = "Please enter your old security code.";

		$error = 1;

	  }

	  if(!$error) {

	   $_sql = "UPDATE  merchant  

	 		SET

		 	security_code= '".trim($_POST["cmbOne"]).trim($_POST["cmbTwo"]).trim($_POST["cmbThree"]).trim($_POST["cmbFour"]).trim($_POST["cmbFive"]).trim($_POST["cmbSix"])."'

		    WHERE user_id=".$_SESSION['login']['userid'];

			$isAllQueryExecuted=$_CONN->Execute($_sql);

			if($isAllQueryExecuted){ 				

				 $success="Your Security Code has been successfully updated.";

				 $_POST=NULL;

			}  else {

				$_MSG[] = "Unknown error occured while processing request.";

				$error = 1;

			}

	}

}

?>