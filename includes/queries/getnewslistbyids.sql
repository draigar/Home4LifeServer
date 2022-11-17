<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "news_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			news_id,title,content,image,date_format(creation_date,'%D %M %Y') as creation_date			
		FROM 
			news
		WHERE 
			news_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>