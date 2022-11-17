<?php
$_GET['pid']  = finding_id_from_url('pid', $_DELIM);
$_GET['act']  = finding_id_from_url('act', $_DELIM);
$_GET['err']  = finding_id_from_url('err', $_DELIM);

if($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) !="Save") {
	 $_GET["pid"] = trim($_POST["cmbPage"]);
     $_sql = "SELECT * FROM emailtemplate WHERE page_id=".$_GET['pid'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);	
	if ($rs && $rs->RecordCount()>0) //Record Exist
	{
		$_POST['txtSubject']		= $rs->fields["subject"];
		$_POST["pageContent"]       = $rs->fields["content"];
		$_POST["headerContent"]     = $rs->fields["header_content"];
		$_POST["footerContent"]		= $rs->fields["footer_content"];
	}
}

if($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) =="Save") {
	if (trim($_POST["cmbPage"])==""){ 
		$_MSG[] = " Please select template name.";
		$_POST["pageContent"]    ="";
		$error = 1;
	}
	if (trim($_POST["txtSubject"])==""){ 
		$_MSG[] = " Please enter subject.";
		$error = 1;
	}
	if (trim($_POST["Input"])=="Save" && trim($_POST["pageContent"])==""){ 
		$_MSG[] = " Please enter template content.";
		$error = 1;
	}
	/*if (trim($_POST["Input"])=="Save" && trim($_POST["headerContent"])==""){ 
		$_MSG[] = " Please enter header content.";
		$error = 1;
	}
	if (trim($_POST["Input"])=="Save" && trim($_POST["footerContent"])==""){ 
		$_MSG[] = " Please enter footer content.";
		$error = 1;
	}*/
	
	if (empty($error)) {
		
		$_GET["pid"] = trim($_POST["cmbPage"]);
		
		if (trim($_POST["Input"])=="Save"){ 
			
		 $_sql = "UPDATE emailtemplate 
		 		SET 
					subject			='".trim($_POST['txtSubject'])."',			
					content			='".trim($_POST['pageContent'])."',
					header_content	='".trim($_POST['headerContent'])."',
					footer_content 	='".trim($_POST['footerContent'])."'
				WHERE page_id=".$_GET['pid'];		
		 $isAllQueryExecuted = $_CONN->Execute($_sql);
		 if($isAllQueryExecuted) {
			 $success = "Page content has been successfully updated.";
		 	}
		}
	}
}
if ($_GET["err"]==1) {
	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";
	$error  = 1;
}

if ($_GET["suc"]==2)
	$success = "The Banner Record Has Been Successfully Updated.";
	
$_sql = "SELECT page_id,name FROM emailtemplate ORDER BY name";
$page = getOptions($_sql, @$_POST["cmbPage"]);
?>