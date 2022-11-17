<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['submit']=="Submit") {

	$ofEmail['to']       = $_CONFIG[1]["admin_email"];
	$ofEmail['subject']  = $_OFFICAILSITENAME." :: Message from ".stripslashes($_POST["txtFullName"]);
	$ofEmail['message']  = "This message is sent by ".stripslashes($_POST["txtFullName"])." through ".$_OFFICAILSITENAME.".\nPlease below are the details of Message:\n\n";
	$ofEmail['message'] .= "Full Name: ".stripslashes($_POST["txtFullName"])."\n";		
	$ofEmail['message'] .= "Email: ".stripslashes($_POST["txtEmail"])."\n";
	$ofEmail['message'] .= "Telephone: ".stripslashes($_POST["txtTelephone"])."\n";
	$ofEmail['message'] .= "Address: ".stripslashes(trim($_POST["txtAddress"]))."\n";
	$ofEmail['message'] .= "Vision Account Username: ".stripslashes($_POST["txtVisionNo"])."\n";
	$ofEmail['message'] .= "Subject: ".stripslashes($_POST["txtSubject"])."\n";
	$ofEmail['message'] .= "Message: \n".stripslashes($_POST["txtMessage"])."\n\n";
	$ofEmail['message'] .= "Regards, \n".$_OFFICAILSITENAME." Team\n";
	$ofEmail['from']     = stripslashes($_POST["txtFullName"])."<".stripslashes($_POST["txtEmail"]).">";
	sendEmail($ofEmail);
	$success="Thank you for contacting us. Our representative will contact you soon.";
	$_POST=NULL;
}
?>