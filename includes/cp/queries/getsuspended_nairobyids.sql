<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "naira_lotto.naira_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			naira_lotto.naira_id,month_year,
			date_format(from_time,'%d / %m / %y - %h:%m') as from_time,
			date_format(to_time,'%d / %m / %y - %h:%m') as to_time,
			status,gcm.value2,nl_id,total_amount
		FROM 
			naira_lotto
		LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2)		
		WHERE 
			naira_lotto.naira_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>