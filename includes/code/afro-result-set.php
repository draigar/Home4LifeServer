<?php
//Logic to save number
if($_POST["hidAct"]=="play_number") {
	$len=$_POST["lines"];
	$my_basket=array();
	for($i=0,$j=1,$m=0,$n=0;$i<$len;$i++,$j+=7,$k=0) {
		if($_POST["num".$j]) {
			for($k=0;$k<7;$k++) {
				$my_basket[$n][$m][]=$_POST["num".($j+$k)];
			}
			$m++;
			if($m>4) {
				$m=0;
				$n++;
			}
		}
	}
	if(isset($my_basket) && count($my_basket)>0) {
		if($_SESSION["MY_AFRO_VISION_BASKET"]) {
			$_SESSION["MY_AFRO_VISION_BASKET"]=NULL;
			unset($_SESSION["MY_AFRO_VISION_BASKET"]);
			session_unregister("MY_AFRO_VISION_BASKET");
		}
		$_SESSION["MY_AFRO_VISION_BASKET"]=serialize($my_basket);
		header("location: ".$_DIR["site"]["url"]."afro-basket".$atend);
		exit();
	}
}

//Saved Numbers
if($_POST["hidAct"]=="save_number") {
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
	$sql="insert into saved_entry values (NULL,'','A','".$_SESSION['login']['userid']."','".$_WEEK_DAY[$_POST['cmbDraw']]."','')";
	if($_CONN->Execute($sql)) {
		$intID = $_CONN->Insert_ID();
		$len=$_POST["lines"];
		for($i=0,$j=1;$i<$len;$i++,$j+=7,$k=0) {
			if($_POST["num".$j]) {
				$lotto_numbers="";
				for($k=0;$k<7;$k++) {
					if($lotto_numbers) $lotto_numbers.=" ";
					$lotto_numbers.=$_POST["num".($j+$k)];
				}
				$sql="insert into saved_entry_child values (NULL,'".$intID."','".$lotto_numbers."','N')";
				if($_CONN->Execute($sql)) $flag=true;
			}
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

$arr=explode('/',$_POST["ff2"]);
$from=date("Y-m-d",mktime(0,0,0,$arr[0],$_POST["ff1"],$arr[1]));
$dates=date("D d M Y",mktime(0,0,0,$arr[0],$_POST["ff1"],$arr[1]));
$arr=explode('/',$_POST["tt2"]);
$dates.=" to ".date("D d M Y",mktime(0,0,0,$arr[0],$_POST["tt1"],$arr[1]));
$to=date("Y-m-d",mktime(0,0,0,$arr[0],$_POST["tt1"],$arr[1]));
$where="";
if($from && $to) $where=" and (date_format(l.to_time,'%Y-%m-%d') between '$from' and '$to') ";
$i=0; $result=array();
for($k=0,$j=1;$k<$_POST["lines"];$k++,$j+=7) {

	$afro_number=$_POST["num".$j].$_POST["num".($j+1)].$_POST["num".($j+2)].$_POST["num".($j+3)].$_POST["num".($j+4)].$_POST["num".($j+5)].$_POST["num".($j+6)];
	if($afro_number) {
		$sql="select distinct l.draw_number,l.draw_date,
			l.al_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
			date_format(l.to_time,'%a %d %b %Y') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.afro_id,
			if ( (
			  (
				substring(l.draw_number,1,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,1,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx1,
			if ( (
			  (
				substring(l.draw_number,4,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,4,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx2,
			if ( (
			  (
				substring(l.draw_number,7,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,7,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx3,
			if ( (
			  (
				substring(l.draw_number,10,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,10,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx4,
			if ( (
			  (
				substring(l.draw_number,13,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,13,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx5,
			if ( (
			  (
				substring(l.draw_number,16,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,16,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx6,
			if ( (
			  (
				substring(l.draw_number,19,2)=substring('".$afro_number."',1,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',3,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',5,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',7,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',9,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',11,2)
			  ) or (
				substring(l.draw_number,19,2)=substring('".$afro_number."',13,2)
			  ) ),1,0

			) as matchx7
			from afro_lotto l where l.status='D' $where group by l.afro_id
			having (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)>=3";
		$rs =$_CONN->Execute($sql);
		while(!$rs->EOF){
			$line_number[$i] = chr(65+$k);
			$afro_id[$i]    = $rs->fields['afro_id'];
			$nl_id[$i]       = $rs->fields['al_id'];
			$draw_number[$i] = $rs->fields['draw_number'];
			$draw_date[$i]   = $rs->fields['draw_date'];
			$from_time[$i]   = $rs->fields['from_time'];
			$to_time[$i]     = $rs->fields['to_time'];
			$month_year[$i]  = $rs->fields['monthyear'];
			$vision_amount[$i] = number_format($rs->fields['vision_winning_amount'],2);
			$lotto_num[$i] = str_replace(',','',$rs->fields['draw_number']);
			$result[$i][]  = $rs->fields['matchx1'];
			$result[$i][]  = $rs->fields['matchx2'];
			$result[$i][]  = $rs->fields['matchx3'];
			$result[$i][]  = $rs->fields['matchx4'];
			$result[$i][]  = $rs->fields['matchx5'];
			$result[$i][]  = $rs->fields['matchx6'];
			$result[$i][]  = $rs->fields['matchx7'];
			$i++;
			$rs->MoveNext();
		}
		if($rs)	$rs->close();
	}
}
?>