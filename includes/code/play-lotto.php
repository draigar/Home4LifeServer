<?php
$sql="select date_format(to_time,'%W, %d %M %Y') as to_time1,to_time,match6,now() as current_date1 from naira_lotto where ( now() between from_time and to_time ) ";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $naira[]=stripslashes($rs->fields["to_time1"]);
  $naira[]=number_format($rs->fields["match6"],2);
  $naira[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
}
if($rs) $rs->close();

$sql="select date_format(to_time,'%W, %d %M %Y') as to_time1,to_time,match7,now() as current_date1 from afro_lotto where ( now() between from_time and to_time ) ";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $afro[]=stripslashes($rs->fields["to_time1"]);
  $afro[]=number_format($rs->fields["match7"],2);
  $afro[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
}
if($rs) $rs->close();
?>