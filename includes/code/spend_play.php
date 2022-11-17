<?php	
if($_SERVER['REQUEST_METHOD']!="POST"){
	$_sql="select play_limits,add_fund_limit from users where user_id=".$_SESSION['login']['userid'];
	$rs=$_CONN->Execute($_sql);
	if($rs && !$rs->EOF){
		$_POST["txtPlayLimit"] = $rs->fields['play_limits'];
		$_POST["txtFundLimit"] = $rs->fields['add_fund_limit'];
	}
	if($rs) $rs->close();
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit Changes") {	
	$_sqlQue1 ="UPDATE users SET play_limits='".$_POST["txtPlayLimit"]."',
	add_fund_limit='".$_POST["txtFundLimit"]."' WHERE user_id=".$_SESSION['login']['userid'];
	if($_CONN->Execute($_sqlQue1))
	   $success="Your spend and play settings are successfully changed."; 
	else { 
		$_MSG[]="Unknown error occurred while processing your request.";
		$error=1;
	} 
}
?>