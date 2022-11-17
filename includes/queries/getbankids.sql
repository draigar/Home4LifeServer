<?PHP
echo "sadasadsa";
	if(empty($_GET["srt"]))
		$_GET["srt"]=" desc ";
	echo $_sql = "SELECT bank_id FROM bank_info ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "bank_id")." ".$_GET["srt"]; 
?>