<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='afro-basket';



include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');



$noright=true;



$formvalidation=true; //for form validation



$content[0]="View My Basket";



include_once("header.php"); 



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



<tr> 



  <td valign="top" class="title">View My Basket</td>



</tr>



<tr>



  <td valign="top" style="padding-top:30px"> 



	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">



	  <tr>



		<td width="387px" height="504px" background="<?=$_DIR["site"]["url"]?>images/img127.png" style="background-repeat:no-repeat" valign="top">



		<form id="frmlotto" name="frmlotto" action="<?=$_SERVER['REQUEST_URI']?>" method="post">



		<input type="hidden" name="hidcostperline" id="hidcostperline" value="<?=$price?>">



		<input type="hidden" name="hidAction" value="addtocart-button-click">



		<table width="100%" border="0" cellspacing="0" cellpadding="0">



			  <tr> 



				<td height="48px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



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



						<td width="36px" align="left"><input type="text" name="num1" id="num1" value="<?=$num1?>" onChange="chkaVal(this,'row1')" class="validate['required'] textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num2" id="num2" value="<?=$num2?>" onChange="chkaVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num3" id="num3" value="<?=$num3?>" onChange="chkaVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num4" id="num4" value="<?=$num4?>" onChange="chkaVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num5" id="num5" value="<?=$num5?>" onChange="chkaVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num6" id="num6" value="<?=$num6?>" onChange="chkaVal(this,'row1')" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num7" id="num7" value="<?=$num7?>" onChange="chkaVal(this,'row1')" class="textfieldstar" maxlength="2"></td>



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



						<td width="36px" align="left"><input type="text" name="num8" id="num8" value="<?=$num8?>" onChange="chkaVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num9" id="num9" value="<?=$num9?>" onChange="chkaVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num10" id="num10" value="<?=$num10?>" onChange="chkaVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num11" id="num11" value="<?=$num11?>" onChange="chkaVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num12" id="num12" value="<?=$num12?>" onChange="chkaVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num13" id="num13" value="<?=$num13?>" onChange="chkaVal(this,'row2')" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num14" id="num14" value="<?=$num14?>" onChange="chkaVal(this,'row2')" class="textfieldstar" maxlength="2"></td>



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



						<td width="36px" align="left"><input type="text" name="num15" id="num15" value="<?=$num15?>" onChange="chkaVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num16" id="num16" value="<?=$num16?>" onChange="chkaVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num17" id="num17" value="<?=$num17?>" onChange="chkaVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num18" id="num18" value="<?=$num18?>" onChange="chkaVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num19" id="num19" value="<?=$num19?>" onChange="chkaVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num20" id="num20" value="<?=$num20?>" onChange="chkaVal(this,'row3')" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num21" id="num21" value="<?=$num21?>" onChange="chkaVal(this,'row3')" class="textfieldstar" maxlength="2"></td>



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



						<td width="36px" align="left"><input type="text" name="num22" id="num22" value="<?=$num22?>" onChange="chkaVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num23" id="num23" value="<?=$num23?>" onChange="chkaVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num24" id="num24" value="<?=$num24?>" onChange="chkaVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num25" id="num25" value="<?=$num25?>" onChange="chkaVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num26" id="num26" value="<?=$num26?>" onChange="chkaVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num27" id="num27" value="<?=$num27?>" onChange="chkaVal(this,'row4')" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num28" id="num28" value="<?=$num28?>" onChange="chkaVal(this,'row4')" class="textfieldstar" maxlength="2"></td>



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



						<td width="36px" align="left"><input type="text" name="num29" id="num29" value="<?=$num29?>" onChange="chkaVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="35px" align="left"><input type="text" name="num30" id="num30" value="<?=$num30?>" onChange="chkaVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num31" id="num31" value="<?=$num31?>" onChange="chkaVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num32" id="num32" value="<?=$num32?>" onChange="chkaVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num33" id="num33" value="<?=$num33?>" onChange="chkaVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="36px" align="left"><input type="text" name="num34" id="num34" value="<?=$num34?>" onChange="chkaVal(this,'row5')" class="textfieldstar" maxlength="2"></td>



						<td width="38px" align="left"><input type="text" name="num35" id="num35" value="<?=$num35?>" onChange="chkaVal(this,'row5')" class="textfieldstar" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnaClear(29,7)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="23px" colspan="3" valign="bottom" align="right">&nbsp;</td>



				</tr>				



			  </table></td>



			  </tr>



			  <tr> 



				<td height="138px" valign="middle" align="center">



				  

