<?php
if($_APP_LIVE=="Y") $_GET["act"]=finding_id_from_url("act",$_DELIM);
$sql="select afro_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%a, %d %b %Y') as to_time2,to_time,match7,now() as current_date1,vision_price,vision_winning_amount from afro_lotto where ( now() between from_time and to_time )";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $afro[]=stripslashes($rs->fields["to_time1"]);
  $afro[]=number_format($rs->fields["match7"],2);
  $afro[]=date_diff2($rs->fields["current_date1"],$rs->fields["to_time"]);
  $afro[]=stripslashes($rs->fields["to_time2"]);
  $afro[]=number_format($rs->fields["match7"],2);
  $afro[]=number_format($rs->fields["vision_price"],2);
  $afro[]=number_format($rs->fields["vision_winning_amount"],2);
  $afro[]=$rs->fields["afro_id"];
}
if($rs) $rs->close();
//Logic to check save number
if($_GET["act"]=="check-save-num") {
	$flagsave=false;
	$sql="select t_id,draws from saved_entry where type='A' and user_id='".$_SESSION['login']['userid']."'";
	$rs=$_CONN->Execute($sql);
	if($rs && !$rs->EOF) {
	  $flagsave=true;
	  $t_id=$rs->fields["t_id"];
	  $_POST["cmbDraw"]=array_search($rs->fields['draws'],$_WEEK_DAY);
	}
	if($rs) $rs->close();
	if($flagsave) {
		$i=1; $k=1; $flagsave=false;
		$sql="select lotto_numbers,vision from saved_entry_child where t_id='".$t_id."' order by e_id";
		$rs=$_CONN->Execute($sql);
		while(!$rs->EOF) {
		  $lotto_numbers=$rs->fields["lotto_numbers"];
		  $num=explode(" ",$lotto_numbers);
		  if($num[0]!="LD") {
			  for($j=0;$j<7;$j++) {
				 $_POST["num".$k]=$num[$j];
				 $k++;
			  }
			  $i++;
			  $flagsave=true;
		  }
		  $rs->MoveNext();
		}
		if($rs) $rs->close();
		if($flagsave) $_POST["lines"]=($i<5?5:$i);
	}
}
$sql="select afro_id,date_format(to_time,'%a, %d %b %Y') as to_time2,draw_number,winner_vision_number from afro_lotto where status='D' order by to_time desc limit 0,1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF){
  $draw_date=stripslashes($rs->fields["to_time2"]);
  $draw_number=explode(",",$rs->fields["draw_number"]);
  if($rs->fields["winner_vision_number"])
  	$winner_vision=explode(",",$rs->fields["winner_vision_number"]);
  $afro_id=$rs->fields["afro_id"];
}
if($rs) $rs->close();
if(!$_POST["lines"]) $_POST["lines"]=5;
if($_POST["hidAct"]=="append") {
	$flag=false;
	for($i=0,$j=1;$i<$_POST["lines"];$i++,$j+=7) {
		if($_POST["num".$j] && $_POST["num".($j+1)] && $_POST["num".($j+2)] && $_POST["num".($j+3)] && $_POST["num".($j+4)] && $_POST["num".($j+5)] && $_POST["num".($j+6)])
			$flag=true;
		else $flag=false;
	}
	if($flag) $_POST["lines"]+=4;
}
?>