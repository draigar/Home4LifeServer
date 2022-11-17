<?php
$display = false;  

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Submit1'] == "Generate Report"){

//---------------------------------------------------------------------------------------------------------------------------   
$where = "";
if(trim($_POST['txtAlid'])){
	$where .= " and n.user_id = '".trim($_POST['txtAlid'])."'";
}
//credit by admin
if(trim($_POST['cmbCriteria'] == "CA")){
	$where .= " and n.added_by!='' and n.added_by!=0 and n.nt_id=0 ";
}
//refund
if(trim($_POST['cmbCriteria'] == "RF")){
	$where .= " and n.status='R' ";	
}
//transfer
if(trim($_POST['cmbCriteria'] == "TN")){
	$where .= " and n.which='T' ";
}
if(trim($_POST['cmbCriteria'] == "AF")){
	$where .= " and n.which='D' ";
}

if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])){
	$arr=explode("-",trim($_POST["txtFromDate"]));
	$fdate1=$arr[2]."-".$arr[0]."-".$arr[1];
	$arr=explode("-",trim($_POST["txtToDate"]));
	$fdate2=$arr[2]."-".$arr[0]."-".$arr[1];	
	if(!$where) $where .= " where "; else $where .= " and ";	
	if(!$where1) $where1 .= " where "; else $where1 .= " and ";	
	$where .= " ( date_format(n.trans_date,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";
	$where1 .= " ( date_format(n.trans_date,'%Y-%m-%d') between '".$fdate1."' and '".$fdate2."' )";	
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
<p class="rphead">Debits Report</p>
<table cellspacing="1" cellpadding="1" width="100%" bgcolor="#cccccc">
<tr class="rphead"><th>Sr No</th><th>Date/Time</th><th>Transaction ID</th><th>Decsciption</th><th>From</th><th>To</th><th>Credit</th><th>Debit</th><th>Approved By</th></tr>
<?php
$i=1;
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

			) as tox,r.user_id as approved_id,concat(r.fname,' ',r.lname) as adminuser  

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

		LEFT JOIN users r ON (r.user_id=n.vision_voucher_no and r.usertype='ADMIN')

		WHERE 

			n.status='C' and n.action='D' ".$where." 

		GROUP BY 

			n.trans_id	

		ORDER BY 

			n.trans_id desc";
$rs = $_CONN->Execute($_sql);
while(!$rs->EOF) { 	
	$val=$rs->fields;	
?>
<tr bgcolor="#ffffff" class="rptext"> 
	<td nowrap align="center"><?=$i++?></td>
	<td nowrap align="center" class="text13" style="padding-left:4px;padding-right:4px;"> 
          <?=$val['trans_date']?>
        </td>
        <td nowrap align="center" class="text13" style="padding-left:4px;padding-right:4px;"> 
          <?=$val['identifier']?>
        </td>
        <td nowrap class="text13" align="left" style="padding-left:4px;padding-right:4px;"> 
          <?=stripslashes(@$val['description'])?>
          <?php if($val['which']=="N"){ echo @$val['nticket']; }elseif($val['which']=="A"){ echo @$val['aticket'];} ?>
        </td>
        <td nowrap align="left" class="text13" style="padding-left:4px;padding-right:4px;"> 
          <?php if($val['fromx']!="BW") { 
			if(substr($val['fromx'],0,2)=="a_" || substr($val['fromx'],0,2)=="u_" || substr($val['fromx'],0,2)=="m_") {
				$arr=array();
				$arr=explode('_',$val['fromx']);
				$tlen=count($arr);
				$fromx="";
				for($t=2;$t<$tlen;$t++) 
					$fromx.=$arr[$t];			
		?>
          <font size="2"> 
          <?=stripslashes($fromx)?>
          </font>
          <?php } else { ?>
          <font size="2"> 
          <?=stripslashes($val['fromx'])?>
          </font> 
          <?php } } else { 
			$arr=array();
			$arr=explode('_',$val['tox']);
			$tlen=count($arr);
			$tox="";
			for($t=2;$t<$tlen;$t++) 
				$tox.=$arr[$t];
		?>
          <font size="2"> 
          <?=stripslashes($tox)?>
          </font> 
          <?php } ?>
        </td>
        <td nowrap class="text13" align="left" style="padding-left:4px;padding-right:4px;"> 
          <?php if($val['tox']=="Admin") { ?>
          Admin 
          <?php } else { 
				$arr=array();
				$arr=explode('_',$val['tox']);
				$tlen=count($arr);
				$tox="";
				for($t=2;$t<$tlen;$t++) 
					$tox.=$arr[$t];
			?>
          <?=stripslashes($tox)?>
          <?php } ?>
        </td>
        <td nowrap class="text13" align="right" style="padding-right:4px;"> 
          <?=@$val['action']=="C"?number_format($val['amount'],2):""?>
        </td>
        <td nowrap class="text13" align="right" style="padding-right:4px;"> 
          <?=@$val['action']=="D"?number_format($val['amount'],2):""?>
        </td>
        <td nowrap class="text13" align="right" style="padding-right:4px;">
          <font size="2"> 
          <?=stripslashes($val['adminuser'])?>
          </font>
		</td>
</tr>
<?php
	$rs->MoveNext();
}
if($rs) $rs->close();
$str.=ob_get_contents();
ob_clean();
$str.='</table></body></html>';

	$fp = fopen($_SITE_ROOT_PATH.'secure_admin/cp/tmp/debit_report.html', 'w');
	fwrite($fp, $str);
	fclose($fp);
	$success = "The report has been successfully generated. Please click related icon link below to view report.";
	$display = true;
} 
?>