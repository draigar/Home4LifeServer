<?php 
$showDetail=false;
$oneAdmin= false;
$twoAdmin= false;
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Fetch" || $_POST['Input']=="Draw Result"){ 
	if (trim($_POST["cmbNaira"])=="") {
		$_MSG[] = " Please select Naira Lotto.";
		$error = 1;
	}
	
 	if(empty($error)){
		$showDetail=true;
		$sql="select naira_lotto.naira_id,naira_lotto.nl_id,
			  date_format(naira_lotto.from_time,'%D-%b-%Y %H:%i') as from_time,date_format(naira_lotto.to_time,'%D-%b-%Y %H:%i') as to_time,
			  month_year,match6,total_amount,vision_winning_amount,gcm.value2,substring(month_year,4,4) as year,
			  count(naira_entry_ticket.nt_id) as entries from naira_lotto 
			  LEFT JOIN naira_entry on naira_entry.naira_id=naira_lotto.naira_id 
			  LEFT JOIN naira_entry_ticket on (naira_entry_ticket.entry_id=naira_entry.entry_id and naira_entry_ticket.cancel='N')
			  left join gcm on gcm.condition=substring(month_year,1,2)
			  where naira_lotto.naira_id=".$_POST['cmbNaira']." GROUP BY naira_lotto.naira_id";
		$rs =$_CONN->Execute($sql);
		if($rs && !$rs->EOF){
				$naira_id			=$rs->fields['naira_id'];
				$nl_id				=$rs->fields['nl_id'];
				$from_time			=$rs->fields['from_time'];
				$to_time			=$rs->fields['to_time'];
				$month_year			=$rs->fields['value2']."/".$rs->fields['year'];
				$match6				=sprintf("%1.2f",$rs->fields['match6']);
				$total_amount		=sprintf("%1.2f",$rs->fields['total_amount']);
				$vision_amount		=sprintf("%1.2f",$rs->fields['vision_winning_amount']);
				$entries			=$rs->fields['entries'];
		}	
		if($rs)		$rs->close();
	}
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Draw Result") { 
	$dnumber="";
	for($i=0;$i<=5;$i++){	
		if (trim($_POST["txtDrawNum".$i])=="") $dnumber .= ($dnumber?", ":"").($i+1);
	}
	if($dnumber) {
		$_MSG[] = " Please enter $dnumber Draw Number.";
		$error = 1;
	}
	if($vision_amount && $vision_amount!="0.00") {
		$dnumber="";
		for($i=0;$i<=6;$i++){	
			if (trim($_POST["txtVisiNum".$i])=="") $dnumber .= ($dnumber?", ":"").($i+1);
		}
		if($dnumber) {
			$_MSG[] = " Please enter $dnumber Winning Vision Number.";
			$error = 1;
		} 
	}
	if (trim($_POST["txtFAdminId"])=="") {
		$_MSG[] = " Please enter 1st Admin User ID.";
		$error = 1;
	}
	if (trim($_POST["txtFAdminPaswrd"])=="") {
		$_MSG[] = " Please enter 1st Admin User Password.";
		$error = 1;
	}
	if(trim($_POST["txtFAdminId"])!="" && trim($_POST["txtFAdminPaswrd"])!=""){
		$sql="select login_info.user_id from login_info,users where login_info.user_id=users.user_id AND login_info.username='".trim($_POST["txtFAdminId"])."' and login_info.password='".md5(trim($_POST["txtFAdminPaswrd"]))."' and users.usertype='ADMIN' and users.status='A'";
		$rs= $_CONN->Execute($sql);
		if(!$rs || $rs->EOF){
			$_MSG[] = " Invalid 1st Admin User ID or password.";
			$error=1;
		}else{
			$oneAdmin= true;
		}
	}

	if (trim($_POST["txtSAdminId"])=="") {
		$_MSG[] = " Please enter 2nd Admin User ID.";
		$error = 1;
	}
	if (trim($_POST["txtSAdminPaswrd"])=="") {
		$_MSG[] = " Please enter 2nd Admin User Password.";
		$error = 1;
	}
	if(trim($_POST["txtSAdminId"])!="" && trim($_POST["txtSAdminPaswrd"])!=""){
		$sql="select user_id from login_info where username='".trim($_POST["txtSAdminId"])."' and password='".md5(trim($_POST["txtSAdminPaswrd"]))."'";
		$rs= $_CONN->Execute($sql);
		if(!$rs || $rs->EOF){
			$_MSG[] = " Invalid 2nd Admin User ID or password.";
			$error=1;
		}else{
			$twoAdmin= true;
		}
	}
	
	if(empty($error) && $twoAdmin && $oneAdmin){
		$sql="UPDATE naira_lotto SET
			draw_number		= '".trim($_POST["txtDrawNum0"]).",".trim($_POST["txtDrawNum1"]).",".trim($_POST["txtDrawNum2"]).",".trim($_POST["txtDrawNum3"]).",".trim($_POST["txtDrawNum4"]).",".trim($_POST["txtDrawNum5"])."',
			status			= 'R',
			draw_date		= now(),
			winner_vision_number = '".trim($_POST["txtVisiNum0"]).",".trim($_POST["txtVisiNum1"]).",".trim($_POST["txtVisiNum2"]).",".trim($_POST["txtVisiNum3"]).",".trim($_POST["txtVisiNum4"]).",".trim($_POST["txtVisiNum5"]).",".trim($_POST["txtVisiNum6"])."' 
			where naira_id=".$_POST["cmbNaira"];
		if($_CONN->Execute($sql)){
			header("Location: ".$_DIR['site']['adminurl']."naira_listing".$atend."success".$_DELIM."1".$baratend);
			exit(); 
		}
	}	

}

$sql="select naira_id,concat(nl_id,' (',date_format(from_time,'%D-%b-%Y %H:%i'),') - (',date_format(to_time,'%D-%b-%Y %H:%i'),')') from naira_lotto where status='A' and now()>to_time";
//$sql="select naira_id,nl_id from naira_lotto";
$naira=getOptions($sql,@$_POST['cmbNaira']);
?> 
