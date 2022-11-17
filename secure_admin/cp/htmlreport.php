<?php

if($_GET["report"]=="draw") {

	$content = file_get_contents('https://www.visionlottery.com/secure_admin/cp/tmp/draw_report.html');

	header("Content-type: application/octet-stream");

	header("Content-Disposition: attachment; filename=draw_report.html");

	header("Pragma: no-cache");

	header("Expires: 0");

	echo $content;

}


if($_GET["report"]=="agent") {

	$content = file_get_contents('https://www.visionlottery.com/secure_admin/cp/tmp/agent_report.html');

	header("Content-type: application/octet-stream");

	header("Content-Disposition: attachment; filename=agent_report.html");

	header("Pragma: no-cache");

	header("Expires: 0");

	echo $content;

}

if($_GET["report"]=="user") {

	$content = file_get_contents('https://www.visionlottery.com/secure_admin/cp/tmp/user_report.html');

	header("Content-type: application/octet-stream");

	header("Content-Disposition: attachment; filename=user_report.html");

	header("Pragma: no-cache");

	header("Expires: 0");

	echo $content;

}

if($_GET["report"]=="entry") {

	$content = file_get_contents('https://www.visionlottery.com/secure_admin/cp/tmp/entry_report.html');

	header("Content-type: application/octet-stream");

	header("Content-Disposition: attachment; filename=entry_report.html");

	header("Pragma: no-cache");

	header("Expires: 0");

	echo $content;

}



if($_GET["report"]=="claim") {

	$content = file_get_contents('https://www.visionlottery.com/secure_admin/cp/tmp/prizes_claims_report.html');

	header("Content-type: application/octet-stream");

	header("Content-Disposition: attachment; filename=prizes_claims_report.html");

	header("Pragma: no-cache");

	header("Expires: 0");

	echo $content;

}

?>