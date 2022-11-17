<?php
 $_sql = "SELECT m.business_name,CONCAT(m.fname,' ',m.lname) as fullname,l.lga_name,s.state_name
	FROM merchant m
		LEFT JOIN merchant_address a ON (a.user_id = m.user_id and a.address_type='BS')
		LEFT JOIN lga l ON l.lga_id = a.lga 
		LEFT JOIN state s ON s.state_id = a.state 
	WHERE m.user_id=".$_SESSION['login']['userid'];
$rsAG  = $_CONN->Execute($_sql);
if($rsAG && !$rsAG->EOF){ 
	$fullname = $rsAG->fields['fullname'];
	$business_name = $rsAG->fields['business_name'];
	$lga_name = $rsAG->fields['lga_name'];
	$state_name = $rsAG->fields['state_name'];	
} 
if($rsAG) $rsAG->close();


$count_claim=0;

 $_sql = "SELECT count(c.claimed_id) as cnt FROM claimed c

  INNER JOIN afro_entry_ticket t on t.nt_id=c.nt_id 

  INNER JOIN afro_entry e on e.entry_id=t.entry_id 

  INNER JOIN terminal_agent a on a.term_id=e.term_id 

  WHERE c.which='A' AND e.status='A' AND t.cancel='N' AND a.agent_id=".$_SESSION['login']['userid'];

$rsGC  = $_CONN->Execute($_sql);

if($rsGC && !$rsGC->EOF){ 

	$count_claim+=$rsGC->fields['cnt'];	

} 

if($rsGC) $rsGC->close();

$_sql = "SELECT count(c.claimed_id) as cnt FROM claimed c

  INNER JOIN naira_entry_ticket t on t.nt_id=c.nt_id 

  INNER JOIN naira_entry e on e.entry_id=t.entry_id 

  INNER JOIN terminal_agent a on a.term_id=e.term_id 

  WHERE c.which='N' AND e.status='A' AND t.cancel='N' AND a.agent_id=".$_SESSION['login']['userid'];

$rsGC  = $_CONN->Execute($_sql);

if($rsGC && !$rsGC->EOF){ 

	$count_claim+=$rsGC->fields['cnt'];	

} 

if($rsGC) $rsGC->close();

$a_count=0;
 $_sql = "SELECT count(at.nt_id) as ecount 
	FROM afro_entry_ticket at
	LEFT JOIN afro_entry a on a.entry_id=at.entry_id
	LEFT JOIN terminal_agent t on t.term_id=a.term_id
	WHERE t.agent_id=".$_SESSION['login']['userid']." AND at.cancel='N' group by t.agent_id";
$rsA  = $_CONN->Execute($_sql);
if($rsA && !$rsA->EOF){ 
	$a_count =$rsA->fields['ecount'];	
} 
if($rsA) $rsA->close();

$n_count=0;
 $_sql = "SELECT count(nt.nt_id) as ncount 
	FROM naira_entry_ticket nt
	LEFT JOIN naira_entry n on n.entry_id=nt.entry_id
	LEFT JOIN terminal_agent t on t.term_id=n.term_id
	WHERE t.agent_id=".$_SESSION['login']['userid']." AND nt.cancel='N' group by t.agent_id";
$rsA  = $_CONN->Execute($_sql);
if($rsA && !$rsA->EOF){ 
	$n_count =$rsA->fields['ncount'];	
} 
if($rsA) $rsA->close();

?>