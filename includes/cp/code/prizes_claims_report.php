<?php
$display = false;  

//Get per line price
$sql="select value from gcm where condition_type='UNCLAIMED_LIMIT' and `condition`=1";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $ulimit=$rs->fields["value"];
if($rs) $rs->close();

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Submit1'] == "Generate Report"){

//---------------------------------------------------------------------------------------------------------------------------   
$where = "";
$where1 = "";
$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)>3 ";
$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)>3 ";
	
//unclaim price
if($_POST['cmbCriteria'] == "UP"){
	$where .= " and ";	
	$where1 .= " and ";	
	$where .= " m.claimed_id is null and date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%Y-%m-%d')>=curdate() ";
	$where1 .= " m.claimed_id is null and date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%Y-%m-%d')>=curdate() ";
}
//claimed prize
if($_POST['cmbCriteria'] == "CP"){
	$where .= " and ";	
	$where1 .= " and ";	
	$where .= " m.claimed_id is not null ";
	$where1 .= " m.claimed_id is not null ";
}
//expired price
if($_POST['cmbCriteria'] == "EP"){
	$where .= " and ";	
	$where1 .= " and ";	
	$where .= " m.claimed_id is null and date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%Y-%m-%d')<curdate() ";
	$where1 .= " m.claimed_id is null and date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%Y-%m-%d')<curdate() ";
}
if($_POST['cmbCriteria'] == "PI"){
	$where .= " and ";	
	$where1 .= " and ";	
	$where .= " e.method_id='I' ";
	$where1 .= " e.method_id='I' ";
}
if($_POST['cmbCriteria'] == "PT"){
	$where .= " and ";	
	$where1 .= " and ";	
	$where .= " e.method_id='T' ";
	$where1 .= " e.method_id='T' ";
}
if($_POST['cmbTypeofLotto'] == "VN"){
	$where .= " and ";	
	$where .= " e.vision_numbers!='' ";
}
if($_POST['cmbTypeofLotto'] == "AR"){
	$where1 .= " and ";	
	$where1 .= " e.vision_numbers!='' ";
}
if($_POST['cmbCriteria'] == "M3"){
	$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)==3 ";
	$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)==3 ";
}
if($_POST['cmbCriteria'] == "M4"){
	$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)==4 ";
	$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)==4 ";
}
if($_POST['cmbCriteria'] == "M5"){
	$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)==5 ";
	$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)==5 ";
}
if($_POST['cmbCriteria'] == "M6"){
	$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)==6 ";
	$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)==6 ";
}
if($_POST['cmbCriteria'] == "M7"){
	$having = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)==7 ";
	$having1 = " (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)==7 ";
}
if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){
	$arr=explode("-",trim($_POST["txtFromDate"]));
	$fdate1=$arr[2]."-".$arr[0]."-".$arr[1];
	$arr=explode("-",trim($_POST["txtToDate"]));
	$fdate2=$arr[2]."-".$arr[0]."-".$arr[1];	
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " ( date_format(l.to_time,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";
	$where1 .= " ( date_format(l.to_time,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";	
}
ob_start();
?>
<html><head>
<style type="text/css">
.rphead {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #083a98;
}
.rptext {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #083a98;
}
</style>
</head><body>
<?php if($_POST['cmbTypeofLotto']=="NL" || $_POST['cmbTypeofLotto']=="VN") { ?>
<p class="rphead">UnClaim Naira Prizes Reports</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>Draw date</th><th>Draw no</th><th>Ticket no</th><th>Prize<br>unclaimed</th><th>Prize<br>level</th><th>Area bought</th><th>Winning<br>numbers</th><th>Last date<br>to claim</th></tr>
<?php
$sql="select c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.draw_number,l.draw_date,t.ticket_no,
l.nl_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
date_format(l.to_time,'%d %b %Y') as to_time,date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%d %b %Y') as unclaim_date,date_format(l.to_time,'%M/%Y') as monthyear,
date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.naira_id,e.method_id,
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),substring(c.lotto_numbers,1,2),0 
	
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
  ) ),substring(c.lotto_numbers,3,2),0
	
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
	
) as matchp6
from naira_entry_child c
left join naira_entry_ticket t on t.nt_id=c.nt_id
left join naira_entry e on e.entry_id=t.entry_id
left join naira_lotto l on l.naira_id=e.naira_id
left join claimed m on ( m.nt_id=t.nt_id and m.which='N') 
where l.status='D' ".$where." group by c.ne_id   
having ".$having." order by l.draw_date desc,l.naira_id";
$result=array(); 
$rs =$_CONN->Execute($sql);
$i=0;
while(!$rs->EOF){
	$line_number[$i] = chr(65+$k);
	$naira_id[$i]    = $rs->fields['naira_id'];
	$nl_id[$i]       = $rs->fields['nl_id'];
	$draw_number[$i] = $rs->fields['draw_number'];
	$ticket_no[$i] = $rs->fields['ticket_no'];	
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
	$match[$i][3]        = $rs->fields['match3'];
	$match[$i][4]        = $rs->fields['match4'];
	$match[$i][5]        = $rs->fields['match5'];
	$match[$i][6]        = $rs->fields['match6'];
	$lotto_num[$i]   = $rs->fields['lotto_numbers'];
	$result[$i][]  = $rs->fields['matchx1'];
	$result[$i][]  = $rs->fields['matchx2'];
	$result[$i][]  = $rs->fields['matchx3'];
	$result[$i][]  = $rs->fields['matchx4'];
	$result[$i][]  = $rs->fields['matchx5'];
	$result[$i][]  = $rs->fields['matchx6'];
	if($rs->fields['matchp1']) { $win_num[$i]=$rs->fields['matchp1']; }
	if($rs->fields['matchp2']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp2']; }
	if($rs->fields['matchp3']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp3']; }
	if($rs->fields['matchp4']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp4']; }
	if($rs->fields['matchp5']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp5']; }
	if($rs->fields['matchp6']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp6']; }
	$i++; 
	$rs->MoveNext();
}	
if($rs)	$rs->close();
$prizesum=array();
$cnt=count($naira_id);
for($i=0;$i<$cnt;$i++) { 
	$matchp=0;
	$len2=count($result[$i]);
	for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
		if($result[$i][$j]) $matchp++;
	}
	$prizesum[$naira_id[$i]][$matchp]=!$prizesum[$naira_id[$i]][$matchp]?1:($prizesum[$naira_id[$i]][$matchp]+1);
}
for($i=0;$i<$cnt;$i++) { 
	$matchp=0;
	$len2=count($result[$i]);
	for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
		if($result[$i][$j]) $matchp++;
	}
?>
<tr bgcolor="#ffffff" class="rptext">
	<td nowrap align="center"> 
	  <?=$i+1?>
	</td>
	<td nowrap align="center"> 
	  <?=$to_time[$i]?>
	</td>
	<td nowrap align="center"> 
	  <?=strlen($naira_id[$i])<4?substr("0000",0,4-strlen($naira_id[$i])).$naira_id[$i]:$naira_id[$i]?>
	</td>
	<td nowrap align="center"> 
		<?=$ticket_no[$i]?>
	</td> 
	<td nowrap align="center"><?=number_format($match[$i][$matchp]/$prizesum[$naira_id[$i]][$matchp],2)?></td>
	<td nowrap align="center"><?=$matchp==6?"Jackpot":"Matched".$matchp?></td>
	<td nowrap align="center"><?php 
		if($method_id[$i]=='S'){ echo "SMS"; }elseif($method_id[$i]=='T'){ echo "Terminal"; }else{ echo "Internet"; }
	?></td>
	<td nowrap align="center"><?=$win_num[$i]?></td>
	<td nowrap align="center"><?=$unclaim_date[$i]?></td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
?>
</table>
<?php }
if($_POST['cmbTypeofLotto']=="AM" || $_POST['cmbTypeofLotto']=="AR") { ?>
<p class="rphead">UnClaim Afro Millions Prizes Reports</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>Draw date</th><th>Draw no</th><th>Ticket no</th><th>Prize<br>unclaimed</th><th>Prize<br>level</th><th>Area bought</th><th>Winning<br>numbers</th><th>Last date<br>to claim</th></tr>
<?php
$sql="select c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.match7,l.draw_number,l.draw_date,t.ticket_no,
l.al_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
date_format(l.to_time,'%d %b %Y') as to_time,date_format(date_add(l.draw_date,interval ".$ulimit." DAY),'%d %b %Y') as unclaim_date,date_format(l.to_time,'%M/%Y') as monthyear,
date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.afro_id,e.method_id,
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0
	
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
  ) ),1,0	
  
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
  ) ),1,0
  	
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
  ) ),substring(c.lotto_numbers,1,2),0 
	
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
  ) ),substring(c.lotto_numbers,3,2),0
	
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
  ) or (  
	substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)
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
  ) or (  
	substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)
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
  ) or (  
	substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)
  ) ),substring(c.lotto_numbers,11,2),0
	
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
  ) ),substring(c.lotto_numbers,13,2),0
	
) as matchp7
from afro_entry_child c
left join afro_entry_ticket t on t.nt_id=c.nt_id
left join afro_entry e on e.entry_id=t.entry_id
left join afro_lotto l on l.afro_id=e.afro_id
left join claimed m on ( m.nt_id=t.nt_id and m.which='A') 
where l.status='D' ".$where1." group by c.ne_id   
having ".$having." order by l.draw_date desc,l.afro_id";
$result=array(); 
$rs =$_CONN->Execute($sql);
$i=0;
while(!$rs->EOF){
	$line_number[$i] = chr(65+$k);
	$afro_id[$i]    = $rs->fields['afro_id'];
	$nl_id[$i]       = $rs->fields['nl_id'];
	$draw_number[$i] = $rs->fields['draw_number'];
	$ticket_no[$i] = $rs->fields['ticket_no'];
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
	$match[$i][3]        = $rs->fields['match3'];
	$match[$i][4]        = $rs->fields['match4'];
	$match[$i][5]        = $rs->fields['match5'];
	$match[$i][6]        = $rs->fields['match6'];
	$match[$i][7]        = $rs->fields['match7'];
	$lotto_num[$i]   = $rs->fields['lotto_numbers'];
	$result[$i][]  = $rs->fields['matchx1'];
	$result[$i][]  = $rs->fields['matchx2'];
	$result[$i][]  = $rs->fields['matchx3'];
	$result[$i][]  = $rs->fields['matchx4'];
	$result[$i][]  = $rs->fields['matchx5'];
	$result[$i][]  = $rs->fields['matchx6'];
	$result[$i][]  = $rs->fields['matchx7'];
	if($rs->fields['matchp1']) { $win_num[$i]=$rs->fields['matchp1']; }
	if($rs->fields['matchp2']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp2']; }
	if($rs->fields['matchp3']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp3']; }
	if($rs->fields['matchp4']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp4']; }
	if($rs->fields['matchp5']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp5']; }
	if($rs->fields['matchp6']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp6']; }
	if($rs->fields['matchp7']) { if($win_num[$i]) $win_num[$i].=","; $win_num[$i].=$rs->fields['matchp7']; }
	$i++; 
	$rs->MoveNext();
}	
if($rs)	$rs->close();
$prizesum=array();
$cnt=count($afro_id);
for($i=0;$i<$cnt;$i++) { 
	$matchp=0;
	$len2=count($result[$i]);
	for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
		if($result[$i][$j]) $matchp++;
	}
	$prizesum[$afro_id[$i]][$matchp]=!$prizesum[$afro_id[$i]][$matchp]?1:($prizesum[$afro_id[$i]][$matchp]+1);
}
for($i=0;$i<$cnt;$i++) { 
	$matchp=0;
	$len2=count($result[$i]);
	for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
		if($result[$i][$j]) $matchp++;
	}
?>
<tr bgcolor="#ffffff" class="rptext">
	<td nowrap align="center"> 
	  <?=$i+1?>
	</td>
	<td nowrap align="center"> 
	  <?=$to_time[$i]?>
	</td>
	<td nowrap align="center"> 
	  <?=strlen($afro_id[$i])<4?substr("0000",0,4-strlen($afro_id[$i])).$afro_id[$i]:$afro_id[$i]?>
	</td>
	<td nowrap align="center"> 
		<?=$ticket_no[$i]?>
	</td> 
	<td nowrap align="center"><?=number_format($match[$i][$matchp]/$prizesum[$afro_id[$i]][$matchp],2)?></td>
	<td nowrap align="center"><?=$matchp==7?"Jackpot":"Matched".$matchp?></td>
	<td nowrap align="center"><?php 
		if($method_id[$i]=='S'){ echo "SMS"; }elseif($method_id[$i]=='T'){ echo "Terminal"; }else{ echo "Internet"; }
	?></td>
	<td nowrap align="center"><?=$win_num[$i]?></td>
	<td nowrap align="center"><?=$unclaim_date[$i]?></td>
</tr>
<?php } 
print "</table>";
}
$str.=ob_get_contents();
ob_clean();
$str.='</body></html>';

	$fp = fopen($_SITE_ROOT_PATH.'secure_admin/cp/tmp/prizes_claims_report.html', 'w');
	fwrite($fp, $str);
	fclose($fp);
	$success = "The report has been successfully generated. Please click related icon link below to view report.";
	$display = true;
} 
?>