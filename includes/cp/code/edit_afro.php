<?php
if($_APP_LIVE=="Y") $_GET["aid"]=finding_id_from_url("aid",$_DELIM);

if (empty($_GET['aid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."current_afro".$atend."err".$_DELIM."51");
} else {
    $_sql="SELECT *,if(now()<from_time,0,1) as notedit FROM afro_lotto WHERE afro_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) {
		if ($rs)
			$rs->close();
		if ($_CONN)
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."current_afro".$atend."err".$_DELIM."1".$baratend);
		exit();
	}
	elseif($_SERVER['REQUEST_METHOD'] != "POST") {

		if($rs->fields["notedit"]) {
			header("Location: ".$_DIR['site']['adminurl']."current_afro".$atend."err".$_DELIM."2".$baratend);
			exit();
		}

		$month_year						=explode(",",$rs->fields["month_year"]);

		$from_time						=explode("-",$rs->fields["from_time"]);
		$frmDate						=explode(" ",$from_time[2]);
		$frmHrMm						=explode(":",$frmDate[1]);

		$to_time						=explode("-",$rs->fields["to_time"]);
		$toDate							=explode(" ",$to_time[2]);
		$toHrMm							=explode(":",$toDate[1]);

		$_POST["cmbMonth"]        			= $month_year[0];
		$_POST["cmbYear"] 		  			= $month_year[1];

		$_POST["txtFromDate"] 		    	= $from_time[1]."-".$frmDate[0]."-".$from_time[0];
		$_POST["cmbHourFrom"] 		    	= $frmHrMm[0];
		$_POST["cmbMinuteFrom"] 		   	= $frmHrMm[1];

		$_POST["txtToDate"] 		    	= $to_time[1]."-".$toDate[0]."-".$to_time[0];
		$_POST["cmbHourTo"] 		    	= $toHrMm[0];
		$_POST["cmbMinuteTo"] 		    	= $toHrMm[1];

		$_POST["txtMatch0"] 		   		= $rs->fields["match0"];
		$_POST["txtMatch1"]    		        = $rs->fields["match1"];
		$_POST["txtMatch2"]   			    = $rs->fields["match2"];
		$_POST["txtMatch3"] 			   	= $rs->fields["match3"];
		$_POST["txtMatch4"]   		        = $rs->fields["match4"];
		$_POST["txtMatch5"]   			    = $rs->fields["match5"];
		$_POST["txtMatch6"] 			   	= $rs->fields["match6"];
		$_POST["txtMatch7"] 			   	= $rs->fields["match7"];
		$_POST["txtTotalAmount"] 			= $rs->fields["total_amount"];

		$_POST["txtVisionAmt"] 			   	= $rs->fields["vision_winning_amount"];
		$_POST["txtVisionPrice"] 			= $rs->fields["vision_price"];

	}
}
$_POST["chkVision"] ="Y";
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
	if (trim($_POST["txtMatch7"])=="") {
		$_MSG[] = " Please enter match (7) amount.";
		$error = 1;
	} elseif (!is_numeric(trim($_POST["txtMatch7"]))) {
		$_MSG[] = " Please enter valid match (7) amount.";
		$error = 1;
	}
	if (trim($_POST["chkVision"])=="Y" && trim($_POST["txtVisionAmt"])=="") {
		$_MSG[] = " Please enter raffle winning amount.";
		$error = 1;
	}
	if (trim($_POST["chkVision"])=="Y" && trim($_POST["txtVisionPrice"])=="") {
		$_MSG[] = " Please enter raffle cost.";
		$error = 1;
	}

	if(empty($error)) {

		$_sql="select afro_id from afro_lotto where afro_id!=".$_GET['aid']." AND status='A' AND now()<=to_time AND
		 ( ('".trim($_POST["cmbYear"])."-".trim($_POST["cmbMonth"])."-".trim($_POST["cmbFromDate"])." ".trim($_POST["cmbHourFrom"]).":".trim($_POST["cmbMinuteFrom"]).":01"."' between from_time and to_time )
		OR ('".trim($_POST["cmbToYear"])."-".trim($_POST["cmbToMonth"])."-".trim($_POST["cmbToDate"])." ".trim($_POST["cmbHourTo"]).":".trim($_POST["cmbMinuteTo"]).":01"."' between from_time and to_time ) )";
		$rs=$_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0) {
			$_MSG[] = " There is already one Afro Lotto game exist for these date. Please choose another date.";
			$error = 1;
		}
		elseif($rs) $rs->close();

	}

	if(empty($error)){

		$sql="UPDATE afro_lotto SET
			month_year			='".trim($_POST["cmbMonth"]).",".trim($_POST["cmbYear"])."',
			from_time			='".trim($_POST["cmbYear"])."-".trim($_POST["cmbMonth"])."-".trim($_POST["cmbFromDate"])." ".trim($_POST["cmbHourFrom"]).":".trim($_POST["cmbMinuteFrom"])."',
			to_time				='".trim($_POST["cmbToYear"])."-".trim($_POST["cmbToMonth"])."-".trim($_POST["cmbToDate"])." ".trim($_POST["cmbHourTo"]).":".trim($_POST["cmbMinuteTo"])."',
			match0				='".trim($_POST["txtMatch0"])."',
			match1				='".trim($_POST["txtMatch1"])."',
			match2				='".trim($_POST["txtMatch2"])."',
			match3				='".trim($_POST["txtMatch3"])."',
			match4				='".trim($_POST["txtMatch4"])."',
			match5				='".trim($_POST["txtMatch5"])."',
			match6				='".trim($_POST["txtMatch6"])."',
			match7				='".trim($_POST["txtMatch7"])."',
			total_amount		='".trim($_POST["txtTotalAmount"])."',
			vision_price				='".trim($_POST["txtVisionPrice"])."',
			vision_winning_amount		='".trim($_POST["txtVisionAmt"])."'
			where afro_id=".$_GET['aid'];
			$isAllQueryExecuted= $_CONN->Execute($sql);
		if($isAllQueryExecuted){

			$sql="select afro_id,date_format(to_time,'%W, %d %M %Y') as to_time1,date_format(to_time,'%W, %d %b %Y') as to_time2,to_time,match7,now() as current_date1,vision_price,vision_winning_amount from afro_lotto where ( now() between from_time and to_time ) and status='A'";
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

			$xml = '<?xml version="1.0" standalone="yes"?>' . "\n";
			$xml .="<game>". "\n";
			$xml .="<item>
			  <enddate>".$afro[0]."</enddate>
			  <jackpot>".$afro[1]."</jackpot>
			  <days>".$afro[2]["fullDays"]."</days>
			  <hours>".$afro[2]["fullHours"]."</hours>
			  <minutes>".$afro[2]["fullMinutes"]."</minutes>
			</item>"."\n";
			$xml .="</game>";
			$fname=$_SITE_ROOT_PATH."data/afro.xml";
			$fp=fopen( $fname ,"w+");
			fwrite($fp,$xml);
			fclose($fp);

			header("Location: ".$_DIR['site']['adminurl']."current_afro".$atend."success".$_DELIM."2".$baratend);
			exit();
		}
	}
}
$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";
$month=getOptions($_sql,$_POST['cmbMonth']);
?>