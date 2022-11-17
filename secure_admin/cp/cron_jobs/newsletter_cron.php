<?php
include_once("../../../includes/config/application.php");
dbConnection('on');

set_time_limit(0);

$p_szBinary = false;

 $_sql="SELECT newsletter_id,title,content,sendmail_start,sendmail_end from eb_newsletter where sendmail_start=0 OR (sendmail_start=1 AND sendmail_end=0) order by newsletter_id asc";							
$rs = $_CONN->Execute($_sql);
	if ($rs && !$rs->EOF){ 		
		while(!$rs->EOF){			
			$newsletter_id=$rs->fields['newsletter_id'];
			$title=$rs->fields['title'];
			$content=$rs->fields['content'];
			$sendmail_start=$rs->fields['sendmail_start'];
			$sendmail_end=$rs->fields['sendmail_end'];
			
			if($sendmail_start=="0") {
				$_sql="UPDATE eb_newsletter SET sendmail_start=1 where newsletter_id=".$newsletter_id;
				$_CONN->Execute($_sql);
			}	
			
			
			$sql="SELECT l.user_id,l.username,concat(u.fname,' ',u.lname) as fullname FROM login_info l 
				LEFT JOIN users u ON u.user_id = l.user_id
				where l.mail_send=0";
			$rsT=$_CONN->Execute($sql);
			
			if($rsT && !$rsT->EOF){
					while(!$rsT->EOF){
						$sub_id=$rsT->fields['user_id'];
						$sub_name=$rsT->fields['fullname'];
						$sub_email=$rsT->fields['username'];
												
						$content=str_replace("#SUBSCRIBER#", $sub_name, $content);
						
						$ofEmail['to']      =  $sub_email;
						$ofEmail['subject'] =  $title;
						$ofEmail['message'] = 	stripslashes($content);
						$ofEmail['from']    = 	"Support Team:<".$_OFFICAILSITENAME.">";
						$success 		= 	sendEmail($ofEmail);
						if($success){
							$_sql="UPDATE login_info SET mail_send=1 where user_id=".$sub_id;
							$_CONN->Execute($_sql);
							$p_szBinary = true;
						}else{
							$p_szBinary = false;
						}						
						$rsT->MoveNext();
					}
			}	
			if($rsT)  
			   $rsT->close();
	
			$_sql="UPDATE eb_newsletter SET sendmail_end=1 where newsletter_id=".$newsletter_id;
			$_CONN->Execute($_sql);
			
			$_sql="UPDATE login_info SET mail_send=0";
			$_CONN->Execute($_sql);
			
			
			$rs->MoveNext();
		}
		
		
	} 
	if($rs)	$rs->close();
	
	$to = "devendrabawne@gmail.com";
if(!$p_szBinary)
	$subject = "Cron for newsletter Executed with Error!";
else
	$subject = "Cron for newsletter Executed successfully";
	
if($p_szBinary)
	$body .= "Hi,\n\Cron for newsletter  executed successfully";
else
	$body .= "Hi,\n\nCron for newsletter  failed";

mail($to, $subject, $body);	

?>