<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$_sql = "SELECT faq_id 
			FROM faq 
			where display='Y' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "faq_id")." ".$_GET["srt"]; 
?>