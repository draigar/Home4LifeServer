<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" asc ";
	 $_sql = "SELECT temp_merchant.*,concat(merchant.fname,' ',merchant.lname) as name,merchant.business_name,merchant.merchant_id,merchant.email   
	        FROM temp_merchant 
	        left join merchant on merchant.user_id = temp_merchant.user_id   
			WHERE temp_merchant.request_id in (".$idsToDisplay.") and temp_merchant.status='I' and temp_merchant.user_id!=0 
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "temp_merchant.request_id")." ".$_GET["srt"]; 
?>