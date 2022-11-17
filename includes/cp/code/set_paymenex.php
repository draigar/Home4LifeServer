<?php

	$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='SET_PAYMENEX' order by `condition`";
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."set_paymenex".$atend."?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			$i=1;	
			if ($rs && !$rs->EOF) { 
				while(!$rs->EOF) { 
					$_POST["txtPaymenex".$i]  	= $rs->fields["value"];
					$rs->MoveNext();
					$i++;
				}
			}
			if ($rs) 
				$rs->close();	
	}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit"){  
	if($_POST['txtPaymenex1']==""){
		$_MSG[]= " Please enter paymenex id.";
		$error=1;
	}
	if($_POST['txtPaymenex2']==""){
		$_MSG[]= " Please enter paymenex key.";
		$error=1;
	}
	if($_POST['txtPaymenex3']==""){
		$_MSG[]= " Please enter paymenex url.";
		$error=1;
	}
	if($_POST['txtPaymenex4']==""){
		$_MSG[]= " Please enter mode.";
		$error=1;
	}
	if($_POST['txtPaymenex5']==""){
		$_MSG[]= " Please enter action code.";
		$error=1;
	}
	if($_POST['txtPaymenex6']==""){
		$_MSG[]= " Please enter merchant id.";
		$error=1;
	}
	
	if(empty($error)){
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex1']."' where condition_type='SET_PAYMENEX' and `condition`=1";
		$one= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex2']."' where condition_type='SET_PAYMENEX' and `condition`=2";
		$two= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex3']."' where condition_type='SET_PAYMENEX' and `condition`=3";
		$three= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex4']."' where condition_type='SET_PAYMENEX' and `condition`=4";
		$four= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex5']."' where condition_type='SET_PAYMENEX' and `condition`=5";
		$five= $_CONN->Execute($sql);
		$sql="UPDATE gcm SET value='".$_POST['txtPaymenex6']."' where condition_type='SET_PAYMENEX' and `condition`=6";
		$six= $_CONN->Execute($sql);
	
		if($one && $two){
			$success = "Paymenex Information Updated Successfully.";
		}
	}
} 
?>
