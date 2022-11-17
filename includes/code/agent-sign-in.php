<?php 
//Get per line price
$sql="select value from gcm where condition_type='PASSPOLICY' and `condition`='MAX_LEN'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $password_max_length=$rs->fields["value"];
if($rs) $rs->close();

$sql="select value from gcm where condition_type='PASSPOLICY' and `condition`='MAX_CATMPT'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $attempts=$rs->fields["value"];
if($rs) $rs->close();

if($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$_query ="select 
		merchant_info.username,merchant.fname,merchant_info.user_id,date_format(merchant_info.lastlogin_date,'%D %M %Y')as lastlogin,
		merchant.lock_user
	from 
		merchant_info inner join merchant on merchant.user_id=merchant_info.user_id 
	where 	merchant_info.status='A' and  
			merchant_info.username 		= '".trim($_POST['txtUsername'])."' 
		and merchant_info.password 		= '".trim($_POST['txtPassword'])."'";
	
	$loginInfo = $_CONN->getAssoc($_query);
	if(is_array($loginInfo) && count($loginInfo) == 1 && $loginInfo[$_POST['txtUsername']]['username'] == trim($_POST['txtUsername']))
		{  
			if($loginInfo[$_POST['txtUsername']]['lock_user']=="Y") { 
				$_MSG[1] = "Your account is locked. Please contact to site admin to unlock your account.";
				$error=1;
			} else {
				$_SESSION['login']['username'] 	   =  $loginInfo[$_POST['txtUsername']]['username'];
				$_SESSION['login']['fname'] 	   =  $loginInfo[$_POST['txtUsername']]['fname'];
				$_SESSION['login']['userid'] 	   =  $loginInfo[$_POST['txtUsername']]['user_id'];					
				$_SESSION['login']['lastdate'] 	   =  $loginInfo[$_POST['txtUsername']]['lastlogin'];
				$_SESSION['login']['usertype'] 	   =  "AGENT";
				
				$_sql = "UPDATE merchant_info SET lastlogin_date=NOW() WHERE user_id=".$_SESSION['login']['userid'];
				$_CONN->Execute($_sql);
				
				$sql="select user_id,email from merchant where (	
					( (reset_password_date is not null or reset_password_date!='0000-00-00' or reset_password_date!='') and date_add(reset_password_date,interval 60 day)<curdate() ) 
					or ( date_add(acc_create_date,interval 60 day)<now() )
				) and user_id=".$_SESSION['login']['userid'];
				$rs=$_CONN->Execute($sql);
				if($rs && !$rs->EOF) {
				  $email=$rs->fields["email"];	
				  $password=get_random_password();	
				  $sql="update merchant_info set password='".$password."' where user_id=".$_SESSION['login']['userid'];
				  if($_CONN->Execute($sql)) { 
						
						$sql="update merchant set reset_password_date=curdate() where user_id=".$_SESSION['login']['userid'];
						$_CONN->Execute($sql);
						
						$_sql="SELECT content FROM emailtemplate WHERE page_id=28";
						$rs = $_CONN->Execute($_sql);
						if ($rs && $rs->RecordCount()>0) $msg=$rs->fields['content'];
						if($rs)	$rs->close();
						$msg=str_replace("#USERNAME#", trim($_POST['txtUsername']), $msg);
						$msg=str_replace("#PASSWORD#", $password, $msg);				
						$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
						$ofEmail['to']      =  $email;
						$ofEmail['subject'] =  "Your New Password!!";
						$ofEmail['message'] = 	stripslashes($msg);
						$ofEmail['from']    = 	$_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
						sendEmail($ofEmail,true);
						
				  } 
				}
				if($rs) $rs->close();
				
				$loginredirect = $_DIR["site"]["url"]."agent-account".$atend;
				@header("Location: $loginredirect");
				exit();
			}			
		}
	else
		{    
			$_SESSION["AGENTATTEMPTS"]++;
			if($_SESSION["AGENTATTEMPTS"]>$attempts) { 			
				$sql="select user_id from merchant_info where username='".trim($_POST['txtUsername'])."'";
				$rs=$_CONN->Execute($sql);
				if($rs && !$rs->EOF) {
				  $sql="update merchant set lock_user='Y' where user_id=".$rs->fields["user_id"];
				  if($_CONN->Execute($sql)) { 
				  	$_MSG[1] = "Your maximum consecutive attempts for login exceeded and your account is now locked. Please contact to site admin.";
					$error=1;
				  }
				}
				if($rs) $rs->close();
			}
			if(!$error) {
				$_MSG[1] = "Invalid Username or Password. please try again.";
				$error=1;
			}
		}			

}
?>