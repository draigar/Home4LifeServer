<?PHP

$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "cpoint_id")." ".$_GET["srt"];

 	$_sql = "SELECT 
			cpoint_id,agent_name,address,city,state_name,lga_name
		FROM 
			claimpoint
		LEFT JOIN state ON state.state_id=claimpoint.state_id
		LEFT JOIN lga ON lga.lga_id=claimpoint.lga_id
		WHERE 
			cpoint_id in (".$idsToDisplay.")
		GROUP BY cpoint_id	
		ORDER BY 
			".$orderByClause;				
?>