<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

	if ($_POST["txtName"]=="") { 

		$_MSG[] = "Please enter of State.<br/>";

		$error = 1;



	}

	include_once($_DIR['admininc']['queries']."addstateexist.sql");

	$rs = $_CONN->Execute($_sql);

	if ($rs && $rs->RecordCount()>0) { 

		$_MSG[] = "Please choose another state name.<br/>";

		$error = 1;

	} 

	if ($rs)

		$rs->close();

	

	if (empty($error)) { 

		include_once($_DIR['admininc']['queries']."insertstate.sql");

		$isAllQueryExecuted = $_CONN->Execute($_sql);

		    header("Location: ".$_DIR['site']['adminurl']."state".$atend."suc".$_DELIM."1".$baratend);

		    exit();

	} 

} 

?>