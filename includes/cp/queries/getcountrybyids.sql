<?PHP
$_sql = "SELECT 
			country.country_id as countryid, country.name,
			country.create_date as createdate, 
			country.last_update as lastupdate,concat(curr_code,' (',curr_name,')') as curr_code  
		FROM 
		country left join currency on currency.curr_id = country.curr_id 
		WHERE
			country.country_id in(".$idsToDisplay.")
		ORDER BY 
			".($_GET["oby"]!="" ? $_GET["oby"] : "country.country_id")." ".$_GET["srt"];
?>