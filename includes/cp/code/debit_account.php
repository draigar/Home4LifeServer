<?php 
$showDetail=false;
if($_SERVER['REQUEST_METHOD']="POST" && $_POST['Input']=="Fetch" || $_POST['Input']=="Submit") { 
	if (trim($_POST["cmbUserAgent"])=="") {
		$_MSG[] = " Please select Agent / User.";
		$error = 1;
	}	
	if (trim($_POST["txtUserId"])=="") {
		$_MSG[] = " Please enter user id.";
		$error = 1;
	}	
 	if(empty($error)) {
		if ($_POST["cmbUserAgent"]=="A") {
			$showDetail=true;
			$sql="select m.user_id,l.status,fname,lname,address1,address2,concat(phone1,' ',phone2) as phone,email
				from merchant m 
				left join merchant_info l on l.user_id = m.user_id
				left join merchant_address a on a.user_id = m.user_id
				where m.user_id='".trim($_POST["txtUserId"])."' group by m.user_id";
			$rs =$_CONN->Execute($sql);
			if($rs && !$rs->EOF){
				if($rs->fields['status']!="A") {
					$showDetail=false;
					$_MSG[] = " The agent account is inactive or suspended.";
					$error = 1;
				} else {
					$user_id      = $rs->fields['user_id'];
					$fname         = $rs->fields['fname'];
					$lname         = $rs->fields['lname'];			
					$email   		= $rs->fields['email'];
					$address1     = $rs->fields['address1'];
					$address2     = $rs->fields['address2'];
					$mobile       = $rs->fields['mobile'];
					$phone   	 = $rs->fields['phone'];
					$curent_bal  = get_balance2(trim($_POST["txtUserId"]));
				}
			}else{
				$showDetail=false;
				$_MSG[] = " Invalid Id. Please try again.";
				$error = 1;
			}	
			if($rs)	$rs->close();
		}else{
			$showDetail=true;
			$sql="select u.user_id,l.status,fname,lname,address1,address2,mobile,phone,l.username as email
				from users u
				left join login_info l on l.user_id = u.user_id
				where u.user_id='".trim($_POST["txtUserId"])."'";
			$rs =$_CONN->Execute($sql);
			if($rs && !$rs->EOF){
				if($rs->fields['status']!="A") {
					$showDetail=false;
					$_MSG[] = " The user account is inactive or closed.";
					$error = 1;
				} else {
					$user_id      = $rs->fields['user_id'];
					$fname         = $rs->fields['fname'];
					$lname         = $rs->fields['lname'];			
					$email   		= $rs->fields['email'];
					$address1     = $rs->fields['address1'];
					$address2     = $rs->fields['address2'];
					$mobile       = $rs->fields['mobile'];
					$phone   	 = $rs->fields['phone'];
					$curent_bal  = get_balance2(trim($_POST["txtUserId"]));
				}
			}else{
				$showDetail=false;
				$_MSG[] = " Invalid Id. Please try again.";
				$error = 1;
			}	
			if($rs)	$rs->close();
		}	
	}	
}

if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Submit") { 
	if (trim($_POST["txtAmount"])=="") {
		$_MSG[] = " Please enter amount to debit.";
		$error = 1;
	}	
	if (trim($_POST["txtDescription"])=="") {
		$_MSG[] = " Please enter description.";
		$error = 1;
	}
	if (trim($_POST["txtAmount"])>$curent_bal) {
		$_MSG[] = " No enough fund available in user account.";
		$error = 1;
	}	
	if(empty($error)) {
		$balance = $curent_bal - trim($_POST["txtAmount"]);
		$identifier=get_identifier_number();
		$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".trim($_POST["txtAmount"])."','".trim($_POST["txtUserId"])."','D','C','".$_POST["txtDescription"]."','".$_SESSION['login']['userid']."',0,0,'R','".$_POST["cmbUserAgent"]."','".$balance."')";
		if($_CONN->Execute($sql)) {
				$showDetail=false;
				send_email_debit_fund(trim($_POST["txtUserId"]),trim($_POST["txtAmount"]));
				$success = "The ".($_POST["cmbUserAgent"]=="U"?"User":"Agent")." account is successfully debited.";
				$_POST["txtUserId"]="";
				$_POST["txtAmount"]="";
				$_POST["txtDescription"]="";
		}
	}	
}

function get_balance2($userid) {
	global $_CONN;
	//Credited amount
	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='C' AND status='C' AND user_id='".$userid."'";							
	$rs = $_CONN->Execute($_sql);

if ($rs && $rs->RecordCount()>0) 
		$credit=$rs->fields['amount'];
	if($rs) $rs->close();
	//Debited amount
	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='D' AND status='C' AND user_id='".$userid."'";							
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0) 
		$debit=$rs->fields['amount'];
	if($rs) $rs->close();
	$balance=$credit-$debit;
	return $balance<0?"0.00":sprintf("%1.2f",$balance);
}

?> 
