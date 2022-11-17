<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["Submit"]=="Submit") { 
	
	$username		= trim($_POST["txtUsername"]);
	$password		= trim($_POST["txtPassword"]);
	
	$data="username=".$username."&password=".$password."&action=AUTH";
	$url = "http://www.visionlottery.com/gateway/apiauth.php";
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
    <td width="32%">Username</td>
    <td width="68%"><input type="text" name="txtUsername" value="<?=trim($_POST["txtUsername"])?>"></td>
  </tr>
  <tr> 
    <td width="32%">Password</td>
    <td width="68%"><input type="text" name="txtPassword" value="<?=trim($_POST["txtPassword"])?>"></td>
  </tr>
  <tr> 
    <td colspan="2" align="left" style="padding-left:200px;"><input type="submit" name="Submit" value="Submit"></td>
  </tr>
</table>
</form>