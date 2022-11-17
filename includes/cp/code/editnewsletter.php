<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["cmbaddpage"] > 1 && $_POST["Input"] != "Save To Draft"){
	 $sql="select * from eb_newsletter where newsletter_id=".$_POST["cmbaddpage"];
	$rs=$_CONN->Execute($sql);
	if(!$rs && $rs->EOF){
		if($rs)	$rs->close();
		if($_CONN) $_CONN->close();
	}else{
		$_POST["cmbaddpage"]	=$rs->fields['newsletter_id'];	
		$_POST["txtTitle"]		=stripslashes($rs->fields['title']);
		$_POST["pageContent2"]	=stripslashes($rs->fields['short_desc']);
		$_POST["pageContent"]	=stripslashes($rs->fields['content']);
		$_POST["txtSubject"]	=$rs->fields['subject'];
		$_POST["txtChkMail"]	=$rs->fields['test_email'];
		$_POST["chkSendToAgent"]	=$rs->fields['send_to_agent'];
		$_POST["chkSendToMember"]	=$rs->fields['send_to_member'];
		
	}
	if($rs)	$rs->close();
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save To Draft"){
	if (trim($_POST["cmbaddpage"])==""){ 
		$_MSG[] = "Please select newsletter.";		
		$error = 1;
	} 
	if (trim($_POST["txtTitle"])==""){ 
		$_MSG[] = "Please enter title.";
		$error = 1; 
	} 
	if (trim($_POST["pageContent2"])==""){ 
		$_MSG[] = "Please enter short description.";
		$error = 1;
	}

	if (trim($_POST["pageContent"])==""){ 
		$_MSG[] = "Please enter content.";
		$error = 1;
	}
	if (trim($_POST["chkSendTo"][2])=="C" && trim($_POST["txtChkMail"])==""){ 
		$_MSG[] = "Please enter mail id.";
		$error = 1;
	}elseif(trim($_POST["txtChkMail"])!="" && !isValidEmail(trim($_POST["txtChkMail"]))){  
		$_MSG[] = "Please enter valid mail id.";
		$error = 1;
	}
	
	if (trim($_POST["txtSubject"])==""){ 
		$_MSG[] = "Please enter subject.";
		$error = 1;
	}
	if (trim($_POST["chkSendToAgent"])==""){ 
		$_POST["chkSendToAgent"]="N";
	}
	if (trim($_POST["chkSendToMember"])==""){ 
		$_POST["chkSendToMember"]="N";
	}

	if (empty($error)) {
		if($_POST["cmbaddpage"] == "N"){
			 $_sql = "INSERT INTO eb_newsletter(title,short_desc,content,test_email,create_date,send_to_agent,send_to_member,subject) 
				VALUES ('".trim(addslashes($_POST['txtTitle']))."',
						'".trim(addslashes($_POST['pageContent2']))."',
						'".trim(addslashes($_POST['pageContent']))."',
						'".trim(addslashes($_POST['txtChkMail']))."',
						now(),'".$_POST['chkSendToAgent']."','".$_POST['chkSendToMember']."',
						'".$_POST['txtSubject']."')"; 
			$isAllQueryExecuted = $_CONN->Execute($_sql);
			if($isAllQueryExecuted){
				$success = "A new Newsletter has been successfully Saved.";
				$_POST["cmbaddpage"] = 	$_CONN->Insert_ID();		
			}
		}else{  	
			 $_sql = "UPDATE eb_newsletter SET 
						title			='".trim(addslashes($_POST['txtTitle']))."',
						short_desc		='".trim(addslashes($_POST['pageContent2']))."',
						content			='".trim(addslashes($_POST['pageContent']))."',
						test_email		='".trim(addslashes($_POST['txtChkMail']))."',
						send_to_agent	='".$_POST['chkSendToAgent']."',
						send_to_member	='".$_POST['chkSendToMember']."',
						subject			='".$_POST['txtSubject']."',
						create_date	=now()
						where newsletter_id=".$_POST["cmbaddpage"];
			$isAllQueryExecuted = $_CONN->Execute($_sql);
			if($isAllQueryExecuted){
				$success = "A Newsletter has been successfully Updated.";			
			}
		}
	}
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Queued Newsletter"){

		 $_sql = "UPDATE eb_newsletter SET 
						queued	='Q'
						where newsletter_id=".$_POST["cmbaddpage"];
			$isAllQueryExecuted = $_CONN->Execute($_sql);
			if($isAllQueryExecuted){
				$success = "A Newsletter has been queued.";			
			}
}
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Test Now"){
	if(trim($_POST["chkSendTo"]) !="" && trim($_POST["txtChkMail"]) ==""){
		$_MSG[] = "Please enter mail-id to test.";
		$error=1;
	}elseif(!isValidEmail(trim($_POST["txtChkMail"]))){
		$_MSG[] = "Please enter valid mail-id.";
		$error=1;
	}
	if(empty($error)){
	//echo trim($_POST["txtChkMail"]);
		 $_sql = "UPDATE eb_newsletter SET 
				queued	='D'
				where newsletter_id=".$_POST["cmbaddpage"];
			if($_CONN->Execute($_sql)){
				$ofEmail['to']      = trim($_POST["txtChkMail"]);
				$ofEmail['subject'] = trim($_POST["txtSubject"]);
				$ofEmail['message'] = stripslashes($_POST["pageContent2"])."<BR>".stripslashes($_POST["pageContent"]);
				$ofEmail['from']    = "support@visionlottery.com";
				
				if(sendEmail($ofEmail,true)){
					$success = "A Newsletter has been tested successfully.";			
				}
			}
	}			
}
$sql="select newsletter_id,title from eb_newsletter order by newsletter_id";
$newslet=getOptions($sql,@$_POST["cmbaddpage"]);
?>