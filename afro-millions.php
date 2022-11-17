<?php



include_once("includes/config/application.php"); //include config



dbConnection('on'); //open database connection


check_opening_hour();
$_THISPAGENAME='afro-millions';



include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');



$content[0]="Play Afro Millions";



$formvalidation=true; //for form validation



$noright=true;



include_once("header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



<tr>



  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



</tr>



<tr>



  <td valign="top" class="text"><table width="779px" border="0" cellspacing="0" cellpadding="0" align="center">



<tr><td background="<?=$_DIR["site"]["url"]?>images/img92.png" width="800px" height="70px" style="padding-left:10px;"><span class="vticket">Play Afro Millions</span></td></tr>



<tr><td background="<?=$_DIR["site"]["url"]?>images/img94.png" style="background-repeat-y" valign="top">



<table width="788px" border="0" cellspacing="0" cellpadding="0" align="center">



<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img95.png" width="788px" height="8px"></td></tr>



<tr><td valign="top" background="<?=$_DIR["site"]["url"]?>images/img96.png" style="background-repeat-y">



<?php if(!$afro[0]) { ?>







<br /><div align="center" style="padding:10px;"><span class="bigtext">"Afro Millions" and "Vision Raffle" are currently closed,<br /><br /><br /> while we are drawing today's lucky numbers!</span><br><br>







<br /><span class="rate">Find out if you've won!</span><br><br>







<a href="<?=$_DIR["site"]["url"]."result-afro-millions".$atend?>"><span style="font-size:13px">Go to Afro Millions Result Checker</span></a></div>







<?php } else { ?>



<table border="0" cellspacing="0" cellpadding="0" align="center">



  <tr>



	<td width="777px" height="501px" valign="top" align="left" background="<?=$_DIR["site"]["url"]?>images/blue_img.png" style="background-repeat: no-repeat">



<form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">



<input type="hidden" name="hidcostperline" id="hidcostperline" value="<?=$price?>">



<input type="hidden" name="hidAction" id="hidAction" value="playnow">



	<table width="100%" height="498" border="0" cellpadding="1" cellspacing="1">



		<tr>



		  <td width="52%" valign="top"><table width="350px" border="0" cellspacing="0" cellpadding="0"  align="right">



			  <tr>



				<td height="92px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



			  </tr>



			  <tr>



				<td colspan="2" align="center" class="step" height="34px" valign="bottom">Estimated



				  Jackpot for</td>



			  </tr>



			  <tr>



				<td colspan="2" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



			  </tr>



			  <tr>



				<td colspan="2" align="center" class="green" height="25px" valign="top"><?=$afro[0]?></td>



			  </tr>



			  <tr>



				<td colspan="2" align="center"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img32.png" width="26" height="27"><?=$afro[1]?></span></td>



			  </tr>



			  <tr>



				<td height="43px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



			  </tr>



			  <tr>



				<td colspan="2" valign="top" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top:13px;">



					<tr>



					  <td width="55%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



						  <tr>



							<td align="center" class="per" height="30px" valign="top">The



							  games closes in:</td>



						  </tr>



						  <tr>



							<td align="center" class="green"><?=$afro[3]?></td>



						  </tr>



						</table></td>



					  <td width="45%" valign="top"><table width="131px" border="0" cellspacing="1" cellpadding="1">



						  <tr>



							<td width="39px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullDays"]?></td>



							<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



							<td width="41px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullHours"]?></td>



							<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



							<td width="41px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$afro[2]["fullMinutes"]?></td>



						  </tr>



						  <tr>



							<td align="center" class="num">DAY</td>



							<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



							<td align="center" class="num">HRS</td>



							<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



							<td align="center" class="num">MIN</td>



						  </tr>



						</table></td>



					</tr>



				  </table></td>



			  </tr>



			  <tr>



				<td colspan="2" height="49"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



			  </tr>



			  <tr>



				<td colspan="2" valign="top"><table width="91%" border="0" cellpadding="0" cellspacing="0" align="center">



					<tr>



					  <td width="56%" align="left" style="line-height:2em;color:#FFFFFF"><span class="lottoest">Choose



						draws</span><br> <select name="cmbDraw" class="validate['required'] combo3">



					  <option value="">Please Select</option>



					  <option value="Friday" <?=$_POST["cmbDraw"]=="Friday"?"selected":""?>>Friday</option>



					</select> </td>



					  <td width="44%" align="left" style="line-height:2em;color:#FFFFFF"><span class="lottoest">Number



						of week</span><br> <select name="cmbWeek" id="cmbWeek" onChange="calaAmt()" class="validate['required'] combo3">



					  <option value="">Please Select</option>



					  <option value="1" <?=$_POST["cmbWeek"]=="1"?"selected":""?>>1</option>



					  <option value="2" <?=$_POST["cmbWeek"]=="2"?"selected":""?>>2</option>



					  <option value="3" <?=$_POST["cmbWeek"]=="3"?"selected":""?>>3</option>



					  <option value="4" <?=$_POST["cmbWeek"]=="4"?"selected":""?>>4</option>



					</select></td>



					</tr>



				  </table></td>



			  </tr>



			  <tr>



				<td colspan="2" valign="top"><br><table width="89%" border="0" cellspacing="0" cellpadding="0" align="center">



					<tr>



					  <td width="86%" valign="top" style="line-height:1.5em"><a href="<?=$_DIR["site"]["url"]."afro-basket".$atend?>" class="paylist">Play



						My Last Numbers</a><br/>



						<a href="<?=$_DIR["site"]["url"]."afro-millions".$atend."play".$_DELIM."savenum".$baratend?>" class="paylist">Play My Saved Numbers</a>



					  </td>



					  <td width="14%"><a href="#" class="paylist">Help</a></td>



					</tr>



				  </table></td>



			  </tr>



			</table></td>



		  <td width="48%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



			  <tr>



				<td height="40px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



			  </tr>



			  <tr>



				                  <td align="center" valign="top" class="textcost" style="padding-bottom:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/nairacost.png" width="12" height="12"><?=$price?>.00 per line (5 Numbers + 2 Vision Stars)</td>



			  </tr>



			  <tr>



				<td valign="top"><table width="340px" border="0" cellspacing="0" cellpadding="0" align="center">



				<tr id="row1">



				  <td width="80px" height="31px" valign="middle" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" valign="middle" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyaDip(1,7)" class="step2">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td width="36px" align="left"><input type="text" name="num1" id="num1" value="<?=$num1?>" onChange="chkaVal(this,'row1',1,1)" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num2" id="num2" value="<?=$num2?>" onChange="chkaVal(this,'row1',1,2)" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num3" id="num3" value="<?=$num3?>" onChange="chkaVal(this,'row1',1,3)" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num4" id="num4" value="<?=$num4?>" onChange="chkaVal(this,'row1',1,4)" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num5" id="num5" value="<?=$num5?>" onChange="chkaVal(this,'row1',1,5)" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num6" id="num6" value="<?=$num6?>" onChange="chkaVal(this,'row1',1,6)" class="validate['required'] textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num7" id="num7" value="<?=$num7?>" onChange="chkaVal(this,'row1',1,7)" class="validate['required'] textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" width="35px" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(1,7)" class="clear">Clear</a></td>



				</tr>



				<tr>



				  <td height="5px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row2">



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyaDip(8,7)" class="step2">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td width="36px" align="left"><input type="text" name="num8" id="num8" value="<?=$num8?>" onChange="chkaVal(this,'row2',8,8)" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num9" id="num9" value="<?=$num9?>" onChange="chkaVal(this,'row2',8,9)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num10" id="num10" value="<?=$num10?>" onChange="chkaVal(this,'row2',8,10)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num11" id="num11" value="<?=$num11?>" onChange="chkaVal(this,'row2',8,11)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num12" id="num12" value="<?=$num12?>" onChange="chkaVal(this,'row2',8,12)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num13" id="num13" value="<?=$num13?>" onChange="chkaVal(this,'row2',8,13)" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num14" id="num14" value="<?=$num14?>" onChange="chkaVal(this,'row2',8,14)" class="textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(8,7)" class="clear">Clear</a></td>



				</tr>



				<tr>



				  <td height="5px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row3">



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyaDip(15,7)"  class="step2">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td width="36px" align="left"><input type="text" name="num15" id="num15" value="<?=$num15?>" onChange="chkaVal(this,'row3',15,15)" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num16" id="num16" value="<?=$num16?>" onChange="chkaVal(this,'row3',15,16)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num17" id="num17" value="<?=$num17?>" onChange="chkaVal(this,'row3',15,17)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num18" id="num18" value="<?=$num18?>" onChange="chkaVal(this,'row3',15,18)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num19" id="num19" value="<?=$num19?>" onChange="chkaVal(this,'row3',15,19)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num20" id="num20" value="<?=$num20?>" onChange="chkaVal(this,'row3',15,20)" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num21" id="num21" value="<?=$num21?>" onChange="chkaVal(this,'row3',15,21)" class="textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(15,7)" class="clear">Clear</a></td>



				</tr>



				<tr>



				  <td height="5px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row4">



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyaDip(22,7)"  class="step2">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td width="36px" align="left"><input type="text" name="num22" id="num22" value="<?=$num22?>" onChange="chkaVal(this,'row4',22,22)" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num23" id="num23" value="<?=$num23?>" onChange="chkaVal(this,'row4',22,23)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num24" id="num24" value="<?=$num24?>" onChange="chkaVal(this,'row4',22,24)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num25" id="num25" value="<?=$num25?>" onChange="chkaVal(this,'row4',22,25)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num26" id="num26" value="<?=$num26?>" onChange="chkaVal(this,'row4',22,26)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num27" id="num27" value="<?=$num27?>" onChange="chkaVal(this,'row4',22,27)" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num28" id="num28" value="<?=$num28?>" onChange="chkaVal(this,'row4',22,28)" class="textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(22,7)" class="clear">Clear</a></td>



				</tr>



				<tr>



				  <td height="5px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row5">



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyaDip(29,7)" class="step2">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td valign="middle" align="center"><table border="0" cellspacing="0" cellpadding="0">



					  <tr>



						<td width="36px" align="left"><input type="text" name="num29" id="num29" value="<?=$num29?>" onChange="chkaVal(this,'row5',29,29)" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num30" id="num30" value="<?=$num30?>" onChange="chkaVal(this,'row5',29,30)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num31" id="num31" value="<?=$num31?>" onChange="chkaVal(this,'row5',29,31)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num32" id="num32" value="<?=$num32?>" onChange="chkaVal(this,'row5',29,32)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num33" id="num33" value="<?=$num33?>" onChange="chkaVal(this,'row5',29,33)" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num34" id="num34" value="<?=$num34?>" onChange="chkaVal(this,'row5',29,34)" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num35" id="num35" value="<?=$num35?>" onChange="chkaVal(this,'row5',29,35)" class="textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(29,7)" class="clear">Clear</a></td>



				</tr>



				<tr>



				  <td height="23px" colspan="3" valign="bottom" align="right"><a href="javascript:fnSubmit();" class="add">Add more line</a></td>



				</tr>



			  </table></td>



			  </tr>



			  <tr>



				<td height="153px" valign="middle" align="center">





