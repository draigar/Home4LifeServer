<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "lga_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			lga_id,lga_name,lga.state_id,state_name
		FROM 
			lga
		LEFT JOIN state ON state.state_id=lga.state_id
		WHERE 
			lga_id in (".$idsToDisplay.")
		GROUP BY lga_id	
		ORDER BY 
			".$orderByClause;				
?>