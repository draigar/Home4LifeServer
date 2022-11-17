<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";

   $_sql = "SELECT bank_id FROM bank_info WHERE user_id=".$_SESSION['login']['userid']." 
	         ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "bank_id")." ".$_GET["srt"]; 
?>