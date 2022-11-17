<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$_sql = "SELECT afro_id FROM afro_lotto where status='C' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "afro_id")." ".$_GET["srt"]; 
?>