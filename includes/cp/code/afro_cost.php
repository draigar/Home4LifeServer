<?php

	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='PER_LINE' and `condition`=2";
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."naira_cost".$atend."?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			if ($rs && !$rs->EOF) { 
				$_POST["txtMaxLoad"]  	= $rs->fields["value"];
			}
			if ($rs) 
				$rs->close();	
	}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit"){  
		$sql="UPDATE gcm 
				SET 
				value=	'".$_POST['txtMaxLoad']."'
				where condition_type='PER_LINE' and `condition`=2";
			$isAllQueryExecuted= $_CONN->Execute($sql);
	if($isAllQueryExecuted){
		$success = "Afro Lotto Cost Updated Successfully.";
	}

} 
?>
