<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	$_sql = "SELECT news_id FROM news ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "news_id")." ".$_GET["srt"]; 
?>