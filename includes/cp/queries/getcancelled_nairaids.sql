<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$_sql = "SELECT naira_id FROM naira_lotto where status='C' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "naira_id")." ".$_GET["srt"]; 
?>