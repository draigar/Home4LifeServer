<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$_sql = "SELECT news_id 
			FROM news 
			where display='Y' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "news_id")." ".$_GET["srt"]; 
?>