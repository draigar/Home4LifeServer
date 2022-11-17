<?php
if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

if (empty($_GET['id'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."afro_entries.templ".$atend."?err".$_DELIM."51");
} else { 
     $sql="SELECT 
			n.nt_id,l.nl_id,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,n.ticket_no,gcm.value,
			date_format(e.date_entered,'%d%m%y') as date_entered2,e.method_id,count(c.ne_id) as entries,e.vision_numbers
		FROM 
			naira_entry_ticket n
			inner join naira_entry e on e.entry_id=n.entry_id 
			inner join naira_lotto l on l.naira_id=e.naira_id
			left join naira_entry_child c on c.nt_id=n.nt_id 
			left join gcm on gcm.condition = e.method_id 
		WHERE gcm.condition_type='METHOD' and n.nt_id=".$_GET['id']." group by n.nt_id order by n.nt_id";
	$rs = $_CONN->Execute($sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."afro_entries".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST" || $_SERVER['REQUEST_METHOD'] == "POST") {
		$entry_id			=$rs->fields['nt_id'];
		$nl_id				=$rs->fields['nl_id'];
		$date_entered			=$rs->fields['date_entered'];
		$ticket_no			=$rs->fields['ticket_no'];
		$value			=$rs->fields['value'];
		$entries			=$rs->fields['entries'];						
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
		header("Location: ".$_DIR['site']['adminurl']."afro_entries".$atend."success".$_DELIM."1".$baratend);
				exit(); 
	}
} 
?>
