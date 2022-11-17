<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection 

if($_SERVER['REQUEST_METHOD']=="POST") { 
	
	$ticketno = trim($_POST["ticketnumber"]);
	$actionco = trim($_POST["action"]);
	
	if(!$ticketno && !$actionco) $_ERROR_CODE=1; $_ERROR_TEXT="Invalid data input.";
	
	if(!$actionco || $actionco!="CANCEL") { $_ERROR_CODE=2; $_ERROR_TEXT="Invalid Action Code."; } 
	if(!$ticketno) { $_ERROR_CODE=3; $_ERROR_TEXT="Empty Ticket Number."; } 
	
	if(!$_ERROR_CODE) {
		$q="select nt_id from naira_entry_ticket where ticket_no='".$ticketno."'";
		$rs=$_CONN->Execute($q);
		if($rs->RecordCount()>0) { 
			$sql="update naira_entry_ticket set cancel='Y' where ticket_no='".$ticketno."'";
			$_CONN->Execute($sql);
			echo "<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>NAIRA LOTTO</GAMETYPE>\n\t<ENTRYID>".stripslashes($rs->fields["nt_id"])."</ENTRYID>\n</RESPONSE>\n</XML>";
		} 
		else {
			$q="select nt_id from afro_entry_ticket where ticket_no='".$ticketno."'";
			$rs=$_CONN->Execute($q);
			if($rs->RecordCount()>0) { 
				$sql="update afro_entry_ticket set cancel='Y' where ticket_no='".$ticketno."'";
				$_CONN->Execute($sql);
				echo "<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>NAIRA LOTTO</GAMETYPE>\n\t<ENTRYID>".stripslashes($rs->fields["nt_id"])."</ENTRYID>\n</RESPONSE>\n</XML>";
			}
			else { $_ERROR_CODE=5; $_ERROR_TEXT="Invalid Ticket Number."; } 
		}
		if($rs) $rs->close();
	}
	if($_ERROR_CODE) { 
		echo "<XML>\n<RESPONSE>\n\t<RESULT>NOTOK</RESULT>\n\t<ERROR>\n\t\t<ERRORCODE>".$_ERROR_CODE."</ERRORCODE>\n\t\t<ERRORTEXT>".$_ERROR_TEXT."</ERRORTEXT>\n\t</ERROR>\n</RESPONSE>\n</XML>";
	}
}
?>