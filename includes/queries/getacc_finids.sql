<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = " where user_id=".$_SESSION['login']['userid']."";
		if(trim($_POST['txtTransId'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_id = '".trim($_POST['txtTransId'])."'";
	   }
	   if(trim($_POST['cmbTrnasType'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_type = '".trim($_POST['cmbTrnasType'])."'";
	   }
	   if(trim($_POST['txtAmt'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " trans_amt = '".trim($_POST['txtAmt'])."'";
	   }
	 $_sql = "SELECT trans_id FROM subscription  
	          ".$where." 
	          ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "trans_id")." ".$_GET["srt"]; 
?>