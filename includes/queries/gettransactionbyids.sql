<?PHP

	   if(empty($_GET["srt"])) $_GET["srt"]=" desc ";

	   $orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "n.trans_id")." ".$_GET["srt"];

	   $_sql="SELECT n.trans_id,

	   if(

	   		(n.added_by!='' and n.added_by!=0 and n.nt_id=0),n.description,

			

			if(

				(n.which='D' and n.action='C'),'Add Fund', 

				

				if(

					(n.which='R' and n.action='D'),'Bank Withdrawal',

						

						if(n.which='N','NL',

							

							if(n.which='A','AM',

							

								if( (n.which='T' and n.action='C'),
								
									if(n.user_type='U',concat('Fr: ',u2.fname,' ',u2.lname),concat('Fr: ',mu2.fname,' ',mu2.lname)),

									if( (n.which='T' and n.action='D'),
										
										if(n.user_type='U',concat('To: ',u3.fname,' ',u3.lname),concat('To: ',mu3.fname,' ',mu3.lname)),

										''
									)

								)

							)

						)

				)

			) 

		) as description,n.action,n.which,

			n.amount,n.balance,identifier,date_format(trans_date,'%d-%b-%Y %h:%i') as trans_date,

			t.ticket_no as nticket,a.ticket_no as aticket

		FROM 

			transaction n 

		LEFT JOIN naira_entry_ticket t ON (t.nt_id=n.nt_id and n.which='N')

		LEFT JOIN afro_entry_ticket a ON (a.nt_id=n.nt_id and n.which='A')
		
		LEFT JOIN trans_fund_to f1 ON f1.trans_id=n.trans_id

		LEFT JOIN users u2 ON (f1.user_id=u2.user_id and n.user_type='U')

		LEFT JOIN merchant mu2 ON (f1.user_id=mu2.user_id and n.user_type='A')

		LEFT JOIN trans_fund_to f2 ON f2.from_trans_id=n.trans_id

		LEFT JOIN users u3 ON (f2.to_user_id=u3.user_id and n.user_type='U')

		LEFT JOIN merchant mu3 ON (f2.to_user_id=mu3.user_id and n.user_type='A')
		
		WHERE 

			n.trans_id in (".$idsToDisplay.") 

		GROUP BY 

			n.trans_id	

		ORDER BY 

			".$orderByClause;				

?>