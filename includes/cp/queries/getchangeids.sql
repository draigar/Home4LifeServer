<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = " where temp_merchant.status='I' and temp_merchant.user_id!=0";
	if(trim($_POST['txtFirst'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.fname like '%".trim($_POST['txtFirst'])."%'";
	}
	if(trim($_POST['txtLast'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.lname like '%".trim($_POST['txtLast'])."%'";
	}
	if(trim($_POST['txtEmail'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.email = '".trim($_POST['txtEmail'])."'";
	}
	if(trim($_POST['txtBName'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.business_name like '%".trim($_POST['txtBName'])."%'";
	}
	if(trim($_POST['txtMerID'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.merchant_id = '".trim($_POST['txtMerID'])."'";
	}
		
	 $_sql = "SELECT temp_merchant.request_id FROM temp_merchant 
	             left join merchant on merchant.user_id = temp_merchant.user_id 
	         ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "temp_merchant.request_id")." ".$_GET["srt"]; 
?>