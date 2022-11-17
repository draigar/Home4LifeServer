<?php 

$_sql="SELECT bank_name,address,acnt_no,acnt_name FROM user_bank_info WHERE user_id='".$_SESSION['login']['userid']."' and cpramary='Y'";							

$rs = $_CONN->Execute($_sql);

if ($rs && $rs->RecordCount()>0){

	$bank_name =$rs->fields['bank_name'];

	$address =$rs->fields['address'];

	$acnt_no =$rs->fields['acnt_no'];

	$acnt_name =$rs->fields['acnt_name'];

}	

if($rs) $rs->close();

	

if($_SERVER['REQUEST_METHOD'] == "POST") { 

	$balance=get_balance();

	if(!trim($_POST['txtAmount'])){

		$_MSG[]= "Please enter valid amount value.";

		$error=1;

	}

	elseif(trim($_POST['txtAmount'])>$balance){

		$_MSG[]= "You Cannot Withdraw funds more than your A/C balance.";

		$error=1;

	}

	if(!$error){

		$identifier=get_identifier_number();

		$balance-=$_POST['txtAmount'];

		$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".$_POST['txtAmount']."','".$_SESSION['login']['userid']."','D','P','',0,0,0,'R','U','".$balance."')";

		if($_CONN->Execute($sql)) {

			$success="We received Your Withdraw funds request and we will process it soon.";

			$_POST['txtAmount']="";

		}

		else {

			$_MSG[]= "Unknown error occured while processing your request, Please try again and still not work then please contact to site admin.";

			$error=1;

		}

	}

}

?>	