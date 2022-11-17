<?php
if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);
if($_GET['id']) {

	$sql="select afro_id,al_id,date_format(to_time,'%d-%b-%Y %H:%i') as to_time1,date_format(from_time,'%d-%b-%Y %H:%i') as from_time,date_format(to_time,'%b/%Y') as to_time2,to_time,match6,status,now() as current_date1,vision_price,vision_winning_amount,good_cause from afro_lotto where afro_id=".$_GET["id"];
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
	  $afro[]=stripslashes($rs->fields["to_time1"]);
	  $afro[]=number_format($rs->fields["match6"],2);
	  $afro[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
	  $afro[]=stripslashes($rs->fields["to_time2"]);
	  $afro[]=number_format($rs->fields["match6"],2);
	  $afro[]=number_format($rs->fields["vision_price"],2);
	  $afro[]=number_format($rs->fields["vision_winning_amount"],2);
	  $afro[]=$rs->fields["afro_id"];
	  $afro[]=$rs->fields["al_id"];
	  $afro[]=stripslashes($rs->fields["from_time"]);
	  $afro[]=$rs->fields["status"];
	  $good_cause=$rs->fields["good_cause"];
	}
	if($rs) $rs->close();

} else {
	header("Location: ".$_DIR['site']['adminurl']."afro_listing".$atend."err".$_DELIM."1".$baratend);
	exit();
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Submit']=="Notify Result") {
	$sql="update afro_lotto set status='D',matchz3='".trim($_POST["txtMatch3"])."',matchz4='".trim($_POST["txtMatch4"])."',
	matchz5='".trim($_POST["txtMatch5"])."',matchz6='".trim($_POST["txtMatch6"])."',good_cause='".trim($_POST["txtGoodCause"])."' where afro_id=".$_GET['id'];
	if($_CONN->Execute($sql)) {
		notify_draw_result("afro",$_GET["id"],7);
		header("Location: ".$_DIR['site']['adminurl']."afro_listing".$atend."success".$_DELIM."4".$baratend);
		exit();
	} else {
		$_MSG[0]="Unknown error occured while processing request.";
		$error=1;
	}
}

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=2";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

//Get Result
$result=get_all_winner("afro",$_GET["id"],7);
$totwinner=$result[3][0]+$result[4][0]+$result[5][0]+$result[6][0]+$result[7][0];
$totfundpz=$result[3][1]+$result[4][1]+$result[5][1]+$result[6][1]+$result[7][1]+$result[8][1];
$totalmatch=0;
for($i=7;$i>=3;$i--) {
 $totalmatch+=$result[$i][0];
}
$totalentries=0;
for($i=7;$i>=0;$i--) {
 $totalentries+=$result[$i][0];
}
?>