<?php
//Get the basket details from session variable.
if($_SESSION["MY_AFRO_VISION_BASKET"]) $my_basket = unserialize($_SESSION["MY_AFRO_VISION_BASKET"]);
else {
  header("location: ".$_DIR["site"]["url"]."play-lotto".$atend);
  exit();
}

$sql="select afro_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from afro_lotto where ( now() between from_time and to_time )";
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
}
if($rs) $rs->close();

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

//Calculate total amount
$total_amount=$price*get_all_playslip_count();
if($my_basket['weeks']) $total_amount=$total_amount*$my_basket['weeks'];
if($my_basket['vision'])
  $total_amount+=$afro[5];
if($total_amount>get_balance()) {
  header("location: ".$_DIR["site"]["url"]."transfer-amount".$atend."pvs".$_DELIM."afro-check-number".$baratend);
  exit();
}

//Buy Now
if($_POST["hidAction"]=="buynow" && $_SESSION["MY_AFRO_VISION_BASKET"]) {
	//Insert record into afro table
	$result=save_entry("afro",$afro[7],($_POST["INDEX"]-1),$price,$afro[5],35,7);
	if($result[0]) {
		if(!$_POST["INSERTED_ID"]) $_POST["INSERTED_ID"]=$result[2];
		if(get_basket_count()==$_POST["INDEX"]) {
			$_SESSION["MY_AFRO_VISION_BASKET"]=NULL;
			unset($_SESSION["MY_AFRO_VISION_BASKET"]);
			session_unregister("MY_AFRO_VISION_BASKET");
			header("location: ".$_DIR["site"]["url"]."afro-summary".$atend."idx".$_DELIM."i".md5($result[2]).$baratend);
            exit();
		}
	} else {
		$error=true;
		$_POST["INDEX"]=$_POST["INDEX"]-1;
	}
}
?>