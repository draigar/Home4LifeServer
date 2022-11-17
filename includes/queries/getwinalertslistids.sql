<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	$where="";
	if(trim($_POST['ff1']) && trim($_POST['ff2'])&& trim($_POST['ff3'])&& trim($_POST['tt1'])&& trim($_POST['tt2'])&& trim($_POST['tt3'])) { 
		$fromdate= trim($_POST['ff3'])."-".trim($_POST['ff2'])."-".trim($_POST['ff1']);
		$todate= trim($_POST['tt3'])."-".trim($_POST['tt2'])."-".trim($_POST['tt1']);

		$where = " and ( date_format(mdate,'%Y-%m-%d') between '".$fromdate."' and '".$todate."' )";
	}
		
	$_sql = "SELECT id FROM message where user_id='".$_SESSION['login']['userid']."' ".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "id")." ".$_GET["srt"]; 
?>