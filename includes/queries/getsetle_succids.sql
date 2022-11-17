<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = "";
		if(trim($_POST['txtTransId'])){
		if(!$where)
			$where .= " where user_id=".$_SESSION['login']['userid']." and status='S'";
		else 
			$where .= " and ";	
	    $where .= " settle_id = ".trim($_POST['txtTransId'])."";
	   }
	   if(trim($_POST['cmbAType'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " curr_code = '".trim($_POST['cmbAType'])."'";
	   }
	   if(trim($_POST['txtAmt'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " settle_amt = '".trim($_POST['txtAmt'])."'";
	   }
	   if(trim($_POST['cmbStatus'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " status = '".trim($_POST['cmbStatus'])."'";
	   }
	   
	 $_sql = "SELECT settle_id FROM settlement ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"]; 
?>