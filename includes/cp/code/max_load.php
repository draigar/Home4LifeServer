<?php

	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='MAXIMUM_LOAD'";
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."max_load".$atend."?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			if ($rs && !$rs->EOF) { 
				$_POST["txtMaxLoad"]  	= $rs->fields["value"];
			}
			if ($rs) 
				$rs->close();	
	}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit"){  
	for($j=1;$j<=7; $j++){ 
		$sql="UPDATE gcm 
				SET 
				value=	'".$_POST['txtMaxLoad']."'
				where condition_type='MAXIMUM_LOAD' and `condition`=1";
			$isAllQueryExecuted= $_CONN->Execute($sql);
	}
	if($isAllQueryExecuted){
		$success = "Maximum Load Updated Successfully.";
	}

} 
?>
