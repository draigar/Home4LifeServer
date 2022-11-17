<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) !="Save Content") {
	 $_GET["pageid"] = trim($_POST["cmbPage"]);
     $_sql = "SELECT * FROM page WHERE page_id=".$_GET['pageid'];

	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0)  {
		$_POST["txtPageTitle"]       	= $rs->fields['name'];
		$_POST["pageContent"]        	= $rs->fields['content'];
		$_POST["txtMetaTitle"]        	= $rs->fields['meta_title'];
		$_POST["txtMetaKey"]        	= $rs->fields['meta_key'];
		$_POST["txtMetaKeyDesc"]        = $rs->fields['metakey_desc'];
	}
}
if($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) =="Save Content") {
	if (trim($_POST["cmbPage"])==""){ 
		$_MSG[] = "Please select front end page.";
		$error = 1;
	}
	if (trim($_POST["txtPageTitle"])==""){ 
		$_MSG[] = "Please enter page title";
		$error = 1;
	}
	if (trim($_POST["Input"])=="Save Content" && trim($_POST["pageContent"])==""){ 
		$_MSG[] = "Please enter page content.";
		$error = 1;
	}	
	if (empty($error)) {
		$_GET["pageid"] = trim($_POST["cmbPage"]);
		if (trim($_POST["Input"])=="Save Content"){ 
				$_sql = "UPDATE page 
			SET 
				name			= '".trim($_POST['txtPageTitle'])."',				
				content			= '".trim($_POST['pageContent'])."',
				meta_title		= '".trim($_POST["txtMetaTitle"])."',
				meta_key		= '".trim($_POST['txtMetaKey'])."',
				metakey_desc	= '".trim($_POST['txtMetaKeyDesc'])."'
			WHERE page_id=".$_GET['pageid'];
		 $isAllQueryExecuted = $_CONN->Execute($_sql);
		 if($isAllQueryExecuted) {
			 $success = "The Page Content Has Been Successfully Updated.";
		 	}
		}
	}
}
$_sql = "SELECT page_id,name FROM page ORDER BY name";
$page = getOptions($_sql,$_POST["cmbPage"]); 
?>