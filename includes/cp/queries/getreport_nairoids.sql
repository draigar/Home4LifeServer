<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = "";
	if(trim($_POST['txtAlid'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " nl_id = '".trim($_POST['txtAlid'])."'";
	}
	if(trim($_POST['cmbCriteria'] == "ND")){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " naira_lotto.status='D'";
	}
	if(trim($_POST['cmbCriteria'] == "NR")){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " ";
	}
	if(trim($_POST['cmbCriteria'] == "DN")){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " now() < from_time ";
	}
	if(trim($_POST['cmbCriteria'] == "UD")){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " ";
	}
	if(trim($_POST['cmbCriteria'] == "CD")){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " now() > to_time ";
	}





	if(trim($_POST['txtFromDate'])){
		$dateAray= explode("-",trim($_POST['txtFromDate']));
		$date= $dateAray[2]."-".$dateAray[0]."-".$dateAray[1];
	
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(from_time,'%Y-%m-%d')= '".$date."'";
	}
	if(trim($_POST['txtToDate'])){
		$dateAray2= explode("-",trim($_POST['txtToDate']));
		$todate= $dateAray2[2]."-".$dateAray2[0]."-".$dateAray2[1];

		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(to_time,'%Y-%m-%d') = '".$todate."'";
	}
	
	  $_sql = "SELECT naira_lotto.naira_id FROM naira_lotto	   			 
			 ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "naira_id")." ".$_GET["srt"]; 
?>