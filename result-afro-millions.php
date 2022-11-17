<?php


include_once("includes/config/application.php"); //include config 


dbConnection('on'); //open database connection


$_THISPAGENAME='result-afro-millions';


include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');


$content[0]="Afro Millions Check Result";


$noright=true;







$formvalidation=true; //for form validation







include_once("header.php"); 


?>


  <table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">


              <tr> 


                <td width="61%"  valign="top">


                  <table width="91%" border="0" cellspacing="0" cellpadding="0" align="center">


                    <tr>


                      <td align="center"><span class="bigtext">Find out if you've Won!<br>


</span><br><br>


            <span class="ticket_status">Check your Latest Afro Millions numbers below</span><br>


<span style="font-size:13px">If you buy your tickets online, we<br>


                           check your numbers for you and<br>


						   tell you if you've won.</span></td>


                        </td>


                    </tr>


                    <tr>


                      <td valign="top"><br>


					  <?php if($draw_number) { ?>


					  <table width="450px" border="0" cellspacing="0" cellpadding="0" align="center">


                          <tr> 


                            <td height="30px" background="<?=$_DIR['site']['url']?>images/img106.gif" style="background-repeat:no-repeat;padding-left:15px" class="text12">Latest 


                              draw result for Afro Millions</td>


                          </tr>


                          <tr> 


                            <td background="<?=$_DIR['site']['url']?>images/img108.gif" style="background-repeat:repeat-y;padding-top:8px" valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">


                                <tr> 


                                  <td height="110px" colspan="2" valign="top">


<table width="100%" border="0" cellspacing="0" cellpadding="4">


                                      <tr> 


                                        <td width="20%" valign="top"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="left">


                                            <tr> 


                                              <td class="iconimg3">&nbsp;</td>


                                            </tr>


                                          </table></td>


                                        <td valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">


                                            <tr>                                               


                                  			<td width="75%"><span class="linkblue"><strong>Afro Millions</strong></span><br>


                                                Lotto draw <?=strlen($afro_id)<4?substr("0000",0,4-strlen($afro_id)).$afro_id:$afro_id?><br>


                                                Draw date: <?=$draw_date?> &nbsp;&nbsp;&nbsp; Vision Stars</td>


                                              <td width="25%" align="right" valign="top">&nbsp;</td>


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


													<td width="8px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                                    <td width="35px" height="32px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/star.gif" style="background-repeat:no-repeat" class="perstar"><?=$draw_number[5]?></td>


													<td width="4px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                                    <td width="35px" height="32px" align="center" valign="middle" background="<?=$_DIR['site']['url']?>images/star.gif" style="background-repeat:no-repeat" class="perstar"><?=$draw_number[6]?></td>


                                                  </tr>


                                                </table>

												<?php 

												if(count($winner_vision)>0) { ?>

												<br /><b>Vision Raffle Draw</b><br />

												<div style="margin-top:3px;padding-top:7px;background-image:url('<?=$_DIR['site']['url']?>images/img147.gif');width:182px;height:45px;color:#ffffff;" align="center" class="per"><?=$winner_vision[0]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[1]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[2]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[3]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[4]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[5]?><img src="<?=$_DIR['site']['url']?>images/spacer.gif" width="10px"><?=$winner_vision[6]?></div>

												<?php } ?>

												</td>


                                            </tr>


                                          </table></td>


                                      </tr>


                                    </table></td>


                                </tr>


                                <tr> 


                                  <td colspan="2"><?php if($afro[7]) { ?>


                                    <strong>Next Jackpot: <img src="<?=$_DIR['site']['url']?>images/nairab.gif"><font color="#0E61BC"><?=$afro[1]?></font></strong>


									<?php } ?>


									<br><br></td>


                                </tr>


                                <tr> 


                                  <td width="64%"><a href="<?=$_DIR['site']['url']?>draw-history-afro<?=$atend?>" class="linkblue">Previous draw results</a><br> 


                                                <a href="<?=$_DIR['site']['url']?>prize-breakdown-afro<?=$atend?>idx<?=$_DELIM."i".md5($afro_id).$baratend?>" class="linkblue">Prize breakdown</a><br><br></td>


                                  <td width="36%" valign="top" align="center">


								  <?php if($afro[7]) { ?>


								  <a href="<?=$_DIR['site']['url']?>afro-millions<?=$atend?>"><img src="<?=$_DIR['site']['url']?>images/play_now3.gif" width="89" height="23"></a>


								  <?php } ?>


								  </td>


                                </tr>


                              </table></td>


                          </tr>


                          <tr> 


                            <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img107.gif" width="450" height="9"></td>


                          </tr>


                        </table><?php } else { ?>


						<h1 style="color:blue;">There is no Published Result.</h1>


						<?php } ?>


						</td>


                    </tr>


                    <tr>


                      <td valign="top"><br>


					  <?php if($afro[7]) { ?>


					  <table width="450px" border="0" cellspacing="0" cellpadding="0" align="center">


                          <tr> 


                            <td height="9"><img src="<?=$_DIR['site']['url']?>images/img111.gif" width="450" height="9"></td>


                          </tr>


                          <tr> 


                            <td background="<?=$_DIR['site']['url']?>images/img108.gif" style="background-repeat:repeat-y;padding-top:8px" valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">


                                <tr> 


                                  <td height="46px" background="<?=$_DIR['site']['url']?>images/img125.gif" style="background-repeat:repeat-x;"><table width="100%" border="0" cellpadding="0" cellspacing="0">


                                      <tr> 


                                        <td width="63%" valign="top" align="left"><table width="100%" border="0" cellspacing="2" cellpadding="2">


                                            <tr>


                                              <td height="43" class="per">Afro Millions closes in:</td>


                                            </tr>


                                            <tr>


                                              <td><strong><?=$afro[3]?></strong></td>


                                            </tr>


                                          </table></td>


                                        <td width="37%" valign="top" style="padding-top:3px">


											<table border="0" cellspacing="0" cellpadding="0" style="padding-top:1px;">


                                            <tr> 


                                              <td width="38px" background="<?=$_DIR['site']['url']?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullDays"]?></td>


                                              <td width="10px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                              <td width="38px" background="<?=$_DIR['site']['url']?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullDays"]?></td>


                                              <td width="10px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                              <td width="38px" background="<?=$_DIR['site']['url']?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullDays"]?></td>


                                            </tr>


                                            <tr> 


                                              <td align="center" style="padding-top:10px;"><strong>Days</strong></td>


                                              <td width="5px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                              <td align="center" style="padding-top:10px;"><strong>Hours</strong></td>


                                              <td width="5px"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>


                                              <td align="center" style="padding-top:10px;"><strong>Mins</strong></td>


                                            </tr>


                                          </table></td>


                                      </tr>


                                    </table></td>


                                </tr>


                              </table></td>


                          </tr>


                          <tr> 


                            <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img107.gif" width="450" height="9"></td>


                          </tr>


                        </table><?php } ?></td>


                    </tr>


                  </table></td>


                <td width="39%" valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0">


                    <tr>


                      <td><img src="<?=$_DIR['site']['url']?>images/img119.gif" width="368" height="8"></td>


                    </tr>


                    <tr>


                      <td height="189" background="<?=$_DIR['site']['url']?>images/img121.gif" style="background-repeat:repeat-y" valign="top">







					  <form id="formular" name="formular" class="formular" action="<?=$_DIR['site']['url']."afro-result-set".$atend?>" method="post">







					  <input type="hidden" name="lines" value="<?=$_POST["lines"]?>">







					  <input type="hidden" name="hidAct" value="">







					  <table width="360px" border="0" cellspacing="0" cellpadding="0" align="center">


                          <tr> 


                            <td height="81" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">


                                <tr> 


                                  <td width="84%" class="step">Afro Millions Results Checker </td>


                                  <td width="16%"><a href="#" class="add">Help</a></td>


                                </tr>


                                <tr> 


                                  <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">


                                      <tr>


                                        <td width="20%" valign="top"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="left">


                                            <tr> 


                                              <td class="iconimg3">&nbsp;</td>


                                            </tr>


                                          </table></td>


                                        <td width="80%">


										<table width="93%" border="0" cellspacing="0" cellpadding="0" align="center">


                                            <tr>


                                              <td width="64%" class="num" style="line-height:1.9em">Choose 


                                                your game 


                                                <select id="lotto" class="combo5">


                                                  <option value="result-afro-millions">Afro Millions</option>


                                                  <option value="result-naira-lotto">Naira Lotto</option>


                                                </select></td>


                                              <td width="36%" align="center" valign="bottom"><a href="javascript:void(0);" onClick="self.location.href='<?=$_DIR['site']['url']?>'+document.getElementById('lotto').options[document.getElementById('lotto').selectedIndex].value+'<?=$atend?>'"><img src="<?=$_DIR['site']['url']?>images/go_button_blue.gif" border="0"></a></td>


                                            </tr>


                                          </table>


										</td>


                                      </tr>


                                    </table></td>


                                </tr>


                              </table></td>


                          </tr>


                          <tr> 


                            <td height="94" bgcolor="#FFFFFF" valign="top" style="padding-top:10px"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">


                                <tr> 


                                  <td>Afro Millions<br> <br></td>


                                </tr>


                                <tr> 


                                  <td><strong>Choose dates</strong>&nbsp;&nbsp;&nbsp; 


								  <?php


								  $from=date("'d','m/Y'",mktime(date("h"),date("i"),date("s"),date("m"),date("d")-7,date("Y")));


								  $to=date("'d','m/Y'",mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("Y")));


								  $from1=date("'d','m/Y'",mktime(date("h"),date("i"),date("s"),date("m"),date("d")-$_CONFIG[1]["result_last_days"],date("Y")));


								  ?>


                                    <a href="javascript:void(0);" onClick="setDate(<?=$from?>,<?=$to?>)" class="linkblue">Set to last 


                                    week</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onClick="setDate(<?=$from1?>,<?=$to?>)" class="linkblue">Set 


                                    to last <?=$_CONFIG[1]["result_last_days"]?> days</a></td>


                                </tr>


                                <tr> 


                                  <td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">


                                      <tr> 


                                        <td colspan="2" style="line-height:1.9em">From</td>


                                        <td width="45%" colspan="2" style="line-height:1.9em">To</td>


                                      </tr>


                                      <tr> 


                                        <td width="16%"><select name="ff1" id="ff1" class="validate['required'] combo4">


                                            <option>DD</option>


                                            <?php for($i=1;$i<=31; $i++){ ?>


											<option value="<?=$i<=9?"0".$i:$i?>" <?php echo $_POST['ff1']==$i?"selected":""; ?>><?=$i<=9?"0".$i:$i?></option>


											<?php } ?>


                                          </select> </td>


                                        <td width="39%"><select name="ff2" id="ff2" class="validate['required'] combo4">


                                            <option value="">MM/YY</option>


											<?php


											for($i=0;$i<10;$i++) {


											  $val=date("m/Y",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));	


											  $mnth=date("M Y",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));	


											  print "<option value='".$val."' ".($_POST['ff2']==$val?"selected":"").">".$mnth."</option>";


											  if($mnth=="Jan 2010") break;


											}


											?>


                                          </select></td>


                                        <td><select name="tt1" id="tt1" class="validate['required'] combo4">


                                            <option>DD</option>


                                            <?php for($i=1;$i<=31; $i++){ ?>


											<option value="<?=$i<=9?"0".$i:$i?>" <?php echo $_POST['tt1']==$i?"selected":""; ?>><?=$i<=9?"0".$i:$i?></option>


											<?php } ?>


                                          </select></td>


                                        <td><select name="tt2" id="tt2" class="validate['required'] combo4">


                                            <option value="">MM/YY</option>


                                            <?php


											for($i=0;$i<10;$i++) {


											  $val=date("m/Y",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));


											  $mnth=date("M Y",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));	


											  print "<option value='".$val."' ".($_POST['tt2']==$val?"selected":"").">".$mnth."</option>";


											  if($mnth=="Jan 2010") break;


											}


											?>


                                          </select></td>


                                      </tr>


                                    </table></td>


                                </tr>


								<tr> 


                                  <td style="line-height:1.9em;padding-top:5px;">Choose draw day(s)<br>


								  <select name="cmbDraw" class="validate['required'] combo2">


                                   <option>Please Select</option>


								   <option value="Friday" <?=$_POST["cmbDraw"]=="Friday"?"selected":""?>>Friday</option>


                                   </select> 


                                  </td>


                                </tr>


                                <tr>


                                  <td>&nbsp;</td>


                                </tr>


                              </table></td>


                          </tr>


						  <tr> 


                            <td height="3px"><img src="<?=$_DIR['site']['url']?>images/spacer.png"></td>


                          </tr>


						  <tr> 


                            <td height="94" bgcolor="#FFFFFF" valign="top" style="padding-top:10px"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">


                                <tr> 


                                  <td class="text11">Enter your numbers <br> <br></td>


                                </tr>


                                <tr> 


                                  <td align="left" valign="top">


								    <table border="0" cellspacing="0" cellpadding="0" align="center">











									  <?php for($i=0,$j=1;$i<$_POST["lines"];$i++,$j+=7) { ?>	











                                      <tr id="row<?=$i?>"> 


                                        <td width="50px" height="35px" align="center" class="text"><?=chr(65+$i)?></td>


                                        <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">


                                            <tr> 


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+1?>" id="num<?=$j+1?>" value="<?=$_POST["num".($j+1)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+1?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+2?>" id="num<?=$j+2?>" value="<?=$_POST["num".($j+2)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+2?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+3?>" id="num<?=$j+3?>" value="<?=$_POST["num".($j+3)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+3?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+4?>" id="num<?=$j+4?>" value="<?=$_POST["num".($j+4)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+4?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                              <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+5?>" id="num<?=$j+5?>" value="<?=$_POST["num".($j+5)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+5?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


											  <td width="34px" align="left"><input type="text" maxlength="2" name="num<?=$j+6?>" id="num<?=$j+6?>" value="<?=$_POST["num".($j+6)]?>" onChange="chkaResultVal(this,'row<?=$i?>',<?=$j?>,<?=$j+6?>)" <?=$i==0?"class=\"validate['required'] textfield6\"":"class=\"validate['~customaCheck'] textfield6\""?>></td>


                                            </tr>


                                          </table></td>


                                        <td width="55px" align="center" valign="middle"><a href="javascript:void(0);" onClick="fnResultClear(<?=$j?>,7)" class="next">Clear</a></td>


                                      </tr>


                                      <tr> 


                                        <td height="3px" colspan="3"><img src="<?=$_DIR['site']['url']?>images/spacer.gif" height="3px"></td>


                                      </tr>


									  <?php } ?>


                                      <tr> 


                                        <td  colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">


                                            <tr>


                                              <td width="16%">&nbsp;</td>


                                              <td width="57%"><a href="javascript:void(0);" onClick="appendit('<?=$_SERVER['REQUEST_URI']?>')" class="linkblue">Check more lines</a><br> 


                                                <a href="<?=$_DIR["site"]["url"]."result-afro-millions".$atend."act".$_DELIM."check-save_num".$baratend?>" class="linkblue">Check my saved numbers</a></td>


                                              <td width="27%"><a href="javascript:void(0);" onClick="fnResultAllClear(<?=$_POST["lines"]*7?>)" class="linkblue">Clear all lines</a></td>


                                            </tr>


                                          </table></td>


                                      </tr>


                                    </table>


                                    </td>


                                </tr>


                                <tr> 


                                  <td>&nbsp;</td>


                                </tr>


                              </table></td>


                          </tr>





						 <tr> 







                            <td height="3px"><img src="<?=$_DIR['site']['url']?>images/spacer.png"></td>







                          </tr>



						  <tr> 







                            <td height="94" bgcolor="#FFFFFF" valign="top" style="padding-top:10px"><table width="96%" border="0" cellspacing="2" cellpadding="2" align="center">







                                <tr> 







                                  <td><strong>Vission Raffle</strong></td>







                                </tr>







                                <tr> 







                                  <td>The winning Vission Raffle selection is shown when you check your Afro Millions numbers, or see the Afro Millions draw history for all results.</td>







                                </tr>









                              </table></td>







                          </tr>









						  <tr> 


                            <td height="94" align="right" valign="top" style="padding-right:6px"><br><input type="image" src="<?=$_DIR['site']['url']?>images/check_now2.gif" width="110" height="32" border="0"></td>


                          </tr>


                        </table>







						</form>







						</td>


                    </tr>


                    <tr>


                      <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img120.gif" width="368" height="8"></td>


                    </tr>


                  </table></td>


              </tr>


            </table>


<?php include_once("footer.php"); ?>