<?php

include_once("../includes/config/application.php"); //include config 

dbConnection('on'); //open database connection



//Agent Terminal ID | Type of Lottery| Draw | No of Weeks |Entries |Vision Number or Afro Raffle

$request_result='<?xml version="1.0" encoding="ISO-8859-1"?>';

$request_result.="<posting><Terminal_ID>12</Terminal_ID>

<TYPE>NL</TYPE>

<Draw>SAT</Draw>

<Num_Weeks>1</Num_Weeks>

<Entries>1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6</Entries>

<VNAR>344343</VNAR></posting>";



$request_result=trim($request_result);

$p = xml_parser_create();

xml_parse_into_struct($p, $request_result, $vals, $index);

xml_parser_free($p);



$strAry = explode("|",$_POST['lotto_str']);

$terminalid		= trim($vals[1]["value"]);

$lottoType		= trim($vals[3]["value"]);

$draw			= trim($vals[5]["value"]);

$weeks			= trim($vals[7]["value"]);

$loNumbersAry	= trim($vals[9]["value"]);

$visionnumber	= trim($vals[11]["value"]);		

$lotto_NumAry	= explode("#",$loNumbersAry);



if($lottoType =="NL") $tableVR = "naira";

elseif($lottoType =="AM") $tableVR = "afro";



$sql="select ".$tableVR."_id from ".$tableVR."_lotto where ( now() between from_time and to_time )";

$rs= $_CONN->Execute($sql);

if($rs && !$rs->EOF){

	$lotto_id=$rs->fields[$tableVR."_id"];

	$visionprice=$rs->fields["vision_price"];

}

if($rs) $rs->close();



//Get per line price

$sql="select `condition`,value from gcm where condition_type='PER_LINE' and `condition` in (1,2)";

$rs=$_CONN->Execute($sql);

if($rs && !$rs->EOF)

  $price=$rs->fields["value"];

if($rs) $rs->close();



$sql="insert into ".$tableVR."_entry values(NULL,".$lotto_id.",now(),'I','A',0,'".$visionnumber."','".$visionprice."','".$draw."','".$weeks."','".$terminalid."')";

if($_CONN->Execute($sql)) { 

	$intID=$_CONN->Insert_ID();

	$ticket_no=get_ticket_number($tableVR); //Get Ticket Number

	$sql="insert into ".$tableVR."_entry_ticket values(NULL,".$ticket_no.",".$intID.",'".$price."','N')";

	if($_CONN->Execute($sql)) {

		$intID1=$_CONN->Insert_ID();

		for($i=0;$i<count($lotto_NumAry);$i++){

			$sql="insert into ".$tableVR."_entry_child values(NULL,".$intID1.",'".$lotto_NumAry[$i]."','N')";

			$_CONN->Execute($sql);

		}

	}

}

?>