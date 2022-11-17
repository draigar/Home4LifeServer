<?php
if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);
if($_GET['id']) {

	$sql="select naira_id,nl_id,date_format(to_time,'%d-%b-%Y %H:%i') as to_time1,date_format(from_time,'%d-%b-%Y %H:%i') as from_time,date_format(to_time,'%b/%Y') as to_time2,to_time,match6,status,now() as current_date1,vision_price,vision_winning_amount,good_cause from naira_lotto where naira_id=".$_GET["id"];
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
	  $naira[]=stripslashes($rs->fields["to_time1"]);
	  $naira[]=number_format($rs->fields["match6"],2);
	  $naira[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
	  $naira[]=stripslashes($rs->fields["to_time2"]);
	  $naira[]=number_format($rs->fields["match6"],2);
	  $naira[]=number_format($rs->fields["vision_price"],2);
	  $naira[]=number_format($rs->fields["vision_winning_amount"],2);
	  $naira[]=$rs->fields["naira_id"];
	  $naira[]=$rs->fields["nl_id"];
	  $naira[]=stripslashes($rs->fields["from_time"]);
	  $naira[]=$rs->fields["status"];
	  $good_cause=$rs->fields["good_cause"];
	}
	if($rs) $rs->close();

} else {
	header("Location: ".$_DIR['site']['adminurl']."naira_listing".$atend."err".$_DELIM."1".$baratend);
	exit();
}

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

//Get Result
$result=get_all_winner("naira",$_GET["id"],6);
$totwinner=$result[3][0]+$result[4][0]+$result[5][0]+$result[6][0];
$totfundpz=$result[3][1]+$result[4][1]+$result[5][1]+$result[6][1]+$result[8][1];
$totalmatch=0;
for($i=6;$i>=3;$i--) {
 $totalmatch+=$result[$i][0];
}
$totalentries=0;
for($i=6;$i>=0;$i--) {
 $totalentries+=$result[$i][0];
}
?>