<?php 
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection 

if($_SERVER['REQUEST_METHOD']=="POST") { 
	
	$ticketno = trim($_POST["ticketnumber"]);
	$actionco = trim($_POST["action"]);
	
	if(!$ticketno && !$actionco) $_ERROR_CODE=1; $_ERROR_TEXT="Invalid data input.";
	
	if(!$actionco || $actionco!="CHKREST") { $_ERROR_CODE=2; $_ERROR_TEXT="Invalid Action Code."; } 
	if(!$ticketno) { $_ERROR_CODE=3; $_ERROR_TEXT="Empty Ticket Number."; } 
	if(!$_ERROR_CODE) { 
		$sql="select nt_id from naira_entry_ticket where ticket_no='".$ticketno."'";
		$rs=$_CONN->Execute($sql);
		if(!$rs || $rs->EOF) { 
			if($rs)	$rs->close();
			$sql="select nt_id from afro_entry_ticket where ticket_no='".$ticketno."'";
			$rs=$_CONN->Execute($sql);
			if(!$rs || $rs->EOF) { 
				$_ERROR_CODE=4; $_ERROR_TEXT="Invalid Ticket Number.";
			}
			if($rs)	$rs->close();
		}
		if($rs)	$rs->close();
	}
	$nomatchingentry=false;
	if(!$_ERROR_CODE) { 
		include("nairasql.php");
		$prizesum=array();
		$cnt=count($naira_id);
		if($cnt<=0) $nomatchingentry=true;
		else {
			for($i=0;$i<$cnt;$i++) { 
				$matchp=0;
				$len2=count($result[$i]);
				for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
					if($result[$i][$j]) $matchp++;
				}
				$prizesum[$naira_id[$i]][$matchp]=!$prizesum[$naira_id[$i]][$matchp]?1:($prizesum[$naira_id[$i]][$matchp]+1);
			}
			$strres="<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>NAIRA LOTTO</GAMETYPE>";
			for($i=0;$i<$cnt;$i++) { 
				$matchp=0;
				$len2=count($result[$i]);
				for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
					if($result[$i][$j]) $matchp++;
				}
				$strres.="\n\t<WINNINGPRIZE>";
				$strres.="\n\t\t<TICKETNUMBER>".$ticketno."</TICKETNUMBER>\n";
				$strres.="\n\t\t<DRAWDATE>".$to_time[$i]."</DRAWDATE>\n";
				$strres.="\n\t\t<DRAWNO>".(strlen($naira_id[$i])<4?substr("0000",0,4-strlen($naira_id[$i])).$naira_id[$i]:$naira_id[$i])."</DRAWNO>\n";
				$totalamount=0;
				if($win_num[$i]) $totalamount=$matchp>3?($match[$i][$matchp]/$prizesum[$naira_id[$i]][$matchp]):$match[$i][$matchp]; 
				if($visionwinner[$i]) $totalamount+=$visionwinneramount[$i];
				$strres.="\n\t\t<PRIZEAMOUNT>".number_format($totalamount,2)."</PRIZEAMOUNT>\n";
				$prizlevel="";
				if($win_num[$i]) $prizlevel=($matchp==6?"Jackpot":"Matched").$matchp;
				if($visionwinner[$i]) $prizlevel.=($prizlevel?",":"")."Vision Number";
				$strres.="\n\t\t<PRIZELEVEL>".$prizlevel."</PRIZELEVEL>\n";
				$strres.="\n\t\t<AREABOUGHT>".($method_id[$i]=='S'?"SMS":($method_id[$i]=='T'?"Terminal":"Internet"))."</AREABOUGHT>\n";	
				$strres.="\n\t\t<WINNINGNUMBERS>".$win_num[$i]."</WINNINGNUMBERS>\n";
				$strres.="\n\t\t<VISIONWININGNUMBERS>".$visionwinner[$i]."</VISIONWININGNUMBERS>\n";
				$strres.="\n\t</WINNINGPRIZE>";	
			}
			$strres.="</RESPONSE>\n</XML>";
		}
	
		if($nomatchingentry) {	
			include("afrosql.php");
			$prizesum=array();
			$cnt=count($afro_id);
			if($cnt<=0) $nomatchingentry=true;
			else {
				$nomatchingentry=false;
				for($i=0;$i<$cnt;$i++) { 
					$matchp=0;
					$len2=count($result[$i]);
					for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
						if($result[$i][$j]) $matchp++;
					}
					$prizesum[$naira_id[$i]][$matchp]=!$prizesum[$naira_id[$i]][$matchp]?1:($prizesum[$naira_id[$i]][$matchp]+1);
				}
				$strres="<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<GAMETYPE>AFRO MILLIONS</GAMETYPE>";
				for($i=0;$i<$cnt;$i++) { 
					$matchp=0;
					$len2=count($result[$i]);
					for($j=0,$k=0;$j<$len2;$j++,$k+=2) {
						if($result[$i][$j]) $matchp++;
					}
					$strres.="\n\t<WINNINGPRIZE>";
					$strres.="\n\t\t<TICKETNUMBER>".$ticketno."</TICKETNUMBER>\n";
					$strres.="\n\t\t<DRAWDATE>".$to_time[$i]."</DRAWDATE>\n";
					$strres.="\n\t\t<DRAWNO>".(strlen($afro_id[$i])<4?substr("0000",0,4-strlen($afro_id[$i])).$afro_id[$i]:$afro_id[$i])."</DRAWNO>\n";
					$totalamount=0;
					if($win_num[$i]) $totalamount=$matchp>3?($match[$i][$matchp]/$prizesum[$naira_id[$i]][$matchp]):$match[$i][$matchp]; 
					if($visionwinner[$i]) $totalamount+=$visionwinneramount[$i];
					$strres.="\n\t\t<PRIZEAMOUNT>".number_format($totalamount,2)."</PRIZEAMOUNT>\n";
					$prizlevel="";
					if($win_num[$i]) $prizlevel=($matchp==7?"Jackpot":"Matched").$matchp;
					if($visionwinner[$i]) $prizlevel.=($prizlevel?",":"")."Vision Number";
					$strres.="\n\t\t<PRIZELEVEL>".$prizlevel."</PRIZELEVEL>\n";
					$strres.="\n\t\t<AREABOUGHT>".($method_id[$i]=='S'?"SMS":($method_id[$i]=='T'?"Terminal":"Internet"))."</AREABOUGHT>\n";	
					$strres.="\n\t\t<WINNINGNUMBERS>".$win_num[$i]."</WINNINGNUMBERS>\n";
					$strres.="\n\t\t<VISIONWININGNUMBERS>".$visionwinner[$i]."</VISIONWININGNUMBERS>\n";
					$strres.="\n\t</WINNINGPRIZE>";
				}
				$strres.="</RESPONSE>\n</XML>";
			}
		}
		if($nomatchingentry) 
			$strres="<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<MESSAGE>No Matching Entry found.</MESSAGE>\n</RESPONSE>\n</XML>";
		echo $strres;
	}
	if($_ERROR_CODE) { 
		echo "<XML>\n<RESPONSE>\n\t<RESULT>NOTOK</RESULT>\n\t<ERROR>\n\t\t<ERRORCODE>".$_ERROR_CODE."</ERRORCODE>\n\t\t<ERRORTEXT>".$_ERROR_TEXT."</ERRORTEXT>\n\t</ERROR>\n</RESPONSE>\n</XML>";
	}
}
?>