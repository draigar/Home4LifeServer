<?php
if($_APP_LIVE=="Y") $_GET["aid"]=finding_id_from_url("aid",$_DELIM);

if (empty($_GET['aid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."list_claimpoint.php?err".$_DELIM."51");
} else { 
    $_sql="SELECT * FROM claimpoint WHERE cpoint_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."list_claimpoint".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST") {
		$_POST["txtAgentName"]     		= $rs->fields["agent_name"];
		$_POST["txtAddress"] 	  		= $rs->fields["address"];
		$_POST["txtCity"]        		= $rs->fields["city"];
		$_POST["cmbState"] 		  		= $rs->fields["state_id"];
		$_POST["cmbLga"]        		= $rs->fields["lga_id"];
	}
}

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
		 $_sql = "UPDATE claimpoint 
			SET 				
				agent_name 			  = '".trim($_POST['txtAgentName'])."',
				address 			  = '".addslashes(trim($_POST['txtAddress']))."',
				city			  	  = '".trim($_POST['txtCity'])."',
				state_id 			  = '".trim($_POST['cmbState'])."',
				lga_id 				  = '".trim($_POST['cmbLga'])."'
			WHERE 
			     cpoint_id = ".$_GET['aid'];
		if($_CONN->Execute($_sql)){  
			header("Location: ".$_DIR['site']['adminurl']."list_claimpoint".$atend."success".$_DELIM."2".$baratend);
			exit();
		}
	}		
}
$_sql = "SELECT state_id,state_name FROM state ORDER BY state_name";
	$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>