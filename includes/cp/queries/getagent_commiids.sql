<?PHP
	if(empty($_GET["srt"])) $_GET["srt"]=" desc ";

	$where = " ";
	
	if(trim($_POST['cmbLotto'])){
		$where .= " and which = '".trim($_POST['cmbLotto'])."'";
	}
	if(trim($_POST['txtTicketNo'])){
		$where .= " and (
				(n.which='N' and t.ticket_no = '".trim($_POST['txtTicketNo'])."')
				OR 
				(n.which='A' and a.ticket_no = '".trim($_POST['txtTicketNo'])."')
			)";
	}
	$_sql = "SELECT comm_id FROM commission c 

		".$where."  ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "c.comm_id")." ".$_GET["srt"]; 
?>