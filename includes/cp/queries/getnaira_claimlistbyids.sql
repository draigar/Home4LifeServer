<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "c.nt_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			c.claimed_id,c.nt_id,t.ticket_no,t.entry_id,l.nl_id,complete,
			date_format(claim_date,'%d-%b-%Y %H:%i') as claim_date
		FROM 
			claimed c
		LEFT JOIN naira_entry_ticket t on t.nt_id=c.nt_id
		LEFT JOIN naira_entry e on e.entry_id=t.entry_id
		LEFT JOIN naira_lotto l on l.naira_id=e.naira_id
		WHERE 
			c.claimed_id in (".$idsToDisplay.") 
		ORDER BY 
			".$orderByClause;				
?>