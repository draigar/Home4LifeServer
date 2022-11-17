<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";

   $_sql = "SELECT ubank_id FROM user_bank_info WHERE user_id=".$_SESSION['login']['userid']." 
	         ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "ubank_id")." ".$_GET["srt"]; 
?>