<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "sub_id")." ".$_GET["srt"];
	  $_sql = "SELECT 
			*,date_format(create_date,'%d/%m/%Y') as create_date    
		FROM 
			eb_subscriber   
		WHERE 
			sub_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>