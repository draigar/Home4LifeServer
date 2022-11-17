<?php
if($_APP_LIVE=="Y") $_GET["aid"]=finding_id_from_url("aid",$_DELIM);

if (empty($_GET['aid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."listlga.php?err".$_DELIM."51");
} else { 
     $_sql="SELECT * FROM lga WHERE lga_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."listlga".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST") {
		$_POST["txtName"]        		= $rs->fields["lga_name"];
		$_POST["cmbCurr"] 		  		= $rs->fields["state_id"];
	}
}

if($_SERVER['REQUEST_METHOD'] == "POST"){	
	if (trim($_POST["cmbCurr"])=="") {
		$_MSG[] = "Please select state.";
		$error = 1;
	}
	if (trim($_POST["txtName"])=="") {
		$_MSG[] = "Please enter lga name.";
		$error = 1;
	}
	
	if (!trim($_POST["txtName"])=="") {
	   $_sql="select lga_id from lga where lga_id!=".$_GET["aid"]." and lga_name ='".$_POST["txtName"]."'";
		$rs=$_CONN->Execute($_sql);
		if($rs && !$rs->EOF){
			$_MSG[] = "This lga already exists Please try another name.";
			$error = 1;
		}		
	}
	if (empty($error)) {
	 $_sql = "UPDATE 
				lga 
			SET 				
				lga_name 			  = '".trim($_POST['txtName'])."',
				state_id 			  = '".trim($_POST['cmbCurr'])."'
			WHERE 
			     lga_id = ".$_GET['aid'];
		if($_CONN->Execute($_sql)){  
			header("Location: ".$_DIR['site']['adminurl']."listlga".$atend."success".$_DELIM."2".$baratend);
			exit();
		}
	}		
}
$_sql = "SELECT state_id,state_name FROM state ORDER BY state_name";
	$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>