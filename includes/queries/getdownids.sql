<?PHP
	if(empty($_GET["srt"]))
		$_GET["srt"] = "desc";
		
		$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "rand()");
		
  	$_sql = "SELECT down_id 
	         FROM downloads 
			 where display='Y' and file_type='M' order by ".$orderByClause;
?>