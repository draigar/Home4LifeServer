<?php
$_sql = "select value from gcm where condition_type='SET_PAYMENEX' order by `condition`";
$rsGC  = $_CONN->Execute($_sql);
if($rsGC && !$rsGC->EOF){
	while(!$rsGC->EOF){
 		$payValue[]  = $rsGC->fields['value'];
		$rsGC->MoveNext();
	}
}
if($rsGC) $rsGC->close();

$accqID = $payValue[0];
$accqKey = $payValue[1];
$pAccqURL = $payValue[2];
$pMode = $payValue[3];
$pActCode = $payValue[4];
$pMerchantID = $payValue[5];
$pFirstURL = $payValue[6];

/*$accqID = "10003";
$accqKey = "eop60MM5cz";
$pAccqURL = "";
$pMode = "L";
$pActCode = "";
$pMerchantID = "10000";
$pFirstURL = "https://www.paymenex.com/vt_x/apiTransNet.do";*/

$fund_limit=0;
$_sql="SELECT add_fund_limit FROM users WHERE user_id='".$_SESSION['login']['userid']."'";
$rs = $_CONN->Execute($_sql);
if ($rs && $rs->RecordCount()>0)
	$fund_limit=$rs->fields['add_fund_limit'];
if($rs) $rs->close();
$week_balance=get_weekly_added_fund();
if($fund_limit>0 && $week_balance>=$fund_limit) {
	$_MSG[]= "Your maximum weekly limit for adding funds is exceeded.";
	$error=1;
}

$_sql = "SELECT `condition`,value FROM gcm WHERE condition_type='AMT_TRANSFER_LIMIT' and `condition` in ('M','N')";
$rs = $_CONN->Execute($_sql);
while ($rs && !$rs->EOF) {
	$limitx[$rs->fields["condition"]] = $rs->fields["value"];
	$rs->MoveNext();
}
if ($rs) $rs->close();

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input1"]=="XSubmit1") {

	if(!trim($_POST['txtFirstDig'])){
	   $_MSG[]= "Please enter ".$_POST["hidFirstDig"]." Digit of Webkey.";
	   $error=1;
	}
	if(!trim($_POST['txtSecDig'])){
	   $_MSG[]= "Please enter ".$_POST["hidSecDig"]." Digit of Webkey.";
	   $error=1;
	}
	if(!trim($_POST['txtPac1'])){
	   $_MSG[]= "Please enter ".$_POST["hidPac1"]." of PAC Card.";
	   $error=1;
	}
	if(!trim($_POST['txtPac2'])){
	   $_MSG[]= "Please enter ".$_POST["hidPac2"]." of PAC Card.";
	   $error=1;
	}
	if(!trim($_POST['txtCardNo'])){
	   $_MSG[]= "Please enter card number.";
	   $error=1;
	}
	if( !trim($_POST['txtExpDD']) || !trim($_POST['txtExpYY']) ){
	   $_MSG[]= "Please choose card expiry date.";
	   $error=1;
	}

	if(!$error){

	    $request="p_accq_id=".$accqID."&p_accq_key=".$accqKey."&p_serial_no=".$_POST['txtSerNox']."&p_card_no=".$_POST['txtCardNo']."&
		".trim($_POST['hidFirstDig1'])."=".trim($_POST['txtFirstDig'])."&".trim($_POST['hidSecDig1'])."=".trim($_POST['txtSecDig'])."&
		".trim($_POST['hidPac11'])."=".trim($_POST['txtPac1'])."&".trim($_POST['hidPac21'])."=".trim($_POST['txtPac2'])."&
		p_card_exp_month=".$_POST['txtExpDD']."&p_card_exp_year=".$_POST['txtExpYY']."&p_mode=".$pMode."&p_act_id=TPAY&
		p_trans_cur=USD&p_amount=".trim($_POST['txtAmountx'])."&p_trans_session_id=".trim($_POST['hidSessionId'])."&p_merchant=".$pMerchantID;
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $pAccqURL);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$request);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 500);
		$request_result=curl_exec($ch);
		$request_result=trim($request_result);
		$p = xml_parser_create();
		xml_parse_into_struct($p, $request_result, $vals, $index);
		xml_parser_free($p);
		print_r($vals);
		exit();
		if(trim($vals[3]["value"])=="001") {
			//success
		}
		else {
			$_MSG[]= "Error occured from gateway.";
			$error=1;
			$step=true;
		}

	} else $step=true;
}
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["cmbMethod"]=="P") {
    if($_POST["cmbMethod"]="V") {
		if(!trim($_POST['txtSerNo1'])){
			$_MSG[]= "Please enter serial no.";
			$error=1;
		}
		if(!trim($_POST['txtAmount'])){
			$_MSG[]= "Please enter voucher no.";
			$error=1;
		}
	} elseif($_POST["cmbMethod"]=="P") {
		if(!trim($_POST['txtSerNo1'])){
			$_MSG[]= "Please enter serial no.";
			$error=1;
		}
	}
    if(!trim($_POST['txtAmount'])){
		$_MSG[]= "Please enter valid amount.";
		$error=1;
	} else {
		if( trim($_POST['txtAmount'])<$limitx["N"] ) {
			$_MSG[]= "You are adding fund less than minimum adding funds limit.";
			$error=1;
		} elseif( trim($_POST['txtAmount'])>$limitx["M"] ) {
			$_MSG[]= "The maximum adding funds limit is exceeded.";
			$error=1;
		}
		/*if(!$error && (($week_balance+$_POST['txtAmount'])>$fund_limit)) {
			$_MSG[]= "You can't add fund more than NGN ".number_format($fund_limit-$week_balance,2).", as it exceeding your maximum weekly limit for adding funds.";
			$error=1;
		}*/
	}
	if(!$error){
	   //if($_POST["cmbMethod"]=="V") {
	   		$identifier=get_identifier_number();
			$balance=get_balance()+$_POST['txtAmount'];
	   		$sql="insert into transaction values(NULL,'".$identifier."',now(),0,'".$_POST['txtAmount']."','".$_SESSION['login']['userid']."','C','P','',0,0,'".trim($_POST["txtSerNo1"])."','D','U','".$balance."')";
			if($_CONN->Execute($sql)) {
		    	$success="We received Your Add funds request and we will process it soon.";
			}
		/*} else if($_POST["cmbMethod"]=="P") {

			$request="p_accq_id=".$accqID."&p_accq_key=".$accqKey."&p_serial_no=10000065&p_act_id=TCON&p_mode=".$pMode."&p_merchant=".$pMerchantID;
			//$header[] = "Content-type: text/html";
			//$header[] = "Content-length: ".strlen($request);
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL, $pFirstURL);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$request);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 500);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			$request_result=curl_exec($ch);
			$request_result=trim($request_result);
			$p = xml_parser_create();
			xml_parse_into_struct($p, $request_result, $vals, $index);
			xml_parser_free($p);

			if(trim($vals[3]["value"])=="001") {
				$step=true;
			} else {
				$_MSG[]= "Error occured from gateway.";
				$error=1;
			}
		}*/
	}
}
?>