<?PHP
if(empty($_GET["srt"]))
	$_GET["srt"]=" desc ";
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"];

   $_sql = "SELECT complains.complain_id,complains.complain_no,complains.subject,complains.status
   			,date_format(complains.create_date,'%d-%m-%Y') as create_date
			,complains.description FROM complains 
               
               WHERE
			    complain_id in(".$idsToDisplay.") ORDER BY ".$orderByClause;
?>