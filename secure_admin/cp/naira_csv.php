<?php
include_once("../../includes/config/application.php");
dbConnection('on');

if($_APP_LIVE=="Y") { 
	$_GET["id"]=finding_id_from_url("id",$_DELIM);
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
}

if(!empty($_GET['id']) && $_GET['act']=="exp") {

$_FISTRNAME="First Name";
$_LASTNAME="Last Name";
$_ENTRY_DATE="Entry Date";
$_TICKET_NO="Ticket Number";
$_AMOUNT_PAID="Amount Paid";
$_WINNING_AMT="Winning Amount";
$_CLAIM_DATE="Claim Date";
$_PAY_METHOD="Payment Method";

        $sql="select fname,lname,date_entered,ticket_no,total_amount
			FROM naira_lotto l
			LEFT JOIN naira_entry e ON e.naira_id = l.naira_id
			LEFT JOIN naira_entry_ticket t ON t.entry_id = e.entry_id
			LEFT JOIN users u ON u.user_id = e.user_id
			WHERE l.naira_id=".$_GET['id']."";
		$rsSearchResults = mysql_query($sql) or die(mysql_error());
		$out = '';

				$out .= $_FISTRNAME.",";
				$out .= $_LASTNAME.",";
				$out .= $_ENTRY_DATE.",";
				$out .= $_TICKET_NO;				
				$out .= $_AMOUNT_PAID.",";
				$out .= $_WINNING_AMT.",";
				$out .= $_CLAIM_DATE.",";
				$out .= $_PAY_METHOD;				
				
				$out .="\n";		// Add all values in the table
				while ($l = mysql_fetch_array($rsSearchResults)) {
				$strTemp="";
				for ($i = 0; $i <8; $i++) {
					if($i!=7)
						$strTemp .=$l["$i"].",";
					else
						$strTemp .=$l["$i"];
				 }
				 //$out .= substr(trim($strTemp),0,strlen(trim($strTemp))-1);
				 $out .=$strTemp;
				 $out .="\n";
				 }	// Output to browser with appropriate mime type, you choose ;)
				 header("Content-type: text/x-csv");	//header("Content-type: text/csv");
				 header("Content-Disposition: attachment; filename=naira_report.csv");
				 echo $out;	
				 exit();
}				 
?>


				 

