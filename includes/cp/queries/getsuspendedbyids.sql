<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "afro_lotto.afro_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			afro_lotto.afro_id,month_year,
			date_format(from_time,'%d / %m / %y - %h:%m') as from_time,
			date_format(to_time,'%d / %m / %y - %h:%m') as to_time,
			status,gcm.value2,al_id,total_amount
		FROM 
			afro_lotto
		LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2)		
		WHERE 
			afro_lotto.afro_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>