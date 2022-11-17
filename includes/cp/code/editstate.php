<?php

if(empty($_GET['id'])) { 

	if ($_CONN) 

		  $_CONN->close();

	header("Location: ".$_DIR['site']['adminurl']."state.php?err".$_DELIM."38");

} else { 

	include_once($_DIR['admininc']['queries']."getstatedata.sql");

	$rs = $_CONN->Execute($_sql);

	if (!$rs || $rs->EOF) { 

		if ($rs) 

			$rs->close();

		if ($_CONN) 

		  $_CONN->close();

	header("Location: ".$_DIR['site']['adminurl']."state.php?err".$_DELIM."38");

  } 

}



if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"]=="Update State"){

	if ($_POST["txtName"]=="") { 

		$_MSG[] = "Please enter State.<br/>";

		$error = 1;



	}

	include_once($_DIR['admininc']['queries']."editstateexist.sql");

	$rs = $_CONN->Execute($_sql);	

	if ($rs && $rs->RecordCount()>0) { 

		$_MSG[] = "he state already exist.";

		$error = 1;

	}

	if ($rs)

		$rs->close();

	

	if (!@$error) { 

		include_once($_DIR['admininc']['queries']."updatestate.sql");

		$isAllQueryExecuted = $_CONN->Execute($_sql);

		    header("Location: ".$_DIR['site']['adminurl']."state".$atend."suc".$_DELIM."2".$baratend);

		    exit();

	} 

}else{

	include_once($_DIR['admininc']['queries']."getstatedata.sql");

	$rs = $_CONN->Execute($_sql);

	if ($rs && $rs->RecordCount()>0){

		$_POST["txtName"]    = $rs->fields['state_name'];

		$_POST["cmbCountry"] = $rs->fields['country_id'];

		$_POST["txtScode"] = $rs->fields['state_code'];		

	} 

    if ($rs) 

		$rs->close();

		

}

?>