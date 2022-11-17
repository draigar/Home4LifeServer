<?php

include_once("../includes/config/application.php"); //include config 

dbConnection('on'); //open database connection 



if($_SERVER['REQUEST_METHOD']=="POST") { 

	

	function add_separator($lotto_num) { 

		$str="";

		$len=strlen($lotto_num);

		for($i=0;$i<$len;$i+=2) { 

			if($str) $str.=",".substr($lotto_num,$i,2)."";

			else $str="".substr($lotto_num,$i,2)."";

		}

		return $str;

 	}

		     

	$terminalid   = trim($_POST["txtTermID"]);

	$lottoType	  = trim($_POST["cmbType"]);

	$draw		  = trim($_POST["cmbDraw"]);

	$weeks	 	  = trim($_POST["cmbWeek"]);

	$entries	  = trim($_POST["txtEntries"]);

	$arrEntr      = explode("#",$entries);

	$num_entries  = 0;	

if(!trim($_POST["txtTermID"])) 

{ 

	$_ERROR_CODE=1; //Enter Terminal ID

	$_ERROR_TEXT="Please enter Terminal ID.";

	$error=1;

} 

$success=true;

$lotto_entries_xml="";

if(!$error) {

	$sql="select agent_id from terminal_agent where status='A' and term_id=".$terminalid;

	$rs=$_CONN->Execute($sql);

	if(!$rs || $rs->EOF) { 

		$_ERROR_CODE=2; //Invalid Agent Terminal ID

		$_ERROR_TEXT="Invalid Agent Terminal ID.";

		$error=1;

	} else 

		$agent_id=$rs->fields["agent_id"];

	if($rs) $rs->close();

}

if(!$error) { 

	

	if($lottoType =="NL") { 

		$tableVR = "naira"; $limit=6; 

		if($_POST["cmbVision"]=="Y") 

		{ 

			$visionnumber=get_vision_number();

		} 

		$len=count($arrEntr);

		for($i=0,$m=1;$i<$len;$i++) { 

			$arr2=explode(",",$arrEntr[$i]);

			$len1=count($arr2); 

			for($j=0;$j<$len1;$j++) { 

				$_POST["num".$m]=$arr2[$j];

				$m++;

			}

		}

	}

	elseif($lottoType =="AM") { 

		$tableVR = "afro"; $limit=7; 

		if($_POST["cmbVision"]=="Y") 

		{ 

			$visionnumber=get_vision_raffle();

		} 

		$len=count($arrEntr);

		for($i=0,$m=1;$i<$len;$i++) { 

			$arr2=explode(",",$arrEntr[$i]);

			$len1=count($arr2);

			for($j=0;$j<$len1;$j++) { 

				$_POST["nux".$m]=$arr2[$j];

				$m++;

			}

		}

	}

	

	$sql="select ".$tableVR."_id,vision_winning_amount,vision_price,date_format(to_time,'%W %d %M %Y') as to_time from ".$tableVR."_lotto where ( now() between from_time and to_time )";

	$rs= $_CONN->Execute($sql);

	if($rs && !$rs->EOF){

		$lotto_id=$rs->fields[$tableVR."_id"];

		$to_time=$rs->fields["to_time"];

		$visionprice=$rs->fields["vision_price"];

		$vision_winning_amount=$rs->fields["vision_winning_amount"];

	}

	if($rs) $rs->close();



	if(!$lotto_id) { 

		$_ERROR_CODE=3;	//Right now not any game is active.

		if($lottoType =="NL") $_ERROR_TEXT="Naira Lotto and Vision Number are currently closed.";

		else $_ERROR_TEXT="Afro Millions and Vision Raffle are currently closed.";

		$error=1;

	}

	if($visionnumber && (!$vision_winning_amount || $vision_winning_amount=='0.00')) { 

		$_ERROR_CODE=4; //Vision Number/Afro Raffle is not accepting for games right now.

		if($lottoType =="NL") $_ERROR_TEXT="Vision Number is not accepting right now.";

		else $_ERROR_TEXT="Vision Raffle is not accepting right now.";

		$error=1;

	}

}



if(!$error) { 



		//Get per line price

		$sql="select `condition`,value from gcm where condition_type='PER_LINE' and `condition` in (1,2)";

		$rs=$_CONN->Execute($sql);

		while(!$rs->EOF) { 

		  if($lottoType =="NL" && $rs->fields["condition"]==1) $price=$rs->fields["value"]; 

		  elseif($lottoType =="AM" && $rs->fields["condition"]==2) $price=$rs->fields["value"]; 

		  $rs->MoveNext();

		}

		if($rs) $rs->close();

		$curdatetime=date("d-M-Y")." at ".date("H-I");

		$sql="insert into ".$tableVR."_entry values(NULL,".$lotto_id.",now(),'T','A',0,'".$visionnumber."','".($visionnumber?$visionprice:'0.00')."','".$_WEEK_DAY[$draw]."','".$weeks."','".$terminalid."')";

		if($_CONN->Execute($sql)) { 

			$intID=$_CONN->Insert_ID();

			$arr_lotto_num=array();

			$ticket_no=get_ticket_number($tableVR); //Get Ticket Number

			$sql="insert into ".$tableVR."_entry_ticket values(NULL,".$ticket_no.",".$intID.",'".$price."','N')";

			if($_CONN->Execute($sql)) {

				

					$intID1=$_CONN->Insert_ID();

					

					for($i=0,$m=1;$i<5;$i++,$m+=$limit) { 

							$ldflag="N";

							$emptyflag="N";

							if($lottoType =="NL") { 

								for($x=$m;$x<$m+$limit;$x++) {

									if(!trim($_POST["num".$m])) $emptyflag="Y";

									elseif($_POST["num".$m]=="LD") $ldflag="Y";

								}

							}

							elseif($lottoType =="AM") { 

								for($x=$m;$x<$m+$limit;$x++) {

									if(!trim($_POST["nux".$m])) $emptyflag="Y";

									elseif($_POST["nux".$m]=="LD") $ldflag="Y";

								}					

							}

	

							if($emptyflag=="N") {

								$num_entries++;

								if($ldflag=="Y") {

									while(true) {

										$lotto_num=get_random_ld_entry($tableVR=="naira"?6:7); 

										if(in_array($lotto_num,$arr_lotto_num)===false) { 

										   $arr_lotto_num[]=$lotto_num;

										   break;

										}

									}

								}

								else { 

									if($lottoType =="NL") { 

										$lotto_num=$_POST["num".$m].$_POST["num".($m+1)].$_POST["num".($m+2)].$_POST["num".($m+3)].$_POST["num".($m+4)].$_POST["num".($m+5)]; 

									}

									elseif($lottoType =="AM") { 

										$lotto_num=$_POST["nux".$m].$_POST["nux".($m+1)].$_POST["nux".($m+2)].$_POST["nux".($m+3)].$_POST["nux".($m+4)].$_POST["nux".($m+5)].$_POST["nux".($m+6)]; 					

									}							

								}

								if($lotto_entries_xml) $lotto_entries_xml .= "#".add_separator($lotto_num);

								else $lotto_entries_xml = add_separator($lotto_num);

								$sql="insert into ".$tableVR."_entry_child values(NULL,".$intID1.",'".$lotto_num."','N')";

								if(!$_CONN->Execute($sql)) {					

									$success=false;

									$_ERROR_CODE=5; //Unknown error occured while processing request.

									$_ERROR_TEXT="Unknown error occured while processing request.";

									$error=1;

									//rollback

									//Make the column and its value array for putting in whereclause for deleting that row

									$whereCluaseVals		  = array();

									$whereCluaseVals['nt_id'] = $intID1;

									rollBackIt($tableVR."_entry_child", $whereCluaseVals);

									$whereCluaseVals 		  = array();

									$whereCluaseVals['nt_id'] = $intID1;

									rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);

									$whereCluaseVals			 = array();

									$whereCluaseVals['entry_id'] = $intID;

									rollBackIt($tableVR."_entry", $whereCluaseVals);

									break;

								}

							}

					}

					

			} else {

				

				$success=false;

				$_ERROR_CODE=6; //Unknown error occured while processing request.

				$_ERROR_TEXT="Unknown error occured while processing request.";

				$error=1;			

				//rollback

				//Make the column and its value array for putting in whereclause for deleting that row

				$whereCluaseVals	= array();

				$whereCluaseVals['nt_id'] = $intID1;

				rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);//Call userdefined roolbakit function in function.sys

				$whereCluaseVals	= array();

				$whereCluaseVals['entry_id'] = $intID;

				rollBackIt($tableVR."_entry", $whereCluaseVals);

				

			 }	  

		}

		else {

			$success=false;

			$_ERROR_CODE=7; //Unknown error occured while processing request.

			$_ERROR_TEXT="Unknown error occured while processing request.";

			$error=1;

		}

				

	}	

}



