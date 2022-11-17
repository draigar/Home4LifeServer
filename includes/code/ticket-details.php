<?php

if($_APP_LIVE=="Y") {

	$_GET["ticket_no"]=finding_id_from_url("ticket_no",$_DELIM);

	$_GET["frm"]=finding_id_from_url("frm",$_DELIM);

}

if(!empty($_GET['ticket_no']) && $_GET["frm"]=="naira" ) {

  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,

	date_format(e.date_entered,'%d-%b-%Y at %H:%i:%s') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,date_format(to_time,'%d%m%Y') as to_time3

	FROM naira_entry_ticket t

	LEFT JOIN naira_entry e ON e.entry_id=t.entry_id

	LEFT JOIN naira_lotto l ON l.naira_id=e.naira_id

	LEFT JOIN gcm ON gcm.`condition`=e.method_id

	WHERE gcm.condition_type='METHOD' AND t.ticket_no='".$_GET['ticket_no']."'";

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

  } 

  if($rs) $rs->close();  

  

  $qry="SELECT * FROM naira_entry_child WHERE nt_id='".$nt_id."'";

  $rs =$_CONN->Execute($qry);

  while(!$rs->EOF){

    if($rs->fields['lotto_numbers']) {

		$lotto_numbers[] = $rs->fields['lotto_numbers'];

		$ld[]			 = $rs->fields['ld'];

	}

	$rs->MoveNext();

  } 

  if($rs) $rs->close();  	





}

elseif(!empty($_GET['ticket_no']) && $_GET["frm"]=="afro" ) {

  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,

	date_format(e.date_entered,'%d-%b-%Y at %h:%i') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1 

	FROM afro_entry_ticket t

	LEFT JOIN afro_entry e ON e.entry_id=t.entry_id

	LEFT JOIN afro_lotto l ON l.afro_id=e.afro_id

	LEFT JOIN gcm ON gcm.`condition`=e.method_id

	WHERE gcm.condition_type='METHOD' AND t.ticket_no='".$_GET['ticket_no']."'";

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

  } 

  if($rs) $rs->close();  

  

  $qry="SELECT * FROM afro_entry_child WHERE nt_id='".$nt_id."'";

  $rs =$_CONN->Execute($qry);

  while(!$rs->EOF){

    if($rs->fields['lotto_numbers']) {

		$lotto_numbers[] = $rs->fields['lotto_numbers'];

		$ld[]			 = $rs->fields['ld'];

	}

	$rs->MoveNext();

  } 

  if($rs) $rs->close();  	

} else {

	header("location: ".$_DIR["site"]["url"]."index".$atend);

	exit();

}

?>