<?php 

$success=false;
	$_sql="SELECT bank_name,address,acnt_no,acnt_name FROM user_bank_info WHERE user_id='".$_SESSION['login']['userid']."'";							
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0){
		$bank_name =$rs->fields['bank_name'];
		$address =$rs->fields['address'];
		$acnt_no =$rs->fields['acnt_no'];
		$acnt_name =$rs->fields['acnt_name'];
	}	
	if($rs) $rs->close();
	
	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='AMT_TRANSFER_LIMIT' and `condition`='M'";
	$rs = $_CONN->Execute($_sql);
	if ($rs && !$rs->EOF) { 
			$maxAmt2 	= $rs->fields["value"];			
	}
	if ($rs) 	$rs->close();	
	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='AMT_TRANSFER_LIMIT' and `condition`='N'";
	$rs = $_CONN->Execute($_sql);
	if ($rs && !$rs->EOF) { 
			$maxAmt  	= $rs->fields["value"];			
	}
	if ($rs) 	$rs->close();	

if($_SERVER['REQUEST_METHOD'] == "POST") { 
$balance =get_balance();

	if(trim($_POST['txtAmount']) >=$balance){
		$_MSG[]= "You Cannot Draw Amount More Than Your A/C Balance.";
		$error=1;
	}
	if(!$error){
		$sql="INSERT INTO transaction(amount,user_id,trans_date) 
				VALUES('".$_POST['txtAmount']."','".$_SESSION['login']['userid']."',now())";
		if($_CONN->Execute($sql)){
			$success=true;
			$success="Amount Has Been Transferred.";
		}
	}
}
?>	