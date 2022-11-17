<?PHP
  $_sql = "SELECT 
			state_id as stateid, state_name,state_code, 			
			date_format(create_date,'%d-%m-%Y') as createdate, 
			date_format(last_update,'%d-%m-%Y') as lastupdate 
		FROM 
			state 
		WHERE
			state_id in(".$idsToDisplay.")
		ORDER BY 
			".($_GET["oby"]!="" ? $_GET["oby"] : "stateid")." ".$_GET["srt"];
?>