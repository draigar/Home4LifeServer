<?PHP
   $orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"];
echo   $_sql = "SELECT 
			n.nt_id,l.nl_id,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,n.ticket_no,
			date_format(e.date_entered,'%d%m%y') as date_entered2,e.method_id,count(c.ne_id) as entries,e.vision_numbers
		FROM 
			naira_entry_ticket n
			inner join naira_entry e on e.entry_id=n.entry_id 
			inner join naira_lotto l on l.naira_id=e.naira_id
			left join naira_entry_child c on c.nt_id=n.nt_id
			INNER JOIN terminal_agent t on t.term_id=e.term_id  
		WHERE 
			n.nt_id in (".$idsToDisplay.") group by n.nt_id 
		ORDER BY 
			".$orderByClause;				
?>