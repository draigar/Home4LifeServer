<?php
/*$_GET['suc']  = finding_id_from_url('suc', $_DELIM);
$_GET['err']  = finding_id_from_url('err', $_DELIM);*/
 if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save") {
	$iCount = count($_POST['hidSite']);
	for($j=0;$j<$iCount;$j++){
		$_sql = "UPDATE site_maintenance 
				SET 
					site_name		= '".$_POST['txtSiteName'][$j]."',
					site_status		= '".$_POST['rd1'.$_POST['hidSite'][$j]]."',
					site_url		= '".$_POST['txtSiteUrl'][$j]."' 
				WHERE site_id ='".trim($_POST['hidSite'][$j])."'";
			$isAllQueryExecuted=$_CONN->Execute($_sql);
		}
		if($isAllQueryExecuted)
		{  
			$success = "Site Maintainance Has Been Successfully Updated.";	
		}
}
?>