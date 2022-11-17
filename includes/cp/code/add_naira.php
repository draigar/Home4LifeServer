<?php
$success==false;
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Save"){
	if (trim($_POST["txtFromDate"])=="") {
		$_MSG[] = " Please select start date.";
		$error = 1;
	}
	if (trim($_POST["cmbHourFrom"])=="" || trim($_POST["cmbMinuteFrom"])=="") {
		$_MSG[] = " Please select start hours/minutes.";
		$error = 1;
	}
	if (trim($_POST["txtToDate"])=="") {
		$_MSG[] = " Please select end date.";
		$error = 1;
	}
	if (trim($_POST["cmbHourTo"])=="" || trim($_POST["cmbMinuteTo"])=="") {
		$_MSG[] = " Please select end hours/minutes.";
		$error = 1;
	}
	$arr=explode("-",$_POST["txtFromDate"]);
	$_POST["cmbMonth"]=$arr[0];
	$_POST["cmbFromDate"]=$arr[1];
	$_POST["cmbYear"]=$arr[2];
	$arr=explode("-",$_POST["txtToDate"]);
	$_POST["cmbToMonth"]=$arr[0];
	$_POST["cmbToDate"]=$arr[1];
	$_POST["cmbToYear"]=$arr[2];
	$tp1=mktime($_POST["cmbHourFrom"],$_POST["cmbMinuteFrom"],'01',$_POST["cmbMonth"],$_POST["cmbFromDate"],$_POST["cmbYear"]);
	$tp2=mktime($_POST["cmbHourTo"],$_POST["cmbMinuteTo"],'01',$_POST["cmbToMonth"],$_POST["cmbToDate"],$_POST["cmbToYear"]);
	if ($tp1 > $tp2) {
		$_MSG[] = " Start date cannot be greater than to date.";
		$error = 1;
	}
	if (trim($_POST["txtMatch6"])=="") {
		$_MSG[] = " Please enter match (6) amount.";
		$error = 1;
	} elseif (!is_numeric(trim($_POST["txtMatch6"]))) {
		$_MSG[] = " Please enter valid match (6) amount.";
		$error = 1;
	}
	if (trim($_POST["chkVision"])=="Y" && trim($_POST["txtVisionAmt"])=="") {
		$_MSG[] = " Please enter vision winning amount.";
		$error = 1;
	}
	if (trim($_POST["chkVision"])=="Y" && trim($_POST["txtVisionPrice"])=="") {
		$_MSG[] = " Please enter vision cost.";
		$error = 1;
	}

	if(empty($error)) {

		$_sql="select naira_id from naira_lotto where status='A' AND now()<=to_time AND
		 ( ('".trim($_POST["cmbYear"])."-".trim($_POST["cmbMonth"])."-".trim($_POST["cmbFromDate"])." ".trim($_POST["cmbHourFrom"]).":".trim($_POST["cmbMinuteFrom"]).":01"."' between from_time and to_time)
		OR ('".trim($_POST["cmbToYear"])."-".trim($_POST["cmbToMonth"])."-".trim($_POST["cmbToDate"])." ".trim($_POST["cmbHourTo"]).":".trim($_POST["cmbMinuteTo"]).":01"."' between from_time and to_time) )";
		$rs=$_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0) {
			$_MSG[] = " There is already one Naira Lotto game exist for these date. Please choose another date.";
			$error = 1;
		}
		elseif($rs) $rs->close();

	}

	if(empty($error)){
			$sql="select max(naira_id) as naira_id from naira_lotto";
			$rs=$_CONN->Execute($sql);
			if( $rs && $rs->fields["naira_id"]>0 ) $maxid=$rs->fields["naira_id"]+1;
			else $maxid=1;
			if($rs) $rs->close();
			while(1){
				$naira_no="NL".substr($maxid.date("ymdhsi"),0,10);
				$_sql="select naira_id from naira_lotto where nl_id='".$naira_no."'";
				$rs=$_CONN->Execute($_sql);
				if ($rs->EOF) {
					if($rs)	$rs->close();
					break;
				}
				elseif($rs) $rs->close();
			} //while(1)

		$sql="INSERT INTO naira_lotto(nl_id,month_year,from_time,to_time,match0,match1,match2,match3,match4,match5,match6,total_amount,status,vision_winning_amount,vision_price)
				VALUES('".$naira_no."',
						'".trim($_POST["cmbMonth"]).",".trim($_POST["cmbYear"])."',
						'".trim($_POST["cmbYear"])."-".trim($_POST["cmbMonth"])."-".trim($_POST["cmbFromDate"])." ".trim($_POST["cmbHourFrom"]).":".trim($_POST["cmbMinuteFrom"]).":01"."',
						'".trim($_POST["cmbToYear"])."-".trim($_POST["cmbToMonth"])."-".trim($_POST["cmbToDate"])." ".trim($_POST["cmbHourTo"]).":".trim($_POST["cmbMinuteTo"]).":01"."',
						'".trim($_POST["txtMatch0"])."',
						'".trim($_POST["txtMatch1"])."',
						'".trim($_POST["txtMatch2"])."',
						'".trim($_POST["txtMatch3"])."',
						'".trim($_POST["txtMatch4"])."',
						'".trim($_POST["txtMatch5"])."',
						'".trim($_POST["txtMatch6"])."',
						'".trim($_POST["txtTotalAmount"])."','A',
						'".trim($_POST["txtVisionAmt"])."',
						'".trim($_POST["txtVisionPrice"])."'
						)";
		$isAllQueryExecuted= $_CONN->Execute($sql);
	}
	if($isAllQueryExecuted){

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

		$xml = '<?xml version="1.0" standalone="yes"?>' . "\n";
		$xml .="<game>". "\n";
		$xml .="<item>
		  <enddate>".$naira[0]."</enddate>
		  <jackpot>".$naira[1]."</jackpot>
		  <days>".$naira[2]["fullDays"]."</days>
		  <hours>".$naira[2]["fullHours"]."</hours>
		  <minutes>".$naira[2]["fullMinutes"]."</minutes>
		</item>"."\n";
		$xml .="</game>";
		$fname=$_SITE_ROOT_PATH."data/naira.xml";
		$fp=fopen( $fname ,"w+");
		fwrite($fp,$xml);
		fclose($fp);

		header("Location: ".$_DIR['site']['adminurl']."current_naira".$atend."success".$_DELIM."1".$baratend);
		exit();
	}
}


$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";
$month=getOptions($_sql,$_POST['cmbMonth']);
?>