<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$_sql = "SELECT terms_id 
			FROM terms 
			where display='Y' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "terms_id")." ".$_GET["srt"]; 
?>