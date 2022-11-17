<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "afro_entry_ticket.nt_id")." ".$_GET["srt"];
	   $_sql = "SELECT 
			afro_entry_ticket.nt_id,afro_entry_ticket.ticket_no,afro_entry.afro_id,
			date_format(afro_lotto.to_time,'%a, %d %b %Y') as draw_date
		FROM 
			afro_entry_ticket
		LEFT JOIN afro_entry ON afro_entry.entry_id=afro_entry_ticket.entry_id
		LEFT JOIN afro_lotto ON afro_lotto.afro_id=afro_entry.afro_id		
		WHERE 
			afro_entry_ticket.nt_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>