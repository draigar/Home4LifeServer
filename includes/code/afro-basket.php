<?php
if($_APP_LIVE=="Y") {
  $_GET["rowid"]=finding_id_from_url("rowid",$_DELIM);
  $_GET["act"]=finding_id_from_url("act",$_DELIM);
}

$sql="select date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,date_format(to_time,'%a %b %Y') as to_time3,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from afro_lotto where ( now() between from_time and to_time )";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $afro[]=stripslashes($rs->fields["to_time1"]);
  $afro[]=number_format($rs->fields["match6"],2);
  $afro[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
  $afro[]=stripslashes($rs->fields["to_time2"]);
  $afro[]=number_format($rs->fields["match6"],2);
  $afro[]=number_format($rs->fields["vision_price"],2);
  $afro[]=number_format($rs->fields["vision_winning_amount"],2);
  $afro[]=stripslashes($rs->fields["to_time3"]);
} else {
  if($rs) $rs->close();
  header("location: ".$_DIR["site"]["url"]."afro-millions".$atend);
  exit();
}
if($rs) $rs->close();

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=2";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

if($_SESSION["MY_AFRO_VISION_BASKET"]) $my_basket = unserialize($_SESSION["MY_AFRO_VISION_BASKET"]);

if($my_basket['vision']) $vision_number=$my_basket['vision'];
else $vision_number=get_vision_raffle();

//if afro delete play slip link clicked
if($_GET["act"]=="rmafropslip" && $_GET["rowid"]) {
	$new_basket=array();
	$len=get_basket_count();
	for($i=0;$i<$len;$i++) {
	  if($i!=($_GET["rowid"]-1))
		$new_basket[]=$my_basket[$i];
	}
	$_SESSION["MY_AFRO_VISION_BASKET"]=serialize($new_basket);
	header("location: ".$_DIR["site"]["url"]."afro-basket".$atend);
	exit();
}

//Display Current Slip Number
if($_SESSION["MY_AFRO_VISION_BASKET"]) {
  $flag1=false;
  for($i=1,$k=0;$i<=35;$i+=7,$k++) {
	$flag2=false;
	for($j=$i,$p=0;$j<=($i+6);$j++,$p++) {
	  if($my_basket[0][$k][$p]) $flag2=true;
	}
	if(!$flag2) { $flag1=true; break; }
  }
  if($flag1) {
	$total_price=$price*get_playslip_count(0);
	if($my_basket['weeks']) $total_price=$total_price*$my_basket['weeks'];
	$_GET["act"]="editafropslip";
	$_GET["rowid"]=$len+1;
  }
}

//if proceed buttom click
if(strtoupper($_SERVER['REQUEST_METHOD'])=="POST" && $_POST["hidAction"]=="proceed-button-click") {
	if(isset($my_basket) && count($my_basket)>0) {
		if($_POST["cmbDraw"]) $my_basket['draws']=$_POST["cmbDraw"];
		if($_POST["cmbWeek"]) $my_basket['weeks']=$_POST["cmbWeek"];
		$_SESSION["MY_AFRO_VISION_BASKET"]=serialize($my_basket);
		header("location: ".$_DIR["site"]["url"]."afro-check-number".$atend);
		exit();
	}
}

//if add to cart buttom click
if(strtoupper($_SERVER['REQUEST_METHOD'])=="POST" && $_POST["hidAction"]=="addtocart-button-click") {
	//Get the basket details from session variable.
	if($_SESSION["MY_AFRO_VISION_BASKET"]) {
	  if($_GET["rowid"]) $len=$_GET["rowid"]-1;
	  else $len=get_basket_count();
	  if($len<$_MAX_PLAY_SLIP) {
		  for($i=1,$k=0;$i<=35;$i+=7,$k++)
			for($j=$i,$t=0;$j<=($i+6);$j++,$t++) {
			  if($_POST["num".$j]) $my_basket[$len][$k][$t]=$_POST["num".$j];
			}
	  }
	} else {
	   for($i=1,$k=0;$i<=35;$i+=7,$k++)
	   	for($j=$i,$t=0;$j<=($i+6);$j++,$t++) {
		  if($_POST["num".$j]) $my_basket[0][$k][$t]=$_POST["num".$j];
		}
	}
	if($len<$_MAX_PLAY_SLIP && isset($my_basket) && count($my_basket)>0) {
		if($_POST["rdoPlayVision"]=="Y") $my_basket['vision']=$_POST["txtVisionNumber"];
		$_SESSION["MY_AFRO_VISION_BASKET"]=serialize($my_basket);
		header("location: ".$_DIR["site"]["url"]."afro-basket".$atend);
		exit();
	} else {
		header("location: ".$_DIR["site"]["url"]."afro-basket".$atend);
		exit();
	}
}

//if afro edit numbers link clicked
if($_GET["act"]=="editafropslip" && $_GET["rowid"]) {
	if($_SESSION["MY_AFRO_VISION_BASKET"]) {
	  $len=$_GET["rowid"]-1;
	  for($i=1,$k=0;$i<=35;$i+=7,$k++)
	   	for($j=$i,$p=0;$j<=($i+6);$j++,$p++) {
			$idr="num".$j;
			$$idr=$my_basket[$len][$k][$p];
		}
	  $total_price=$price*get_playslip_count($len);
	  if($my_basket['weeks']) $total_price=$total_price*$my_basket['weeks'];
	}
}
?>