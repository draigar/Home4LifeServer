<?php
$_GET['suc']  = finding_id_from_url('suc', $_DELIM);

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input'] == "Save"){
	$cont = count($_POST['rd1']);
	for($i=1;$i<=$cont;$i++){
		$_sql="UPDATE sms_gateway SET gateway_status = '".$_POST['rd1'][$i]."' WHERE gateway_id = '".$i."'";
		if(!$_CONN->Execute($_sql)){
			$error =1;
		}
		if(empty($error)){
			$success = "SMS Gateway Has Been Successfully Updated.";
		}
 	}
}	
if($_SERVER['REQUEST_METHOD'] != "POST" || $_SERVER['REQUEST_METHOD'] == "POST"){
	$_sql = "SELECT gateway_id,gateway_status from sms_gateway order by gateway_id asc";
	$rs = $_CONN->Execute($_sql);
	if($rs && !$rs->EOF){
		$i=1;
			while(!$rs->EOF){
					$_POST["rd1".$i]   = $rs->fields['gateway_status'];
				$rs->MoveNext();
				$i++;
			}
	}	
		
	if($rs)
	  $rs->close();
}
?>