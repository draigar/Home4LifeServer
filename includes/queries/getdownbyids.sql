<?php	
if(empty($_GET["srt"]))
   $_GET["srt"] = "desc";

$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "rand()")."";
	
  $_sql = "select down_id,download_name,down_desc,down_path 
		 FROM downloads 
		 WHERE display='Y' and file_type='M' and down_id in (".$idsToDisplay.") order by ".$orderByClause;
?>