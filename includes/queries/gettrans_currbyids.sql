<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT merch_trans_curr.*,currency.curr_code,currency.curr_name FROM merch_trans_curr 
	        left join currency on currency.curr_id = merch_trans_curr.curr_id  
	        WHERE trans_curr_id in (".$idsToDisplay.") and merch_trans_curr.user_id=".$_SESSION['login']['userid']." 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "trans_curr_id")." ".$_GET["srt"]; 
?>