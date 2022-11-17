<?PHP

	if(empty($_GET["srt"]))

		$_GET["srt"]=" desc ";

		

	$where = " where n.cancel='N' and l.status in ('D','S','R') ";

	

	if(trim($_POST['txtAlid'])){

		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " l.nl_id = '".trim($_POST['txtAlid'])."'";

	}

	

	if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])) { 

		$dateAray= explode("-",trim($_POST['txtFromDate']));

		$fromdate= $dateAray[2]."-".$dateAray[0]."-".$dateAray[1];

		$todateAray= explode("-",trim($_POST['txtToDate']));

		$todate= $todateAray[2]."-".$todateAray[0]."-".$todateAray[1];



		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " '".$fromdate."' >= date_format(date_entered,'%Y-%m-%d')&& date_format(date_entered,'%Y-%m-%d')<= '".$todate."'";

	}

	if(trim($_POST['txtTicketNo'])){



		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " ticket_no = '".trim($_POST['txtTicketNo'])."'";

	}

	if(trim($_POST['cmbMethod'])){

		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " method_id = '".trim($_POST['cmbMethod'])."'";

	}

	

	$_sql = "select n.nt_id,count(c.ne_id) as entries from naira_entry_ticket n inner join naira_entry e on e.entry_id=n.entry_id 

	inner join naira_lotto l on l.naira_id=e.naira_id left join naira_entry_child c on c.nt_id=n.nt_id 

	".$where." group by n.nt_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"]; 

?>