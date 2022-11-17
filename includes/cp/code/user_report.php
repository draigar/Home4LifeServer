<?php
$display = false;  

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Submit1'] == "Generate Report"){

//---------------------------------------------------------------------------------------------------------------------------   
$where = "";
$having = "";
if(trim($_POST['txtUserID'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
    $where .= " u.user_id = '".trim($_POST['txtUserID'])."'";
}
if(trim($_POST['cmbCriteria'] == "AA")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " u.status='A'";
}
if(trim($_POST['cmbCriteria'] == "SA")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " u.status='S'";
}
if(trim($_POST['cmbCriteria'] == "CA")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " u.status='C'";
}
if(trim($_POST['cmbCriteria'] == "OA")){
	$having .= " having debit>credit ";
}
if($_POST['cmbState']){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " u.state_id='".$_POST['cmbState']."'";
}
if($_POST['cmbLga']){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " u.city_id='".$_POST['cmbLga']."'";
}
if(trim($_POST['cmbCriteria'] == "A3")){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= " date_format(l.lastlogin_date,'%Y-%m-%d')<=date_sub(curdate(),interval 3 month) ";
}
if(trim($_POST['txtKeyword'])){
	if(!$where) $where .= " where "; else $where .= " and ";	
	$where .= $_POST['cmbSearchOption']." like '%".trim($_POST['txtKeyword'])."%' ";
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
<p class="rphead">User Report</p>
<table cellspacing="1" cellpadding="4" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th nowrap>Sr No</th><th nowrap>User ID</th><th nowrap>Username</th><th nowrap>Name</th><th nowrap>Status</th><th nowrap>Verified</th><th nowrap>Date of Birth</th><th>Gender</th><th>Mobile No.</th><th nowrap>Address</th><th nowrap>City/Town</th><th nowrap>State</th><th nowrap>LGA</th><th nowrap>Register Date</th><th nowrap>Last Login Date</th></tr>
<?php
$i=1;
$_sql = "SELECT u.user_id,l.username,concat(u.title,' ',u.fname,' ',u.lname) as name,
u.status,u.member_status,gender,mobile,address1,address2,city_id,state_id,
date_format(u.birthdate,'%d-%b-%Y') as birthdate,date_format(u.create_date,'%d-%b-%Y') as createdate, 
date_format(l.lastlogin_date,'%d-%b-%Y') as lastlogin,sum(t1.amount) as credit,sum(t2.amount) as debit 
FROM users u LEFT JOIN login_info l ON u.user_id=l.user_id 
LEFT JOIN transaction t1 ON (t1.user_id=u.user_id and t1.action='C' and t1.status='C') 
LEFT JOIN transaction t2 ON (t2.user_id=u.user_id and t2.action='D' and t2.status='C') 
".$where." GROUP BY u.user_id ".$having." ORDER BY u.user_id asc"; 
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 
	
	$val=$rs->fields;
	$month_year= explode(",",$val['month_year']);
	$year =$month_year[1];
	$month =$month_year[0];
?>
<tr bgcolor="#ffffff" class="rptext">
  <td nowrap align="center"><?=$i++?></td>
  <td nowrap align="center"><?=stripslashes($val['user_id'])?></td>
  <td nowrap align="left"><?=stripslashes($val['username'])?></td>
  <td nowrap align="left"><?=stripslashes($val['name'])?></td>
  <td nowrap align="left"><?=($val['status']=="A"?"Active":($val['status']=="S"?"Suspended":($val['status']=="C"?"Cancelled":"In Active")))?></td>
  <td nowrap align="left"><?=$val['member_status']=="U"?"No":"Yes"?></td>
  <td nowrap align="left"><?=$val['birthdate']?></td>
  <td nowrap align="left"><?=$val['gender']=="M"?"Male":"Female"?></td>
  <td nowrap align="left"><?=stripslashes($val['mobile'])?></td>
  <td nowrap align="left"><?=stripslashes($val['address1'])?></td>
  <td nowrap align="left"><?=stripslashes($val['address2'])?></td>
  <td nowrap align="left"><?=stripslashes($val['city_id'])?></td>
  <td nowrap align="left"><?=stripslashes($val['state_id'])?></td>
  <td nowrap align="left"><?=$val['createdate']?></td>
  <td nowrap align="left"><?=$val['lastlogin']?></td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
?>
</table>
<?php
$str.=ob_get_contents();
ob_clean();
$str.='</body></html>';

	$fp = fopen($_SITE_ROOT_PATH.'secure_admin/cp/tmp/user_report.html', 'w');
	fwrite($fp, $str);
	fclose($fp);
	$success = "The report has been successfully generated. Please click related icon link below to view report.";
	$display = true;
} 
?>