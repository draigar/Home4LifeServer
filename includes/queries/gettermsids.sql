<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT terms_id FROM terms WHERE display='Y' and terms_type='M' ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "creation_date")." ".$_GET["srt"]; 
?>