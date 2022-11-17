<?php
if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

if (empty($_GET['id'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."suspend_lotto.templ".$atend."?err".$_DELIM."51");
} else { 
     $sql="select afro_id,al_id,
			  date_format(from_time,'%d / %m /%y - %h:%m') as from_time,
			  date_format(to_time,'%d / %m /%y - %h:%m') as to_time,
			  month_year,total_amount,gcm.value2,substring(month_year,4,4) as year,draw_number
			  from afro_lotto
			  left join gcm on gcm.condition= substring(month_year,1,2)
			  where afro_id=".$_GET['id'];
	$rs = $_CONN->Execute($sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."suspend_lotto".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST" || $_SERVER['REQUEST_METHOD'] == "POST") {
		$naira_id			=$rs->fields['afro_id'];
		$nl_id				=$rs->fields['al_id'];
		$from_time			=$rs->fields['from_time'];
		$to_time			=$rs->fields['to_time'];
		$month_year			=$rs->fields['value2']." / ".$rs->fields['year'];
		$total_amount		=$rs->fields['total_amount'];				
		$draw_number		=$rs->fields['draw_number'];
	}
	
}

$success==false;
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Suspend"){  
	if (trim($_POST["txtSuspension"])=="") {
		$_MSG[] = " Please enter suspension reason.";
		$error = 1;
	}

	if(empty($error)){ 
		$sql="UPDATE afro_lotto SET
				status='S',
				suspend_reason='".addslashes($_POST["txtSuspension"])."'
				where afro_id=".$_GET['id'];
		$isAllQueryExecuted= $_CONN->Execute($sql); 
	}
	if($isAllQueryExecuted){
		header("Location: ".$_DIR['site']['adminurl']."suspend_lotto".$atend."success".$_DELIM."1".$baratend);
				exit(); 
	}
} 
?>
