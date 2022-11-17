<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = " where batch_no=".$_GET['id']." ";
		if(trim($_POST['txtTransId'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_id = '".trim($_POST['txtTransId'])."'";
	   }
	   if(trim($_POST['txtSerNo'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " serial_no = '".trim($_POST['txtSerNo'])."'";
	   }
	   if(trim($_POST['cmbStatus'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_status = '".trim($_POST['cmbStatus'])."'";
	   }
	   if(trim($_POST['txtCurr'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_curr_code = '".trim($_POST['txtCurr'])."'";
	   }
	   if(trim($_POST['cmbType'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_type = '".trim($_POST['cmbType'])."'";
	   }
	   if(trim($_POST['cmbAType'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_curr_code = '".trim($_POST['cmbAType'])."'";
	   }
	
	  $_sql = "SELECT sr_no FROM merchant_trans ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "sr_no")." ".$_GET["srt"]; 
?>