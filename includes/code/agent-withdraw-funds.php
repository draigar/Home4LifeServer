<?php 
$doNotShow = false;
if($_SERVER['REQUEST_METHOD'] != "POST") { 
	$_sql="SELECT bank_name,address1,account_no,account_name FROM bank_info WHERE user_id='".$_SESSION['login']['userid']."' and cpramary='Y'";							
	
	$rs = $_CONN->Execute($_sql);
	
	if ($rs && $rs->RecordCount()>0){
	
		$bank_name =$rs->fields['bank_name'];
	
		$address =$rs->fields['address1'];
	
		$acnt_no =$rs->fields['account_no'];
	
		$acnt_name =$rs->fields['account_name'];
	
	}else{
		$doNotShow = true;
		$_MSG[]= " Please select primary bank.";
		$error=1;
	}	
	
	if($rs) $rs->close();

}	

if($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['login']['userid']!= "") { 

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

		$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".$_POST['txtAmount']."','".$_SESSION['login']['userid']."','D','P','',0,0,0,'R','A','".$balance."')";

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