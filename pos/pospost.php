<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection

//Agent Terminal ID | Type of Lottery| Draw | No of Weeks |Entries |Vision Number of Afro Raffle
$_POST['lotto_str'] = "12|NL|SAT|1|1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6#1,2,3,4,5,6|123456|";

$strAry = explode("|",$_POST['lotto_str']);
$terminalid		= $strAry[0];
$lottoType		= $strAry[1];
$draw			= $strAry[2];
$weeks			= $strAry[3];
$loNumbersAry	= $strAry[4];
$visionnumber	= $strAry[5];		
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