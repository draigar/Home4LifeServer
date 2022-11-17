<?PHP

   $orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "afro_lotto.afro_id")." ".$_GET["srt"];

   $_sql = "SELECT 

			afro_lotto.afro_id,month_year,

			date_format(from_time,'%d-%b-%Y %H:%i') as from_time,

			date_format(to_time,'%d-%b-%Y %H:%i') as to_time1,

			if(now()<from_time,'Not-Open',(if(now()>to_time,'Closed','Active'))) as status,

			gcm.value2,al_id,match7,total_amount,to_time,count(afro_entry_ticket.nt_id) as entries

		FROM 

			afro_lotto

			LEFT JOIN afro_entry on afro_entry.afro_id=afro_lotto.afro_id

			LEFT JOIN afro_entry_ticket on (afro_entry_ticket.entry_id=afro_entry.entry_id and afro_entry_ticket.cancel='N')

			LEFT JOIN gcm ON gcm.`condition`=substring(month_year,1,2)		

		WHERE 

			afro_lotto.afro_id in (".$idsToDisplay.")

		GROUP BY 

			afro_lotto.afro_id	

		ORDER BY 

			".$orderByClause;				

?>