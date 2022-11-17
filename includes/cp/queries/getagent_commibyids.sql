<?PHP
	   if(empty($_GET["srt"])) $_GET["srt"]=" desc ";
	   $orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "comm_id")." ".$_GET["srt"];

	   $_sql="SELECT c.comm_id,c.agent_id,c.nt_id,c.game_type,c.entries,c.price,c.commission_amount,if(c.paid,'Yes','No')as paid,
	   CONCAT(m.fname,' ',m.lname) as fullname,if(c.game_type='N',t.ticket_no,a.ticket_no) as ticket_no,
	   if(c.game_type='N','Naira Lotto','Afro Millions') as game_type
		FROM 
			commission c
		LEFT JOIN merchant m ON	 m.user_id = c.agent_id
		LEFT JOIN naira_entry_ticket t ON (t.nt_id=c.nt_id and c.game_type='N')
		LEFT JOIN afro_entry_ticket a ON (a.nt_id=c.nt_id and c.game_type='A')

		WHERE 
			comm_id in (".$idsToDisplay.") 

		ORDER BY 
			".$orderByClause;				
?>