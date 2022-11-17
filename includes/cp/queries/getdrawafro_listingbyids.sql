<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "afro_lotto.afro_id")." ".$_GET["srt"];
    $_sql = "SELECT 
			afro_lotto.afro_id,month_year,
			date_format(from_time,'%d-%b-%Y %h:%i') as from_time,
			date_format(to_time,'%d-%b-%Y %h:%i') as to_time,
			afro_lotto.status,gcm.value2,al_id,match7,count(afro_entry_ticket.nt_id) as entries 
		FROM 
			afro_lotto
		LEFT JOIN afro_entry on afro_entry.afro_id=afro_lotto.afro_id
		LEFT JOIN afro_entry_ticket on afro_entry_ticket.entry_id=afro_entry.entry_id	
		LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2)		
		WHERE 
			afro_lotto.afro_id in (".$idsToDisplay.") 
		GROUP BY 
			afro_lotto.afro_id 
		ORDER BY 
			".$orderByClause;				
?>