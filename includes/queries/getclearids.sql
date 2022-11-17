<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = "";
		if(trim($_POST['txtTransId'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " batch_no = '".trim($_POST['txtTransId'])."'";
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
	    $where .= " clear_amt = '".trim($_POST['txtAmt'])."'";
	   }
	 $_sql = "SELECT batch_no FROM clearing ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"]; 
?>