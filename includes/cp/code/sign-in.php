<?php 

if($_APP_LIVE=="Y") $_GET["pvs"]=finding_id_from_url("pvs",$_DELIM);

//Get per line price

$sql="select value from gcm where condition_type='PASSPOLICY' and condition='MAX_LEN'";
$rs= $_CONN->Execute($sql);
if($rs && !$rs->EOF)
  $password_max_length=$rs->fields["value"];
if($rs) $rs->close();

if($_SERVER['REQUEST_METHOD'] == "POST") {
	if (trim($_POST["txtUsername"])=="") { 
		$_MSG[1] = "<font   size='2'><img src='".$_DIR['site']['url']."/images/arrow.gif'> Enter name.</font>";
		$error = 1;
	} 
	if (trim($_POST["txtPassword"])=="") {
		$_MSG[2] =  "<font   size='2'><img src='".$_DIR['site']['url']."/images/arrow.gif'> Enter pass.</font>";
		$error = 1;
	} //if (trim($_POST["userpass"])=="")
	elseif(strlen(trim($_POST["txtPassword"]))<4 || strlen(trim($_POST["txtPassword"]))>15)
	{
		$_MSG[2] = "<span >Password between 4-20 characters.</span>";
		$error = 1;
	}
	
	if(!$error){
	{ 
			$_query ="select 
				login_info.username,users.fname,login_info.user_id,date_format(login_info.lastlogin_date,'%D %M %Y')as lastlogin 
			from 
				login_info inner join users on users.user_id=login_info.user_id 
			where 	login_info.status='A' and  
					login_info.username 		= '".trim($_POST['txtUsername'])."' 
				and login_info.password 		= '".trim($_POST['txtPassword'])."'
				and usertype					= 'MEMBER'";							
				
				
			$loginInfo = $_CONN->getAssoc($_query);
			if(is_array($loginInfo) && count($loginInfo) == 1 && $loginInfo[$_POST['txtUsername']]['username'] == trim($_POST['txtUsername'])){  
					$_SESSION['login']['userid'] 	   =  $loginInfo[$_POST['txtUsername']]['user_id'];					

					if($_GET["pvs"]) $loginredirect = $_DIR["site"]["url"]."sign-in-step2".$atend."pvs".$_DELIM.$_GET["pvs"].$baratend;
					else $loginredirect = $_DIR["site"]["url"]."sign-in-step2".$atend;
					@header("Location: $loginredirect");
					exit();
				}else{    
					$success="Invalid Username or Password. please try again.";
				}			
		}
	}
	}
?>	