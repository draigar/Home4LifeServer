<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		$where = " where merchant.status in ('A','S') and terminal_agent.status='C'";
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
	if(trim($_POST['cmbPosition'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.status = '".trim($_POST['cmbPosition'])."'";
	}
	if(trim($_POST['txtMerID'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " merchant.merchant_id = '".trim($_POST['txtMerID'])."'";
	}
	if(trim($_POST['cmbInitial'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " fname like '".trim($_POST['cmbInitial'])."%'";
	}
		
	  $_sql = "SELECT terminal_agent.agent_id FROM terminal_agent
	   			 left join merchant on terminal_agent.agent_id = merchant.user_id 	
	             left join cordinate_serial on cordinate_serial.user_id = merchant.user_id  
				 ".$where." group by merchant.user_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "agent_id")." ".$_GET["srt"]; 
?>