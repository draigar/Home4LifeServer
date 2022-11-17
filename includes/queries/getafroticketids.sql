<?PHP
	if($_POST['rdoLotto']=="6") { 
		
		if(empty($_GET["srt"])) $_GET["srt"]=" desc ";
		
		$where = " where l.status='D' and t.cancel='N' and e.user_id='".$_SESSION['login']['userid']."'";
	
		if(trim($_POST['cmbMonth'])){
			if(!$where)
				$where .= " where ";
			else 
				$where .= " and ";	
			$where .= " date_format(e.date_entered,'%m%Y') = '".trim($_POST['cmbMonth'])."'";
		}
		
		$sql="select t.nt_id,t.ticket_no,c.lotto_numbers,l.match0,l.match1,l.match2,l.match3,l.match4,l.match5,l.match6,l.match7,l.draw_number,l.draw_date,
			l.al_id,date_format(l.from_time,'%d-%b-%Y %H:%i') as from_time,l.vision_winning_amount,
			date_format(l.to_time,'%d %b %Y') as to_time,date_format(l.to_time,'%M/%Y') as monthyear,
			date_format(l.draw_date,'%d-%b-%Y %H:%i') as draw_date,l.afro_id,
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
			  ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)
			  ) ),1,0	
			  
			) as matchx6,
			if ( (
			  (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)
			  ) ),1,0
				
			) as matchx7,
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
			  ) or (  
				substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)
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
			  ) or (  
				substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,11,2),0
				
			) as matchp6,
			if ( (
			  (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)
			  ) or (
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)
			  ) or (  
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)
			  ) or (  
				substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)
			  ) ),substring(c.lotto_numbers,13,2),0
				
			) as matchp7
			from afro_entry_child c
			inner join afro_entry_ticket t on t.nt_id=c.nt_id  
			inner join afro_entry e on e.entry_id=t.entry_id 
			inner join afro_lotto l on l.afro_id=e.afro_id 
			left join claimed m on ( m.nt_id=t.nt_id and m.which='A') 
			".$where." group by c.ne_id 
			having (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6+matchx7)>=3 order by l.draw_date desc,l.afro_id";
		
	} else {
		
		if(empty($_GET["srt"]))
			$_GET["srt"]=" desc ";
			
		if($_POST['rdoLotto']=="5")
			$where = " where afro_lotto.status='A' and afro_entry_ticket.cancel='N' and afro_entry.user_id='".$_SESSION['login']['userid']."'";
		else
			$where = " where afro_entry_ticket.cancel='N' and afro_entry.user_id='".$_SESSION['login']['userid']."'";
				
		if(trim($_POST['cmbMonth'])){
			if(!$where)
				$where .= " where ";
			else 
				$where .= " and ";	
			$where .= " date_format(date_entered,'%m%Y') = '".trim($_POST['cmbMonth'])."'";
		}
		
		$_sql = "SELECT nt_id,ticket_no 
			FROM afro_entry_ticket 
			inner JOIN afro_entry ON afro_entry.entry_id=afro_entry_ticket.entry_id 
			inner JOIN afro_lotto ON afro_lotto.afro_id=afro_entry.afro_id 
		".$where." ORDER BY ".($_GET["oby"]!="" ? $_GET["oby"] : "nt_id")." ".$_GET["srt"]; 

	}
?>