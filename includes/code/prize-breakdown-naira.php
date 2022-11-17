<?php
if($_APP_LIVE=="Y") $_GET["idx"]=finding_id_from_url("idx",$_DELIM);
//Check for idx
if($_GET["idx"])
	$sql="select naira_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%a, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from naira_lotto where concat('i',md5(naira_id))='".$_GET["idx"]."'";
else
	$sql="select naira_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%a, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from naira_lotto where status='D' order by draw_date desc limit 0,1";
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
}
if($rs) $rs->close();
//Check for idx
if($_GET["idx"])
	$sql="select naira_id,date_format(to_time,'%a, %d %b %Y') as to_time2,draw_number,match6,winner_vision_number from naira_lotto where concat('i',md5(naira_id))='".$_GET["idx"]."' order by draw_date desc limit 0,1";
else
	$sql="select naira_id,date_format(to_time,'%a, %d %b %Y') as to_time2,draw_number,match6,winner_vision_number from naira_lotto where status='D' order by draw_date desc limit 0,1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $draw_date=stripslashes($rs->fields["to_time2"]);
  $draw_number=explode(",",$rs->fields["draw_number"]);
  if($rs->fields["winner_vision_number"])
  	$winner_vision=explode(",",$rs->fields["winner_vision_number"]);
  $naira_id=$rs->fields["naira_id"];
  $jackpot=$rs->fields["match6"];
} else {
  header("location: ".$_DIR['site']['url']."result-naira-lotto".$atend);
  exit();
}
if($rs) $rs->close();

//Get Result
$result=get_all_winner("naira",$naira_id,6);
$totwinner=number_format($result[3][0]+$result[4][0]+$result[5][0]+$result[6][0],2);
$totfundpz=number_format($result[3][1]+$result[4][1]+$result[5][1]+$result[6][1],2);
$totperwin=number_format($result[3][2]+$result[4][2]+$result[5][2]+$result[6][2],2);
?>