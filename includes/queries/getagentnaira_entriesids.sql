<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		
	$where = " where n.cancel='N' AND t.agent_id= '".$_SESSION['login']['userid']."'";
	
	if(trim($_POST['ff1']) && trim($_POST['ff2']) && trim($_POST['ff3']) && trim($_POST['tt1']) && trim($_POST['tt2']) && trim($_POST['tt3'])) { 
		$fromdate= trim($_POST['ff3'])."-".trim($_POST['ff2'])."-".trim($_POST['ff1']);
		$todate= trim($_POST['tt3'])."-".trim($_POST['tt2'])."-".trim($_POST['tt1']);

		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(e.date_entered,'%Y-%m-%d') >= '".$fromdate."' && date_format(e.date_entered,'%Y-%m-%d')<= '".$todate."'";
	}
	
	$_sql = "select n.nt_id,count(c.ne_id) as entries 
	FROM naira_entry_ticket n 
	INNER JOIN naira_entry e on e.entry_id=n.entry_id 
	INNER JOIN naira_lotto l on l.naira_id=e.naira_id 
	INNER JOIN naira_entry_child c on c.nt_id=n.nt_id
	INNER JOIN terminal_agent t on t.term_id=e.term_id 
	
	".$where." group by n.nt_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"]; 
?>