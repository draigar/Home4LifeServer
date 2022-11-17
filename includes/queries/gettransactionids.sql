<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		
	$where = " where n.status='C' and n.user_id='".$_SESSION['login']['userid']."' ";
	
	if(trim($_POST['ff1']) && trim($_POST['ff2'])&& trim($_POST['ff3'])&& trim($_POST['tt1'])&& trim($_POST['tt2'])&& trim($_POST['tt3'])) { 
		$fromdate= trim($_POST['ff3'])."-".trim($_POST['ff2'])."-".trim($_POST['ff1']);
		$todate= trim($_POST['tt3'])."-".trim($_POST['tt2'])."-".trim($_POST['tt1']);

		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(n.trans_date,'%Y-%m-%d')>='".$fromdate."' && date_format(trans_date,'%Y-%m-%d')<= '".$todate."'";
	}
	
	$_sql = "SELECT n.trans_id FROM 

			transaction n 

		LEFT JOIN naira_entry_ticket t ON (t.nt_id=n.nt_id and n.which='N')

		LEFT JOIN afro_entry_ticket a ON (a.nt_id=n.nt_id and n.which='A')
		
		LEFT JOIN trans_fund_to f1 ON f1.trans_id=n.trans_id

		LEFT JOIN users u2 ON (f1.user_id=u2.user_id and n.user_type='U')

		LEFT JOIN merchant mu2 ON (f1.user_id=mu2.user_id and n.user_type='A')

		LEFT JOIN trans_fund_to f2 ON f2.from_trans_id=n.trans_id

		LEFT JOIN users u3 ON (f2.to_user_id=u3.user_id and n.user_type='U')

		LEFT JOIN merchant mu3 ON (f2.to_user_id=mu3.user_id and n.user_type='A')
		
		".$where." GROUP BY n.trans_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.trans_id")." ".$_GET["srt"]; 
?>