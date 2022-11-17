<?php
if($_APP_LIVE=="Y") {
	$_GET["ticket_no"]=finding_id_from_url("ticket_no",$_DELIM);
	$_GET["frm"]=finding_id_from_url("frm",$_DELIM);
}
if(!empty($_GET['ticket_no']) && $_GET["frm"]=="naira" ) {  
  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,e.entry_id,
	date_format(e.date_entered,'%d-%b-%Y at %h:%i') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,
	date_format(to_time,'%d%m%Y') as to_time3,l.status
	FROM naira_entry_ticket t
	LEFT JOIN naira_entry e ON e.entry_id=t.entry_id
	LEFT JOIN naira_lotto l ON l.naira_id=e.naira_id
	LEFT JOIN gcm ON gcm.`condition`=e.method_id
	WHERE gcm.condition_type='METHOD' AND e.user_id='".$_SESSION['login']['userid']."' AND t.ticket_no='".$_GET['ticket_no']."'";
  $rs =$_CONN->Execute($qry);
  if($rs && !$rs->EOF){
	$ticket_no			= $rs->fields['to_time3']."-".$rs->fields['ticket_no'];
	$nt_id				= $rs->fields['nt_id'];
	$price				= $rs->fields['price'];
	$value				= $rs->fields['value'];
	$draws				= array_search($rs->fields['draws'],$_WEEK_DAY);
	$weeks				= $rs->fields['weeks'];
	$vision_number		= $rs->fields['vision_numbers'];
	$vision_price		= $rs->fields['vision_price'];
	$date_entered		= $rs->fields['date_entered'];
	$draw_date			= $rs->fields['to_time1'];
	$ticket_no			= $rs->fields['ticket_no'];
	$entry_id			= $rs->fields['entry_id'];
	$lotto_status			= $rs->fields['status'];	
  } else {
  	if($rs) $rs->close();  
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
  }
  if($rs) $rs->close();  
  //Get Winning Numbers
  $resultx=get_naira_winning_number($nt_id);
  
  $qry="SELECT * FROM naira_entry_child WHERE nt_id='".$nt_id."'";
  $rs =$_CONN->Execute($qry);
  $k=0;
  while(!$rs->EOF){
    if($rs->fields['lotto_numbers']) {
		$ne_id[$k] 		   = $rs->fields['ne_id'];
		$lotto_numbers[$k] = $rs->fields['lotto_numbers'];
		$ld[$k]			   = $rs->fields['ld'];
		$k++;
	}
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  
  $curpos=0;
  $numrec=0;
  $recno=0;
  $qry="SELECT ticket_no FROM naira_entry_ticket WHERE entry_id='".$entry_id."' order by entry_id";
  $rs=$_CONN->Execute($qry);
  $numrec=$rs->RecordCount();
  while(!$rs->EOF){
  	$curpos++;
	if($rs->fields['ticket_no']==$_GET['ticket_no']) {
		$rs->MoveNext();
		$nextticketno=$rs->fields['ticket_no'];
		$rs->Move($recno--);
		$rs->Move($recno--);
		$prevticketno=$rs->fields['ticket_no'];
		break;
	}
	$recno++;	
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  $resultpage="result-naira-lotto";  
}
elseif(!empty($_GET['ticket_no']) && $_GET["frm"]=="afro" ) {
  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,
	date_format(e.date_entered,'%d-%b-%Y at %h:%i') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,l.status 
	FROM afro_entry_ticket t
	LEFT JOIN afro_entry e ON e.entry_id=t.entry_id
	LEFT JOIN afro_lotto l ON l.afro_id=e.afro_id
	LEFT JOIN gcm ON gcm.`condition`=e.method_id
	WHERE gcm.condition_type='METHOD' AND e.user_id='".$_SESSION['login']['userid']."' AND t.ticket_no='".$_GET['ticket_no']."'";
  $rs =$_CONN->Execute($qry);
  if($rs && !$rs->EOF){
	$ticket_no			= $rs->fields['ticket_no'];
	$nt_id				= $rs->fields['nt_id'];
	$price				= $rs->fields['price'];
	$value				= $rs->fields['value'];
	$draws				= array_search($rs->fields['draws'],$_WEEK_DAY);
	$weeks				= $rs->fields['weeks'];
	$vision_number		= $rs->fields['vision_numbers'];
	$vision_price		= $rs->fields['vision_price'];
	$date_entered		= $rs->fields['date_entered'];
	$draw_date			= $rs->fields['to_time1'];
	$ticket_no			= $rs->fields['ticket_no'];
	$lotto_status			= $rs->fields['status'];	
  } 
  else {
  	if($rs) $rs->close();  
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
  }
  if($rs) $rs->close();  
  //Get Winning Numbers
  $resultx=get_afro_winning_number($nt_id);
  
  $qry="SELECT * FROM afro_entry_child WHERE nt_id='".$nt_id."'";
  $rs =$_CONN->Execute($qry);
  $k=0;
  while(!$rs->EOF){
    if($rs->fields['lotto_numbers']) {
		$ne_id[$k] 		   = $rs->fields['ne_id'];
		$lotto_numbers[$k] = $rs->fields['lotto_numbers'];
		$ld[$k]			   = $rs->fields['ld'];
		$k++;
	}
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  
  $curpos=0;
  $numrec=0;
  $recno=0;
  $qry="SELECT ticket_no FROM afro_entry_ticket WHERE entry_id='".$entry_id."' order by entry_id";
  $rs=$_CONN->Execute($qry);
  $numrec=$rs->RecordCount();
  while(!$rs->EOF){
  	$curpos++;
	if($rs->fields['ticket_no']==$_GET['ticket_no']) {
		$rs->MoveNext();
		$nextticketno=$rs->fields['ticket_no'];
		$rs->Move($recno--);
		$rs->Move($recno--);
		$prevticketno=$rs->fields['ticket_no'];
		break;
	}
	$recno++;	
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  $resultpage="result-afro-millions";	
} else {
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
}
?>