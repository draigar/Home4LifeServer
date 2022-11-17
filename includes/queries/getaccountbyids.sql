<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	
	    $_sql = "SELECT ubank_id,bank_name,address1,acnt_name,acnt_no,cpramary FROM user_bank_info
			WHERE ubank_id in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']."  
			 ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "ubank_id")." ".$_GET["srt"]; 
?>