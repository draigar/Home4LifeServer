<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT *,concat(fname,' ',lname) as name FROM temp_merchant   
			WHERE request_id in (".$idsToDisplay.") and status='I' and user_id=0 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "request_id")." ".$_GET["srt"]; 
?>