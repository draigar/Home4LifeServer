<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT news_id,title,content,date_format(creation_date,'%D %M %Y %r') as creation_date FROM news  
	         WHERE news_id in (".$idsToDisplay.") and display='Y' and news_type='M'  
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "creation_date")." ".$_GET["srt"]; 
?>