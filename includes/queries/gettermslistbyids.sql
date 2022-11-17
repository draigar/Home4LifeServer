<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "terms_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			terms_id,title,content,image,date_format(creation_date,'%D %M %Y') as creation_date			
		FROM 
			terms
		WHERE 
			terms_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>