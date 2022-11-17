<?php
$display = false;  

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Submit1'] == "Generate Report"){

//---------------------------------------------------------------------------------------------------------------------------   
$where = "";
$where1 = "";
if(trim($_POST['txtAlid'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
    $where .= " n.nl_id = '".trim($_POST['txtAlid'])."'";
	$where1 .= " n.al_id = '".trim($_POST['txtAlid'])."'";
}
if(trim($_POST['cmbCriteria'] == "ND")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " n.status='R'";
	$where1 .= " n.status='R'";
}
if(trim($_POST['cmbCriteria'] == "NR")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " n.status='D' ";
	$where1 .= " n.status='D' ";
}
if(trim($_POST['cmbCriteria'] == "DN")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " now() < n.from_time ";
	$where1 .= " now() < n.from_time ";
}
if(trim($_POST['cmbCriteria'] == "UD")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " n.status='A' and (now() between n.from_time and n.to_time) ";
	$where1 .= " n.status='A' and (now() between n.from_time and n.to_time) ";
}
if(trim($_POST['cmbCriteria'] == "CD")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " now() > n.to_time and n.status='A' ";
	$where1 .= " now() > n.to_time and n.status='A' ";
}
if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){
	$arr=explode("-",trim($_POST["txtFromDate"]));
	$fdate1=$arr[2]."-".$arr[0]."-".$arr[1];
	$arr=explode("-",trim($_POST["txtToDate"]));
	$fdate2=$arr[2]."-".$arr[0]."-".$arr[1];	
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " ( date_format(n.to_time,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";
	$where1 .= " ( date_format(n.to_time,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";	
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
<p class="rphead">Draw Naira Lotto Reports</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>NL-ID</th><th>Month/Year</th><th>Start</th><th>Ends</th><th>Jackpot</th><th>Status</th><th>Entries</th></tr>
<?php
$i=1;
$_sql = "SELECT n.naira_id,month_year,date_format(from_time,'%d-%b-%Y %H:%i') as from_time,
 date_format(to_time,'%d-%b-%Y %H:%i') as to_time,n.status,gcm.value2,nl_id,match6,count(naira_entry_ticket.nt_id) as entries, 
 if(n.status='A' and now()<n.from_time,'Draw Not Open',(if(n.status='A' and now()>n.to_time,'Completed Draw',if(now() between n.from_time and n.to_time,'Current Draw',if(n.status='S', 'Suspended Draw',if(n.status='R', 'Notified Draw',if(n.status='D', 'Notified Results',''))))))) status 
FROM naira_lotto n LEFT JOIN naira_entry on naira_entry.naira_id=n.naira_id
LEFT JOIN naira_entry_ticket on naira_entry_ticket.entry_id=naira_entry.entry_id	
LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2)		
".$where." GROUP BY n.naira_id ORDER BY n.naira_id desc "; 
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 
	
	$val=$rs->fields;
	$month_year= explode(",",$val['month_year']);
	$year =$month_year[1];
	$month =$month_year[0];
?>
<tr bgcolor="#ffffff" class="rptext"> 
	<td nowrap align="center"><?=$i++?>
	</td>
	<td nowrap align="center"><?=$val['nl_id']?>
	</td>
	<td nowrap align="center"><?=$val['value2']?>
	  / 
	  <?=$year?>
	</td>
	<td nowrap align="center"><?=$val['from_time']?></td>
	<td nowrap align="center"><?=$val['to_time']?>
	</td>
	<td nowrap align="right" class="text13" style="padding-right:5px;"> 
	  <?=$val['match6']?>
	</td>
	<td nowrap align="left" style="padding-left:5px;"><?=$val['status']?></td>
	<td nowrap align="center"><?=$val['entries']?>
	</td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
?>
</table>
<p class="rphead">Draw Afro Millions Report</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>AL-ID</th><th>Month/Year</th><th>Start</th><th>Ends</th><th>Jackpot</th><th>Status</th><th>Entries</th></tr>
<?php
$i=1;
$_sql = "SELECT n.afro_id,month_year,date_format(from_time,'%d-%b-%Y %H:%i') as from_time,
date_format(to_time,'%d-%b-%Y %H:%i') as to_time,n.status,gcm.value2,al_id,match7,count(afro_entry_ticket.nt_id) as entries,
if(n.status='A' and now()<n.from_time,'Draw Not Open',(if(n.status='A' and now()>n.to_time,'Completed Draw',if(now() between n.from_time and n.to_time,'Current Draw',if(n.status='S', 'Suspended Draw',if(n.status='R', 'Notified Draw',if(n.status='D', 'Notified Results',''))))))) status
FROM afro_lotto n LEFT JOIN afro_entry on afro_entry.afro_id=n.afro_id LEFT JOIN afro_entry_ticket on afro_entry_ticket.entry_id=afro_entry.entry_id 	
LEFT JOIN gcm ON gcm.condition=substring(month_year,1,2) ".$where1." GROUP BY n.afro_id ORDER BY n.afro_id desc "; 
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 
	
	$val=$rs->fields;
	$month_year= explode(",",$val['month_year']);
	$year =$month_year[1];
	$month =$month_year[0];
?>
<tr bgcolor="#ffffff" class="rptext"> 
	<td nowrap align="center"><?=$i++?>
	</td>
	<td nowrap align="center"><?=$val['al_id']?>
	</td>
	<td nowrap align="center"><?=$val['value2']?>
	  / 
	  <?=$year?>
	</td>
	<td nowrap align="center"><?=$val['from_time']?></td>
	<td nowrap align="center"><?=$val['to_time']?>
	</td>
	<td nowrap align="right" class="text13" style="padding-right:5px;"> 
	  <?=$val['match7']?>
	</td>
	<td nowrap align="left" style="padding-left:5px;"><?=$val['status']?></td>
	<td nowrap align="center"><?=$val['entries']?>
	</td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
$str.=ob_get_contents();
ob_clean();
$str.='</table></body></html>';

	$fp = fopen($_SITE_ROOT_PATH.'secure_admin/cp/tmp/draw_report.html', 'w');
	fwrite($fp, $str);
	fclose($fp);
	$success = "The report has been successfully generated. Please click related icon link below to view report.";
	$display = true;
} 
?>