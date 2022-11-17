<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='basket';



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



		<td width="387px" height="504px" background="<?=$_DIR["site"]["url"]?>images/img85.png" style="background-repeat:no-repeat" valign="top">



		<form id="frmlotto" name="frmlotto" action="<?=$_SERVER['REQUEST_URI']?>" method="post">



		<input type="hidden" name="hidcostperline" id="hidcostperline" value="<?=$price?>">



		<input type="hidden" name="hidAction" value="addtocart-button-click">



		<table width="96%" border="0" cellspacing="0" cellpadding="0" align="right">



		  <tr> 



			<td height="48px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



		  </tr>



		  <tr> 



			<td align="center" valign="top" class="step" style="padding-bottom:11px"><img src="<?=$_DIR["site"]["url"]?>images/img34.png" width="12" height="13" style="margin-right:3px;margin-top:-2px;" align="absmiddle"><?=$price?> Per Line</td>



		  </tr>



		  <tr> 



			<td valign="top"><table width="340px" border="0" cellspacing="0" cellpadding="0" align="center">



				<tr id="row1"> 



				  <td width="80px" height="31px" valign="middle" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" valign="middle" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(1,6)" class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num1" id="num1" value="<?=$num1?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num2" id="num2" value="<?=$num2?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num3" id="num3" value="<?=$num3?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num4" id="num4" value="<?=$num4?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num5" id="num5" value="<?=$num5?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num6" id="num6" value="<?=$num6?>" onChange="chkVal(this,'row1')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(1,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row2"> 



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(7,6)" class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num7" id="num7" value="<?=$num7?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num8" id="num8" value="<?=$num8?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num9" id="num9" value="<?=$num9?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num10" id="num10" value="<?=$num10?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num11" id="num11" value="<?=$num11?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num12" id="num12" value="<?=$num12?>" onChange="chkVal(this,'row2')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(7,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row3"> 



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(13,6)"  class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num13" id="num13" value="<?=$num13?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num14" id="num14" value="<?=$num14?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num15" id="num15" value="<?=$num15?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num16" id="num16" value="<?=$num16?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num17" id="num17" value="<?=$num17?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num18" id="num18" value="<?=$num18?>" onChange="chkVal(this,'row3')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(13,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row4"> 



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(19,6)"  class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num19" id="num19" value="<?=$num19?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num20" id="num20" value="<?=$num20?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num21" id="num21" value="<?=$num21?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num22" id="num22" value="<?=$num22?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num23" id="num23" value="<?=$num23?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num24" id="num24" value="<?=$num24?>" onChange="chkVal(this,'row4')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(19,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row5"> 



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(25,6)" class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num25" id="num25" value="<?=$num25?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num26" id="num26" value="<?=$num26?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num27" id="num27" value="<?=$num27?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num28" id="num28" value="<?=$num28?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num29" id="num29" value="<?=$num29?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num30" id="num30" value="<?=$num30?>" onChange="chkVal(this,'row5')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(25,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row6">  



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(31,6)" class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num31" id="num31" value="<?=$num31?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num32" id="num32" value="<?=$num32?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num33" id="num33" value="<?=$num33?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num34" id="num34" value="<?=$num34?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num35" id="num35" value="<?=$num35?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num36" id="num36" value="<?=$num36?>" onChange="chkVal(this,'row6')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(31,6)" class="clear">Clear</a></td>



				</tr>



				<tr> 



				  <td height="2px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" height="2px"></td>



				</tr>



				<tr id="row7"> 



				  <td width="80px" height="31px" align="center"><table width="67px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:void(0);" onClick="luckyDip(37,6)" class="step100">Lucky Dip</a></td>



					  </tr>



					</table></td>



				  <td width="204px" valign="middle" align="center"><table width="204px" border="0" cellspacing="0" cellpadding="0">



					  <tr> 



						<td width="34px" align="left"><input type="text" name="num37" id="num37" value="<?=$num37?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num38" id="num38" value="<?=$num38?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num39" id="num39" value="<?=$num39?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num40" id="num40" value="<?=$num40?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num41" id="num41" value="<?=$num41?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



						<td width="34px" align="left"><input type="text" name="num42" id="num42" value="<?=$num42?>" onChange="chkVal(this,'row7')" class="textfield5" maxlength="2"></td>



					  </tr>



					</table></td>



				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(37,6)" class="clear">Clear</a></td>



				</tr>



			  </table></td>



		  </tr>



		  <tr> 



			<td height="143px" valign="middle" align="center">



			

<?php if($naira[6] && $naira[6]!="0.00") { ?>

<table width="89%" border="0" cellspacing="0" cellpadding="0">



<tr> 



  <td rowspan="2" height="50px" class="icon">&nbsp;</td>



  <td width="175px" colspan="2" align="left" valign="bottom" class="lottoext">Top prize* for <?=$naira[7]?></td>



  <td align="right" valign="top" style="padding-right:2px;">&nbsp;</td>



</tr>



<tr> 



  <td colspan="2" class="lottorate" align="left"><img src="<?=$_DIR["site"]["url"]?>images/img33.png" style="margin-right:3px;" align="top" width="18"><?=$naira[6]?></td>



  <td valign="bottom" align="right" style="padding-right:2px;color:#FFFFFF;font-size:12px;font-weight:bold"><img src="<?=$_DIR["site"]["url"]?>images/img34.png" width="12" height="13" style="margin-right:3px;margin-top:-2px;" align="absmiddle"><?=$naira[5]?></td>



</tr>



<tr> 



  <td>&nbsp;</td>



  <td colspan="3" class="lottoext" align="left">Your Vision Number is:</td>



</tr>



<tr> 



  <td width="67px"><?php if(!$my_basket['vision']) { ?><table width="67px" border="0" cellspacing="0" cellpadding="0">



	  <tr> 



		<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:luckyVisionDip()" class="step100">Lucky Dip</a></td>



	  </tr>



	</table><?php } ?></td>



  <td align="left" style="padding-left:6px"><input type="text" name="txtVisionNumber" id="txtVisionNumber" value="<?=$my_basket['vision']?$my_basket['vision']:$vision_number?>" class="textfield3" readonly></td>



  <td colspan="2" class="lottoext" align="left">Play<?=$my_basket['vision']?"ing":""?> your last number</td>



</tr>



<tr> 



  <td align="left" style="padding-left:2px;padding-bottom:2px;"><a href="#" class="add">Help</a></td>



  <td colspan="3" valign="middle">



  <?php if(!$my_basket['vision']) { ?>



  	<table width="100%" border="0" cellspacing="0" cellpadding="0">



	  <tr> 



		<td width="50%" class="lottoext" valign="top">Play Vision Number?</td>



		<td width="8%"><input type="radio" name="rdoPlayVision" id="rdoPlayVision1" onClick="calAmt()" value="Y"></td>



		<td width="12%" class="lottoext" align="left">Yes</td>



		<td width="7%"><input type="radio" name="rdoPlayVision" id="rdoPlayVision2" onClick="calAmt()" value="N"></td>



		<td width="23%" class="lottoext" align="left">No</td>



	  </tr>



	</table>



  <?php } else { ?>

  <input type="hidden" name="rdoPlayVision" value="Y">  

  <?php } ?>

  <input type="hidden" name="vision_price" id="vision_price" value="<?=$naira[5]?>">

  </td>



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



						<td background="<?=$_DIR["site"]["url"]?>images/img24.gif" height="31px" style="background-repeat: no-repeat;padding-left:63px;padding-top:2px" class="rate"><img src="<?=$_DIR["site"]["url"]?>images/img36.png" width="17" height="18"> <span id="totalamount"><?=$total_price?$total_price+($my_basket['vision']?$naira[5]:0):"0.00"?></span> </td>



					  </tr>



					</table></td>



				  <td width="5%"><img src="<?=$_DIR["site"]["url"]?>images/img30.png" width="44" height="44"></td>



				  <td width="44%"><table width="100px" border="0" cellspacing="0" cellpadding="0" align="center">



					  <tr> 



						<td><input type="image" src="<?=$_DIR["site"]["url"]?>images/add_basket.gif" border="0"></td>



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



			  <td height="30px" background="<?=$_DIR["site"]["url"]?>images/img67.png" style="background-repeat:no-repeat;padding-left:15px" class="text12">My Basket</td>



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



									  <td background="<?=$_DIR["site"]["url"]?>images/img144.gif" height="90px" style="background-repeat: no-repeat;" valign="top"><br> 



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



											<td align="center" height="24px" class="basket">F</td>



											<td class="basket"><?=getNumber($i,5)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td align="center" height="24px" class="basket">G</td>



											<td class="basket"><?=getNumber($i,6)?></td>



										  </tr>



										  <tr> 



											<td bgcolor="#D2D2D2" height="1px" colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										  </tr>



										  <tr> 



											<td colspan="3" style="line-height:1.4em;padding-top:6px"><a href="<?=$_DIR["site"]["url"]."basket".$atend."act".$_DELIM."editnairapslip".$baratend."rowid".$_DELIM.($i+1)?>" class="linksign">Edit 



											  numbers</a><br> 



											  <a href="javascript:if(confirm('Are you sure wish to delete this Playslip?')){self.location.href='<?=$_DIR["site"]["url"]."basket".$atend."act".$_DELIM."rmnairapslip".$baratend."rowid".$_DELIM.($i+1)?>'}" class="linksign">Delete play slip</a></td>



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



						  <td height="100px" background="<?=$_DIR["site"]["url"]?>images/img74a.png" style="background-repeat:no-repeat">



<form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>basket<?=$atend?>" method="post">

<input type="hidden" name="hidAction" value="proceed-button-click">

<input type="hidden" id="hidtotalcost" value="<?=$tprice?>">

<input type="hidden" id="rdoPlayVision" value="<?=$my_basket['vision']?"Y":""?>">

<input type="hidden" id="vision_price" value="<?=$naira[5]?>">

<?php if($my_basket['weeks']) $tprice=$tprice*$my_basket['weeks']; ?>

<?php if($my_basket['vision']) $tprice=$tprice+$naira[5]; ?>

						  <table width="97%" border="0" cellspacing="1" cellpadding="1" align="center">



							  <tr> 



								<td>&nbsp;</td>



								<td>&nbsp;</td>



								<td colspan="2" align="right" class="total">Total</td>



								<td class="total">&nbsp;&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/img34.png"> 



								  <span id="allamount"><?=number_format($tprice,2)?></span></td>



							  </tr>



							  <tr> 



								<td width="32%" height="55"  style="line-height:2em;color:#FFFFFF">Choose 



								  draws<br> <select name="cmbDraw" class="validate['required'] combo3">



								  <option>Please Select</option>



								  <option value="Saturday" <?=$my_basket['draws']=="Saturday"?"selected":""?>>Saturday</option>



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



								<td width="17%" align="center" valign="bottom"><img src="<?=$_DIR["site"]["url"]?>images/img75.png" width="45" height="44"></td>



								<td width="21%" valign="bottom"><input type="image" src="<?=$_DIR["site"]["url"]?>images/proceed.png" width="101" height="31" border="0"></td>



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