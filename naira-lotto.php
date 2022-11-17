<?php







include_once("includes/config/application.php"); //include config







dbConnection('on'); //open database connection





check_opening_hour();

$_THISPAGENAME='naira-lotto';







include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');







$content[0]="Play Naira Lotto";







$formvalidation=true; //for form validation







$noright=true;







include_once("header.php");







?>







<table width="100%" background="<?=$_DIR["site"]["url"]?>images/pnlbg.jpg" border="0" cellpadding="0" cellspacing="0">







<tr>







  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>







</tr>







<tr>







  <td valign="top" class="text">















  <table width="779px" border="0" cellspacing="0" cellpadding="0" align="center">







	<tr><td background="<?=$_DIR["site"]["url"]?>images/img92.png" width="800px" height="70px" style="padding-left:10px;"><span class="vticket">Play Naira Lotto</span></td></tr>







	<tr><td background="<?=$_DIR["site"]["url"]?>images/img94.png" style="background-repeat-y" valign="top">







	<table width="788px" border="0" cellspacing="0" cellpadding="0" align="center">







	<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img95.png" width="788px" height="9px"></td></tr>







	<tr><td valign="top" background="<?=$_DIR["site"]["url"]?>images/img96.png" style="background-repeat-y">







<?php if(!$naira[0]) { ?>







<br /><div align="center" style="padding:10px;"><span class="bigtext">"Naira Lotto" and "Vision Number" are currently closed,<br /><br /> while we are drawing today's lucky numbers!  </span><br><br>







<span class="rate">Find out if you've won!</span><br><br>







<a href="<?=$_DIR["site"]["url"]."result-naira-lotto".$atend?>"><span style="font-size:13px">Go to Naira Lotto Result Checker</span></a></div>







<?php } else { ?>















<table border="0" cellspacing="0" cellpadding="0" align="center">







<tr>







<td width="777px" height="501px" valign="top" align="left" background="<?=$_DIR["site"]["url"]?>images/green_img.png" style="background-repeat: no-repeat">







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







			<td colspan="2" align="center" class="step" height="30px" valign="bottom">Estimated Jackpot for</td>







		  </tr>







		  <tr>







			<td colspan="2" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







		  </tr>







		  <tr>







			<td colspan="2" align="center" class="green" height="25px" valign="top"><?=$naira[0]?></td>







		  </tr>







		  <tr>







			<td colspan="2" align="center">







				<span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img33.png" style="margin-right:3px;" align="top" width="26" height="27"><?=$naira[1]?></span>







			</td>







		  </tr>







		  <tr>







			<td height="45px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







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







						<td align="center" class="green"><?=$naira[3]?></td>







					  </tr>







					</table></td>







				  <td width="45%" valign="top"><table width="132px" border="0" cellspacing="1" cellpadding="1">







					  <tr>







						<td width="40px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$naira[2]["fullDays"]?></td>







						<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







						<td width="41px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$naira[2]["fullHours"]?></td>







						<td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







						<td width="41px" background="<?=$_DIR["site"]["url"]?>images/img28.gif" height="38px" style="background-repeat: no-repeat" class="num2" align="center"><?=$naira[2]["fullMinutes"]?></td>







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







				  <td width="56%" align="left" style="line-height:2em;color:#FFFFFF"><span class="paylist">Choose







					draws</span><br> <select name="cmbDraw" class="validate['required'] combo3">







					  <option value="">Please Select</option>







					  <option value="Saturday" <?=$_POST["cmbDraw"]=="Saturday"?"selected":""?>>Saturday</option>







					</select> </td>







				  <td width="44%" align="left" style="line-height:2em;color:#FFFFFF"><span class="paylist">Number







					of week</span><br> <select name="cmbWeek" id="cmbWeek" onChange="calAmt()" class="validate['required'] combo3">







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







			<td colspan="2" valign="top"><br><table width="89%" border="0" cellspacing="2" cellpadding="2" align="center">







				<tr>







				  <td width="86%" valign="top" style="line-height:1.5em"><a href="<?=$_DIR["site"]["url"]."naira-lotto".$atend."play".$_DELIM."savenum".$baratend?>" class="paylist">Play My Saved Numbers</a><br/>







					<a href="<?=$_DIR["site"]["url"]."basket".$atend?>" class="paylist">Play My Last Numbers</a>







				  </td>







				  <td width="14%"><a href="#" class="paylist">Help</a></td>







				</tr>







			  </table></td>







		  </tr>







		</table></td>







	  <td width="48%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">







		  <tr>







			<td height="46px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







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







						<td width="34px" align="left"><input type="text" name="num1" id="num1" value="<?=$num1?>" onChange="chkVal(this,'row1',1,1)"  class="validate['required'] textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num2" id="num2" value="<?=$num2?>" onChange="chkVal(this,'row1',1,2)" class="validate['required'] textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num3" id="num3" value="<?=$num3?>" onChange="chkVal(this,'row1',1,3)" class="validate['required'] textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num4" id="num4" value="<?=$num4?>" onChange="chkVal(this,'row1',1,4)" class="validate['required'] textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num5" id="num5" value="<?=$num5?>" onChange="chkVal(this,'row1',1,5)" class="validate['required'] textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num6" id="num6" value="<?=$num6?>" onChange="chkVal(this,'row1',1,6)" class="validate['required'] textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num7" id="num7" value="<?=$num7?>" onChange="chkVal(this,'row2',7,7)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num8" id="num8" value="<?=$num8?>" onChange="chkVal(this,'row2',7,8)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num9" id="num9" value="<?=$num9?>" onChange="chkVal(this,'row2',7,9)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num10" id="num10" value="<?=$num10?>" onChange="chkVal(this,'row2',7,10)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num11" id="num11" value="<?=$num11?>" onChange="chkVal(this,'row2',7,11)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num12" id="num12" value="<?=$num12?>" onChange="chkVal(this,'row2',7,12)" class="textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num13" id="num13" value="<?=$num13?>" onChange="chkVal(this,'row3',13,13)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num14" id="num14" value="<?=$num14?>" onChange="chkVal(this,'row3',13,14)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num15" id="num15" value="<?=$num15?>" onChange="chkVal(this,'row3',13,15)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num16" id="num16" value="<?=$num16?>" onChange="chkVal(this,'row3',13,16)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num17" id="num17" value="<?=$num17?>" onChange="chkVal(this,'row3',13,17)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num18" id="num18" value="<?=$num18?>" onChange="chkVal(this,'row3',13,18)" class="textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num19" id="num19" value="<?=$num19?>" onChange="chkVal(this,'row4',19,19)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num20" id="num20" value="<?=$num20?>" onChange="chkVal(this,'row4',19,20)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num21" id="num21" value="<?=$num21?>" onChange="chkVal(this,'row4',19,21)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num22" id="num22" value="<?=$num22?>" onChange="chkVal(this,'row4',19,22)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num23" id="num23" value="<?=$num23?>" onChange="chkVal(this,'row4',19,23)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num24" id="num24" value="<?=$num24?>" onChange="chkVal(this,'row4',19,24)" class="textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num25" id="num25" value="<?=$num25?>" onChange="chkVal(this,'row5',25,25)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num26" id="num26" value="<?=$num26?>" onChange="chkVal(this,'row5',25,26)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num27" id="num27" value="<?=$num27?>" onChange="chkVal(this,'row5',25,27)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num28" id="num28" value="<?=$num28?>" onChange="chkVal(this,'row5',25,28)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num29" id="num29" value="<?=$num29?>" onChange="chkVal(this,'row5',25,29)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num30" id="num30" value="<?=$num30?>" onChange="chkVal(this,'row5',25,30)" class="textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num31" id="num31" value="<?=$num31?>" onChange="chkVal(this,'row6',31,31)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num32" id="num32" value="<?=$num32?>" onChange="chkVal(this,'row6',31,32)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num33" id="num33" value="<?=$num33?>" onChange="chkVal(this,'row6',31,33)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num34" id="num34" value="<?=$num34?>" onChange="chkVal(this,'row6',31,34)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num35" id="num35" value="<?=$num35?>" onChange="chkVal(this,'row6',31,35)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num36" id="num36" value="<?=$num36?>" onChange="chkVal(this,'row6',31,36)" class="textfieldnaira" maxlength="2"></td>







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







						<td width="34px" align="left"><input type="text" name="num37" id="num37" value="<?=$num37?>" onChange="chkVal(this,'row7',37,37)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num38" id="num38" value="<?=$num38?>" onChange="chkVal(this,'row7',37,38)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num39" id="num39" value="<?=$num39?>" onChange="chkVal(this,'row7',37,39)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num40" id="num40" value="<?=$num40?>" onChange="chkVal(this,'row7',37,40)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num41" id="num41" value="<?=$num41?>" onChange="chkVal(this,'row7',37,41)" class="textfieldnaira" maxlength="2"></td>







						<td width="34px" align="left"><input type="text" name="num42" id="num42" value="<?=$num42?>" onChange="chkVal(this,'row7',37,42)" class="textfieldnaira" maxlength="2"></td>







					  </tr>







					</table></td>







				  <td align="center" valign="middle"><a href="javascript:void(0);" onClick="fnClear(37,6)" class="clear">Clear</a></td>







				</tr>







			  </table></td>







		  </tr>







		  <tr>







			<td height="101px" valign="<?=($naira[6] && $naira[6]!="0.00")?"middle":"top"?>" align="center">








<table width="89%" border="0" cellspacing="0" cellpadding="0" <?=($naira[6] && $naira[6]!="0.00")?"style=\"padding-top:10px;\"":"style=\"padding-right:10px;padding-top:10px;\""?>>







<tr>







  <td rowspan="2" valign="top">







  <table width="50px" border="0" cellspacing="0" cellpadding="0" align="left">







   <tr>







   <td <?=($naira[6] && $naira[6]!="0.00")?"class=\"iconimg\"":""?>>&nbsp;</td>







   </tr>







   </table></td>







  <td width="175px" colspan="2" align="center" valign="bottom" class="lottoext"><?php if($naira[6] && $naira[6]!="0.00") { echo $naira[3]; } ?>
  <br /><br /><span class="lottorate"><img src="<?=$_DIR["site"]["url"]?>images/img33.png" style="margin-right:3px;" align="top" width="18"><?=$naira[6]?></span></td>







  <td align="right" valign="top" style="padding-right:2px;"><a href="javascript:fnSubmit();" class="add">Add more line</a></td>







</tr>



</table>

<?php if($naira[6] && $naira[6]!="0.00") { ?>

<table width="89%" border="0" cellspacing="0" cellpadding="0">



<tr>







  <td>&nbsp;</td>







  <td colspan="2" class="lottoext" align="left">Your Vision Number is:</td>


  <td valign="bottom" align="right" style="padding-right:2px;color:#FFFFFF;font-size:12px;font-weight:bold"><?=($naira[5]==0 || $naira[5]=="0.00")?"Free":'<img src="'.$_DIR["site"]["url"].'images/img34.png" width="12" height="13" style="margin-right:3px;margin-top:-2px;" align="absmiddle">'.$naira[5]?></td>





</tr>







<tr>







  <td><table width="67px" border="0" cellspacing="0" cellpadding="0">







	  <tr>







		<td background="<?=$_DIR["site"]["url"]?>images/img29.gif" height="24px" style="background-repeat: no-repeat" align="center"><a href="javascript:luckyVisionDip()" class="step100">Lucky Dip</a></td>







	  </tr>







	</table></td>







  <td align="left" style="padding-left:6px"><input type="text" name="txtVisionNumber" id="txtVisionNumber" value="<?=$vision_number?>" class="textfield3" readonly=""></td>















</tr>







<tr>














  <td colspan="3" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">







	  <tr>







		<td width="50%" class="lottoext" valign="top">Play Vision Number?</td>







		<td width="8%"><input type="radio" name="rdoPlayVision" id="rdoPlayVision1" onClick="calAmt()" value="Y" <?=$my_basket['vision']?"checked":""?>>

		<input type="hidden" name="vision_price" id="vision_price" value="<?php echo str_replace(',','',$naira[5]); ?>">

		</td>







		<td width="12%" class="lottoext" align="left">Yes</td>







		<td width="7%"><input type="radio" name="rdoPlayVision" id="rdoPlayVision2" onClick="calAmt()" value="N"></td>







		<td width="23%" class="lottoext" align="left">No</td>







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







			<td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">







				<tr>







				  <td width="51%"><table width="148px" border="0" cellspacing="0" cellpadding="0" align="center">







					  <tr>







						<td background="<?=$_DIR["site"]["url"]?>images/img24.gif" height="31px" style="background-repeat: no-repeat;padding-left:63px;padding-top:2px" class="rate"><img src="<?=$_DIR["site"]["url"]?>images/img36.png" width="17" height="18"> <span id="totalamount">0.00</span> </td>







					  </tr>







					</table></td>







				  <td width="5%"><img src="<?=$_DIR["site"]["url"]?>images/img30.png" width="44" height="44"></td>







				  <td width="44%"><table width="100px" border="0" cellspacing="0" cellpadding="0" align="center">







					  <tr>







						<td><input type="image" src="<?=$_DIR["site"]["url"]?>images/img31.png" height="33px" width="99px" border="0"></td>







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







	<tr><td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img97.png" width="788px" height="8px"></td></tr>







	</table>







	</td></tr>







	<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img93.png" width="800px" height="9px"></td></tr>







  </table>















  </td>







</tr>







</table>







<?php include_once("footer.php"); ?>