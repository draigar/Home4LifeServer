<?php
if($_APP_LIVE=="Y") {
	$_GET["play"]=finding_id_from_url("play",$_DELIM);
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
}
$sql="select naira_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match6,now() as current_date1,vision_price,vision_winning_amount from naira_lotto where ( now() between from_time and to_time ) and status='A'";
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

//Logic to save number
if($_GET["play"]=="savenum") {
	$flagsave=false;
	$sql="select t_id,lotto_id,draws,weeks from saved_entry where type='N' and user_id='".$_SESSION['login']['userid']."'";
	$rs=$_CONN->Execute($sql);
	if($rs && !$rs->EOF) {
	  $my_basket=array();
	  $t_id=$rs->fields["t_id"];
	  $flagsave=true;
	  $lotto_id=$rs->fields["lotto_id"];
	  $my_basket['draws']=array_search($rs->fields['draws'],$_WEEK_DAY);
	  $my_basket['weeks']=$rs->fields["weeks"];
	}
	if($rs) $rs->close();
	if($flagsave && $lotto_id && ($lotto_id!=$naira[7])) {
		$sql="delete from saved_entry_child where t_id='".$t_id."'";
		$_CONN->Execute($sql);
		$sql="delete from saved_entry where user_id='".$_SESSION['login']['userid']."'";
		$_CONN->Execute($sql);
	} elseif($flagsave) {
		if(!$lotto_id) $lotto_id=$naira[7];
		$i=0; $k=0;
		$sql="select lotto_numbers,vision from saved_entry_child where t_id='".$t_id."'";
		$rs=$_CONN->Execute($sql);
		while(!$rs->EOF) {
		  if($rs->fields["vision"]=="Y") $my_basket['vision']=$rs->fields["lotto_numbers"];
		  else {
		  	$lotto_numbers=$rs->fields["lotto_numbers"];
			$num=explode(" ",$lotto_numbers);
			for($j=0;$j<6;$j++)
			  $my_basket[$i][$k][]=($lotto_numbers=="LD"?"LD":$num[$j]);
			$k++;
			if($k>6) {
				$k=0;
				$i++;
			}
		  }
		  $rs->MoveNext();
		}
		if($rs) $rs->close();

		if(isset($my_basket) && count($my_basket)>0) {
			if($_SESSION["MY_VISION_BASKET"]) {
				$_SESSION["MY_VISION_BASKET"]=NULL;
				unset($_SESSION["MY_VISION_BASKET"]);
				session_unregister("MY_VISION_BASKET");
			}
			$_SESSION["MY_VISION_BASKET"]=serialize($my_basket);
			header("location: ".$_DIR["site"]["url"]."basket".$atend);
		}
	}
}
//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

$vision_number=get_vision_number();

//if pay now buttom click
if(strtoupper($_SERVER['REQUEST_METHOD'])=="POST") {
	if($_SESSION["MY_VISION_BASKET"]) {
		$_SESSION["MY_VISION_BASKET"]=NULL;
		unset($_SESSION["MY_VISION_BASKET"]);
		session_unregister("MY_VISION_BASKET");
	}
	for($i=1,$k=0;$i<=42;$i+=6,$k++)
	  for($j=$i;$j<=($i+5);$j++) {
	  	if($_POST["num".$j]) $my_basket[0][$k][]=$_POST["num".$j];
	  }
	if(isset($my_basket) && count($my_basket)>0) {
		if($_POST["rdoPlayVision"]=="Y") $my_basket['vision']=$_POST["txtVisionNumber"];
		if($_POST["cmbDraw"]) $my_basket['draws']=$_POST["cmbDraw"];
		if($_POST["cmbWeek"]) $my_basket['weeks']=$_POST["cmbWeek"];
		$_SESSION["MY_VISION_BASKET"]=serialize($my_basket);
		if($_POST["hidAction"]=="addmorelines")
			header("location: ".$_DIR["site"]["url"]."basket".$atend);
		else
			header("location: ".$_DIR["site"]["url"]."confirm-play-game".$atend);
		exit();
	}
}

//if naira edit numbers link clicked
if($_GET["act"]=="editnairapslip") {
	if($_SESSION["MY_VISION_BASKET"]) {
	  $my_basket = unserialize($_SESSION["MY_VISION_BASKET"]);
	  $len=0;
	  for($i=1,$k=0;$i<=42;$i+=6,$k++)
	   	for($j=$i,$p=0;$j<=($i+5);$j++,$p++) {
			$idr="num".$j;
			$$idr=$my_basket[$len][$k][$p];
		}
	  if($my_basket['vision']) $vision_number=$my_basket['vision'];
	}
}
?>