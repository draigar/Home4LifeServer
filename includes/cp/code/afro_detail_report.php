<?php
$entry_index_array=array();
$entry_details_array=array();
$entry_count_paid=array();
$entry_amount_winn=array();
$total_3=0;
$total_4=0;
$total_5=0;
$total_6=0;
$total_7=0;

//Get all winner for lotto game
function get_winner_report($tableVR,$lotto_id,$limit=6,&$entry_index_array,&$entry_details_array,&$entry_count_paid,&$entry_amount_winn,&$total_3,&$total_4,&$total_5,&$total_6,&$total_7) { 

	global $_CONN;

	$loop=$limit*2;
	$sql="select l.*,count(e.entry_id) as vision_entry from ".$tableVR."_lotto l left join ".$tableVR."_entry e on (e.".$tableVR."_id=l.".$tableVR."_id and 
	e.status='A' and (e.vision_numbers is not null and e.vision_numbers!='')) where l.".$tableVR."_id=".$lotto_id." group by l.".$tableVR."_id";
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
		$result=explode(",",$rs->fields["draw_number"]);
		$visres=explode(",",$rs->fields["winner_vision_number"]);
		$matchamt0=$rs->fields["match0"];
		$matchamt1=$rs->fields["match1"];
		$matchamt2=$rs->fields["match2"];
		$matchamt3=$rs->fields["match3"];
		$matchamt4=$rs->fields["match4"];
		$matchamt5=$rs->fields["match5"];
		$matchamt6=$rs->fields["match6"];
		$matchamt7=$rs->fields["match7"];
		$vision_winning_amount=$rs->fields["vision_winning_amount"];
		$matchz3=$rs->fields["matchz3"];
		$matchz4=$rs->fields["matchz4"];
		$matchz5=$rs->fields["matchz5"];
		$matchz6=$rs->fields["matchz6"];
		$vision_entry_count=$rs->fields["vision_entry"];
		$vision_price=$rs->fields["vision_price"];
		$drawstatus=$rs->fields["status"];
	}
	if($rs) $rs->close();

	$vision_winner=array();	
	$match0=0; $match1=0; $match2=0; $match3=0; $match4=0; $match5=0; $match6=0; $match7=0;

	$sql="select c.lotto_numbers,e.vision_numbers,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,
	e.user_id,t.nt_id,t.ticket_no,u.fname,u.lname,t.price 
	from ".$tableVR."_entry_child c inner join ".$tableVR."_entry_ticket t on c.nt_id=t.nt_id 
	inner join ".$tableVR."_entry e on e.entry_id=t.entry_id   
	left join users u on u.user_id=e.user_id 
	where e.status='A' AND t.cancel='N' AND e.".$tableVR."_id=".$lotto_id;
	$rs= $_CONN->Execute($sql);
	$index=0;
	while(!$rs->EOF) {	
		
		if(in_array($rs->fields["nt_id"],$entry_index_array)===false) {
			$entry_index_array[$index]=$rs->fields["nt_id"];			
			$entry_details_array[$index]["nid"]=$rs->fields["nt_id"];
			$entry_details_array[$index]["tno"]=$rs->fields["ticket_no"];
			$entry_details_array[$index]["fna"]=$rs->fields["fname"];
			$entry_details_array[$index]["lna"]=$rs->fields["lname"];
			$entry_details_array[$index]["edt"]=$rs->fields["date_entered"];
			$entry_details_array[$index]["prc"]=$rs->fields["price"]; 		
			
			if($rs->fields["vision_numbers"]) {
				$vismatch=0;
				for($i=0;$i<7;$i++) {
					if(in_array(substr($rs->fields["vision_numbers"],$i,1),$visres)===false) { }
					else $vismatch++;
				}
				if($vismatch==7) $entry_details_array[$index]["vwr"]=$rs->fields["price"];
			}
						
			$index++;
		}
		
		if(!$entry_count_paid[$rs->fields["nt_id"]]) $entry_count_paid[$rs->fields["nt_id"]]=1;
		else $entry_count_paid[$rs->fields["nt_id"]]=$entry_count_paid[$rs->fields["nt_id"]]+1; 
		
		$match=0;
		for($i=0;$i<$loop;$i+=2) { 
		  if(in_array(substr($rs->fields["lotto_numbers"],$i,2),$result)===false) { }
		  else $match++;
		}
		
		switch($match) { 
			case 3: 
				$total_3++;
				if(!$entry_amount_winn[$rs->fields["nt_id"]][3]) $entry_amount_winn[$rs->fields["nt_id"]][3]=1;
				else $entry_amount_winn[$rs->fields["nt_id"]][3]=$entry_amount_winn[$rs->fields["nt_id"]][3]+1;
			break;
			case 4: 
				$total_4++;
				if(!$entry_amount_winn[$rs->fields["nt_id"]][4]) $entry_amount_winn[$rs->fields["nt_id"]][4]=1;
				else $entry_amount_winn[$rs->fields["nt_id"]][4]=$entry_amount_winn[$rs->fields["nt_id"]][4]+1;
			break;
			case 5: 
				$total_5++;
				if(!$entry_amount_winn[$rs->fields["nt_id"]][5]) $entry_amount_winn[$rs->fields["nt_id"]][5]=1;
				else $entry_amount_winn[$rs->fields["nt_id"]][5]=$entry_amount_winn[$rs->fields["nt_id"]][5]+1;
			break;
			case 6: 
				$total_6++;
				if(!$entry_amount_winn[$rs->fields["nt_id"]][6]) $entry_amount_winn[$rs->fields["nt_id"]][6]=1;
				else $entry_amount_winn[$rs->fields["nt_id"]][6]=$entry_amount_winn[$rs->fields["nt_id"]][6]+1;
			break;
			case 7: 
				$total_7++;
				if(!$entry_amount_winn[$rs->fields["nt_id"]][7]) $entry_amount_winn[$rs->fields["nt_id"]][7]=1;
				else $entry_amount_winn[$rs->fields["nt_id"]][7]=$entry_amount_winn[$rs->fields["nt_id"]][7]+1;
			break;
		}
		$rs->MoveNext();
	}
	if($rs) $rs->close();
	
}

