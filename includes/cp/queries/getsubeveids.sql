<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		global $_THISPAGENAME;
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "app_id")." ".$_GET["srt"];

//Create Where clause 
$where = "";

if(trim($_POST['txtFirmName'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (name='".trim($_POST['txtFirmName'])."')";
}
if(trim($_POST['txtEventName'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (email='".trim($_POST['txtEventName'])."')";
}


if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){
$arr1 = explode("/",$_POST["txtFromDate"]); 
	$fromdate = $arr1[2]."-".$arr1[1]."-".$arr1[0];
$arr1 = explode("/",$_POST["txtToDate"]); 
	$todate = $arr1[2]."-".$arr1[1]."-".$arr1[0];
				
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (date_format(create_date,'%Y-%m-%d') >= '".$fromdate."' AND date_format(create_date,'%Y-%m-%d') <= '".$todate."')";
}
if(trim($_POST['cmbInitialList'])){		
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " (name like '".trim($_POST['cmbInitialList'])."%')";
}
		
  $_sql = "SELECT  sub_id FROM eb_subscriber     
			".$where."  ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "sub_id")." ".$_GET["srt"]; 
?>