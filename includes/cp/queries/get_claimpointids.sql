<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "cpoint_id")." ".$_GET["srt"];
$where = "";

if(trim($_POST['txtUserName'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (login_info.username='".trim($_POST['txtUserName'])."')";
}
   
 	   $_sql = "SELECT cpoint_id FROM claimpoint 
			".$where." ORDER BY ".$orderByClause;
			
?>