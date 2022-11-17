<?php 
if($_APP_LIVE=="Y") {
	$_GET["pvs"]=finding_id_from_url("pvs",$_DELIM);
	$_GET["err"]=finding_id_from_url("err",$_DELIM);
}
//Get per line price
$sql="select value from gcm where condition_type='PASSPOLICY' and `condition`='MAX_LEN'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $password_max_length=$rs->fields["value"];
if($rs) $rs->close();

if($_GET["err"]=="invalid") {
	$_MSG[1] = "Invalid Username or Password. please try again.";
	$error=1;
}
if($_GET["err"]=="locked") {
	$_MSG[1] = "Your account is locked. Please contact to site admin to unlock your account.";
	$error=1;
}
if($_GET["err"]=="maxattempt") {
	$_MSG[1] = "Your maximum consecutive attempts for login exceeded and your account is now locked. Please contact to site admin.";
	$error=1;
}
?>	