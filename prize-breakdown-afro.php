<?php







include_once("includes/config/application.php"); //include config 







dbConnection('on'); //open database connection







$_THISPAGENAME='prize-breakdown-afro';







include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');







$content[0]="Prize Break Down";







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







                      <td valign="top" background="<?=$_DIR['site']['url']?>images/img20.gif"  style="background-repeat: repeat-y;"> 







                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">







                          <tr> 







                            <td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">







                                <tr> 







                                  <td width="57%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">







                                      <tr> 







                                        <td width="24%" valign="top"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="center">







                                            <tr> 







                                              <td width="75px" class="iconimg3">&nbsp;</td>







                                            </tr>







                                          </table></td>







                                        <td width="76%" valign="top"><table width="103%" border="0" cellspacing="0" cellpadding="0">







                                            <tr> 







                                              <td width="48%"><span class="per" style="color:#0072A8;font-weight:normal">Prize 







                                                breakdown</span><br>







                                                Lotto draw <?=strlen($afro[7])<4?substr("0000",0,4-strlen($afro[7])).$afro[7]:$afro[7]?><br>







                                              <?=$draw_date?><br> </td>







                                                    <td width="58%" align="center" valign="bottom">Vision Stars&nbsp;&nbsp;&nbsp;</td>







                                            </tr>







                                            <tr> 







                                              <td colspan="2" valign="top" style="padding-top:7px">







											  <table border="0" cellspacing="0" cellpadding="0">







                                                  <tr> 







                                                    <td width="30px" height="31px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img124a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[0]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="30px" height="31px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img124a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[1]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="30px" height="31px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img124a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[2]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="30px" height="31px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img124a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[3]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="30px" height="31px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img124a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[4]?></td>







													<td width="10px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="35px" height="32px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/star.gif" style="background-repeat:no-repeat" class="perstar"><?=$draw_number[5]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="35px" height="32px" align="center" valign="middle"  background="<?=$_DIR['site']['url']?>images/star.gif" style="background-repeat:no-repeat" class="perstar"><?=$draw_number[6]?></td>







                                                  </tr>







                                                </table><?php 

												if(count($winner_vision)>0) { ?>

												<br /><b>Vision Raffle Draw</b><br />

												<div style="margin-top:3px;padding-top:7px;background-image:url('<?=$_DIR['site']['url']?>images/img147.gif');width:182px;height:45px;color:#ffffff;" align="center" class="per"><?=$winner_vision[0]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[1]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[2]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[3]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[4]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[5]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[6]?></div>

												<?php } ?></td>







                                            </tr>







                                          </table></td>







                                      </tr>







                                    </table></td>







                                  <td width="40%" valign="top"><font face="Arial" size="+2" color="#0072A8"><b>Are you a winner?</b></font><br>







                                    







                                    Jackpot for this draw is<br> <img src="<?=$_DIR['site']['url']?>images/naira_resulta.gif"><font face="verdana" size="+2" color="#0072A8"><b><?=$jackpot?></b></font></font>







                                  </td>







                                </tr>







                              </table></td>







                          </tr>








                          <tr> 







                            <td valign="top" align="left" style="padding-top:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">







                                <tr> 







                                  <td width="70%" valign="top" align="center">







								  <table width="95%" border="0" cellspacing="0" cellpadding="0">







                                      <tr> 







                                        <td valign="top" align="centre"><table width="100%" border="0" cellspacing="0" cellpadding="0">







                                            <tr> 







                                              <td width="22%" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" class="num" style="background-repeat:repeat-x;padding-left:8px">No. 







                                                of matches</td>







                                              <td width="20%" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" class="num" style="background-repeat:repeat-x">No. 







                                                of winners</td>







                                              <td width="25%" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" class="num" style="background-repeat:repeat-x">Naira per winner</td>







                                              <td width="32%" height="37px" background="<?=$_DIR['site']['url']?>images/img115a.gif" class="num" style="background-repeat:repeat-x">Prize 







                                                fund</td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="#0E61BC">Match <?=$i=7?></font></td>







                                              <td class="text12" style="padding-left:10px"><font color="#0E61BC"><?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif" style="margin-top:2px;"><font color="#0E61BC"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







											<tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="#0E61BC">Match <?=--$i?></font></td>







                                              <td class="text12"style="padding-left:10px"><font color="#0E61BC"><?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="#0E61BC">Match <?=--$i?></font></td>







                                              <td class="text12"style="padding-left:10px"><font color="#0E61BC"><?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="#0E61BC">Match <?=--$i?></font></td>







                                              <td class="text12"style="padding-left:10px"><font color="#0E61BC"><?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="#0E61BC">Match <?=--$i?></font></td>







                                              <td class="text12"style="padding-left:10px"><font color="#0E61BC"><?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="31px" bgcolor="#DCDADA" class="text12" style="padding-left:8px"><font color="#0E61BC">Totals</font></td>







                                              <td bgcolor="#DCDADA" class="text12"style="padding-left:10px"><font color="#0E61BC"><?=$totwinner?></font></td>







                                             <td bgcolor="#DCDADA" class="text12"> <font color="Green"><?=$totperwin_BK?></font></td>







                                              <td bgcolor="#DCDADA" class="text12"><img src="<?=$_DIR['site']['url']?>images/nairabk.gif"><font color="#0E61BC"><b><font face="Arial" size="4"><?=$totfundpz?></font></b></font></td>







                                            </tr>







                                          </table></td>







                                      </tr>







                                      <tr> 







                                        <td>&nbsp;</td>







                                      </tr>







                                      <tr> 







                                        <td style="padding-left:5px;line-height:1.4em" class="listing"><p>Whilst 







                                            every care is taken to ensure the 







                                            accuracy of information containing 







                                            Vision Lottery results, The Vision Lottery and Games Limited







                                            cannot take any responsibility 







                                            for any errors or omissions. Prize 







                                            winning and all aspects of the Vision







                                            Lottery games are subject to Games 







                                            Rules and Procedures. </p>







                                          <a href="<?=$_DIR['site']['url']?>claimplocator" class="link">Where 







                                          can I claim my Vision







                                          Lottery prize?</a><br></td>







                                      </tr>







                                    </table><br></td>







                                  <td width="3%">&nbsp;</td>







                                  <td width="27%" valign="top" align="left">







								  <table width="95%" border="0" cellspacing="0" cellpadding="6">







                                      <tr> 







                                        <td height="37px" align="center" background="<?=$_DIR['site']['url']?>images/img115a.gif" style="background-repeat:repeat-x " class="num">Additional 







                                          information</td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><b><font color="#0072A8">No. of Jackpot







                                          Winner(s)</font></b><br>







                                          <b><?=number_format($result[7][0])?></b> <br></td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><b><font color="#0072A8">Machine 







                                          used for draw</font></b><br>







                                          <b>EMERALD</b><br></td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><b><font color="#0072A8">Ball 







                                          set used</font></b><br>







                                          <b>1</b></td>







                                      </tr>







                                      <tr> 







                                        <td><br>







                                          <br>







                                          <a href="javascript:history.back(0);"><img src="<?=$_DIR['site']['url']?>images/go_backa.gif" ></a></td>







                                      </tr>







                                    </table></td>







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