<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "faq_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			faq_id,title,content,image,date_format(creation_date,'%D %M %Y') as creation_date			
		FROM 
			faq
		WHERE 
			faq_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>