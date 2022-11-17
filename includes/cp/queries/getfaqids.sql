<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	$_sql = "SELECT faq_id FROM faq ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "faq_id")." ".$_GET["srt"]; 
?>