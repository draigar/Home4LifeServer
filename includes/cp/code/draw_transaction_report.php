<?php
if($_APP_LIVE=="Y") {
	$_GET["aid"]=finding_id_from_url("aid",$_DELIM);
	$_GET["act"]=finding_id_from_url("act",$_DELIM);
	$_GET["err"]=finding_id_from_url("err",$_DELIM);
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["act"]=="pdf") {
	
	$where = " where n.status='C' ";
	if(trim($_POST['cmbLotto'])){
		$where .= " and which = '".trim($_POST['cmbLotto'])."'";
	}
	if(trim($_POST['txtTicketNo'])){
		$where .= " and (

				(n.which='N' and t.ticket_no = '".trim($_POST['txtTicketNo'])."')

				OR 

				(n.which='A' and a.ticket_no = '".trim($_POST['txtTicketNo'])."')

			)";
	}
	if(trim($_POST['txtToDate'])){
		$dateAray= explode("-",trim($_POST['txtFromDate']));
		$date= $dateAray[2]."-".$dateAray[0]."-".$dateAray[1];
		$dateAray2= explode("-",trim($_POST['txtToDate']));
		$todate= $dateAray2[2]."-".$dateAray2[0]."-".$dateAray2[1];
	    $where .= " and ( date_format(n.trans_date,'%Y-%m-%d') between '".$date."' and '".$todate."' )";
	}
	
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

		".$where."

		GROUP BY 

			n.trans_id	

		ORDER BY 

			".$orderByClause;
	$rs=$_CONN->Execute($_sql);
	
	$_HEADER = "<TR><TH>Date/Time</TH><TH>Transaction ID</TH><TH>Decsciption</TH><TH>From</TH><TH>To</TH><TH>Credit</TH><TH>Debit</TH>
                <TH>Approved By</TH></TR>"; 

ob_start();
?>
<TABLE width="100%" class=t_list_bg cellspacing=1 cellpadding=6 bgcolor="#B7E6CC" align="left">
      <?=$_HEADER?>
<?php

	while(!$rs->EOF) {   
	
		$val=$rs->fields;
		
?>
      <tr> 
         <td align="center" bgcolor="#FFFFFF"> 
          <?=$val['trans_date']?>
        </td>
         <td align="center" bgcolor="#FFFFFF"> 
          <?=$val['identifier']?>
        </td>
         <td align="left" bgcolor="#FFFFFF"> 
          <?=stripslashes(@$val['description'])?>
          <?php if($val['which']=="N"){ echo @$val['nticket']; }elseif($val['which']=="A"){ echo @$val['aticket'];} ?>
        </td>
        <td align="left" bgcolor="#FFFFFF"> 
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
          <?php } ?>&nbsp;
        </td>
        <td align="left" bgcolor="#FFFFFF"> 
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
          
          <?php } ?>&nbsp;
        </td>
        <td align="right" bgcolor="#FFFFFF"> 
          <?=@$val['action']=="C"?number_format($val['amount'],2):""?>&nbsp;
        </td>
        <td align="right" bgcolor="#FFFFFF"> 
          <?=@$val['action']=="D"?number_format($val['amount'],2):""?>&nbsp;
        </td>
        <td align="right" bgcolor="#FFFFFF">  
          <font size="2"> 
          <?=stripslashes($val['adminuser'])?>&nbsp;
          </font>  </td>
      </tr>
      <?php		
		
		$rs->MoveNext();
	}
	
?>	
</table>
<?php
if($rs) $rs->close();
	
$str=ob_get_contents();
ob_clean();

$tmpfile = tempnam("tmp", "dompdf_");
file_put_contents($tmpfile, $str); // Replace $smarty->fetch()
                                                // with your HTML string

$url = $_DIR['site']['adminurl']."dompdf.php?input_file=" . rawurlencode($tmpfile) .
       "&orientation=landscape&paper=letter&output_file=" . rawurlencode("My Fancy PDF.pdf");

header("location: ".$url);
exit();
}

if(empty($_POST['id']))
	$_POST['id'] = $_GET['id'];

if(empty($_POST["num"]))
   $_POST["num"]=$_GET["num"];



//==============Code added by Jay=========================

	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number

	if($postCurrentPageNum == "")												//If no page number exist then consider it first page

		{$postCurrentPageNum = 1;}																										

	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:$_REC_PER_PAGE);   												//Numbers of reults needs to be displayed in every pages

	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20

	$getAllIdsqry 			= $_DIR['admininc']['queries']."getcomp_transactionids.sql";	//This will spcify the fiel which will give us only the ids of the country

	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query

	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated

	$getDataByIdsqry 		= $_DIR['admininc']['queries']."getcomp_transactionbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string

	$doPrevNext 			= true;												//This says do we need next and previous button

	$hiddenPostVar			= array("num"=>$_POST["num"],"&id"=>$_POST["id"]);											//This will have name=>value pair of additional hidden form fields to be passed

	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |



	//Now pass these parameters to pagination function

	$pageAndData = finalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);

//==========Code added by Jay end========================



$_sql="select `condition`,value from gcm where condition_type='MONTHS' order by `condition`";

$month=getOptions($_sql,$_POST['cmbMonth']);		



//Check for err variable available in querystring

if ($_GET["err"]==1) {

	$_MSG[] = "Invalid Record Id, Please Try Again With Valid Id.";

	$error  = 1;

}

if ($_GET["success"]==1)

	$success = "Afro Lotto Has Been Successfully Suspended.";

?>