<?php if($afro[6] && $afro[6]!="0.00") { ?>

<table width="89%" border="0" cellspacing="0" cellpadding="0">



<tr>



  <td rowspan="2" valign="top" style="padding-top:8px"><table width="50px" border="0" cellspacing="0" cellpadding="0" align="left">



   <tr>



   <td class="iconimg6"></td>



   </tr>



   </table></td><br>



  <td width="200px" colspan="2" align="left" valign="bottom" class="lottoext">You will be entered in the Vision Raffle Draw. The Jackpot is</td>



  <td align="right" valign="top" style="padding-right:2px;"></td>



</tr>



<tr>



  <td colspan="2" class="lottorate" align="left"><img src="<?=$_DIR["site"]["url"]?>images/img38.png" style="margin-right:3px;" align="top" width="18"><?=$afro[6]?></td>



  <td valign="bottom" align="right" style="padding-right:5px;color:#FFFFFF;font-size:12px;font-weight:bold"><?=($afro[5]==0 || $afro[5]=="0.00")?"<b><font face=Arial; size=+2; color=red>FREE</font></b>":'<img src="'.$_DIR["site"]["url"].'images/img35.png" width="12" height="13" style="margin-right:3px;margin-top:-2px;" align="absmiddle">'.$afro[5]?></td>



</tr>



<tr>



  <td>&nbsp;</td>



                                          <td colspan="3" class="lottoext" align="left">And your

                                            Ticket No is:</td>



</tr>



<tr>



  <td><table width="67px" border="0" cellspacing="0" cellpadding="0">



	  <tr>



		<td height="24px" align="center">&nbsp;</td>



	  </tr>



	</table></td>



  <td align="left" style="padding-left:6px"><input type="text" name="txtVisionNumber" id="txtVisionNumber" value="<?=$vision_number?>" class="textfield3" readonly=""></td></tr>



<tr>







  <td colspan="3" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">



	  <tr>



		                                        <td width="50%" class="lottoext"></td>



		                                        <td width="8%"><input type="hidden" name="rdoPlayVision" value="Y">

												<input type="hidden" name="vision_price" id="vision_price" value="<?php echo str_replace(',','',$afro[5]); ?>"></td>                                        <td width="12%" class="lottoext" align="left">&nbsp;</td>



		                                        <td width="7%">&nbsp;</td>



		                                        <td width="23%" class="lottoext" align="left">&nbsp;</td>



	  </tr>



	</table></td>



</tr>



</table>

<?php } else { ?>

<input type="hidden" name="rdoPlayVision" value="N">

<input type="hidden" name="vision_price" id="vision_price" value="0">

<?php } ?>



				</td>



			  </tr>



			  <tr>



				<td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



					<tr>



					  <td width="51%"><table width="148px" border="0" cellspacing="0" cellpadding="0" align="center">



						  <tr>



							<td background="<?=$_DIR["site"]["url"]?>images/img24.gif" height="31px" valign="top" style="background-repeat: no-repeat;padding-left:63px;padding-top:4px" class="rate"><img src="<?=$_DIR["site"]["url"]?>images/img36.png" width="17" height="18">



							  <span id="totalamount">0.00</span> </td>



						  </tr>



						</table></td>



					  <td width="5%"><img src="<?=$_DIR["site"]["url"]?>images/img25.png" width="44" height="44"></td>



					  <td width="44%"><table width="100px" border="0" cellspacing="0" cellpadding="0" align="center">



						  <tr>



							<td><input type="image"  src="<?=$_DIR["site"]["url"]?>images/play_now.gif" height="33px" width="99px" border="0"></td>



						  </tr>



						</table></td>



					</tr>



				  </table></td>



			  </tr>



			</table></td>



		</tr>



	  </table></form></td>



  </tr>



</table>







<?php } ?>







</td></tr>



<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img97.png" width="788px" height="8px"></td></tr>



</table></td></tr>



<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img93.png" width="800px" height="9px"></td></tr></table>







  </td></tr></table><?php include_once("footer.php"); ?>