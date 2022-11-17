<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='draw-history-afro';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Afro Millions Draw History";



include_once("header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



<tr>



<td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">



<tr> 



          <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Afro Millions - Prize Break Down</td>



</tr>



<tr> 



  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">



  



  



 <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">



                    <tr> 



                      <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img114.gif" width="681" height="8"></td>



                    </tr>



                    <tr> 



                      <td height="629" valign="top" background="<?=$_DIR['site']['url']?>images/img20.gif"  style="background-repeat: repeat-y;">



<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">



                          <tr>



                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                                <tr> 



                                  <td width="13%" align="center"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="center">



                                            <tr> 



                                              <td width="75px" class="iconimg3">&nbsp;</td>



                                            </tr>



                                          </table></td>



                                  <td width="40%" style="line-height:1.7em"><span class="accountads"><font color="#0072A8">Draw 



                                    history for Afro Millions</font></span><br>



                                    <a href="#" class="linksign">Download draw 



                                    history for Lotto</a><br></td>



                                  <td width="35%" valign="top" style="padding-top:18px"><table width="87%" border="0" cellspacing="0" cellpadding="2">



                                      <tr>



                                        <td width="26%" class="text11">Game</td>



                                        <td width="74%">



										  <select id="lotto" class="combo5">



											 <option value="draw-history-afro">Afro Millions</option>



											 <option value="draw-history-naira">Naira Lotto</option>



										  </select>



										  </td>



                                      </tr>



                                      <tr>



                                        <td class="text11">Draw</td>



                                        <td><select name="cmbDraw" class="combo5">



                                            <option value="Friday">Friday</option>



                                            <option value="Saturday">Saturday</option>



                                          </select></td>



                                      </tr>



                                    </table></td>



                                  <td width="12%" style="padding-top:21px"><a href="javascript:void(0);" onClick="self.location.href='<?=$_DIR['site']['url']?>'+document.getElementById('lotto').options[document.getElementById('lotto').selectedIndex].value+'<?=$atend?>'"><img src="<?=$_DIR['site']['url']?>images/go_button_blue2.gif" border="0"></a></td>



                                </tr>



                              </table></td>



                          </tr>



                          <tr>



                            <td>&nbsp;</td>



                          </tr>



                          <tr>



                            <td height="536" align="left" valign="top">



<table border="0" cellspacing="0" cellpadding="0" align="center">

                                <tr> 

                                  <td width="102px" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" class="eurohistory" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;">Date</td>

                                  <td width="144px" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif"  align="center" style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Ball Numbers</td>

                                  <td width="105px" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Raffle Draw</td>

                                  <td width="105px" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Jackpot</td>

                                  <td width="55" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Draw</td>

                                  <td width="67" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Machine </td>

                                  <td width="33" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Set</td>

                                  <td width="60" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif"  align="center" style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Prizes</td>

                                </tr>

								<?php  

									if($rsIn && !$rsIn->EOF) {

										$pre=""; $cur="";

										while(!$rsIn->EOF) {

											$drawNo=str_replace(",","-",$rsIn->fields['draw_number']);
											$winVis="";
											if($rsIn->fields['winner_vision_number']) $winVis=str_replace(",","-",$rsIn->fields['winner_vision_number']);
											$cur=$rsIn->fields['month'];											

											if($cur!=$pre) {

								?>

								<tr> 

                                  <td colspan="8" height="24px" style="padding-left:6px;border-bottom:1px solid #0E61BC"><strong><?=$rsIn->fields['month']?></strong></td>

                                </tr>

								<?php 

										$pre=$rsIn->fields['month'];

									} 

								?>

                                <tr> 

                                  <td height="35px" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC" align="center"><font color="#0E61BC"><?=$rsIn->fields['to_time2']?></font></td>

                                  <td align="center" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"><font color="#0E61BC"><?=$drawNo?></font></td>

                                  <td align="center" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"><font color="#0E61BC"><?=$winVis?></font></td>

                                  <td align="left" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"> <img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=$rsIn->fields['match7']?></font> </td>

                                  <td align="center" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"><font color="#0E61BC"><?=strlen($rsIn->fields['afro_id'])<4?substr("0000",0,4-strlen($rsIn->fields['afro_id'])).$rsIn->fields['afro_id']:$rsIn->fields['afro_id']?></font></td>

                                  <td align="center" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"><font color="#0E61BC">ARTHUR</font></td>

                                  <td align="center" style="border-bottom:1px solid #0E61BC;border-right:1px solid #0E61BC"><font color="#0E61BC">3</font></td>

                                  

                            <td align="center" style="border-bottom:1px solid #0E61BC;"><a href="<?=$_DIR['site']['url']?>prize-breakdown-afro<?=$atend?>idx<?=$_DELIM."i".md5($rsIn->fields['afro_id']).$baratend?>">View</a></td>

                                </tr>

								<?php   

											$rsIn->MoveNext();

										}

									}

									if($rsIn) $rsIn->close();

								?>

								<tr>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                </tr>



                              </table></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img21.gif" width="681" height="8"></td>



                    </tr>



                  </table> 



  



  </td>



</tr>



<tr> 



  <td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>



</tr>



</table></td>



</tr>



</table>



<?php include_once("footer.php"); ?>