<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT news_id FROM news WHERE display='Y' and news_type='M' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "creation_date")." ".$_GET["srt"]; 
?>