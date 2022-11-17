<?PHP
	if(empty($_GET["srt"])) $_GET["srt"]=" desc ";
		
	$where = " where n.status='C' and n.action='D' ";
	
	if(trim($_POST['cmbUserAgent']) && trim($_POST['txtUserId'])){ 
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " n.user_type ='".$_POST['cmbUserAgent']."' AND n.user_id ='".$_POST['txtUserId']."'";
	}
	if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){ 
		$dateAray= explode("-",trim($_POST['txtFromDate']));
		$date= $dateAray[2]."-".$dateAray[0]."-".$dateAray[1];
		$dateAray2= explode("-",trim($_POST['txtToDate']));
		$todate= $dateAray2[2]."-".$dateAray2[0]."-".$dateAray2[1];
	    $where .= " and ( date_format(n.trans_date,'%Y-%m-%d') between '".$date."' and '".$todate."' )";
	}	
	
	$_sql = "SELECT n.trans_id FROM transaction n 
		LEFT JOIN naira_entry_ticket t ON (t.nt_id=n.nt_id and n.which='N')
		LEFT JOIN afro_entry_ticket a ON (a.nt_id=n.nt_id and n.which='A')
		LEFT JOIN users u ON (u.user_id=n.user_id and n.user_type='U')
		LEFT JOIN merchant m ON (m.user_id=n.user_id and n.user_type='A')
		LEFT JOIN trans_fund_to f1 ON f1.trans_id=n.trans_id
		LEFT JOIN users u2 ON f1.user_id=u2.user_id
		LEFT JOIN trans_fund_to f2 ON f2.from_trans_id=n.trans_id
		LEFT JOIN users u3 ON f2.to_user_id=u3.user_id
		".$where." group by n.trans_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.trans_id")." ".$_GET["srt"]; 
?>