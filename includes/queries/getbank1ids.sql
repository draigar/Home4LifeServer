<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT bank_info.bank_id FROM bank_info 
	              left join merchant on merchant.user_id = bank_info.user_id  
			      left join gcm on gcm.condition = bank_info.account_type 
				  where condition_type='ACC_TYPE' and bank_info.user_id=".$_SESSION['login']['userid']." and bank_info.status='A' 
				  ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "bank_info.bank_id")." ".$_GET["srt"]; 
?>