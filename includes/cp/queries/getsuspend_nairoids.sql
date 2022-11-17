<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = " where naira_lotto.status='A'";
	if(trim($_POST['txtAlid'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " nl_id = '".trim($_POST['txtAlid'])."'";
	}
	if(trim($_POST['cmbMonth'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " substring(month_year,1,2) = '".trim($_POST['cmbMonth'])."'";
	}
	if(trim($_POST['cmbYear'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " substring(month_year,4,4) = '".trim($_POST['cmbYear'])."'";
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
			 ".$where." group by naira_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "naira_id")." ".$_GET["srt"]; 
?>