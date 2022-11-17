<?PHP

$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "merchant.user_id")." ".$_GET["srt"];

 	$_sql = "SELECT 
			merchant.user_id,concat(fname,' ',lname) as fullname,concat(address1,' ',address2) as fulladdress,city,state_name,lga_name
		FROM 
			merchant
		LEFT JOIN merchant_address ON merchant_address.user_id=merchant.user_id
		LEFT JOIN state ON state.state_id=merchant_address.state_id
		LEFT JOIN lga ON lga.lga_id=merchant_address.lga_id

		WHERE 
			merchant.user_id in (".$idsToDisplay.")
		GROUP BY merchant.user_id	
		ORDER BY 
			".$orderByClause;
			
			
?>