<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "naira_entry_ticket.nt_id")." ".$_GET["srt"];
	   $_sql = "SELECT 
			naira_entry_ticket.nt_id,naira_entry_ticket.ticket_no,naira_entry.naira_id,
			date_format(naira_lotto.to_time,'%a, %d %b %Y') as draw_date
		FROM 
			naira_entry_ticket
		LEFT JOIN naira_entry ON naira_entry.entry_id=naira_entry_ticket.entry_id
		LEFT JOIN naira_lotto ON naira_lotto.naira_id=naira_entry.naira_id		
		WHERE 
			naira_entry_ticket.nt_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>