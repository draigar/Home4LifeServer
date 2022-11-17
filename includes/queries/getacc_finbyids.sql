<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT *,date_format(trans_date,'%d / %m / %Y') as trans_date FROM subscription  
	         WHERE trans_id in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']." 
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "trans_id")." ".$_GET["srt"]; 
?>