<?PHP
  $_sql = "SELECT 
			state_id as stateid, state_name,
			create_date as createdate, 
			last_update as lastupdate
		FROM 
			state 
		ORDER BY 
			".($_GET["oby"]!="" ? $_GET["oby"] : "stateid")." ".$_GET["srt"]; 
?>