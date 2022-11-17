<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT faq_id,title,content,date_format(creation_date,'%D %M %Y %r') as creation_date FROM faq  
	         WHERE faq_id in (".$idsToDisplay.") and display='Y' and faq_type='M'  
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "creation_date")." ".$_GET["srt"]; 
?>