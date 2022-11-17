<?php
//$success = false;

	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='EMAILS'";
    //Execute Query
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { //Property Type Not Exist
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) //Close the recordset
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."configuration.php?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			$i=0;
			if ($rs && !$rs->EOF) { 
			$_POST["hidCount"] = $rs->RecordCount(); 
			while(!$rs->EOF){
				$_POST["txtCond"][$i]   = $rs->fields["condition"];
				$_POST["txtCVal"][$i]   = $rs->fields["value"];
				$rs->MoveNext();
				$i++;
			}
			if ($rs) //Close the recordset
			$rs->close();	
								
	}
	
}


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $iCount = count($_POST["txtCVal"]);
	for($i=0;$i<$iCount;$i++){
		 if(!isValidEmail(trim($_POST["txtCVal"][$i]))){
			 $_MSG[] = " Please enter the valid email address for ".$_POST["txtCond"][$i];
			 $error = 1;
		   }
		}  
	   if(empty($error)){
		$icount = count($_POST["txtCond"]);	
		$blnSuccess = false;
		
		for($i=0;$i<$icount;$i++) {
				if(!empty($_POST["txtCond"][$i]) && !empty($_POST["txtCVal"][$i])){
					$sql="update gcm set value='".$_POST["txtCVal"][$i]."' where condition_type='EMAILS' and `condition`='".$_POST["txtCond"][$i]."'";
					$_CONN->Execute($sql);
					$blnSuccess = true;
					if($_POST["txtCond"][$i]=="INMAILID") {
						$sql="update configration set admin_email='".$_POST["txtCVal"][$i]."' where config_id=1";
						$_CONN->Execute($sql);
					}
				}
		}
		if(empty($error) && $blnSuccess)
		{
			$success = "System email updated successfully.";
			//$success=true;
			$isAllQueryExecuted = true;

		}
	}	
} 
	
	
?>