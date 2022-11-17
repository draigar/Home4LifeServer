<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='ticket-details';



//check_member_login('yes','MEMBER','',$_THISPAGENAME); //Check login



include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');



$content[0]=($_GET["frm"]=="naira")?"Naira Lotto Ticket Details":"Afro Millions Ticket Details";



include_once("header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



  <tr> 



    <td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">



        <tr> 



          <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Successfully purchased  



            your play slip</td>



        </tr>



        <tr> 



          <td align="left" valign="top"  background="<?=$_DIR["site"]["url"]?>images/img55.gif" style="background-repeat: repeat-y;"> 



            <table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">



              <tr> 



                <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td valign="top" align="left"  style="padding-left:1px;"><img src="<?=$_DIR["site"]["url"]?>images/menu9.png"></td>



                    </tr>



                    <tr> 



                      <td valign="top" align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">



                          <tr> 



                            <td width="100%" colspan="2" class="text16" style="padding-top:8px;padding-bottom:8px">Your 



                              Ticket Details</td>



                          </tr>



                          <tr> 



                            <td colspan="2"> <table width="100%" border="0" cellspacing="0" cellpadding="3">



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



                                            <tr> 



                                              <td>Play Vision Number: <?=$vision_number?"Yes":"No"?><br>



											  <?php if($vision_number) { echo substr($vision_number,0,1)."-".substr($vision_number,1,1)."-".substr($vision_number,2,1)."-".substr($vision_number,3,1)."-".substr($vision_number,4,1)."-".substr($vision_number,5,1)."-".substr($vision_number,6,1); } ?>	



											  <br></td>



                                            </tr>



                                            <tr> 



                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td><span class="text11">Dates</span><br>



                                                <?=$draw_date?><br>



                                                <br> <span class="text11">Lotto:</span><br>



                                                <?=$plays=count($lotto_numbers)?> plays X <img src="<?=$_DIR["site"]["url"]?>images/naira1.gif"> <?=$price?> for 1 draw 



                                                = <img src="<?=$_DIR["site"]["url"]?>images/naira1.gif"> <?=sprintf("%1.2f",(($price*$plays)*$weeks))?><br>



                                                <?php if($vision_number) { ?>



												1 Vision Number X <img src="<?=$_DIR["site"]["url"]?>images/naira1.gif"> <?=$vision_price?>



                                                = <img src="<?=$_DIR["site"]["url"]?>images/naira1.gif"> <?=sprintf("%1.2f",$vision_price)?><br>



												<?php } ?>



                                                <br>Total:<span class="text11"> <img src="<?=$_DIR["site"]["url"]?>images/naira1.gif"> <?=sprintf("%1.2f",((($price*$plays)*$weeks)+($vision_number?$vision_price:0)))?></span> 



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



                                  <td class="text" valign="top"><p><strong><font color="Green">You 



                                      have successfully purchased your Vision Lottery ticket.</font></strong><hr/></p>



                                <p>

									Thank you for buying your ticket online. Your Ticket is on the left of your screen. You do not have to print it, you can always view your tickets through the "View Tickets" menu on your Vision Account.

					

									</p>

									

                                    <p><hr/><a href="<?=$_DIR["site"]["url"]."view_tickets".$atend?>" class="link"><img src="<?=$_DIR["site"]["url"]?>images/continue.gif"></a></p>





</td>



                                </tr>



                              </table></td>



                          </tr>



                          <tr> 



                            <td colspan="2">&nbsp;</td>



                          </tr>



                        </table></td>



                    </tr>



                  </table></td>



              </tr>



              <tr> 



                <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>



              </tr>



            </table></td>



        </tr>



        <tr> 



          <td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>



        </tr>



      </table></td>



    <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



  </tr>



</table>



<?php include_once("footer.php"); ?>