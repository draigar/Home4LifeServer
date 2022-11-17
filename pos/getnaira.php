<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection

$sql="select naira_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from naira_lotto where ( now() between from_time and to_time ) and status='A'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $naira[]=stripslashes($rs->fields["to_time1"]);
  $naira[]=number_format($rs->fields["match6"],2);
  $naira[]=date_diff($rs->fields["current_date1"],$rs->fields["to_time"]);
  $naira[]=stripslashes($rs->fields["to_time2"]);
  $naira[]=number_format($rs->fields["match6"],2);
  $naira[]=number_format($rs->fields["vision_price"],2);
  $naira[]=number_format($rs->fields["vision_winning_amount"],2);
  $naira[]=$rs->fields["naira_id"];
}
if($rs) $rs->close();

$xml = '<?xml version="1.0" standalone="yes"?>' . "\n";
$xml .="<game>". "\n";
if($naira[0]) {
$xml .="<item>
  <enddate>".$naira[0]."</enddate> 
  <jackpot>".$naira[1]."</jackpot>
  <days>".$naira[2]["fullDays"]."</days>
  <hours>".$naira[2]["fullHours"]."</hours> 
  <minutes>".$naira[2]["fullMinutes"]."</minutes> 
</item>"."\n"; 
} else {
$xml .="<item>Game is closed</item>";
}
$xml .="</game>";

echo $xml;
exit;
?>