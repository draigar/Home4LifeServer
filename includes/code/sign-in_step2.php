<?php 
if($_APP_LIVE=="Y") $_GET["pvs"]=finding_id_from_url("pvs",$_DELIM);

if($_SERVER['REQUEST_METHOD'] != "POST") { 
	header("Location: ".$_DIR["site"]["url"]."sign-in".$atend);
	exit();
}

$sql="select value from gcm where condition_type='PASSPOLICY' and `condition`='MAX_CATMPT'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $attempts=$rs->fields["value"];
if($rs) $rs->close();

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["hidAction"] == 1) {
	
	$_query ="select 
		login_info.username,users.fname,login_info.user_id,date_format(login_info.lastlogin_date,'%D %M %Y')as lastlogin,
		users.lock_user 
	from 
		login_info inner join users on users.user_id=login_info.user_id 
	where 	login_info.status='A' and  
			login_info.username 		= '".trim($_POST['txtUsername'])."' 
		and login_info.password 		= '".trim($_POST['txtPassword'])."'
		and usertype					= 'MEMBER'";
	$loginInfo = $_CONN->getAssoc($_query);
	if(is_array($loginInfo) && count($loginInfo) == 1 && $loginInfo[$_POST['txtUsername']]['username'] == trim($_POST['txtUsername']))
		{  
			if($loginInfo[$_POST['txtUsername']]['lock_user']=="Y") { 
				header("Location: ".$_DIR["site"]["url"]."sign-in".$atend."err".$_DELIM."locked".$baratend.($_GET["pvs"]?"pvs".$_DELIM.$_GET["pvs"].$baratend:""));
				exit();
			}
			$_SESSION['login']['userid'] 	   =  $loginInfo[$_POST['txtUsername']]['user_id'];			
			
			
			$sql="select user_id from users where (	
				( (reset_password_date is not null or reset_password_date!='0000-00-00' or reset_password_date!='') and date_add(reset_password_date,interval 60 day)<curdate() ) 
				or ( date_add(create_date,interval 60 day)<now() )
			) and user_id=".$loginInfo[$_POST['txtUsername']]['user_id'];
			$rs=$_CONN->Execute($sql);
			if($rs && !$rs->EOF) {
			  $password=get_random_password();	
			  $sql="update login_info set password='".$password."' where user_id=".$loginInfo[$_POST['txtUsername']]['user_id'];
			  if($_CONN->Execute($sql)) { 
			  		
					$sql="update users set reset_password_date=curdate() where user_id=".$loginInfo[$_POST['txtUsername']]['user_id'];
			  		$_CONN->Execute($sql);
					
					$_sql="SELECT content FROM emailtemplate WHERE page_id=28";
					$rs = $_CONN->Execute($_sql);
					if ($rs && $rs->RecordCount()>0) $msg=$rs->fields['content'];
					if($rs)	$rs->close();
					$msg=str_replace("#USERNAME#", trim($_POST['txtUsername']), $msg);
					$msg=str_replace("#PASSWORD#", $password, $msg);				
					$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
					$ofEmail['to']      =  $_POST['txtUsername'];
					$ofEmail['subject'] =  "Your New Password!!";
					$ofEmail['message'] = 	stripslashes($msg);
					$ofEmail['from']    = 	$_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
					sendEmail($ofEmail,true);
					
			  } 
			}
			if($rs) $rs->close();
		}
	else
		{    
			$_SESSION["ATTEMPTS"]++;
			if($_SESSION["ATTEMPTS"]>$attempts) { 			
				$sql="select user_id from login_info where username='".trim($_POST['txtUsername'])."'";
				$rs=$_CONN->Execute($sql);
				if($rs && !$rs->EOF) {
				  $sql="update users set lock_user='Y' where user_id=".$rs->fields["user_id"];
				  if($_CONN->Execute($sql)) { 
				  	header("Location: ".$_DIR["site"]["url"]."sign-in".$atend."err".$_DELIM."maxattempt".$baratend.($_GET["pvs"]?"pvs".$_DELIM.$_GET["pvs"].$baratend:""));
					exit();
				  }
				}
				if($rs) $rs->close();
			}
			header("Location: ".$_DIR["site"]["url"]."sign-in".$atend."err".$_DELIM."invalid".$baratend.($_GET["pvs"]?"pvs".$_DELIM.$_GET["pvs"].$baratend:""));
			exit();
		}			

}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["hidAction"] == 2) {
	if(!$error){

			$_query ="select 
				l.user_id,l.username,u.fname,date_format(l.lastlogin_date,'%D %M %Y')as lastlogin
			from 
				login_info l
				inner join users u on u.user_id=l.user_id 
			where 
					substring(security_code,'".$_POST['one']."' ,1) 		= '".trim($_POST['cmbOne'])."' 
				and substring(security_code,'".$_POST['two']."',1) 		= '".trim($_POST['cmbTwo'])."' 
				and substring(security_code,'".$_POST['three']."',1) 		= '".trim($_POST['cmbThree'])."' 	
				and l.user_id 		= '".$_SESSION['login']['userid']."'
				and l.status='A' and usertype = 'MEMBER'";
			$loginInfo = $_CONN->getAssoc($_query);
			if(is_array($loginInfo) && count($loginInfo) == 1 && $loginInfo[$_SESSION['login']['userid']]['user_id'] == $_SESSION['login']['userid'])
				{  
					
					$_SESSION['login']['username'] 	   =  $loginInfo[$_SESSION['login']['userid']]['username'];
					$_SESSION['login']['fname'] 	   =  $loginInfo[$_SESSION['login']['userid']]['fname'];
					$_SESSION['login']['userid'] 	   =  $loginInfo[$_SESSION['login']['userid']]['user_id'];					
					$_SESSION['login']['lastdate'] 	   =  $loginInfo[$_SESSION['login']['userid']]['lastlogin'];
					$_SESSION['login']['usertype'] 	   =  "MEMBER";
					
					$_sql = "UPDATE login_info SET lastlogin_date=NOW() WHERE user_id=".$_SESSION['login']['userid'];
					$_CONN->Execute($_sql);
					$_SESSION["ATTEMPTS"]=null;
					if($_GET["pvs"]) $loginredirect = $_DIR["site"]["url"].$_GET["pvs"].$atend;
					else $loginredirect = $_DIR["site"]["url"]."my_account".$atend;
					@header("Location: $loginredirect");
					exit();
				}
			else
				{    
					$_SESSION["ATTEMPTS"]++;
					if($_SESSION["ATTEMPTS"]>$attempts) { 			
						$sql="update users set lock_user='Y' where user_id=".$_SESSION['login']['userid'];
					    if($_CONN->Execute($sql)) { 
						  header("Location: ".$_DIR["site"]["url"]."sign-in".$atend."err".$_DELIM."maxattempt".$baratend.($_GET["pvs"]?"pvs".$_DELIM.$_GET["pvs"].$baratend:""));
						  exit();
					    }
					}
					$_MSG[1] = "Invalid security code. please try again";
					$error=1;
				}			
		}
	}
?>	