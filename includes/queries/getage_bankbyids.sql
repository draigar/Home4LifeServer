<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	
	    $_sql = "SELECT * FROM bank_info 
			WHERE bank_id in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']." 
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "bank_id")." ".$_GET["srt"]; 
?>