<?php
$_GET['suc']  = finding_id_from_url('suc', $_DELIM);
$_GET['err']  = finding_id_from_url('err', $_DELIM);
$success = false;
$_POST["cmbGateway"]=1;
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["Input"] == "Update") {
	 $iCount = count($_POST['hidSite']);
	for($j=0;$j<$iCount;$j++){
		$_sql = "UPDATE sms_setting 
				SET 
					param_desc		= '".$_POST['txtParmDesc'][$j]."',
					param_value		= '".$_POST['txtParmValue'][$j]."'
				WHERE setting_id = '".trim($_POST['hidSite'][$j])."'";
		$isAllQueryExecuted=$_CONN->Execute($_sql);
		}
		if($isAllQueryExecuted)
		{  
			$success = "SMS Setting Has Been Successfully Updated.";
		}
}  
?>