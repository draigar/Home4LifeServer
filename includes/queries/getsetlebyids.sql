<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT * FROM settlement    
	        WHERE settle_id in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']." and status='U' 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"]; 
?>