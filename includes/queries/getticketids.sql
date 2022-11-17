<?PHP
	if($_POST['rdoLotto']=="3") { 
		
		if(empty($_GET["srt"])) $_GET["srt"]=" desc ";
		
		$where = " where l.status='D' and t.cancel='N' and e.user_id='".$_SESSION['login']['userid']."'";
	
		if(trim($_POST['cmbMonth'])){
			if(!$where)
				$where .= " where ";
			else 
				$where .= " and ";	
			$where .= " date_format(e.date_entered,'%m%Y') = '".trim($_POST['cmbMonth'])."'";
		}
		
		$_sql="select t.nt_id,t.ticket_no,c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.draw_number,l.draw_date,
			l.nl_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
			date_format(l.to_time,'%d %b %Y') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.naira_id,
			if ( (
			  (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)
			  ) ),1,0 
				
			) as matchx1,
			if ( (
			  (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)
			  ) ),1,0
				
			) as matchx2,
			if ( (
			  (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
			  ) ),1,0
				
			) as matchx3,
			if ( (
			  (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)
			  ) ),1,0
				
			) as matchx4,
			if ( (
			  (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)
			  ) ),1,0
				
			) as matchx5,
			if ( (
			  (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)
			  ) ),1,0
				
			) as matchx6,
			if ( (
			  (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,1,2),0 
				
			) as matchp1,
			if ( (
			  (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,3,2),0
				
			) as matchp2,
			if ( (
			  (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,5,2),0
				
			) as matchp3,
			if ( (
			  (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,7,2),0
				
			) as matchp4,
			if ( (
			  (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,9,2),0
				
			) as matchp5,
			if ( (
			  (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)
			  ) ),substring(c.lotto_numbers,11,2),0
				
			) as matchp6
			from naira_entry_child c
			inner join naira_entry_ticket t on (t.nt_id=c.nt_id and t.cancel='N')
			inner join naira_entry e on e.entry_id=t.entry_id
			inner join naira_lotto l on l.naira_id=e.naira_id
			".$where." group by c.ne_id   
			having (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)>=3 order by l.draw_date desc,l.naira_id";
		
	} else {
		
		if(empty($_GET["srt"]))
			$_GET["srt"]=" desc ";
			
		if($_POST['rdoLotto']=="2")
			$where = " where naira_lotto.status='A' and naira_entry_ticket.cancel='N' and naira_entry.user_id='".$_SESSION['login']['userid']."'";
		else
			$where = " where naira_entry_ticket.cancel='N' and naira_entry.user_id='".$_SESSION['login']['userid']."'";
				
		if(trim($_POST['cmbMonth'])){
			if(!$where)
				$where .= " where ";
			else 
				$where .= " and ";	
			$where .= " date_format(date_entered,'%m%Y') = '".trim($_POST['cmbMonth'])."'";
		}
		
		$_sql = "SELECT nt_id,ticket_no 
			FROM naira_entry_ticket 
			inner JOIN naira_entry ON naira_entry.entry_id=naira_entry_ticket.entry_id 
			inner JOIN naira_lotto ON naira_lotto.naira_id=naira_entry.naira_id 
		".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "nt_id")." ".$_GET["srt"]; 

	}
?>