<?php 

$showDetail=false;

if($_SERVER['REQUEST_METHOD']="POST" && $_POST['Input']=="Fetch" || $_POST['Input']=="Claim This Winning") { 

	if (trim($_POST["txtTicketNo"])=="") {

		$_MSG[] = " Please enter ticket no.";

		$error = 1;

	}	
	
 	if(empty($error)) {
		
		$showDetail=true;

		$sql="select t.nt_id,c.lotto_numbers,e.entry_id,e.vision_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.draw_number,l.draw_date,

			l.nl_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,l.winner_vision_number,e.user_id,b.bank_name,b.address1,

			date_format(l.to_time,'%d-%b-%Y %H:%i') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,

			date_format(e.date_entered,'%a %D, %b %Y') as playeddate,e.method_id,l.matchz3,l.matchz4,l.matchz5,

			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.naira_id,

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

			) as matchp6, m.claimed_id, 
			if(e.vision_numbers=l.winner_vision_number,1,0) as vismatch 

			from naira_entry_child c

			left join naira_entry_ticket t on t.nt_id=c.nt_id

			left join naira_entry e on e.entry_id=t.entry_id

			left join naira_lotto l on l.naira_id=e.naira_id

			left join user_bank_info b on b.user_id=e.user_id

			left join claimed m on (m.nt_id=t.nt_id and m.which='N') 

			where l.status='D' and t.cancel='N' and e.status='A' 

			and m.claimed_id is null and t.ticket_no='".trim($_POST["txtTicketNo"])."' group by c.ne_id 

			having ( (
				( e.method_id='T' and (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6)>=3 )  
				or 
				( e.method_id!='T' and (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6)>3 ) 
				)  OR 
	( l.vision_winning_amount>0 and vismatch=1 )
			)";
		
		$result=array(); $i=0;
	    $rs =$_CONN->Execute($sql);
		$visionwinner=array();
		$visionwinneramount=array();
		$vision_entry_winner=array();
		while(!$rs->EOF){
			
			$sql1="select t.ticket_no from naira_entry e,naira_entry_ticket t where e.entry_id=t.entry_id and e.entry_id=".$rs->fields['entry_id']." order by nt_id asc limit 0,1";
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
			
			$naira_id      = $rs->fields['naira_id'];

			$nl_id         = $rs->fields['nl_id'];

			$nt_id         = $rs->fields['nt_id'];			

			$draw_number   = $rs->fields['draw_number'];
			$winner_vision_number   = $rs->fields['winner_vision_number'];
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

			$match[3]        = $rs->fields['matchz3'];

			$match[4]        = $rs->fields['matchz4'];

			$match[5]        = $rs->fields['matchz5'];

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

			$showDetail=false;

			$error=1;

			$_MSG[]="Invalid Ticket Number.";

		}

	}	

}



if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Claim This Winning"){ 

	if($_POST['cmbSelect']==""){

		$_MSG[]="Please select payment type.";

		$error=1;

	}

	if($_POST['txtIDtype']==""){

		$_MSG[]="Please enter Id type.";

		$error=1;

	}
	if($_POST['txtIDNo']==""){

		$_MSG[]="Please enter Id number.";

		$error=1;

	}
	if($_POST['txtIssuedDate']==""){

		$_MSG[]="Please enter issued date.";

		$error=1;

	}
	if($_POST['txtExipredDate']==""){

		$_MSG[]="Please enter expiry date.";

		$error=1;

	}
	if($_POST['txtIssuedAt']==""){

		$_MSG[]="Please enter issued at.";

		$error=1;

	}
	if($_POST['txtIssuedBy']==""){

		$_MSG[]="Please enter issued by.";

		$error=1;

	}
	if($_POST['txtNationality']==""){

		$_MSG[]="Please enter nationality.";

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
	$dateOneAry = explode("-",trim($_POST['txtIssuedDate']));
		$dateOne = $dateOneAry[2]."-".$dateOneAry[1]."-".$dateOneAry[0];
	$dateTwoAry = explode("-",trim($_POST['txtExipredDate']));
		$dateTwo = $dateTwoAry[2]."-".$dateTwoAry[1]."-".$dateTwoAry[0];

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

		if($_CONN->Execute($sql)){

			send_claim_email("naira",$playeddate,$user_id,$_POST["total_amount"]);

			header("Location: ".$_DIR['site']['adminurl']."naira_claim_list".$atend."success".$_DELIM."1".$baratend);

			exit();

		}

	}	

}

?>