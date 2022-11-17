<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	$_sql = "SELECT terms_id FROM terms ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "terms_id")." ".$_GET["srt"]; 
?>