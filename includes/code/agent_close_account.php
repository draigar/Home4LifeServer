<?php
if($_SERVER['REQUEST_METHOD']=="POST"){ echo "sadsa";

	//*********************************Get Email Template ************************************//

				$_sql="SELECT m.user_id,concat(m.fname,' ',m.lname) as fullname,m.email  

				FROM merchant m,login_info l WHERE m.user_id=l.user_id and m.user_id=".$_SESSION['login']['userid'];							

				$rs = $_CONN->Execute($_sql);

				if ($rs && !$rs->EOF){ 

					$fullname=$rs->fields['fullname'];

					$user_id=$rs->fields['user_id'];

					$email_id=$rs->fields['email'];

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

					$_sql_pre="UPDATE merchant SET status='C' WHERE user_id=".$_SESSION['login']['userid'];

					$_CONN->Execute($_sql_pre);
					
					$_sql_pre1="UPDATE merchant_info SET status='C' WHERE user_id=".$_SESSION['login']['userid'];

					$_CONN->Execute($_sql_pre1);
					
					$_sql_pre2="UPDATE merchant_address SET status='C' WHERE user_id=".$_SESSION['login']['userid'];

					$_CONN->Execute($_sql_pre2);
					
					$_sql_pre3="UPDATE bank_info SET status='C' WHERE user_id=".$_SESSION['login']['userid'];

					$_CONN->Execute($_sql_pre3);

					$_SESSION = array();

					session_destroy();

					header("location: ".$_DIR["site"]["url"]."index".$atend."act".$_DELIM."closed".$baratend);

					exit();

					$success="Your Request Has Been Sent To Adminstrator. Soon Your Account Will Be closed"; 

				}

}
?>