<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection 

if($_SERVER['REQUEST_METHOD']=="POST") { 
	
	$ticketno = trim($_POST["ticketnumber"]);
	$actionco = trim($_POST["action"]);
	
	if(!$ticketno && !$actionco) $_ERROR_CODE=1; $_ERROR_TEXT="Invalid data input.";
	
	if(!$actionco || $actionco!="CLAIMTIK") { $_ERROR_CODE=2; $_ERROR_TEXT="Invalid Action Code."; } 
	if(!$ticketno) { $_ERROR_CODE=3; $_ERROR_TEXT="Empty Ticket Number."; } 
	
	if(!$_ERROR_CODE) {
		$sql="select t.nt_id,c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.draw_number,l.draw_date,
			l.nl_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,e.user_id,b.bank_name,b.address1,
			date_format(l.to_time,'%d-%b-%Y %H:%i') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(e.date_entered,'%a %D, %b %Y') as playeddate,
			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.naira_id,
			if ( ( ( substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2) ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2) ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2) ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2) ) ),substring(c.lotto_numbers,1,2),'00' 
			) as matchx1,

			if ( (

			  (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)

			  ) ),substring(c.lotto_numbers,3,2),'00'

				

			) as matchx2,

			if ( (

			  (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)

			  ) ),substring(c.lotto_numbers,5,2),'00'

				

			) as matchx3,

			if ( (

			  (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)

			  ) ),substring(c.lotto_numbers,7,2),'00'

				

			) as matchx4,

			if ( (

			  (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)

			  ) ),substring(c.lotto_numbers,9,2),'00'

				

			) as matchx5,

			if ( (

			  (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)

			  ) ),substring(c.lotto_numbers,11,2),'00'

				

			) as matchx6,			

			if ( (

			  (

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp1,

			if ( (

			  (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp2,

			if ( (

			  (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp3,

			if ( (

			  (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp4,

			if ( (

			  (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp5,

			if ( (

			  (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)

			  ) or (

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)

			  ) or (  

				substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)

			  ) ),1,0		

			) as matchp6, m.claimed_id 

			from naira_entry_child c

			left join naira_entry_ticket t on t.nt_id=c.nt_id

			left join naira_entry e on e.entry_id=t.entry_id

			left join naira_lotto l on l.naira_id=e.naira_id

			left join user_bank_info b on b.user_id=e.user_id

			left join claimed m on (m.nt_id=t.nt_id and m.which='N') 

			where l.status='D' and t.cancel='N' and e.status='A' 

			and m.claimed_id is null and t.ticket_no='".$ticketno."' group by c.ne_id 

			having (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6)>3";

		$result=array(); $i=0;
	    $rs =$_CONN->Execute($sql);

		while(!$rs->EOF){

			$naira_id      = $rs->fields['naira_id'];

			$nl_id         = $rs->fields['nl_id'];

			$nt_id         = $rs->fields['nt_id'];			

			$draw_number   = $rs->fields['draw_number'];

			$draw_date     = $rs->fields['draw_date'];

			$playeddate	   = $rs->fields["playeddate"];

			$from_time     = $rs->fields['from_time'];

			$to_time       = $rs->fields['to_time'];

			$month_year    = $rs->fields['monthyear'];

			$user_id       = $rs->fields['user_id'];			

			$bankAddress   = $rs->fields['bank_name'].",".$rs->fields['address'];	

			$vision_amount = number_format($rs->fields['vision_winning_amount'],2);

			$nl_id		   = $rs->fields['nl_id'];

			$match[0]        = $rs->fields['match0'];

			$match[1]        = $rs->fields['match1'];

			$match[2]        = $rs->fields['match2'];

			$match[3]        = $rs->fields['match3'];

			$match[4]        = $rs->fields['match4'];

			$match[5]        = $rs->fields['match5'];

			$match[6]        = $rs->fields['match6'];

			$lotto_num[$i]   = $rs->fields['lotto_numbers'];

			$result[$i][]  = $rs->fields['matchx1'];

			$result[$i][]  = $rs->fields['matchx2'];

			$result[$i][]  = $rs->fields['matchx3'];

			$result[$i][]  = $rs->fields['matchx4'];

			$result[$i][]  = $rs->fields['matchx5'];

			$result[$i][]  = $rs->fields['matchx6'];

			$i++; $rs->MoveNext();

		}	

		if($rs)	$rs->close();
		
		//Get Result
		if($naira_id) $resultp=get_all_winner("naira",$naira_id,6); 
		else {
			$_ERROR_CODE=4; 
			$_ERROR_TEXT="Invalid Ticket Number.";			
		}
	}	
	
	if(!$_ERROR_CODE) {
		
		$sql="select t.nt_id,c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.match7,l.draw_number,l.draw_date,
			l.al_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,e.user_id,b.bank_name,b.address1,
			date_format(l.to_time,'%d-%b-%Y %H:%i') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(e.date_entered,'%a %D, %b %Y') as playeddate,
			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.afro_id,
			if ( (
			  (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)				
			  ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,1,2),'00' 
				
			) as matchx1,
			if ( (
			  (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,3,2),'00'
				
			) as matchx2,
			if ( (
			  (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,5,2),'00'
				
			) as matchx3,
			if ( (
			  (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,7,2),'00'
				
			) as matchx4,
			if ( (
			  (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,9,2),'00'
				
			) as matchx5,
			if ( (
			  (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,11,2),'00'
				
			) as matchx6,
			if ( (
			  (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,13,2),'00'
				
			) as matchx7,
			
			if ( (
	  (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)				
	  ) or (  
		substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)
	  ) ),1,0 				
	) as matchp1,
	if ( (
	  (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)
	  ) or (  
		substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)
	  ) ),1,0				
	) as matchp2,
	if ( (
	  (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
	  ) or (  
		substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)
	  ) ),1,0				
	) as matchp3,
	if ( (
	  (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)
	  ) or (  
		substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)
	  ) ),1,0				
	) as matchp4,
	if ( (
	  (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)
	  ) or (  
		substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)
	  ) ),1,0				
	) as matchp5,
	if ( (
	  (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)
	  ) or (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)
	  ) or (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)
	  ) or (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)
	  ) or (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)
	  ) or (
		substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)
	  ) or (  

		substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)
	  ) ),1,0 				
	) as matchp6,
	if ( (
		  (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)
		  ) or (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)
		  ) or (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)
		  ) or (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)
		  ) or (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)
		  ) or (
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)
		  ) or (  
			substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)
		  ) ),1,0 
			
		) as matchp7, m.claimed_id
			from afro_entry_child c 
			left join afro_entry_ticket t on t.nt_id=c.nt_id
			left join afro_entry e on e.entry_id=t.entry_id
			left join afro_lotto l on l.afro_id=e.afro_id
			left join user_bank_info b on b.user_id=e.user_id
			left join claimed m on (m.nt_id=t.nt_id and m.which='A')
			where l.status='D' and t.cancel='N' and e.status='A' 
			and m.claimed_id is null and t.ticket_no='".$ticketno."' group by c.ne_id 			
			having (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6)>3";
		$result=array(); $i=0;
	    $rs =$_CONN->Execute($sql);
		while(!$rs->EOF){
			$afro_id      = $rs->fields['afro_id'];
			$al_id         = $rs->fields['al_id'];
			$nt_id         = $rs->fields['nt_id'];			
			$draw_number   = $rs->fields['draw_number'];
			$draw_date     = $rs->fields['draw_date'];
			$from_time     = $rs->fields['from_time'];
			$to_time       = $rs->fields['to_time'];
			$playeddate	   = $rs->fields["playeddate"];
			$user_id       = $rs->fields['user_id'];
			$month_year    = $rs->fields['monthyear'];
			$bankAddress   = $rs->fields['bank_name'].",".$rs->fields['address'];
			$vision_amount = number_format($rs->fields['vision_winning_amount'],2);
			$al_id		   = $rs->fields['al_id'];
			$match[0]        = $rs->fields['match0'];
			$match[1]        = $rs->fields['match1'];
			$match[2]        = $rs->fields['match2'];
			$match[3]        = $rs->fields['match3'];
			$match[4]        = $rs->fields['match4'];
			$match[5]        = $rs->fields['match5'];
			$match[6]        = $rs->fields['match6'];
			$match[7]        = $rs->fields['match7'];
			$lotto_num[$i]   = $rs->fields['lotto_numbers'];
			$result[$i][]  = $rs->fields['matchx1'];
			$result[$i][]  = $rs->fields['matchx2'];
			$result[$i][]  = $rs->fields['matchx3'];
			$result[$i][]  = $rs->fields['matchx4'];
			$result[$i][]  = $rs->fields['matchx5'];
			$result[$i][]  = $rs->fields['matchx6'];
			$result[$i][]  = $rs->fields['matchx7'];
			$i++; $rs->MoveNext();
		}	
		if($rs)	$rs->close();
		
		//Get Result
		if($afro_id) $resultp=get_all_winner("afro",$afro_id,7); 
		else {
			$_ERROR_CODE=4; 
			$_ERROR_TEXT="Invalid Ticket Number.";
		}
	}
	
	if(!$_ERROR_CODE) {
			
			$output=array();
			$total_amt=0;
			$t=0;
			$len=count($result);
			$total_amt=0;
			for($i=0;$i<$len;$i++) {
				$len2=count($result[$i]);
				$count=0;
				for($j=0;$j<$len2;$j++) {
					if($result[$i][$j]!="00") $count++;
					$result[$i][$j]>0?"<font size='3' color='red'><b>".$result[$i][$j]."</b></font>":$result[$i][$j];
				}
				if($count>=3) { 
					$output[$t]["lotto"]=substr($lotto_num[$i],0,2)."-".substr($lotto_num[$i],2,2)."-".substr($lotto_num[$i],4,2)."-".substr($lotto_num[$i],6,2)."-".substr($lotto_num[$i],8,2)."-".substr($lotto_num[$i],10,2);	
					$output[$t]["match"]=$count;
					$output[$t]["amount"]=($count==3?($match[$count]*$resultp[$count][0]):($match[$count]/$resultp[$count][0]));
					$total_amt+=($count==3?($match[$count]*$resultp[$count][0]):($match[$count]/$resultp[$count][0]));
					$t++;
				}
			}	
		
			$strres="";
			$len=count($output);	
			if($len>0) { 
				$strres="<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>NAIRA LOTTO</GAMETYPE>\n\t<TOTALWINAMOUNT>".number_format($total_amt,2)."</TOTALWINAMOUNT>";
				for($i=0;$i<$len;$i++) {
					$strres.="\n\t<LOTTONUMBER>".$output[$i]["lotto"]."</LOTTONUMBER>\n";
					$strres.="\n\t<MATCH>".$output[$i]["match"]."</MATCH>\n";
					$strres.="\n\t<WINAMOUNT>".number_format($output[$i]["amount"],2)."</WINAMOUNT>\n";
				}
				$strres.="</RESPONSE>\n</XML>";
				
				$sql="insert into claimed(nt_id,claim_date,complete,which,method,check_num,user_id,idtype,idno,issue_date,expired_date,issued_at,issued_by,nationality) 
				values('".$nt_id."',now(),'N','N','".trim($_POST["cmbSelect"])."',
				'".$cheque_no."',
				'".$user_id."',
				'".trim($_POST['txtIDtype'])."',
				'".trim($_POST['txtIDNo'])."',
				'".$dateOne."',
				'".$dateTwo."',
				'".trim($_POST['txtIssuedAt'])."',
				'".trim($_POST['txtIssuedBy'])."',
				'".trim($_POST['txtNationality'])."'			
				)";
				if($_CONN->Execute($sql)) send_claim_email("naira",$playeddate,$user_id,$total_amt);
			} else {
				$strres="<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>NAIRA LOTTO</GAMETYPE>\n\t<MESSAGE>NO WINNING AMOUNT</MESSAGE>\n</RESPONSE>\n</XML>";
			}
			echo $strres;
	}
	if($_ERROR_CODE) { 
		echo "<XML>\n<RESPONSE>\n\t<RESULT>NOTOK</RESULT>\n\t<ERROR>\n\t\t<ERRORCODE>".$_ERROR_CODE."</ERRORCODE>\n\t\t<ERRORTEXT>".$_ERROR_TEXT."</ERRORTEXT>\n\t</ERROR>\n</RESPONSE>\n</XML>";
	}
}
?>