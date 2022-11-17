<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT merchant.*,concat(fname,' ',lname) as name,cordinate_serial.serial_no,cordinate_serial.status as cord_status,cordinate_serial.user_id as c_user_id 
	        FROM merchant 
	        left join cordinate_serial on cordinate_serial.user_id = merchant.user_id  
			WHERE merchant.user_id in (".$idsToDisplay.") and (merchant.status='A' or merchant.status='S')
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "merchant.user_id")." ".$_GET["srt"]; 
?>