if(!$error && $success && $intID1) { //if entry successfully inserted then make payment

	$amount=$price*$num_entries;

	if($weeks) $amount=$amount*$weeks;

	if($visionnumber) $amount+=$visionprice;

	$identifier=get_identifier_number();

	$balance=get_user_balance($agent_id)-$amount;

	$sql="insert into transaction values(NULL,'".$identifier."',now(),".$intID1.",'".$amount."','".$agent_id."','D','C','',0,0,0,'".($tableVR=="afro"?"A":"N")."','A','".$balance."')";

	if(!$_CONN->Execute($sql)) {		

		$success=false;			

		//rollback

		//Make the column and its value array for putting in whereclause for deleting that row

		$whereCluaseVals		  = array();

		$whereCluaseVals['nt_id'] = $intID1;

		rollBackIt($tableVR."_entry_child", $whereCluaseVals);

		$whereCluaseVals 		  = array();

		$whereCluaseVals['nt_id'] = $intID1;

		rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);

		$whereCluaseVals			 = array();

		$whereCluaseVals['entry_id'] = $intID;

		rollBackIt($tableVR."_entry", $whereCluaseVals);

		$_ERROR_CODE=8; //Unknown error occured while processing request.

		$_ERROR_TEXT="Unknown error occured while processing request.";		

	} else { 

		//Get commission price

		$sql="select trans_charges,trans_charge_type from merchant where user_id=".$agent_id;

		$rs=$_CONN->Execute($sql);

		if(!$rs->EOF) { 

		  $commission_charge=$rs->fields["trans_charges"];

		  $charge_type=$rs->fields["trans_charge_type"];

		  if($rs) $rs->close();

		} else {

			if($rs) $rs->close();

			$sql="select cf_amount,cf_type from comiss_fees where cf_id=1";

			$rs=$_CONN->Execute($sql);

			if(!$rs->EOF) { 

			  $commission_charge=$rs->fields["cf_amount"];

			  $charge_type=$rs->fields["cf_type"];

			}

			if($rs) $rs->close();	

		}

		if($charge_type=="F") $comm_amt=$commission_charge;

		else $comm_amt=($commission_charge*$amount)/100;

		//insert into transaction

		$sql="insert into commission values (NULL,'".$agent_id."','".$intID1."','".($lottoType=="NL"?"N":"A")."','".$num_entries."','".$price."','".$comm_amt."','N')";

		$_CONN->Execute($sql);

	}

} else $success=false;



