<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT terms_id,title,content,date_format(creation_date,'%D %M %Y %r') as creation_date FROM terms  
	         WHERE terms_id in (".$idsToDisplay.") and display='Y' and terms_type='M'  
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "creation_date")." ".$_GET["srt"]; 
?>