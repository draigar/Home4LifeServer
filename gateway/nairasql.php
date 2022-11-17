<?php
$sql="select c.lotto_numbers,c.ne_id,e.entry_id,e.vision_numbers,t.ticket_no,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.draw_number,
l.draw_date,l.matchz3,l.matchz4,l.matchz5,l.nl_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
date_format(l.to_time,'%d %b %Y') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.naira_id,e.method_id,
if ( (  (substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)  ) or (
	substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2) ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2) ) or ( substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)
  ) ),1,0 ) as matchx1, if ( ( (substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2) ) or (substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2) ) or (substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2) ) or ( substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)
  ) ),1,0) as matchx2,if ( (  (	substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
  ) ),1,0) as matchx3,if ( ( (substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)  ) or (substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)  ) or (substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)
  ) ),1,0) as matchx4,if ( ( (substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)  ) or (substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)  ) or (substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)
  ) ),1,0) as matchx5,if ( ( (substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)  ) or (substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)  ) or (substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)
  ) ),1,0) as matchx6, if ( ( (substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)  ) or (substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)
  ) ),substring(c.lotto_numbers,1,2),0 ) as matchp1,if ( (  (	substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)  ) or (
	substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)  ) or (	substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)  ) or (
	substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)  ) or (substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)
  ) or ( substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2) ) ),substring(c.lotto_numbers,3,2),0) as matchp2,
if ( ( (substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2) ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
  ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2) ) or (substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
  ) or (
	substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)
  ) or (  
	substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
  ) ),substring(c.lotto_numbers,5,2),0
	
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
  ) ),substring(c.lotto_numbers,7,2),0
	
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
  ) ),substring(c.lotto_numbers,9,2),0
	
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
  ) ),substring(c.lotto_numbers,11,2),0
	
) as matchp6,
if(e.vision_numbers=l.winner_vision_number,1,0) as vismatch
from naira_entry_child c
left join naira_entry_ticket t on t.nt_id=c.nt_id
left join naira_entry e on e.entry_id=t.entry_id
left join naira_lotto l on l.naira_id=e.naira_id
where l.status='D' and t.ticket_no='".$ticketno."'
having ( 
	( (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)>=3 )
	OR 
	( l.vision_winning_amount>0 and vismatch=1 )
	)
order by l.draw_date desc,l.naira_id";
$result=array(); 
$rs =$_CONN->Execute($sql);
$i=0;
$vision_entry_winner=array();
while(!$rs->EOF){
	if( (in_array($rs->fields['entry_id'],$vision_entry_winner)===false) && ($rs->fields['vismatch'])==1) { 
		$visionwinner[$i] = $rs->fields['vision_numbers'];
		$visionwinneramount[$i] = $rs->fields['vision_winning_amount'];
		$vision_entry_winner[]=$rs->fields['entry_id'];
	}
	$ki=0;
	if($rs->fields['matchp1']) { $win_num[$i]=$rs->fields['matchp1']; $ki++; }
	if($rs->fields['matchp2']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp2']; $ki++; }
	if($rs->fields['matchp3']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp3']; $ki++; }
	if($rs->fields['matchp4']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp4']; $ki++; }
	if($rs->fields['matchp5']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp5']; $ki++; }
	if($rs->fields['matchp6']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp6']; $ki++; }
	if($ki<3) $win_num[$i]="";
	if(!$visionwinner[$i] && !$win_num[$i]) {}
	else {
		$line_number[$i] = chr(65+$k);
		$naira_id[$i]    = $rs->fields['naira_id'];
		$nl_id[$i]       = $rs->fields['nl_id'];
		$ne_id[$i]       = $rs->fields['ne_id'];
		$ticket_no[$i]   = $rs->fields['ticket_no'];	
		$draw_number[$i] = $rs->fields['draw_number'];
		$method_id[$i]   = $rs->fields['method_id'];
		$draw_date[$i]   = $rs->fields['draw_date'];
		$from_time[$i]   = $rs->fields['from_time'];
		$to_time[$i]     = $rs->fields['to_time'];
		$unclaim_date[$i] = $rs->fields['unclaim_date'];
		$month_year[$i]  = $rs->fields['monthyear'];
		$vision_amount[$i] = number_format($rs->fields['vision_winning_amount'],2);
		$nl_id[$i]		   = $rs->fields['nl_id'];
		$match[$i][0]      = $rs->fields['match0'];
		$match[$i][1]        = $rs->fields['match1'];
		$match[$i][2]        = $rs->fields['match2'];
		$match[$i][3]        = $rs->fields['matchz3'];
		$match[$i][4]        = $rs->fields['matchz4'];
		$match[$i][5]        = $rs->fields['matchz5'];
		$match[$i][6]        = $rs->fields['match6'];
		$lotto_num[$i]   = $rs->fields['lotto_numbers'];
		$result[$i][]  = $rs->fields['matchx1'];
		$result[$i][]  = $rs->fields['matchx2'];
		$result[$i][]  = $rs->fields['matchx3'];
		$result[$i][]  = $rs->fields['matchx4'];
		$result[$i][]  = $rs->fields['matchx5'];
		$result[$i][]  = $rs->fields['matchx6'];
		$i++;
	} 
	$rs->MoveNext();
}	
if($rs)	$rs->close();
?>