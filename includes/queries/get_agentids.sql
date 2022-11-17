<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "merchant.user_id")." ".$_GET["srt"];
$where = "";
if(trim($_POST['cmbState'])){		
	$where .= " and merchant_address.state_id='".trim($_POST['cmbState'])."' ";
}
if(trim($_POST['cmbLga'])){		
	$where .= " and merchant_address.lga_id='".trim($_POST['cmbLga'])."' ";
}
$_sql = "SELECT merchant.user_id FROM merchant,merchant_address where merchant_address.user_id=merchant.user_id ".$where." ORDER BY ".$orderByClause;			
?>