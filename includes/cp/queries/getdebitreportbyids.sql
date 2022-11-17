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

							

								if(

									(n.which='T'),'Transfer Fund',''

									

								)

							)

						)

				)

			) 

		) as description,n.action,n.user_id,n.which,n.user_type,n.added_by,n.amount,

			n.balance,identifier,date_format(trans_date,'%d-%b-%Y %h:%i') as trans_date,

			t.ticket_no as nticket,a.ticket_no as aticket,

			if(

				(n.added_by!='' and n.added_by!=0 and n.nt_id=0),

				concat('a_',i.user_id,'_',i.fname,' ',i.lname,' <font size=\'1\'>(Admin)</font>'),

				if(	

					(n.which='T' and n.action='C'),

					if(n.user_type='U',concat('u_',u2.user_id,'_',u2.fname,' ',u2.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',mu2.user_id,'_',mu2.fname,' ',mu2.lname,' <font size=\'1\'>(Agent)</font>')),

					if(

						(n.which='T' and n.action='D'),

						if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),									

							if(n.which='D','Add Fund',

								if(n.which='R','BW',

									if(

										( (n.which='N' or n.which='A') and n.action='D'),

										if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),

										if(

											((n.which='N' or n.which='A') and n.action='C'),'Admin',''

										)

								 	)

							 )

						)							

					)					

				)

			) as fromx,if(

				(n.added_by!='' and n.added_by!=0 and n.nt_id=0),

				if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),

				if(	

					(n.which='T' and n.action='C'),

					if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),

					if(

						(n.which='T' and n.action='D'),

						if(n.user_type='U',concat('u_',u3.user_id,'_',u3.fname,' ',u3.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',mu3.user_id,'_',mu3.fname,' ',mu3.lname,' <font size=\'1\'>(Agent)</font>')),

							if( (n.which='D' or n.which='R') ,

							if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),

							if(

									((n.which='N' or n.which='A') and n.action='D'),'Admin',

									if(	

										((n.which='N' or n.which='A') and n.action='C'),

										if(n.user_type='U',concat('u_',u.user_id,'_',u.fname,' ',u.lname,' <font size=\'1\'>(Cust)</font>'),concat('m_',m.user_id,'_',m.fname,' ',m.lname,' <font size=\'1\'>(Agent)</font>')),''

									)

							)								

						)

					)

				)

			) as tox			

		FROM 

			transaction n 

		LEFT JOIN naira_entry_ticket t ON (t.nt_id=n.nt_id and n.which='N')

		LEFT JOIN afro_entry_ticket a ON (a.nt_id=n.nt_id and n.which='A')

		LEFT JOIN users u ON (u.user_id=n.user_id and n.user_type='U')

		LEFT JOIN users i ON (i.user_id=n.added_by and i.usertype='ADMIN')

		LEFT JOIN merchant m ON (m.user_id=n.user_id and n.user_type='A')

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