<?php if($afro[6] && $afro[6]!="0.00") { ?>

<table width="80%" border="0" cellspacing="0" cellpadding="0">



<tr> 



  <td rowspan="2" valign="top" style="padding-top:2px"><table width="50px" border="0" cellspacing="0" cellpadding="0" align="left">



   <tr>



   <td class="iconimg6">&nbsp;</td>



   </tr>



   </table></td>





  <td width="175px" colspan="2" align="left" valign="bottom" class="lottoext">Vision Raffle Jackpot is</td>



  <td align="right" valign="top" style="padding-right:2px;"></td>



</tr>



<tr> 



  <td colspan="2" class="lottorate" align="left"><img src="<?=$_DIR["site"]["url"]?>images/img38.png" style="margin-right:3px;" align="top" width="18"><?=$afro[6]?></td>



  <td valign="bottom" align="right" style="padding-right:2px;color:#FFFFFF;font-size:12px;font-weight:bold"><?=($afro[5]==0 || $afro[5]=="0.00")?"<b><font face=Arial; size=+2; color=red>FREE</font></b>":'<img src="'.$_DIR["site"]["url"].'images/img38.png" width="12" height="13" style="margin-right:3px;margin-top:-2px;" align="absmiddle">'.$afro[5]?></td>



</tr>



<tr> 







  <td colspan="3" class="lottoext" align="left"><?=$my_basket['vision']?"You are entered in Vision Raffle Draw":"Your Vision Number is:"?></td>



</tr>



<tr> 



  <td><table width="67px" border="0" cellspacing="0" cellpadding="0">



	  <tr> 



		<td background="<?=$_DIR["site"]["url"]?>images/img23.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:luckyVisionDip()" class="step2">Lucky Dip</a></td>



	  </tr>



	</table></td>



  <td align="left" style="padding-left:6px"><input type="text" name="txtVisionNumber" id="txtVisionNumber" value="<?=$vision_number?>" class="textfield3" readonly>

  <input type="hidden" name="rdoPlayVision" value="Y">  

  <input type="hidden" name="vision_price" id="vision_price" value="<?=$afro[5]?>"></td>



  <td colspan="2" class="lottoext" align="left">&nbsp; </td>



</tr>



<tr> 







  <td colspan="3" valign="middle">&nbsp;

  

  	

	</td>



</tr>



</table>

<?php } ?>





				</td>



			  </tr>



			  <tr>



				<td valign="top" align="center"><table width="85%" border="0" cellspacing="0" cellpadding="0">



					<tr>



					  <td align="center">



					  	<table width="148px" border="0" cellspacing="0" cellpadding="0" align="center">



						  <tr> 



							<td background="<?=$_DIR["site"]["url"]?>images/img24.gif" height="31px" valign="top" style="background-repeat: no-repeat;padding-left:63px;padding-top:4px" class="rate"><img src="<?=$_DIR["site"]["url"]?>images/img36.png" width="17" height="18"> 



							  <span id="totalamount"><?=$total_price?$total_price+($my_basket['vision']?$afro[5]:0):"0.00"?></span> </td>



						  </tr>



						</table></td>



					  <td width="65px" align="center"><img src="<?=$_DIR["site"]["url"]?>images/img25.png" width="44" height="44"></td>



					  <td><table width="100px" border="0" cellspacing="0" cellpadding="0" align="center">



						  <tr> 



							<td><input type="image"  src="<?=$_DIR["site"]["url"]?>images/add_basket2.gif" border="0"></td>



						  </tr>



						</table></td>



					</tr>



				  </table></td>



			  </tr>



		</table>



		</form>



		</td>



		<td  valign="top" style="padding-top:18px"><table width="548px" border="0" cellspacing="0" cellpadding="0" align="right">



			<tr>



			  <td height="30px" background="<?=$_DIR["site"]["url"]?>images/img67.png" style="background-repeat:no-repeat;padding-left:15px" class="text12">My Afro Millions PlaySlip Basket</td>



			</tr>



			<tr>



			  <td background="<?=$_DIR["site"]["url"]?>images/img68.png" style="background-repeat:repeat-y" valign="top"><table width="546px" border="0" cellspacing="1" cellpadding="1" align="center">



				  <tr>



					<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img76.png" style="background-repeat:repeat-x"><table width="529px" border="0" cellspacing="0" cellpadding="0" align="center">



						<tr> 



						  <td height="12px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



						</tr>



						<tr> 



						  <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">



							  <tr> 



							  	<td align="left" valign="top">								



								<?php



								$tprice=0;



								$len=get_basket_count();



								for($i=0;$i<$len;$i++) {



									$tprice+=$price*get_playslip_count($i);



								?>



									<table width="243px" border="0" cellspacing="0" cellpadding="0" style="float:left;padding-left:<?=$i%2==0?"5":"20"?>px;">



									<tr> 



									  <td background="<?=$_DIR["site"]["url"]?>images/img128.png" height="90px" style="background-repeat: no-repeat;" valign="top"><br> 



										<br> <table width="99%" border="0" cellspacing="0" cellpadding="0">



										  <tr> 



											<td width="16%" align="center">&nbsp;</td>



											<td width="84%" align="center" class="num">The 



											  Nigeria's biggest 



											  <br>



											  millionaire-making 



											  game </td>



										  </tr>



										</table></td>



									</tr>



									<tr> 



									  <td background="<?=$_DIR["site"]["url"]?>images/img78.gif"style="background-repeat:repeat-y;padding-left:19px" valign="top" align="left"><table width="97%" border="0" cellspacing="0" cellpadding="0">



										  <tr> 



											<td colspan="3" style="padding:7px 0" class="basket">Play 



											  Slip No. <font color="Red"><?=$i+1?></font></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td width="15%" height="24px" align="center" class="basket">A</td>



											<td width="85%" class="basket"><?=getNumber($i,0)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td align="center" height="24px"  class="basket">B</td>



											<td class="basket"><?=getNumber($i,1)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td align="center" height="24px" class="basket">C</td>



											<td class="basket"><?=getNumber($i,2)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td align="center" height="24px" class="basket">D</td>



											<td class="basket"><?=getNumber($i,3)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td align="center" height="24px" class="basket">E</td>



											<td class="basket"><?=getNumber($i,4)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td colspan="3" style="line-height:1.4em;padding-top:6px"><a href="<?=$_DIR["site"]["url"]."afro-basket".$atend."act".$_DELIM."editafropslip".$baratend."rowid".$_DELIM.($i+1)?>" class="linksign">Edit 



											  numbers</a><br> 



											  <a href="javascript:if(confirm('Are you sure wish to delete this Playslip?')){self.location.href='<?=$_DIR["site"]["url"]."afro-basket".$atend."act".$_DELIM."rmafropslip".$baratend."rowid".$_DELIM.($i+1)?>'}" class="linksign">Delete play slip</a></td>



										  </tr>



										</table></td>



									</tr>



									<tr> 



									  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img72.png" width="243" height="9"></td>



									</tr>



								  </table>



								<?php 



								}



								?>



								</td>



							  </tr>



							</table></td>



						</tr>



						<tr> 



						  <td height="15px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



						</tr>



						<tr> 



						  <td height="100px" background="<?=$_DIR["site"]["url"]?>images/img74.png" style="background-repeat:no-repeat">



