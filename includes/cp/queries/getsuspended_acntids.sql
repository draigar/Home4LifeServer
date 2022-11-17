<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "users.user_id")." ".$_GET["srt"];
$where = " where usertype='MEMBER' and member_status='S'";

if(trim($_POST['txtUserName'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (login_info.username='".trim($_POST['txtUserName'])."')";
}

if(trim($_POST['txtFirstName'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.fname='".trim($_POST['txtFirstName'])."')";
}
if(trim($_POST['txtLastName'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.lname='".trim($_POST['txtLastName'])."')";
}
if(trim($_POST['cmbCountry'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.country_id='".trim($_POST['cmbCountry'])."')";
}
if(trim($_POST['txtState'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.state_id='".trim($_POST['txtState'])."')";
}

if(trim($_POST['txtCity'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.city_id='".trim($_POST['txtCity'])."')";
}
if(trim($_POST['txtPhone'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.phone='".trim($_POST['txtPhone'])."')";
}
if(trim($_POST['txtEmail'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (users.email_id='".trim($_POST['txtEmail'])."')";
}
   	if(trim($_POST['cmbInitial'])){
		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " users.fname like '".trim($_POST['cmbInitial'])."%'";
	}

    $_sql = "SELECT 
				users.user_id
			FROM 
				users LEFT JOIN  login_info	ON   users.user_id=login_info.user_id
			".$where." 
			ORDER BY 
				".$orderByClause;
			
?>