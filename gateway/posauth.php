<?php
	$xml='<?xml version="1.0" encoding="ISO-8859-1"?>';
	$xml.="<Authentication>\n\t<Username>agentvikram</Username>\n\t<Password>agentvikram</Password>\n</Authentication>";
	$url = "http://www.visionlottery.com/gateway/apiauth.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	$response = curl_exec($ch);
	if(is_int($response)) {
		die("Errors: " . curl_errno($ch) . " : " . curl_error($ch));
	}
	curl_close ($ch);
	print "Remote Site : $url<br /><hr />";
	echo "<br />Request:<hr />";
	echo "<textarea style='width:400px;height:200px;'>".$xml."</textarea>";
	echo "<br />Response:<hr />";
	echo "<textarea style='width:400px;height:200px;'>".$response."</textarea>";
?>