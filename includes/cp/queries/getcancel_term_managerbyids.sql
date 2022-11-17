<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	 $_sql = "SELECT terminal_agent.term_id,terminal_agent.status,merchant.*,concat(fname,' ',lname) as name,cordinate_serial.serial_no,
	 		cordinate_serial.user_id as c_user_id ,date_format(terminal_agent.create_date,'%d-%b-%Y')as acc_create_date
	        FROM merchant 
			left join terminal_agent on terminal_agent.agent_id = merchant.user_id
	        left join cordinate_serial on cordinate_serial.user_id = merchant.user_id  
			WHERE merchant.user_id in (".$idsToDisplay.") and (merchant.status='A' or merchant.status='S')
			ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "merchant.user_id")." ".$_GET["srt"]; 
?>