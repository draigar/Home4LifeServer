<?php







include_once("includes/config/application.php"); //include config 







dbConnection('on'); //open database connection







$_THISPAGENAME='prize-breakdown-naira';







include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');







$content[0]="Prize Break Down";







include_once("header.php");







?>







<table width="100%" border="0" cellpadding="0" cellspacing="0">







<tr>







<td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">







<tr> 







          <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Naira 







            Lotto - Prize Break Down</td>







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







                                              <td width="75px" class="iconimg2">&nbsp;</td>







                                            </tr>







                                          </table></td>







                                        <td width="76%" valign="top"><table width="103%" border="0" cellspacing="0" cellpadding="0">







                                            <tr> 







                                              <td width="67%"><span class="per" style="color:#008025;font-weight:normal">Prize 







                                                breakdown</span><br>







                                                Lotto draw <?=strlen($naira[7])<4?substr("0000",0,4-strlen($naira[7])).$naira[7]:$naira[7]?><br>







                                                <?=$draw_date?><br> </td>







                                                    <td width="33%" align="left" valign="bottom">&nbsp;</td>







                                            </tr>







                                            <tr> 







                                              <td colspan="2" valign="top" style="padding-top:7px">







											  <table border="0" cellspacing="0" cellpadding="0">







                                                  <tr> 







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[0]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[1]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[2]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[3]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[4]?></td>







													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                                    <td width="33px" height="35px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/img113a.png" style="background-repeat:no-repeat" class="per"><?=$draw_number[5]?></td>







                                                  </tr>







                                                </table><?php 

												if(count($winner_vision)>0) { ?>

												<br /><b>Vision Number Draw</b><br />

												<div style="margin-top:3px;padding-top:7px;background-image:url('<?=$_DIR['site']['url']?>images/img146.gif');width:184px;height:52px;color:#ffffff;" align="center" class="per"><?=$winner_vision[0]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[1]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[2]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[3]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[4]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[5]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[6]?></div>

												<?php } ?></td>







                                            </tr>







                                          </table></td>







                                      </tr>







                                    </table></td>







                                  <td width="40%" valign="top"><b><font face="Arial" size="+2" color="Green">Are you a winner?</font></b>







                                   <br>







                                    Jackpot for this draw<br> <img src="<?=$_DIR['site']['url']?>images/nairawht.gif"><font face="Arial" size="+2" color="Green"><b><?=number_format($jackpot,2)?></b></font>







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







                                        <td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">







                                            <tr> 







                                              <td width="22%" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" class="num" style="background-repeat:repeat-x;padding-left:8px">No. 







                                                of matches</td>







                                              <td width="20%" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" class="num" style="background-repeat:repeat-x">No. 







                                                of winners</td>







                                              <td width="25%" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" class="num" style="background-repeat:repeat-x">Naira per winner







                                          </td>







                                              <td width="32%" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" class="num" style="background-repeat:repeat-x">Prize 







                                                fund</td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="Green">Match <?=$i=6?></font></td>







                                              <td class="text12"><font color="Green">&nbsp;&nbsp;<?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="green"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="green"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="Green">Match <?=--$i?></font></td>







                                              <td class="text12"><font color="Green">&nbsp;&nbsp;<?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="Green">Match <?=--$i?></font></td>







                                              <td class="text12"><font color="Green">&nbsp;&nbsp;<?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="1px" colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>







                                            </tr>







                                            <tr bgcolor="#FAFAFA"> 







                                              <td height="31px" style="padding-left:8px"><font color="Green">Match <?=--$i?></font></td>







                                              <td class="text12"><font color="Green">&nbsp;&nbsp;<?=$result[$i][0]?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][2],2)?></font></td>







                                              <td><img src="<?=$_DIR['site']['url']?>images/naira.gif"><font color="Green"><?=number_format($result[$i][1],2)?></font></td>







                                            </tr>







                                            <tr> 







                                              <td height="31px" bgcolor="#DCDADA" class="text12" style="padding-left:8px"><font color="Green">Totals</font></td>







                                              <td bgcolor="#DCDADA" class="text12"><font color="Green">&nbsp;&nbsp;<?=$totwinner?></font></td>







                                              <td bgcolor="#DCDADA"></td>







                                              <td bgcolor="#DCDADA" class="text12"><img src="<?=$_DIR['site']['url']?>images/nairagk.gif"><font face="Arial" color="Green"><b><font size="+1"><?=$totfundpz?></font></b></font></td>







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







                                            Vision Lottery results, Vision Lottery and Games Limited







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







								  <table width="95%"  border="0" cellspacing="0" cellpadding="6" >







                                      <tr valign="top"> 







                                        <td    height="37px" align="center" background="<?=$_DIR['site']['url']?>images/img115.gif" style="background-repeat:repeat-x " class="num">Additional 







                                          information</td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><font color="Green"><b>Jackpot 







                                          Winner(s)</b></font><br>







                                          <b><?=number_format($result[6][0])?></b><br></td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><b><font color="Green">Machine 







                                          used for draw</font></b><br>







                                          <b>EMERALD</b><br></td>







                                      </tr>







                                      <tr> 







                                        <td  bgcolor="#FAFAFA"><b><font color="Green">Ball 







                                          set used</font></b><br>







                                         <b> 1</b></td>







                                      </tr>







                                      <tr> 







                                        <td><br>







                                          <br>







                                          <a href="javascript:history.back(0);"><img src="<?=$_DIR['site']['url']?>images/go_back.gif" width="84" height="23"></a></td>







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