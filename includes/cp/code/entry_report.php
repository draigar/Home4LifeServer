<?php
$display = false;  

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Submit1'] == "Generate Report"){

//---------------------------------------------------------------------------------------------------------------------------   
$where = "";
$where1 = "";
if(trim($_POST['txtAlid'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
    $where .= " l.nl_id = '".trim($_POST['txtAlid'])."'";
	$where1 .= " l.al_id = '".trim($_POST['txtAlid'])."'";
}
if(trim($_POST['txtTicketNo'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
    $where .= " n.ticket_no = '".trim($_POST['txtTicketNo'])."'";
	$where1 .= " n.ticket_no = '".trim($_POST['txtTicketNo'])."'";
}
if(trim($_POST['txtUserId'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
    $where .= " e.user_id = '".trim($_POST['txtUserId'])."'";
	$where1 .= " e.user_id = '".trim($_POST['txtUserId'])."'";
}
if(trim($_POST['txtAgentID'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
    $where .= " t.agent_id = '".trim($_POST['txtAgentID'])."'";
	$where1 .= " t.agent_id = '".trim($_POST['txtAgentID'])."'";
}
if($_POST['cmbCriteria'] == "CE"){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " n.cancel='Y'";
	$where1 .= " n.cancel='Y'";
}
else { 
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " n.cancel='N'";
	$where1 .= " n.cancel='N'";
}
if($_POST['cmbCriteria'] == "IE"){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " e.method_id='I' ";
	$where1 .= " e.method_id='I' ";
}
if($_POST['cmbCriteria'] == "TE"){
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " e.method_id='T' ";
	$where1 .= " e.method_id='T' ";
}
if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){
	$arr=explode("-",trim($_POST["txtFromDate"]));
	$fdate1=$arr[2]."-".$arr[0]."-".$arr[1];
	$arr=explode("-",trim($_POST["txtToDate"]));
	$fdate2=$arr[2]."-".$arr[0]."-".$arr[1];	
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " ( date_format(e.date_entered,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";
	$where1 .= " ( date_format(e.date_entered,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";	
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
<p class="rphead">Draw Naira Lotto Entry Reports</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>NL-ID</th><th>Date/Time Entered</th><th>Ticket No</th><th>Method</th><th>Entries</th><th>Vision No</th></tr>
<?php
$i=1;
$_sql = "SELECT n.nt_id,l.nl_id,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,n.ticket_no,
date_format(e.date_entered,'%d%m%y') as date_entered2,e.method_id,count(c.ne_id) as entries,e.vision_numbers
FROM naira_entry_ticket n inner join naira_entry e on e.entry_id=n.entry_id 
inner join naira_lotto l on l.naira_id=e.naira_id left join naira_entry_child c on c.nt_id=n.nt_id 
left join terminal_agent t on t.term_id=e.term_id ".$where." group by n.nt_id ORDER BY n.nt_id desc";
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 
	$val=$rs->fields;
?>
<tr bgcolor="#ffffff" class="rptext">
	<td nowrap align="center"> 
	  <?=$i++?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['nl_id']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['date_entered']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['date_entered2']?>
	  - 
	  <?=$val['ticket_no']?>
	</td>
	<td nowrap align="center"> 
	  <?php 
		if($val['method_id']=='S'){ echo "SMS"; }elseif($val['method_id']=='T'){ echo "Terminal"; }else{ echo "Internet"; }
	  ?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['entries']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['vision_numbers']?"Yes":"No"?>
	</td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
?>
</table>
<p class="rphead">Draw Afro Millions Entry Report</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>AL-ID</th><th>Date/Time Entered</th><th>Ticket No</th><th>Method</th><th>Entries</th><th>Vision No</th></tr>
<?php
$i=1;
$_sql = "SELECT n.nt_id,l.al_id,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,n.ticket_no,
date_format(e.date_entered,'%d%m%y') as date_entered2,e.method_id,count(c.ne_id)as entries,e.vision_numbers
FROM afro_entry_ticket n inner join afro_entry e on e.entry_id=n.entry_id 
inner join afro_lotto l on l.afro_id=e.afro_id left join afro_entry_child c on c.nt_id=n.nt_id 
left join terminal_agent t on t.term_id=e.term_id ".$where1." group by n.nt_id ORDER BY n.nt_id desc";
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 	
	$val=$rs->fields;
?>
<tr bgcolor="#ffffff" class="rptext"> 
	<td nowrap align="center"> 
	  <?=$i++?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['al_id']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['date_entered']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['date_entered2']?>
	  - 
	  <?=$val['ticket_no']?>
	</td>
	<td nowrap align="center"> 
	  <?php 
		if($val['method_id']=='S'){ echo "SMS"; }elseif($val['method_id']=='T'){ echo "Terminal"; }else{ echo "Internet"; }
	  ?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['entries']?>
	</td>
	<td nowrap align="center"> 
	  <?=$val['vision_numbers']?"Yes":"No"?>
	</td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
$str.=ob_get_contents();
ob_clean();
$str.='</table></body></html>';

	$fp = fopen($_SITE_ROOT_PATH.'secure_admin/cp/tmp/entry_report.html', 'w');
	fwrite($fp, $str);
	fclose($fp);
	$success = "The report has been successfully generated. Please click related icon link below to view report.";
	$display = true;
} 
?>