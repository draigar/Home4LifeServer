<?php
$lganame=false;
if($_SERVER['REQUEST_METHOD'] == "POST"){	
	if (trim($_POST["txtAgentName"])=="") { 
		$_MSG[] = "Please enter agent name.";
		$error = 1;
	} 
	if (trim($_POST["txtAddress"])=="") { 
		$_MSG[] = "Please enter address.";
		$error = 1;
	} 
	if (trim($_POST["txtCity"])=="") { 
		$_MSG[] = "Please enter city.";
		$error = 1;
	} 
	if ($_POST["cmbState"]=="") { 
		$_MSG[] = "Please select state.";
		$error = 1;
	} 
	if ($_POST["cmbLga"]=="") { 
		$_MSG[] = "Please select lga.";
		$error = 1;
	} 

	if (empty($error)) { 
		$_sql = "INSERT INTO claimpoint(agent_name,address,city,state_id,lga_id)
		VALUES ('".trim($_POST['txtAgentName'])."',
		'".addslashes(trim($_POST["txtAddress"]))."',
		'".trim($_POST["txtCity"])."',
		'".trim($_POST["cmbState"])."',
		'".trim($_POST["cmbLga"])."')";
		$isAllQueryExecuted = $_CONN->Execute($_sql);
			
		if($isAllQueryExecuted){
			header("Location: ".$_DIR['site']['adminurl']."list_claimpoint".$atend."success".$_DELIM."1".$baratend);
		    exit();
		}
	} 
} 
$_sql = "SELECT state_id,state_name FROM state ORDER BY state_name";
$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>