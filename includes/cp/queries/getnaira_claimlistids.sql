<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		
	$where = " where which='N'";
/*	
	if(trim($_POST['ff1']) && trim($_POST['ff2'])&& trim($_POST['ff3'])&& trim($_POST['tt1'])&& trim($_POST['tt2'])&& trim($_POST['tt3'])) { 
		$fromdate= trim($_POST['ff3'])."-".trim($_POST['ff2'])."-".trim($_POST['ff1']);
		$todate= trim($_POST['tt3'])."-".trim($_POST['tt2'])."-".trim($_POST['tt1']);

		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(trans_date,'%Y-%m-%d')>='".$fromdate."' && date_format(trans_date,'%Y-%m-%d')<= '".$todate."'";
	}
*/	
	$_sql = "SELECT claimed_id FROM claimed
		".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "claimed_id")." ".$_GET["srt"]; 
?>