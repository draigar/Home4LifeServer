<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "naira_lotto.naira_id")." ".$_GET["srt"];
    $_sql = "SELECT 
			naira_lotto.naira_id,month_year,
			date_format(from_time,'%d-%b-%Y %h:%i') as from_time,
			date_format(to_time,'%d-%b-%Y %h:%i') as to_time,
			naira_lotto.status,gcm.value2,nl_id,total_amount,count(naira_entry_ticket.nt_id) as entries 
		FROM 
			naira_lotto
		LEFT JOIN naira_entry on naira_entry.naira_id=naira_lotto.naira_id
		LEFT JOIN naira_entry_ticket on naira_entry_ticket.entry_id=naira_entry.entry_id	
		LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2)		
		WHERE 
			naira_lotto.naira_id in (".$idsToDisplay.") 
		GROUP BY 
			naira_lotto.naira_id 
		ORDER BY 
			".$orderByClause;				
?>