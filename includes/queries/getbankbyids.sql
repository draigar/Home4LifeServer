<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT bank_info.*,concat(merchant.fname,' ',merchant.lname) as name,gcm.value FROM bank_info 
	        left join merchant on merchant.user_id = bank_info.user_id  
			left join gcm on gcm.condition = bank_info.account_type 
	        WHERE bank_info.bank_id in (".$idsToDisplay.") and condition_type='ACC_TYPE' and bank_info.user_id=".$_SESSION['login']['userid']." and bank_info.status='A' 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "bank_info.bank_id")." ".$_GET["srt"]; 
?>