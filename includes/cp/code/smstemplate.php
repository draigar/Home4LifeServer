<?php
$_GET['sid']  = finding_id_from_url('sid', $_DELIM);
$_GET['err']  = finding_id_from_url('err', $_DELIM);
$_GET['suc']  = finding_id_from_url('suc', $_DELIM);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if (trim($_POST["cmbPage"])==""){ 
		$_MSG[] = " Please select page.";
		$_POST["pageContent"]    ="";
		$error = 1;
	} //if ($_GET["cmbAdvertisingSource"]=="")

	if (trim($_POST["Input"])=="Save Template" && trim($_POST["pageContent"])==""){ 
		$_MSG[] = " Please enter sms content.";
		$error = 1;
	} //if ($_GET["cmbAdvertisingSource"]=="")
	
	if (empty($error)) { //no error then
		
		$_GET["sid"] = trim($_POST["cmbPage"]);
		
		if (trim($_POST["Input"])=="Save Template"){ 
			
		 $_sql = "UPDATE smstemplate SET content='".trim($_POST['pageContent'])."' WHERE page_id=".$_GET['sid'];
		 if($_CONN->Execute($_sql))
		   $success = "SMS Template Has Been Successfully Updated.";
		 }
		 
		$_sql = "SELECT * FROM smstemplate WHERE page_id=".$_GET['sid'];
		$rs = $_CONN->Execute($_sql);	
		if ($rs && $rs->RecordCount()>0) //Record Exist
		{
			$_POST["pageName"]           = $rs->fields[1];
			$_POST["pageContent"]        = $rs->fields[2];
		}
    	if ($rs)
			$rs->close();;
	}
}
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}
$_sql = "SELECT page_id, name FROM smstemplate ORDER BY name";
$page = getOptions($_sql, @$_POST["cmbPage"]);
?>