if($success) { echo "<XML>

	<RESPONSE>

		<RESULT>OK</RESULT>

		<TERMINALID>".$terminalid."</TERMINALID>

		<TICKETDETAILS>

			<TICKETNO>".$ticket_no."</TICKETNO>

			<PURCHASEDATETIME>".$curdatetime."</PURCHASEDATETIME>

			<DRAWSENTERED>Single draw</DRAWSENTERED>

			<CHANNEL>Terminal</CHANNEL>

			<DRAWS>".$to_time."</DRAWS>

			<WEEKS>".$weeks."</WEEKS>

			<ENTRIES>".$lotto_entries_xml."</ENTRIES>

			<PLAYVISIONRAFFLE>".($visionnumber?"YES":"NO")."</PLAYVISIONRAFFLE>

			<VISIONNUMBER>".$visionnumber."</VISIONNUMBER>

			<PRICEPERROW>".number_format($price,2)."</PRICEPERROW>

			<VISIONPRICE>".($visionnumber?number_format($visionprice,2):"0.00")."</VISIONPRICE>

			<TOTALAMOUNT>".number_format($amount,2)."</TOTALAMOUNT>

			<CALC1>".$num_entries." Plays x N100 for ".$weeks." draw=N".number_format((($num_entries*$price)*$weeks),2)."</CALC1>

			<CALC2>".($visionnumber?"1 Vision Number x N".number_format($visionprice,2):"Vision Number:0.00")."</CALC2>

		</TICKETDETAILS>

	</RESPONSE>

</XML>";

}

elseif($_ERROR_CODE) { echo "<XML>

	<RESPONSE>

		<RESULT>NOTOK</RESULT>

		<ERROR>

			<ERRORCODE>".$_ERROR_CODE."</ERRORCODE>

			<ERRORTEXT>".$_ERROR_TEXT."</ERRORTEXT>			

		</ERROR>

	</RESPONSE>

</XML>";

}

?>