get_winner_report("afro",$_GET["id"]=1,7,$entry_index_array,$entry_details_array,$entry_count_paid,$entry_amount_winn,$total_3,$total_4,$total_5,$total_6,$total_7);

echo $total_3."--".$total_7;

if(empty($_GET["srt"])) $_GET["srt"]=" desc ";
$where = " where n.cancel='N' ";
if(trim($_POST['txtAlid'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " l.al_id = '".trim($_POST['txtAlid'])."'";
}
if(trim($_POST['txtFromDate']) && trim($_POST['txtToDate'])) { 
	$dateAray= explode("-",trim($_POST['txtFromDate']));
	$fromdate= $dateAray[2]."-".$dateAray[0]."-".$dateAray[1];
	$todateAray= explode("-",trim($_POST['txtToDate']));
	$todate= $todateAray[2]."-".$todateAray[0]."-".$todateAray[1];
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " '".$fromdate."' >= date_format(date_entered,'%Y-%m-%d')&& date_format(date_entered,'%Y-%m-%d')<= '".$todate."'";
}
if(trim($_POST['txtTicketNo'])){

	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " ticket_no = '".trim($_POST['txtTicketNo'])."'";
}
if(trim($_POST['cmbMethod'])){
	if(!$where)
		$where .= " where ";
	else 
		$where .= " and ";	
	$where .= " method_id = '".trim($_POST['cmbMethod'])."'";
}

$_sql = "SELECT 
	n.nt_id,n.ticket_no,l.al_id,date_format(e.date_entered,'%d-%b-%Y %h:%i') as date_entered,
	date_format(e.date_entered,'%d%m%y') as date_entered2,e.method_id,e.vision_numbers,u.fname,u.lname
FROM 
	afro_entry_ticket n  
	inner join afro_entry e on e.entry_id=n.entry_id   
	inner join afro_lotto l on l.afro_id=e.afro_id 
	inner join afro_entry_child c on c.nt_id=n.nt_id 
	left join users u on u.user_id=e.user_id 
".$where." GROUP BY n.nt_id ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "n.nt_id")." ".$_GET["srt"];
$rs=$_CONN->Execute($_sql);		
?>