<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
if($_APP_LIVE=="Y") {
	$_GET["ticket_no"]=finding_id_from_url("ticket_no",$_DELIM);
	$_GET["frm"]=finding_id_from_url("frm",$_DELIM);
}
if(!empty($_GET['ticket_no']) && $_GET["frm"]=="naira" ) {  
  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,e.entry_id,
	date_format(e.date_entered,'%d-%b-%Y at %h:%i') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,
	date_format(to_time,'%d%m%Y') as to_time3,l.status
	FROM naira_entry_ticket t
	LEFT JOIN naira_entry e ON e.entry_id=t.entry_id
	LEFT JOIN naira_lotto l ON l.naira_id=e.naira_id
	LEFT JOIN gcm ON gcm.`condition`=e.method_id
	WHERE gcm.condition_type='METHOD' AND t.ticket_no='".$_GET['ticket_no']."'";
  $rs =$_CONN->Execute($qry);
  if($rs && !$rs->EOF){
	$ticket_no			= $rs->fields['to_time3']."-".$rs->fields['ticket_no'];
	$nt_id				= $rs->fields['nt_id'];
	$price				= $rs->fields['price'];
	$value				= $rs->fields['value'];
	$draws				= array_search($rs->fields['draws'],$_WEEK_DAY);
	$weeks				= $rs->fields['weeks'];
	$vision_number		= $rs->fields['vision_numbers'];
	$vision_price		= $rs->fields['vision_price'];
	$date_entered		= $rs->fields['date_entered'];
	$draw_date			= $rs->fields['to_time1'];
	$ticket_no			= $rs->fields['ticket_no'];
	$entry_id			= $rs->fields['entry_id'];
	$lotto_status			= $rs->fields['status'];	
  } else {
  	if($rs) $rs->close();  
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
  }
  if($rs) $rs->close();  

  //Get Winning Numbers
  $resultx=get_naira_winning_number($nt_id);

  $qry="SELECT * FROM naira_entry_child WHERE nt_id='".$nt_id."'";
  $rs =$_CONN->Execute($qry);
  $k=0;
  while(!$rs->EOF){
    if($rs->fields['lotto_numbers']) {
		$ne_id[$k] 		   = $rs->fields['ne_id'];
		$lotto_numbers[$k] = $rs->fields['lotto_numbers'];
		$ld[$k]			   = $rs->fields['ld'];
		$k++;
	}
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  $curpos=0;
  $numrec=0;
  $recno=0;
  $qry="SELECT ticket_no FROM naira_entry_ticket WHERE entry_id='".$entry_id."' order by entry_id";
  $rs=$_CONN->Execute($qry);
  $numrec=$rs->RecordCount();
  while(!$rs->EOF){
  	$curpos++;
	if($rs->fields['ticket_no']==$_GET['ticket_no']) {
		$rs->MoveNext();
		$nextticketno=$rs->fields['ticket_no'];
		$rs->Move($recno--);
		$rs->Move($recno--);
		$prevticketno=$rs->fields['ticket_no'];
		break;
	}
	$recno++;	
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  $resultpage="result-naira-lotto";  
}
elseif(!empty($_GET['ticket_no']) && $_GET["frm"]=="afro" ) {
  $qry="SELECT t.ticket_no,t.nt_id,t.entry_id,t.price,e.method_id,e.draws,e.weeks,e.vision_numbers,e.vision_price,gcm.value,
	date_format(e.date_entered,'%d-%b-%Y at %h:%i') as date_entered,date_format(l.to_time,'%W, %d %b %Y') as to_time1,l.status 
	FROM afro_entry_ticket t
	LEFT JOIN afro_entry e ON e.entry_id=t.entry_id
	LEFT JOIN afro_lotto l ON l.afro_id=e.afro_id
	LEFT JOIN gcm ON gcm.`condition`=e.method_id
	WHERE gcm.condition_type='METHOD' AND t.ticket_no='".$_GET['ticket_no']."'";
  $rs =$_CONN->Execute($qry);
  if($rs && !$rs->EOF){
	$ticket_no			= $rs->fields['ticket_no'];
	$nt_id				= $rs->fields['nt_id'];
	$price				= $rs->fields['price'];
	$value				= $rs->fields['value'];
	$draws				= array_search($rs->fields['draws'],$_WEEK_DAY);
	$weeks				= $rs->fields['weeks'];
	$vision_number		= $rs->fields['vision_numbers'];
	$vision_price		= $rs->fields['vision_price'];
	$date_entered		= $rs->fields['date_entered'];
	$draw_date			= $rs->fields['to_time1'];
	$ticket_no			= $rs->fields['ticket_no'];
	$lotto_status			= $rs->fields['status'];	
  } 
  else {
  	if($rs) $rs->close();  
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
  }
  if($rs) $rs->close();  

  //Get Winning Numbers
  $resultx=get_afro_winning_number($nt_id);

  $qry="SELECT * FROM afro_entry_child WHERE nt_id='".$nt_id."'";
  $rs =$_CONN->Execute($qry);
  $k=0;
  while(!$rs->EOF){
    if($rs->fields['lotto_numbers']) {
		$ne_id[$k] 		   = $rs->fields['ne_id'];
		$lotto_numbers[$k] = $rs->fields['lotto_numbers'];
		$ld[$k]			   = $rs->fields['ld'];
		$k++;
	}
	$rs->MoveNext();
  } 
  if($rs) $rs->close();

  $curpos=0;
  $numrec=0;
  $recno=0;
  $qry="SELECT ticket_no FROM afro_entry_ticket WHERE entry_id='".$entry_id."' order by entry_id";
  $rs=$_CONN->Execute($qry);
  $numrec=$rs->RecordCount();
  while(!$rs->EOF){
  	$curpos++;
	if($rs->fields['ticket_no']==$_GET['ticket_no']) {
		$rs->MoveNext();
		$nextticketno=$rs->fields['ticket_no'];
		$rs->Move($recno--);
		$rs->Move($recno--);
		$prevticketno=$rs->fields['ticket_no'];
		break;
	}
	$recno++;	
	$rs->MoveNext();
  } 
  if($rs) $rs->close();
  $resultpage="result-afro-millions";	
} else {
	header("location: ".$_DIR["site"]["url"]."index".$atend);
	exit();
}
?>


<link href="<?=$_DIR["site"]["url"]?>css/style.css" rel="stylesheet" type="text/css">




<table width="100%" border="0" cellpadding="0" cellspacing="0">















              <tr><td width="23%" valign="top" align="left">















			  <?php include_once("leftmenu.php"); ?>















			  </td>















				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>















				  















                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">















                    <tr>















                      <td height="48px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">















              <tr> 















                <td width="4%">&nbsp;</td>















                <td width="63%" class="vticket">View Tickets</td>















                <td width="26%" align="right"><a href="javascript:window.print()" class="link55">Print</a></td>















                <td width="7%" valign="top"><a href="javascript:window.print()"><img src="<?=$_DIR["site"]["url"]?>images/img51.png" width="32" height="27" border="0"></a></td>















              </tr>















            </table></td>















                    </tr>















                    <tr>















                      <td  valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">















                         

                          <tr> 















                            <td>&nbsp;</td>















                          </tr>















                          <tr> 















                            <td height="53px" background="<?=$_DIR["site"]["url"]?>images/img46.png" style="background-repeat:no-repeat;padding-left:18px" class="text11"><span style="padding-right:25px">Ticket Details</td>















                          </tr>















                          <tr>















                            <td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="3">















                                <tr> 















                                  <td width="52%" height="12px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>















                                  <td width="2%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>















                                  <td width="46%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>















                                </tr>















                                <tr>















                                  <td valign="top" align="left"><table width="341px" border="0" cellspacing="0" cellpadding="0">















                                      <tr> 















                                        <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img47.png" width="341" height="42"></td>















                                      </tr>















                                      <tr> 















                                        <td background="<?=$_DIR["site"]["url"]?>images/img48.png" style="background-repeat:repeat-y" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">















                                            <tr> 















                                              <td align="center" valign="top">















												<table width="133px" border="0" cellspacing="0" cellpadding="0" align="center">















												<tr>















													<td class="iconimg<?=$_GET["frm"]=="afro"?"4":"5"?>">&nbsp;</td>















												</tr>















												</table>















											  </td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td style="line-height:1.5em"> <span class="text11">Ticket 















                                                no:</span> 















                                                <?=$ticket_no?>















                                                <br/> <span class="text11">Purchase 















                                                date and time:</span><br/> 















                                                <?=$date_entered?>















                                                <br/> <span class="text11">Draws 















                                                entered:</span> Single draw<br/> 















                                                <span class="text11">Channel:</span> 















                                                <?=$value?>















                                                <br/> <br/></td>















                                            </tr>















                                            <tr> 















                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td valign="top" align="left" style="padding-top:10px;padding-bottom:8px">















											  	  <table width="100%" border="0" cellspacing="2" cellpadding="2">















												  <?php 















												  $len=count($lotto_numbers);















												  for($i=0;$i<$len;$i++) {















												  ?>















                                                  <tr> 















                                                    <td width="12%" align="center" class="text13"><?=chr(65+$i)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],0,2)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],2,2)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],4,2)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],6,2)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],8,2)?></td>















                                                    <td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],10,2)?></td>















													<?php if($_GET["frm"]=="afro") { ?>















														<td width="12%" align="center" class="text13"><?=substr($lotto_numbers[$i],12,2)?></td> 















													<?php } ?>















                                                    <td width="12%" align="center"><?=$ld[$i]=="Y"?"LD":""?></td>















                                                  </tr>















												  <?php } ?>















                                                </table></td>















                                            </tr>















                                            <tr> 















                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td style="line-height:1.5em">Draws: <?=$draws?><br>















                                                Weeks: <?=$weeks?><br></td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















											<tr> 















                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>







											<?php if($curpos==1) { ?>







                                            <tr> 















                                              <td>Play Vision Number: <?=$vision_number?"Yes":"No"?><br>















											  <?php if($vision_number) { echo substr($vision_number,0,1)."-".substr($vision_number,1,1)."-".substr($vision_number,2,1)."-".substr($vision_number,3,1)."-".substr($vision_number,4,1)."-".substr($vision_number,5,1)."-".substr($vision_number,6,1); } ?>	















											  <br></td>















                                            </tr>







											<tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>







											<tr> 















                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>







											<?php } ?>







                                            







                                            <tr> 















                                              <td><span class="text11">Draw Date</span><br>















                                                <?=$draw_date?><br>















                                                <br> <span class="text11">Lotto entry cost breakdown:</span><br>















                                                <?=$plays=count($lotto_numbers)?> lines cost <img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=$price?> each for 1 draw 















                                                = <img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=sprintf("%1.2f",($price*$plays)*$weeks)?><br>















                                                <?php if($curpos==1 && $vision_number) { ?>















												1 Vision Number cost <img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=$vision_price?>















                                                = <img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=sprintf("%1.2f",$vision_price)?><br>















												<?php } else $vision_number=0; ?>















                                                <br>Total:<span class="text11"> <img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=sprintf("%1.2f",((($price*$plays)*$weeks)+($vision_number?$vision_price:0)))?></span> 















                                              </td>















                                            </tr>















                                            <tr> 















                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                            <tr> 















                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>















                                            </tr>















                                          </table></td>















                                      </tr>















                                      <tr> 















                                        <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img49.png" width="341" height="8"></td>















                                      </tr>















                                    </table></td>















                                  <td>&nbsp;</td>















                                  
                      <td class="text" valign="top"> </p> </td>















                                </tr>















								<tr>
                      <td colspan="3" style="line-height:1.7em">&nbsp;</td>
                    </tr>















                              </table></td>















                          </tr>















                        </table></td>















                    </tr>















                    <tr>















                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>















                    </tr>















                  </table></td>















              </tr>















            </table>















<?php include_once("acc_footer.php"); ?>