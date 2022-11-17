<?PHP
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "users.user_id")." ".$_GET["srt"];
   $_sql = "SELECT 
			users.user_id,login_info.username,users.fname,users.lname,date_format(users.create_date,'%d-%m-%Y') as createdate,
			date_format(login_info.last_update,'%d-%m-%Y')as lastupdate,date_format(login_info.lastlogin_date,'%d-%m-%Y')as lastlogin
		FROM 
			users
		LEFT JOIN login_info ON users.user_id=login_info.user_id		
		WHERE 
			users.user_id in (".$idsToDisplay.")
		ORDER BY 
			".$orderByClause;				
?>