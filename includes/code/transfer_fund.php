<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") { 

	if(trim($_SESSION['login']['username'])==trim($_POST["txtEmail"])) { 

		$_MSG[]="You can't transfer fund to your account.";

	  	$error=1;

	} else {

		$sql="select user_id from login_info where user_id!='".$_SESSION['login']['userid']."' and username='".trim($_POST["txtEmail"])."' and status='A'";

		$rs= $_CONN->Execute($sql);

		if(!$rs || ($rs && $rs->EOF)) {

		  $_MSG[]="The email address is not attached to any Vision Account.";

		  $error=1;

		} else 

			$user_id=$rs->fields["user_id"];

		if($rs) $rs->close();

	}

	if(!$error){

		$balance=get_balance();

		if(!trim($_POST['txtAmount'])){

			$_MSG[]= "Please enter valid amount value.";

			$error=1;

		}

		elseif(trim($_POST['txtAmount'])>$balance){

			$_MSG[]= "Opps! You have Insufficient balance to complete the transfer.";

			$error=1;

		}

	}

	if(!$error){

		$identifier=get_identifier_number();

		$balance1=get_user_balance($user_id);

		$balance1+=$_POST['txtAmount'];

		$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".$_POST['txtAmount']."','".$user_id."','C','P','".trim($_POST['txtReference'])."',0,0,0,'T','U','".$balance1."')";

		if($_CONN->Execute($sql)) { 

			$intID = $_CONN->Insert_ID();

			$sql="insert into trans_fund_to values (NULL,'".$intID."','".$_SESSION['login']['userid']."',0,'".$user_id."')";

			if($_CONN->Execute($sql)) {

				$success="We have received your transfer request, We will let you know once completed.";

				$_POST['txtEmail']="";

				$_POST['txtAmount']="";

				$_POST['txtReference']="";

			} else { 

				//Make the column and its value array for putting in whereclause for deleting that row

				$whereCluaseVals	= array();

				$whereCluaseVals['trans_id'] = $intID;

				rollBackIt("transaction", $whereCluaseVals);//Call userdefined roolbakit function in function.sys

				$_MSG[]= "Unknown error occured while processing your request, Please try again and still not work then please contact to site admin.";

				$error = 1;

			}

		}

		else {

			$_MSG[]= "Unknown error occured while processing your request, Please try again and still not work then please contact to site admin.";

			$error=1;

		}

	}

}

?>