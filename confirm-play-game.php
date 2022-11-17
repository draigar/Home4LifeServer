<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='confirm-play-game';



check_member_login('yes','MEMBER','',$_THISPAGENAME); //Check login



include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');



$content[0]="Confirm Naira Lotto";



$noright=true;



include_once("header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



              <tr>



                <td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td height="72" background="<?=$_DIR['site']['url']?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Confirm your play slip</td>



                    </tr>



                    <tr> 



                      <td align="left" valign="top"  background="<?=$_DIR['site']['url']?>images/img55.gif" style="background-repeat: repeat-y;">



<table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">



                          <tr> 



                            <td valign="top" background="<?=$_DIR['site']['url']?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">



                                <tr> 



                                  <td valign="top" align="left"  style="padding-left:1px;"><img src="<?=$_DIR['site']['url']?>images/menu7.png" width="679" height="58"></td>



                                </tr>



                                <tr> 



                                  <td valign="top" align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">



                                      <tr> 



                                        <td colspan="2" class="text16" style="padding-top:8px;padding-bottom:8px">Confirm your play slip</td>



                                      </tr>



                                      <tr> 



                                        <td colspan="2" class="text"><p>Please confirm 



                                          that you wish to complete your purchase. 



                                          <img src="<?=$_DIR['site']['url']?>images/naira.gif"> <?=sprintf("%1.2f",$total_amount)?> will be deducted from your 



                                          Vision Lottery Account. Use the buttons 



                                          on each page rather than the Back button 



                                          in your browser during this process.<br>



                                          The top prize for Vision Number is <strong><img src="<?=$_DIR['site']['url']?>images/naira.gif"> <?=$naira[6]?>**</strong>.</p>



                                          <p>Please note, by clicking 'Buy now', 



                                          you accept and agree to be bound by 



                                          the <a href="#" class="linksign">Interactive Account Terms and Conditions</a>, 



                                          the <a href="#" class="linksign">Rules for Draw-Based Games Played 



                                          Interactively</a> and the <a href="#" class="linksign">Lotto Game Procedures.</a></p>



                                          </td>



                                      </tr>



									  <tr> 



                                        <td colspan="2">&nbsp;</td>



                                      </tr>



                                      <tr> 



                                        <td  colspan="2" bgcolor="#F6F6F6" style="border-bottom:2px solid #CCCCCC;padding:8px;line-height:1.9em"><p>





                                         <strong>Edit your play slip now by 



                                            clicking on the link below.</strong> 



                                          </p></td>



                                      </tr>



                                      <tr> 



                                        <td colspan="2">&nbsp;</td>



                                      </tr>



                                      <tr> 



                                        <td width="37%"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR['site']['url']?>images/cancel.png" width="75" height="23" border="0"></a>&nbsp;&nbsp; 



                                          <a href="<?=$_DIR["site"]["url"]?>naira-lotto<?=$atend."act".$_DELIM."editnairapslip"?>"><img src="<?=$_DIR['site']['url']?>images/make_changes.png" border="0"></a> 



                                        </td>



                                        <td width="63%" bgcolor="#F6F6F6" style="padding:6px" valign="top">Remember, 



                                          to play Vision Lottery games interactively, 



                                          you must be a Nigeria resident</a> 



                                          - and must only play in a country  and state where 



                                          it is lawful to do so.</a><br/><br/>



										 <div style="float:right;margin-top:-16px;padding-right:15px">



										 <form name="frmBuyNow" method="post" action="<?=$_SERVER['REQUEST_URI']?>">



										 	<input type="hidden" name="hidAction" value="buynow">



										 	<input type="image" src="<?=$_DIR['site']['url']?>images/buy_now.gif" width="86" height="23" border="0">



										 </form>



										 </div> 



                                        </td>



                                      </tr>



                                    </table></td>



                                </tr>



                              </table></td>



                          </tr>



                          <tr> 



                            <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img21.gif" width="681" height="8"></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td><img src="<?=$_DIR['site']['url']?>images/img44.gif" width="705" height="15"></td>



                    </tr>



                  </table></td>



				  <td width="3%"><img src="<?=$_DIR['site']['url']?>images/spacer.png"></td>



				  



                <td width="23%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td valign="top" align="left"><table width="234px"  border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            <td width="234px" height="90px" valign="top" background="<?=$_DIR['site']['url']?>images/img80.gif" style="background-repeat: no-repeat;"><br> 



                              <br> <table width="99%" border="0" cellspacing="0" cellpadding="0">



                                <tr> 



                                  <td width="16%" align="center">&nbsp;</td>



                                  <td width="84%" align="center" class="num">The 



                                    Nigeria's biggest <br>



                                    millionaire-making game </td>



                                </tr>



                              </table></td>



                          </tr>



                          <tr> 



                            <td background="<?=$_DIR['site']['url']?>images/img98.gif"style="background-repeat:repeat-y;padding-left:20px" valign="top" align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0">



                                <tr> 



                                  <td colspan="3" style="padding:7px 0" class="basket">Play 



                                    slip no.1</td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td width="15%" height="24px" align="center" class="basket">A</td>



                                  <td width="85%" class="basket"><?=getNumber(0,0)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px"  class="basket">B</td>



                                  <td class="basket"><?=getNumber(0,1)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px" class="basket">C</td>



                                  <td class="basket"><?=getNumber(0,2)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px" class="basket">D</td>



                                  <td class="basket"><?=getNumber(0,3)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px" class="basket">E</td>



                                  <td class="basket"><?=getNumber(0,4)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px" class="basket">F</td>



                                  <td class="basket"><?=getNumber(0,5)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td align="center" height="24px" class="basket">G</td>



                                  <td class="basket"><?=getNumber(0,6)?></td>



                                </tr>



                                <tr> 



                                  <td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                                </tr>



                                <tr> 



                                  <td height="15px" colspan="3">&nbsp;</td>



                                </tr>



                                <tr> 



                                  <td colspan="3" height="69px" valign="top" background="<?=$_DIR['site']['url']?>images/img101.gif" style="background-repeat:no-repeat;padding-top:0px;padding-left:45px"><table width="80%" border="0" cellspacing="0" cellpadding="1" style="">



                                      <tr> 



                                        <td colspan="7" style="padding-left:5px;color:#FFFFFF;padding-top:23px;"><strong><?=$my_basket['vision']?"":"Not"?> Entered</strong></td>



                                      </tr>



                                      <tr> 



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(0)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(1)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(2)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(3)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(4)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(5)?>" readonly class="textfield12"></td>



                                        <td><input type="text" name="textfield" value="<?=getVisionDigit(6)?>" readonly class="textfield12"></td>



                                      </tr>



                                    </table></td>



                                </tr>



                                <tr>



                                  <td colspan="3" valign="top" style="padding-top:5px"><table width="96%" border="0" cellspacing="1" cellpadding="5" align="center">



                                      <tr> 



                                        <td>Draws: <strong><?=$my_basket['draws']?></strong> </td>



                                      </tr>



                                      <tr> 



                                        <td>Weeks: <strong><?=$my_basket['weeks']?></strong></td>



                                      </tr>



                                      <tr>



                                        



                            <td>Amount to pay: <strong> <img src="<?=$_DIR['site']['url']?>images/naira.gif"> 



                              <?=sprintf("%1.2f",$total_amount)?>



                              </strong></td>



                                      </tr>



                                    </table></td>



                                </tr>



                              </table></td>



                          </tr>



                          <tr> 



                            <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img79.gif" width="234" height="7"></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr>



                      <td height="10px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>



                    </tr>



                  </table></td>



				  



              </tr>



            </table>



<?php include_once("footer.php"); ?>