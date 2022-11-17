<?php 
$showDetail=false;
$oneAdmin= false;
$twoAdmin= false;
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Fetch" || $_POST['Input']=="Draw Result"){ 
	if (trim($_POST["cmbAfro"])=="") {
		$_MSG[] = " Please select Afro Lotto.";
		$error = 1;
	}
	
 	if(empty($error)){
		$showDetail=true;
		$sql="select afro_lotto.afro_id,afro_lotto.al_id,
			  date_format(afro_lotto.from_time,'%D-%b-%Y %H:%i') as from_time,date_format(afro_lotto.to_time,'%D-%b-%Y %H:%i') as to_time,
			  month_year,match7,total_amount,vision_winning_amount,gcm.value2,substring(month_year,4,4) as year,
			  count(afro_entry_ticket.nt_id) as entries from afro_lotto 
			  LEFT JOIN afro_entry on afro_entry.afro_id=afro_lotto.afro_id 
			  LEFT JOIN afro_entry_ticket on (afro_entry_ticket.entry_id=afro_entry.entry_id and afro_entry_ticket.cancel='N')
			  left join gcm on gcm.condition= substring(month_year,1,2)
			  where afro_lotto.afro_id=".$_POST['cmbAfro']." GROUP BY afro_lotto.afro_id";
		$rs =$_CONN->Execute($sql);
		if($rs && !$rs->EOF){
				$afro_id			=$rs->fields['afro_id'];
				$al_id				=$rs->fields['al_id'];
				$from_time			=$rs->fields['from_time'];
				$to_time			=$rs->fields['to_time'];
				$month_year			=$rs->fields['value2']."/".$rs->fields['year'];
				$match7				=sprintf("%1.2f",$rs->fields['match7']);
				$total_amount		=sprintf("%1.2f",$rs->fields['total_amount']);
				$vision_amount		=sprintf("%1.2f",$rs->fields['vision_winning_amount']);
				$entries			=$rs->fields['entries'];
		}	
		if($rs)	$rs->close();
	}
	if($_POST['Input']=="Fetch") {
		$raffle=array(); $m=1;
		$sql="select vision_numbers from afro_entry where (vision_numbers!='') and afro_id=".$afro_id;
		$rs=$_CONN->Execute($sql);
		while(!$rs->EOF) { 
			$raffle[$m]=$rs->fields["vision_numbers"];
			$rs->MoveNext(); $m++;
		}
		if($rs)	$rs->close();
		srand((double)microtime()*1000000);
		$key=rand(1,$m--);
		$_POST['txtVisiNum0']=substr($raffle[$key],0,1);
		$_POST['txtVisiNum1']=substr($raffle[$key],1,1);
		$_POST['txtVisiNum2']=substr($raffle[$key],2,1);
		$_POST['txtVisiNum3']=substr($raffle[$key],3,1);
		$_POST['txtVisiNum4']=substr($raffle[$key],4,1);
		$_POST['txtVisiNum5']=substr($raffle[$key],5,1);
		$_POST['txtVisiNum6']=substr($raffle[$key],6,1);
	}
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Draw Result") { 
	$dnumber="";
	for($i=0;$i<=6;$i++){	
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
		$sql="UPDATE afro_lotto SET
			draw_number		='".trim($_POST["txtDrawNum0"]).",".trim($_POST["txtDrawNum1"]).",".trim($_POST["txtDrawNum2"]).",".trim($_POST["txtDrawNum3"]).",".trim($_POST["txtDrawNum4"]).",".trim($_POST["txtDrawNum5"]).",".trim($_POST["txtDrawNum6"])."', 
			status			='R',
			draw_date		=now(),
			winner_vision_number = '".trim($_POST["txtVisiNum0"]).",".trim($_POST["txtVisiNum1"]).",".trim($_POST["txtVisiNum2"]).",".trim($_POST["txtVisiNum3"]).",".trim($_POST["txtVisiNum4"]).",".trim($_POST["txtVisiNum5"]).",".trim($_POST["txtVisiNum6"])."' 
			where afro_id=".$_POST["cmbAfro"];
		if($_CONN->Execute($sql)){
			header("Location: ".$_DIR['site']['adminurl']."afro_listing".$atend."success".$_DELIM."1".$baratend);
			exit(); 
		}
	}	

}

$sql="select afro_id,concat(al_id,' (',date_format(from_time,'%D-%b-%Y %H:%i'),') - (',date_format(to_time,'%D-%b-%Y %H:%i'),')') from afro_lotto where status='A' and now()>to_time";
//$sql="select afro_id,al_id from afro_lotto";
$afro=getOptions($sql,@$_POST['cmbAfro']);
?>