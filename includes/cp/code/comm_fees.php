<?php
/*$_GET['suc']  = finding_id_from_url('suc', $_DELIM);
$_GET['err']  = finding_id_from_url('err', $_DELIM);*/
 if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save") {
	$iCount = count($_POST['hidSite']);
	for($j=0;$j<$iCount;$j++){
		$_sql = "UPDATE comiss_fees 
				SET 
					cf_name		= '".$_POST['txtSiteName'][$j]."',
					cf_type		= '".$_POST['rd1'.$_POST['hidSite'][$j]]."',
					cf_amount		= '".$_POST['txtSiteUrl'][$j]."' 
				WHERE cf_id ='".trim($_POST['hidSite'][$j])."'";
			$isAllQueryExecuted=$_CONN->Execute($_sql);
		}
		if($isAllQueryExecuted)
		{  
			$success = "Commission and Fees Has Been Successfully Updated.";	
		}
}
?>