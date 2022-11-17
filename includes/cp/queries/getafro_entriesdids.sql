<?PHP

	if(empty($_GET["srt"]))

		$_GET["srt"]=" desc ";

		

	$where = " where n.cancel='N' and l.status='A' ";

	

	if(trim($_POST['txtAlid'])){

		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " l.al_id = '".trim($_POST['txtAlid'])."'";

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

	if(trim($_POST['txtTerminalId'])){

		if(!$where)

			$where .= " where ";

		else 

			$where .= " and ";	

	    $where .= " e.term_id = '".trim($_POST['txtTerminalId'])."'";

	}

	

	$_sql = "select n.nt_id,count(c.ne_id) from afro_entry_ticket n inner join afro_entry e on e.entry_id=n.entry_id 

	inner join afro_lotto l on l.afro_id=e.afro_id left join afro_entry_child c on c.nt_id=n.nt_id 

	".$where." group by n.nt_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"]; 

?>