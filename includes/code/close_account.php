<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Close Account"){
	//*********************************Get Email Template ************************************//
				$_sql="SELECT u.user_id,concat(u.fname,' ',u.lname) as fullname,l.username as email_id
				FROM users u,login_info l WHERE u.user_id=l.user_id and u.user_id=".$_SESSION['login']['userid'];							
				$rs = $_CONN->Execute($_sql);
				if ($rs && !$rs->EOF){ 
					$fullname=$rs->fields['fullname'];
					$user_id=$rs->fields['user_id'];
					$email_id=$rs->fields['email_id'];
				} 
				if($rs)	$rs->close();
				
				$_sql="SELECT content,subject FROM emailtemplate WHERE page_id=20";							
				$rs = $_CONN->Execute($_sql);
				if ($rs && $rs->RecordCount()>0){ 
					$msg=$rs->fields['content'];
					$subject=$rs->fields['subject'];
				} 
				if($rs)	$rs->close();
				
				$msg=str_replace("#FULLNAME#", $fullname, $msg);
				$msg=str_replace("#REASON#", stripslashes($_POST['txtReason']), $msg);
				$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
				
				//Send Email to User
				$ofEmail['to']      =  $email_id;
				$ofEmail['subject'] =  $subject;
				$ofEmail['message'] = 	stripslashes($msg);
				$ofEmail['from']    = 	$_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
				$success 			= 	sendEmail($ofEmail,true);
					
				$_sql="SELECT content,subject FROM emailtemplate WHERE page_id=21";							
				$rs = $_CONN->Execute($_sql);
				if ($rs && $rs->RecordCount()>0){ 
					$msg=$rs->fields['content'];
					$subject=$rs->fields['subject'];
				} 
				if($rs)	$rs->close();
				
				$msg=str_replace("#FULLNAME#", $fullname, $msg);
				$msg=str_replace("#USERID#", $user_id, $msg);
				$msg=str_replace("#EMAILID#", $email_id, $msg);				
				$msg=str_replace("#REASON#", stripslashes($_POST['txtReason']), $msg);
				$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
				//*********************************Get Email Template ************************************// 
				//**************************** Send MAIL CODE FOR Member ************************************				
				$ofEmail['to']      =  $_CONFIG[1]["admin_email"];
				$ofEmail['subject'] =  stripslashes($subject);
				$ofEmail['message'] =  stripslashes($msg);
				$ofEmail['from']    =  $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
				$success 			=  sendEmail($ofEmail);
				if($success){
					$_sql_pre="UPDATE login_info SET status='C' WHERE user_id=".$_SESSION['login']['userid'];
					$_CONN->Execute($_sql_pre);
					$_SESSION = array();
					session_destroy();
					header("location: ".$_DIR["site"]["url"]."index".$atend."act".$_DELIM."closed".$baratend);
					exit();
					$success="Your Request Has Been Sent To Adminstrator. Soon Your Account Will Be closed"; 
				}
}

?>