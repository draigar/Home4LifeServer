<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "id")." ".$_GET["srt"];
$_sql = "SELECT id,date_format(mdate,'%D-%b-%Y') as mdate,headline,msg from message WHERE id in (".$idsToDisplay.") ORDER BY ".$orderByClause;
?>