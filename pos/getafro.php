<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection

$sql="select afro_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match7,now() as current_date1,vision_price,vision_winning_amount from afro_lotto where ( now() between from_time and to_time ) and status='A'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
	$afro[]=stripslashes($rs->fields["to_time1"]);
	$afro[]=number_format($rs->fields["match7"],2);
	$afro[]=date_diff($rs->fields["current_date1"],$rs->fields["to_time"]);
	$afro[]=stripslashes($rs->fields["to_time2"]);
	$afro[]=number_format($rs->fields["match7"],2);
	$afro[]=number_format($rs->fields["vision_price"],2);
	$afro[]=number_format($rs->fields["vision_winning_amount"],2);
	$afro[]=$rs->fields["afro_id"];
}
if($rs) $rs->close();

$xml = '<?xml version="1.0" standalone="yes"?>' . "\n";
$xml .="<game>". "\n";
if($afro[0]) {
	$xml .="<item>
	<enddate>".$afro[0]."</enddate> 
	<jackpot>".$afro[1]."</jackpot>
	<days>".$afro[2]["fullDays"]."</days>
	<hours>".$afro[2]["fullHours"]."</hours> 
	<minutes>".$afro[2]["fullMinutes"]."</minutes> 
	</item>"."\n"; 	
} else {
	$xml .="<item>Game is closed</item>";
}
$xml .="</game>";
echo $xml;
exit;
?>