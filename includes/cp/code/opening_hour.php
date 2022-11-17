<?php

	$_sql = "SELECT * FROM opening_hour";
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();		
		header("Location: ".$_DIR['site']['adminurl']."opening_hour".$atend."?err".$_DELIM."2115");
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
			$j=1;
			if ($rs && !$rs->EOF) { 
				$_POST["hidCount"] = $rs->RecordCount(); 
				while(!$rs->EOF){
					$fromTime= explode(",",$rs->fields["from_time"]);
					$toTime= explode(",",$rs->fields["to_time"]);
					$_POST["cmbHourFrom"][$j-1]  	= $fromTime[0];
					$_POST['cmbMinuteFrom'][$j-1]	= $fromTime[1];
					$_POST["cmbHourTo"][$j-1]   	= $toTime[0];
					$_POST['cmbMinuteTo'][$j-1]		= $toTime[1];
					$rs->MoveNext();
					$j++;
				}
				if ($rs) 
				$rs->close();	
			}
	}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Update"){  
	for($j=1;$j<=7; $j++){ 
		$fromHr		=	($_POST["cmbHourFrom"][$j-1] < 10)?"0".$_POST["cmbHourFrom"][$j-1]:$_POST["cmbHourFrom"][$j-1];
		$fromMin	=	($_POST["cmbMinuteFrom"][$j-1] < 10)?"0".$_POST["cmbMinuteFrom"][$j-1]:$_POST["cmbMinuteFrom"][$j-1];	
		$toHr		=	($_POST["cmbHourTo"][$j-1] < 10)?"0".$_POST["cmbHourTo"][$j-1]:$_POST["cmbHourTo"][$j-1];
		$toMin		=	($_POST["cmbMinuteTo"][$j-1] < 10)?"0".$_POST["cmbMinuteTo"][$j-1]:$_POST["cmbMinuteTo"][$j-1];

		$sql="UPDATE opening_hour 
				SET 
				from_time=	'".$fromHr.",".$fromMin."'	,
				to_time=	'".$toHr.",".$toMin."'
				where day_id=".$j;
			$isAllQueryExecuted= $_CONN->Execute($sql);
	}
	if($isAllQueryExecuted){
		$success = "Opening Hours Updated Successfully.";
	}
} 

?>
