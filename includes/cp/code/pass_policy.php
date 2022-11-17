<?php
//$success = false;

	$_sql = "SELECT `condition`,value,value2 FROM gcm WHERE condition_type='PASSPOLICY'";
    //Execute Query
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { //Property Type Not Exist
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) //Close the recordset
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."pass_policy.php?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			$i=0;
			if ($rs && !$rs->EOF) { 
			$_POST["hidCount"] = $rs->RecordCount(); 
			while(!$rs->EOF){ 
				
				$_POST["hidCondition"][$i]   = $rs->fields["condition"];
			    $_POST["txtCVal"][$i]   = $rs->fields["value"];
				$_POST["txtCVal2"][$i]   = $rs->fields["value2"];
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
		 if(!is_numeric(trim($_POST["txtCVal"][$i])) && $_POST["hidCondition"][$i]!='ALLOW_USERNAME'){
			 $_MSG[] = " Please enter the numeric value for ".$_POST["txtCVal2"][$i];
			 $error = 1;
		   }
		   if($_POST["txtCVal"][$i]!='Y' && $_POST["txtCVal"][$i]!='N' && $_POST["hidCondition"][$i]=='ALLOW_USERNAME'){
			 $_MSG[] = "Please enter the Y/N value for ".$_POST["txtCVal2"][$i];
			 $error = 1;
		   }
		  
		   
		}  
	   if(empty($error)){
		$icount = count($_POST["txtCVal2"]);	
		$blnSuccess = false;
		
		for($i=0;$i<$icount;$i++) {
				if(!empty($_POST["txtCVal2"][$i]) && !empty($_POST["txtCVal"][$i])){
					$sql="update gcm set value='".$_POST["txtCVal"][$i]."' where condition_type='PASSPOLICY' and  `condition`='".$_POST["hidCondition"][$i]."'";
					$_CONN->Execute($sql);
					$blnSuccess = true;
				}
		}
		if(empty($error) && $blnSuccess)
		{
			$success = "Password Policy updated successfully.";
			//$success=true;
			$isAllQueryExecuted = true;

		}
	}	
} 
	
	
?>