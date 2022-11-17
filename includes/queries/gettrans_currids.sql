<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT trans_curr_id FROM merch_trans_curr 
	          left join currency on currency.curr_id = merch_trans_curr.curr_id 
			  ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "trans_curr_id")." ".$_GET["srt"]; 
?>