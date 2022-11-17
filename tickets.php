<?php







include_once("includes/config/application.php"); //include config 







dbConnection('on'); //open database connection







$_THISPAGENAME='tickets';





check_member_login('yes','MEMBER'); //Check login

//$formvalidation=true;







include_once($_DIR['inc']['code'].'tickets.php'); //include code file







$content[0]="Ticket";







include_once("acc_header.php");







?>







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







                            <td style="padding:5px 0" class="ticket_status">Ticket 







                              status: Current</td>







                          </tr>







                          <tr> 







                            <td>&nbsp;</td>







                          </tr>







                          <tr> 







                            <td height="53px" background="<?=$_DIR["site"]["url"]?>images/img46.png" style="background-repeat:no-repeat;padding-left:18px" class="text11"><span style="padding-right:25px">Ticket 1 - View your multiple tickets for this draw:</span>Page:&nbsp;  <?php if($curpos>1) { ?><a href="<?=$_DIR["site"]["url"]."tickets".$atend."ticket_no".$_DELIM.$prevticketno.$baratend."frm".$_DELIM.$_GET["frm"].$baratend?>" class="next"><b><font color="blue">&laquo;Prev</font></b></a> <?php } ?><?=$curpos?> of <?=$numrec?> <?php if($nextticketno) { ?><a href="<?=$_DIR["site"]["url"]."tickets".$atend."ticket_no".$_DELIM.$nextticketno.$baratend."frm".$_DELIM.$_GET["frm"].$baratend?>" class="next"> <b><font color="blue">Next&raquo;</font></b> </a><?php } ?></td>







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







                                  <td class="text" valign="top">
								  <?php if($lotto_status=="D" && count($resultx)<=0) { ?>
								  <p>This ticket has not won any prizes, but 







                                    wins may occur in the future if there are 







                                    remaining draws yet to take place for this 







                                    ticket.</p>

                        <p>Check your numbers for yourself using the handy <a href="<?=$_DIR["site"]["url"].$resultpage.$atend?>" class="link">Results 

                          Checker</a>. Select the game of your choice form the 

                          drop down list.</p>
<?php } ?>
                        <p>

						<?php 

						  if( count($resultx) > 0 )	

							echo "<strong>Winning Numbers Are:</strong><br>"; 

						?>

						<table width="100%" border="0" cellspacing="2" cellpadding="2">







												  <?php 



												  $len=count($lotto_numbers);







												  for($i=0;$i<$len;$i++) {

														

														if( count($resultx[$ne_id[$i]])<=0 ) continue;

														



												  ?>



                                                  <tr> 







                                                    <td width="12%" align="center" class="text13"><?=chr(65+$i)?></td>

											

<?php if($resultx[$ne_id[$i]][0]==substr($lotto_numbers[$i],0,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],0,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],0,2)?></td>

<?php } 

if($resultx[$ne_id[$i]][1]==substr($lotto_numbers[$i],2,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],2,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],2,2)?></td>

<?php } 

if($resultx[$ne_id[$i]][2]==substr($lotto_numbers[$i],4,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],4,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],4,2)?></td>

<?php } 

if($resultx[$ne_id[$i]][3]==substr($lotto_numbers[$i],6,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],6,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],6,2)?></td>

<?php } 

if($resultx[$ne_id[$i]][4]==substr($lotto_numbers[$i],8,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],8,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],8,2)?></td>

<?php } 

if($resultx[$ne_id[$i]][5]==substr($lotto_numbers[$i],10,2)) { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],10,2)?></b></font></td>

<?php } else { ?>

	<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],10,2)?></td>

<?php } 

if($_GET["frm"]=="afro") { 

	if($resultx[$ne_id[$i]][6]==substr($lotto_numbers[$i],12,2)) { ?>

		<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_numbers[$i],12,2)?></b></font></td>

<?php } else { ?>

		<td width="40px" height="40px" align="center" class="text13" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><?=substr($lotto_numbers[$i],12,2)?></td>

<?php } } ?>

                                                  </tr>







												  <?php } ?>







                                                </table></p></td>







                                </tr>







								<tr><td colspan="3" style="line-height:1.7em">View your multiple tickets for this draw<br><span class="text11">Page <?php if($curpos>1) { ?><a href="<?=$_DIR["site"]["url"]."tickets".$atend."ticket_no".$_DELIM.$prevticketno.$baratend."frm".$_DELIM.$_GET["frm"].$baratend?>" class="next"><b><font color="blue">&laquo;Prev</font></b></a> <?php } ?><?=$curpos?> of <?=$numrec?> <?php if($nextticketno) { ?><a href="<?=$_DIR["site"]["url"]."tickets".$atend."ticket_no".$_DELIM.$nextticketno.$baratend."frm".$_DELIM.$_GET["frm"].$baratend?>" class="next"><b><font color="blue">Next&raquo;</font></b></a><?php } ?></span></td></tr>







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