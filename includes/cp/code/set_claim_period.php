<?php
	if($_SERVER['REQUEST_METHOD']!="POST") {
		$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='UNCLAIMED_LIMIT' and `condition`=1";
		$rs = $_CONN->Execute($_sql);
		if ($rs && !$rs->EOF) { 
			$_POST["txtMaxLoad"]  	= $rs->fields["value"];
		}
		if ($rs) $rs->close();	
	}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit"){  
		$sql="UPDATE gcm 
				SET 
				value=	'".$_POST['txtMaxLoad']."'
				where condition_type='UNCLAIMED_LIMIT' and `condition`=1";
			$isAllQueryExecuted= $_CONN->Execute($sql);
	if($isAllQueryExecuted){
		$success = "The Claim Period Updated Successfully.";
	}

} 
?>
