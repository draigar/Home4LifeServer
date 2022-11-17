<?php
if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

if (empty($_GET['id'])) { //If Id Not Found or Empty then
	if ($_CONN) //Close the database connection
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."country".$atend."err".$_DELIM."32".$baratend);
}
else { 
     //Include Get User Query file
     $_sql="SELECT * FROM country WHERE country_id=".$_GET['id'];
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { //user Not Exist
		if ($rs) //Close the recordset
			$rs->close();
		if ($_CONN) //Close the database connection
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."country".$atend."err".$_DELIM."32".$baratend);
    }//if (!$rs || $rs->EOF)	
  elseif($_SERVER['REQUEST_METHOD'] != "POST") {
		$_POST["txtName"]     		= $rs->fields['name'];
		$_POST["txtChar"]     		= $rs->fields['iso_code'];
		$_POST["cmbCurr"]     		= $rs->fields['curr_id'];
 
	if ($rs) //Close the recordset
		$rs->close();
	}	
}

//If Page Is Submitted
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//Check for valid data & compulsary fields inserted if not show error.
	//Start 	
	if (trim($_POST["txtName"])=="") { //Country Name is empty
		$_MSG[] = "Please enter Country name.<br/>";
		$error = 1;
	} //if (trim($_GET["txtName"])=="")
	if (trim($_POST["txtChar"])=="") { 
		$_MSG[] = "Please enter Country ISO Code.<br/>";
		$error = 1;
	}
	if (trim($_POST["cmbCurr"])=="") { 
		$_MSG[] = "Please select currency.<br/>";
		$error = 1;
	}

	//Include Get Country Query file
	
	include_once($_DIR['admininc']['queries']."editcountryexist.sql");
	//Execute Query
	$rs = $_CONN->Execute($_sql);
	
	if ($rs && $rs->RecordCount()>0) { //Country Exist
		$_MSG[30] = "The country name already exist in database.<br/>";
		$error = 1;
} //if ($rs && $rs->RecordCount()>0)		
	//END
	
	if ($rs) //Close the recordset
		$rs->close();
	
	if (!@$error) { //no error then
		
		//Insert Record into country table				
		//Include Country Query file
		include_once($_DIR['admininc']['queries']."updatecountry.sql");
		//Execute Query
		$isAllQueryExecuted = $_CONN->Execute($_sql);
		
		
		//Create Successfull Message String
		if($isAllQueryExecuted)
			header("Location: ".$_DIR['site']['adminurl']."country".$atend."suc".$_DELIM."2".$baratend);
		    exit();
		
	} //if (empty($error))
} //if($_SERVER['REQUEST_METHOD'] == "POST")
$_sql = "SELECT curr_id, concat(curr_code,'-',curr_name) as szcurr_name FROM currency ORDER BY curr_id";
	$currency = getOptions($_sql, @$_POST["cmbCurr"]);
?>