<form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>afro-basket<?=$atend?>" method="post">

<input type="hidden" name="hidAction" value="proceed-button-click">

<input type="hidden" id="hidtotalcost" value="<?=$tprice?>">

<input type="hidden" id="rdoPlayVision" value="Y">

<input type="hidden" id="vision_price" value="<?=$afro[5]?>">

<?php if($my_basket['weeks']) $tprice=$tprice*$my_basket['weeks']; ?>

<?php if($my_basket['vision']) $tprice=$tprice+$afro[5]; ?>



						  <table width="97%" border="0" cellspacing="1" cellpadding="1" align="center">



							  <tr> 



								<td>&nbsp;</td>



								<td>&nbsp;</td>



								<td colspan="2" align="right" class="total">Total:</td>



								<td class="total">&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/img35.png"><span id="allamount"><?=number_format($tprice,2)?></span></td>



							  </tr>



							  <tr> 



								<td width="32%" height="55"  style="line-height:2em;color:#FFFFFF">Choose 



								  draws<br> <select name="cmbDraw" class="validate['required'] combo3">



								  <option>Please Select</option>



								  <option value="Friday" <?=$my_basket['draws']=="Friday"?"selected":""?>>Friday</option>



								</select></td>



								<td width="4%">&nbsp;</td>



								<td width="26%" style="line-height:2em;color:#FFFFFF">Number 



								  of weeks<br> <select name="cmbWeek" id="cmbWeek" onChange="calTot()" class="validate['required'] combo3">



								  <option>Please Select</option>



								  <option value="1" <?=$my_basket['weeks']=="1"?"selected":""?>>1</option>



								  <option value="2" <?=$my_basket['weeks']=="2"?"selected":""?>>2</option>



								  <option value="3" <?=$my_basket['weeks']=="3"?"selected":""?>>3</option>



								  <option value="4" <?=$my_basket['weeks']=="4"?"selected":""?>>4</option>



								</select></td>



								<td width="17%" align="center" valign="bottom"><img src="<?=$_DIR["site"]["url"]?>images/img142.gif"></td>



								<td width="21%" valign="bottom"><input type="image" src="<?=$_DIR["site"]["url"]?>images/img143.gif" border="0"></td>



							  </tr>



							</table>



</form>



							</td>



						</tr>



					  </table></td>



				  </tr>



				</table></td>



			</tr>



			<tr>



			  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img69.png" width="548" height="8"></td>



			</tr>



		  </table></td>



	  </tr>



	</table> </td>



</tr>



</table>



<?php include_once("footer.php"); ?>