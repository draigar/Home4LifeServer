<?PHP

if(strtolower($_GET['oby']) 	== "banner_id")
	{$orderByClause				= "bottombanner.banner_id"." ".$_GET["srt"];}
elseif(strtolower($_GET['oby']) == "name")
	{$orderByClause 			= "bottombanner.name"." ".$_GET["srt"];}	
elseif(strtolower($_GET['oby']) == "create_date")
	{$orderByClause 			= "bottombanner.create_date"." ".$_GET["srt"];}
elseif(strtolower($_GET['oby']) == "last_update")
	{$orderByClause 			= "bottombanner.last_update"." ".$_GET["srt"];}
else
	{$orderByClause = ($_GET["oby"]!="" ? "bottombanner.".$_GET["oby"] : "bottombanner.banner_id")." ".$_GET["srt"];}


  $_sql = "SELECT 
			bottombanner.banner_id as banner_id, 
			bottombanner.name, 
			bottombanner.create_date as create_date, 
			bottombanner.last_update as last_update,
			gcm.value as hposition 
		FROM 
			bottombanner left join gcm on gcm.condition= bottombanner.position and gcm.condition_type='BANNER' 
		ORDER BY 
			".$orderByClause;
		
?>