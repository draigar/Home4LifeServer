<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
		
	$where = " where n.cancel='Y' AND t.agent_id= '".$_SESSION['login']['userid']."'";
	
	if(trim($_POST['ff1']) && trim($_POST['ff2']) && trim($_POST['ff3']) && trim($_POST['tt1']) && trim($_POST['tt2']) && trim($_POST['tt3'])) { 
		$fromdate= trim($_POST['ff3'])."-".trim($_POST['ff2'])."-".trim($_POST['ff1']);
		$todate= trim($_POST['tt3'])."-".trim($_POST['tt2'])."-".trim($_POST['tt1']);

		if(!$where)
			$where .= " where ";
		else 
			$where .= " and ";	
	    $where .= " date_format(e.date_entered,'%Y-%m-%d') >= '".$fromdate."' && date_format(e.date_entered,'%Y-%m-%d')<= '".$todate."'";
	}
	
	$_sql = "select n.nt_id,count(c.ne_id) 
	from afro_entry_ticket n 
	inner join afro_entry e on e.entry_id=n.entry_id 
	inner join afro_lotto l on l.afro_id=e.afro_id 
	left join afro_entry_child c on c.nt_id=n.nt_id 
	INNER JOIN terminal_agent t on t.term_id=e.term_id
	".$where." group by n.nt_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"]; 
?>