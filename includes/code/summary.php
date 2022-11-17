<?php

if($_APP_LIVE=="Y") $_GET["idx"]=finding_id_from_url("idx",$_DELIM);

if($_GET["idx"]) {

  $qry="SELECT e.naira_id,t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,

	date_format(e.date_entered,'%d-%b-%Y at %H:%i:%s') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,count(h.ne_id) as countslip,

	date_format(l.to_time,'%W, %d %M %Y') as to_time2,date_format(l.to_time,'%d%m%Y') as to_time3,l.to_time,now() as current_date1,l.match6

	FROM naira_entry_ticket t

	LEFT JOIN naira_entry e ON e.entry_id=t.entry_id

	LEFT JOIN naira_entry_child h ON h.nt_id=t.nt_id

	LEFT JOIN naira_lotto l ON l.naira_id=e.naira_id

	LEFT JOIN gcm ON gcm.`condition`=e.method_id

	WHERE gcm.condition_type='METHOD' AND md5(e.entry_id)='".substr($_GET['idx'],1)."' GROUP BY t.nt_id";

  $rs =$_CONN->Execute($qry);

  $i=0;

  while(!$rs->EOF){

  	$naira_id			  = $rs->fields['naira_id'];

	$draws				  = array_search($rs->fields['draws'],$_WEEK_DAY);

	$weeks				  = $rs->fields['weeks'];

	$ticket_details[$i][] = $rs->fields['ticket_no'];

	$ticket_details[$i][] = $rs->fields['date_entered'];

	$ticket_details[$i][] = $rs->fields['value'];

	$ticket_details[$i][] = $rs->fields['price']*$rs->fields['countslip'];

	$vision_number		  = $rs->fields['vision_numbers'];

	$vision_price		  = $rs->fields['vision_price'];

	$to_time1=stripslashes($rs->fields["to_time1"]);

	$to_time2=stripslashes($rs->fields["to_time2"]);

    $datediff=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);

    $to_time3=stripslashes($rs->fields["to_time3"]);

	$prizeamt=number_format($rs->fields["match6"],2);

	$i++;

	$rs->MoveNext();

  }

  if($rs) $rs->close();

}

else {

	header("location: ".$_DIR["site"]["url"]."index".$atend);

	exit();

}

?>