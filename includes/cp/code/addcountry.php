<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{	
	if (trim($_POST["txtName"])=="") { 
		$_MSG[] = "Please enter Country name.<br/>";
		$error = 1;
	} 
	else if (is_numeric(trim($_POST["txtName"]))) { 
		$_MSG[] = "Please enter Country name Numeric Value Not Allowed.<br/>";
		$error = 1;
	}
	if (trim($_POST["txtChar"])=="") { 
		$_MSG[] = "Please enter Country ISO Code.<br/>";
		$error = 1;
	}
	if (trim($_POST["cmbCurr"])=="") { 
		$_MSG[] = "Please select currency.<br/>";
		$error = 1;
	}
	include_once($_DIR['admininc']['queries']."addcountryexist.sql");
	
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0) { 
		$_MSG[] = "Country name Already Exists.<br/>";
		$error = 1;
	} 
	if ($rs) 
		$rs->close();
	if (empty($error)) { 
		
		 $_sql = "INSERT INTO country(name, create_date,iso_code,curr_id) VALUES ('".trim($_POST['txtName'])."', NOW(),".trim($_POST["txtChar"]).",".trim($_POST["cmbCurr"]).")";
        
		$isAllQueryExecuted = $_CONN->Execute($_sql);
		
		$intID = $_CONN->Insert_ID();
		
		if($intID)
			header("Location: ".$_DIR['site']['adminurl']."country".$atend."suc".$_DELIM."1".$baratend);
		    exit();
		
	} 
} 
$_sql = "SELECT curr_id, concat(curr_code,'-',curr_name) as szcurr_name FROM currency ORDER BY curr_id";
	$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>