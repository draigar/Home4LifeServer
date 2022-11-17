<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["Submit"]=="Submit") { 
	
	$ticketno		= trim($_POST["txtTicketNumber"]);
		     
	$data="ticketnumber=".$ticketno."&action=CLAIMTIK";
	$url = "http://www.visionlottery.com/gateway/apiclaim.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	$response = curl_exec($ch);
	if(is_int($response)) {
		die("Errors: " . curl_errno($ch) . " : " . curl_error($ch));
	}
	curl_close ($ch);
	print "Remote Site : $url<br /><hr />";
	echo "<br />Request:<hr />";
	echo "<textarea style='width:400px;height:200px;'>Query String: ".$data."</textarea>";
	echo "<br />Response:<hr />";
	echo "<textarea style='width:400px;height:200px;'>".$response."</textarea>";
	
}
?>
<form method="post" action="" name="frm">
<table width="60%" border="1" cellspacing="1" cellpadding="6" align="center">
  <tr> 
    <td width="32%">Ticket Number</td>
    <td width="68%"><input type="text" name="txtTicketNumber" value="<?=trim($_POST["txtTicketNumber"])?>"></td>
  </tr>
  <tr> 
    <td colspan="2" align="left" style="padding-left:200px;"><input type="submit" name="Submit" value="Submit"></td>
  </tr>
</table>
</form>