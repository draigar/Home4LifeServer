<?php

	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='AMT_TRANSFER_LIMIT' order by `condition`";
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."maxmin_amount".$atend."?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			$i=1;	
			if ($rs && !$rs->EOF) { 
				while(!$rs->EOF) {
					$_POST["txtAmt".$i]  	= $rs->fields["value"];
					$rs->MoveNext();
					$i++;
				}
			}
			if ($rs) 
				$rs->close();	
	}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit"){  
	if($_POST['txtAmt1']==""){
		$_MSG[]= " Please enter max amount limit.";
		$error=1;
	}
	if($_POST['txtAmt2']==""){
		$_MSG[]= " Please enter min amount limit.";
		$error=1;
	}
	if(empty($error)){
		$sql="UPDATE gcm SET value='".$_POST['txtAmt1']."' where condition_type='AMT_TRANSFER_LIMIT' and `condition`='M'";
		$one= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtAmt2']."' where condition_type='AMT_TRANSFER_LIMIT' and `condition`='N'";
		$two= $_CONN->Execute($sql);
		
		if($one && $two){
			$success = "Information Updated Successfully.";
		}
	}
} 
?>
