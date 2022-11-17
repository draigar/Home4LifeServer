<?php 
$showDetail=false;
if($_SERVER['REQUEST_METHOD']="POST" && $_POST['Input']=="Fetch" || $_POST['Input']=="Claim This Winning") { 
	if (trim($_POST["txtTicketNo"])=="") {
		$_MSG[] = " Please enter ticket no.";
		$error = 1;
	}	
 	if(empty($error)) {
		$showDetail=true;
		$sql="select t.nt_id,c.lotto_numbers,e.entry_id,e.vision_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.match7,l.draw_number,l.draw_date,
			l.al_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,l.winner_vision_number,e.user_id,b.bank_name,b.address1,
			date_format(l.to_time,'%d-%b-%Y %H:%i') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(e.date_entered,'%a %D, %b %Y') as playeddate,e.method_id,l.matchz3,l.matchz4,l.matchz5,l.matchz6,
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
			
		) as matchp7, m.claimed_id,
		if(e.vision_numbers=l.winner_vision_number,1,0) as vismatch 
			from afro_entry_child c 
			left join afro_entry_ticket t on t.nt_id=c.nt_id
			left join afro_entry e on e.entry_id=t.entry_id
			left join afro_lotto l on l.afro_id=e.afro_id
			left join user_bank_info b on b.user_id=e.user_id
			left join claimed m on (m.nt_id=t.nt_id and m.which='A')
			where l.status='D' and t.cancel='N' and e.status='A' 
			and m.claimed_id is null and t.ticket_no='".trim($_POST["txtTicketNo"])."' group by c.ne_id 			
			having  ( (
				( e.method_id='T' and (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6+matchp7)>=3 )  
				or 
				( e.method_id!='T' and (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6+matchp7)>3 ) 
				)  OR 
	( l.vision_winning_amount>0 and vismatch=1 )
			)";
		$result=array(); $i=0;
	    $rs =$_CONN->Execute($sql);
		$visionwinner=array();
		$visionwinneramount=array();
		$vision_entry_winner=array();
		while(!$rs->EOF){
			$sql1="select t.ticket_no from afro_entry e,afro_entry_ticket t where e.entry_id=t.entry_id and e.entry_id=".$rs->fields['entry_id']." order by t.nt_id asc limit 0,1";
			$rs1=$_CONN->Execute($sql1);
			if($rs1 && !$rs1->EOF) { 
				$ticketno=$rs1->fields["ticket_no"];
			}
			if($rs1) $rs1->close();
			
			if( trim($_POST["txtTicketNo"])==$ticketno && (in_array($rs->fields['entry_id'],$vision_entry_winner)===false) && ($rs->fields['vismatch'])==1 ) { 
				$visionwinner[$i] = $rs->fields['vision_numbers'];
				$visionwinneramount[$i] = $rs->fields['vision_winning_amount'];
				$vision_entry_winner[$i]=$rs->fields['entry_id'];
			}
			
			$afro_id      = $rs->fields['afro_id'];
			$al_id         = $rs->fields['al_id'];
			$nt_id         = $rs->fields['nt_id'];			
			$draw_number   = $rs->fields['draw_number'];
			$winner_vision_number   = $rs->fields['winner_vision_number'];
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
			$showDetail=false;
			$error=1;
			$_MSG[]="Invalid Ticket Number.";
		}
	}	
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Claim This Winning"){ 
	if($_POST['cmbSelect']==""){
		$_MSG[]="Please select payment type";
		$error=1;
	}
	if($_POST['cmbSelect']=="C" && $_POST['txtCheque']==""){
		$_MSG[]="Please enter cheque number";
		$error=1;
	}
	if($_POST['cmbSelect']=="B"){
		$cheque_no="";
	}else{
		$cheque_no=trim($_POST["txtCheque"]);
	}
	if(empty($error)){
		$sql="insert into claimed(nt_id,claim_date,complete,which,method,check_num,user_id) 
			values('".$nt_id."',now(),'N','A','".trim($_POST["cmbSelect"])."','".$cheque_no."','".$user_id."')";
		if($_CONN->Execute($sql)){
			send_claim_email("afro",$playeddate,$user_id,$_POST["total_amount"]);
			header("Location: ".$_DIR['site']['adminurl']."afro_claim_list".$atend."success".$_DELIM."1".$baratend);
			exit(); 
		}
	}
	
}
?> 
