<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "afro_lotto.afro_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			afro_lotto.afro_id,month_year,
			date_format(from_time,'%d-%b-%Y %h:%m') as from_time,
			date_format(to_time,'%d-%b-%Y %h:%m') as to_time1,
			if(now()<from_time,'Not-Open',(if(now()>to_time,'Closed','Active'))) status,
			gcm.value2,al_id,match7,total_amount,to_time
		FROM 
			afro_lotto
		LEFT JOIN gcm ON gcm.`condition`=substring(month_year,1,2)		
		WHERE 
			afro_lotto.afro_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>