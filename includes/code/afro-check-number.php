<?php
if($_APP_LIVE=="Y") $_GET["act"]=finding_id_from_url("act",$_DELIM);
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
  $afro[]=stripslashes($rs->fields["afro_id"]);
}
if($rs) $rs->close();

//Get per line price
$sql="select value from gcm where condition_type='PER_LINE' and `condition`=2";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $price=$rs->fields["value"];
if($rs) $rs->close();

//Saved Numbers
if($_GET["act"]=="savenumber") {
	$sql="select t_id from saved_entry where type='A' and user_id='".$_SESSION['login']['userid']."'";
	$rs=$_CONN->Execute($sql);
	if($rs && !$rs->EOF)
	  $t_id=$rs->fields["t_id"];
	if($rs) $rs->close();
	$sql="delete from saved_entry_child where t_id='".$t_id."'";
	$_CONN->Execute($sql);
	$sql="delete from saved_entry where user_id='".$_SESSION['login']['userid']."'";
	$_CONN->Execute($sql);
	$flag=false;
	$sql="insert into saved_entry values (NULL,'".$afro[6]."','A','".$_SESSION['login']['userid']."','".$_WEEK_DAY[$my_basket["draws"]]."','".$my_basket['weeks']."')";
	if($_CONN->Execute($sql)) {
		$intID = $_CONN->Insert_ID();
		$len=get_basket_count();
		for($i=0;$i<$len;$i++) {
			for($j=0;$j<5;$j++) {
				$lotto_num=getNumberforSave($i,$j);
				if($lotto_num) {
					$sql="insert into saved_entry_child values (NULL,'".$intID."','".$lotto_num."','N')";
					if($_CONN->Execute($sql)) $flag=true;
				}
			}
		}
		if($flag && $my_basket['vision']) {
			$sql="insert into saved_entry_child values (NULL,'".$intID."','".$my_basket['vision']."','Y')";
			$_CONN->Execute($sql);
		}
	}
	if($flag) $success="The entries are successfully saved.";
	else {
		//Make the column and its value array for putting in whereclause for deleting that row
		$whereCluaseVals = array();
		$whereCluaseVals['t_id'] = $intID;
		rollBackIt("saved_entry", $whereCluaseVals);//Call userdefined roolbakit function in function.sys
	}
}

//Calculate total amount
$total_amount=$price*get_all_playslip_count();
if($my_basket['weeks']) $total_amount=$total_amount*$my_basket['weeks'];
if($my_basket['vision'])
  $total_amount+=$afro[5];
if($total_amount>get_balance()) {
  header("location: ".$_DIR["site"]["url"]."transfer-amount".$atend."from".$_DELIM."check-number".$baratend);
  exit();
}
?>