<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$where = " where status='I' and user_id=0";
	if(trim($_POST['txtFirst'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " fname like '%".trim($_POST['txtFirst'])."%'";
	}
	if(trim($_POST['txtLast'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " lname like '%".trim($_POST['txtLast'])."%'";
	}
	if(trim($_POST['txtEmail'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " email = '".trim($_POST['txtEmail'])."'";
	}
	if(trim($_POST['txtBName'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " business_name like '%".trim($_POST['txtBName'])."%'";
	}	
	if(trim($_POST['cmbInitial'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " fname like '".trim($_POST['cmbInitial'])."%'";
	}
	 $_sql = "SELECT request_id FROM temp_merchant 
	         ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "request_id")." ".$_GET["srt"]; 
?>