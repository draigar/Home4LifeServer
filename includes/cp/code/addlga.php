<?php
$lganame=false;
if($_SERVER['REQUEST_METHOD'] == "POST"){	
	if (trim($_POST["cmbCurr"])=="") { 
		$_MSG[] = "Please select state.";
		$error = 1;
	} 
	for($i=0;$i<5;$i++){
		if(!trim($_POST["txtName"][$i])==""){ 
			$lganame=true;
		}
	}
	if(!$lganame){
		$_MSG[] = "Please enter atleast one lga name.";
		$error = 1;
	}
	
	if(empty($error)){
		for($i=0;$i<5;$i++){
			if(!trim($_POST["txtName"][$i])==""){ 
			$sql="select lga_id from lga where lga_name='".$_POST["txtName"][$i]."' and state_id=".$_POST["cmbCurr"]."";
				$rs = $_CONN->Execute($sql);
				if ($rs && $rs->RecordCount()>0) { 
					$_MSG[] = $_POST["txtName"][$i]." lga name Already Exists.";
					$error = 1;
				} 
				if ($rs) 
					$rs->close();
			}		
		}
	}	
	if (empty($error)) { 
		for($i=0;$i<5;$i++){
			if(!trim($_POST["txtName"][$i])==""){ 
				$_sql = "INSERT INTO lga(lga_name,state_id) VALUES ('".trim($_POST['txtName'][$i])."',".trim($_POST["cmbCurr"]).")";
				$isAllQueryExecuted = $_CONN->Execute($_sql);
			}	
		}
		if($isAllQueryExecuted)
			header("Location: ".$_DIR['site']['adminurl']."listlga".$atend."success".$_DELIM."1".$baratend);
		    exit();
		
	} 
} 
$_sql = "SELECT state_id,state_name FROM state ORDER BY state_name";
	$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>