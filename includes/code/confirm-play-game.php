<?php
//Get the basket details from session variable.
if($_SESSION["MY_VISION_BASKET"]) {
  $my_basket = unserialize($_SESSION["MY_VISION_BASKET"]);
  $len=get_playslip_count(0);
}
else {
  header("location: ".$_DIR["site"]["url"]."play-lotto".$atend);
  exit();
}

$sql="select naira_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from naira_lotto where ( now() between from_time and to_time )";
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

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=1";
$rs=$_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

//Calculate total amount
$total_amount=$price*get_all_playslip_count();
if($my_basket['weeks']) $total_amount=$total_amount*$my_basket['weeks'];
if($my_basket['vision'])
  $total_amount+=$naira[5];
if($total_amount>get_balance()) {
  header("location: ".$_DIR["site"]["url"]."transfer-amount".$atend."pvs".$_DELIM."confirm-play-game".$baratend);
  exit();
}

//Buy Now
if($_POST["hidAction"]=="buynow" && $_SESSION["MY_VISION_BASKET"]) {
	//Insert record into naira table
	$result=save_entry("naira",$naira[7],0,$price,$naira[5]);
	if($result[0]) {
		if($result[0]) header("location: ".$_DIR["site"]["url"]."ticket-details".$atend."ticket_no".$_DELIM.$result[1].$baratend."frm".$_DELIM."naira".$baratend);
 		exit();
	} else $error=true;
}
?>