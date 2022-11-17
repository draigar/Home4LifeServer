<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT * FROM clearing   
	        WHERE batch_no in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']." 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"]; 
?>