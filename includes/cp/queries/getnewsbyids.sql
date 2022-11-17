<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	$_sql = "SELECT news_id,title,date_format(creation_date,'%d-%m-%Y')as creation_date,date_format(last_update,'%d-%m-%Y')as last_update FROM news 
			WHERE news_id in (".$idsToDisplay.") 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "news_id")." ".$_GET["srt"]; 
?>