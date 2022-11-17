<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT *,date_format(trans_date,'%d/%m/%Y') as trans_date FROM merchant_trans  
	        WHERE sr_no in (".$idsToDisplay.") and user_id=".$_SESSION['login']['userid']." and batch_no=".$_GET['id']." 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "sr_no")." ".$_GET["srt"]; 
?>