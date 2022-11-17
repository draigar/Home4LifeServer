<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "cpoint_id")." ".$_GET["srt"];
$where = "";

if(trim($_POST['cmbState'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " state_id='".trim($_POST['cmbState'])."'";
}

if(trim($_POST['cmbLga'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " lga_id='".trim($_POST['cmbLga'])."'";
}
   
 	   $_sql = "SELECT cpoint_id FROM claimpoint 
			".$where." ORDER BY ".$orderByClause;
			
?>