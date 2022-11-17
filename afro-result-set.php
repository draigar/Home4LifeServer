<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$_THISPAGENAME='afro-result-set';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Afro Millions Result";

include_once("header.php"); 

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tr> 

	  <td height="35px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

	</tr>

	<tr>

	  <td valign="top" class="text">
	  <?php if($success) include("success.php"); ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr> 

	<td width="32%" valign="top" align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">

		<tr> 

		  <td height="6px"><img src="<?=$_DIR['site']['url']?>images/img131.png" width="223" height="6"></td>

		</tr>

		<tr> 

		  <td height="121px" style="background:url(<?=$_DIR['site']['url']?>images/img06.png) repeat-y" valign="top">
	  <form name="frm" action="<?=$_DIR['site']['url']."result-afro-millions".$atend?>" method="post">
	  <input type="hidden" name="ff1" value="<?=$_POST["ff1"]?>">
	  <input type="hidden" name="ff2" value="<?=$_POST["ff2"]?>">
	  <input type="hidden" name="tt1" value="<?=$_POST["tt1"]?>">
	  <input type="hidden" name="tt2" value="<?=$_POST["tt2"]?>">
	  <input type="hidden" name="lines" value="<?=$_POST["lines"]?>">
	  <input type="hidden" name="cmbDraw" value="<?=$_POST["cmbDraw"]?>">	  
	  <input type="hidden" name="hidAct" value="">
		  <table width="92%" border="0" cellspacing="0" cellpadding="0" align="center">

			  <tr> 

				<td><span class="accountads">Your Numbers</span><br/><br/>You have entered the following<br><br></td>

			  </tr>

			  <tr> 

				<td height="1px" style="background:url(<?=$_DIR['site']['url']?>images/dot2.gif) repeat-x"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

			  </tr>

			  <tr> 

				<td valign="top" align="left" style="padding-top:2px"><table width="100%" border="0" cellspacing="1" cellpadding="1">

					<tr> 

					  <td colspan="2">Lines Numbers</td>

					</tr>

					<?php for($i=0,$j=1;$i<$_POST["lines"];$i++,$j+=7) { 

					if($_POST["num".$j] && $_POST["num".($j+1)] && $_POST["num".($j+2)] && $_POST["num".($j+3)] && $_POST["num".($j+4)] && $_POST["num".($j+5)] && $_POST["num".($j+6)]) {

					?>

					<tr> 

					  <td width="12%" align="center" class="text12"><?=chr(65+$i)?></td>

					  <td width="88%" valign="top" align="left"><table width="94%" border="0" cellspacing="1" cellpadding="1">

						  <tr>

							<td width="15%" height="24" class="text11" align="center"><?=$_POST["num".$j]?>
							<input type="hidden" name="<?="num".$j?>" value="<?=$_POST["num".$j]?>"></td>

							<td width="15%" class="text11" align="center"><?=$_POST["num".($j+1)]?>
							<input type="hidden" name="<?="num".($j+1)?>" value="<?=$_POST["num".($j+1)]?>"></td>

							<td width="15%" class="text11" align="center"><?=$_POST["num".($j+2)]?>
							<input type="hidden" name="<?="num".($j+2)?>" value="<?=$_POST["num".($j+2)]?>"></td>

							<td wwidth="15%" class="text11" align="center"><?=$_POST["num".($j+3)]?>
							<input type="hidden" name="<?="num".($j+3)?>" value="<?=$_POST["num".($j+3)]?>"></td>

							<td width="15%" class="text11" align="center"><?=$_POST["num".($j+4)]?>
							<input type="hidden" name="<?="num".($j+4)?>" value="<?=$_POST["num".($j+4)]?>"></td>

							<td width="15%" class="text11" align="center"><?=$_POST["num".($j+5)]?>
							<input type="hidden" name="<?="num".($j+5)?>" value="<?=$_POST["num".($j+5)]?>"></td>

							<td width="15%" class="text11" align="center"><?=$_POST["num".($j+6)]?>
							<input type="hidden" name="<?="num".($j+6)?>" value="<?=$_POST["num".($j+6)]?>"></td>

							<td width="15%"><img src="<?=$_DIR['site']['url']?>images/write_icon3a.png"></td>

						  </tr>

						</table></td>

					</tr>

					<?php } } ?>

				  </table></td>

			  </tr>

			  <tr> 

				<td height="1px" style="background:url(<?=$_DIR['site']['url']?>images/dot2.gif) repeat-x"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

			  </tr>

			  <tr> 

				<td><br/><?=$dates?><br/><br/></td>

			  </tr>

			  <tr> 

				<td height="1px" style="background:url(<?=$_DIR['site']['url']?>images/dot2.gif) repeat-x"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

			  </tr>

			  <tr> 

				<td align="center" valign="top" style="padding:8px"><input type="image" src="<?=$_DIR['site']['url']?>images/make_changes2.png" width="124" height="23" border="0"></td>

			  </tr>

			  <tr> 

				<td height="1px" style="background:url(<?=$_DIR['site']['url']?>images/dot2.gif) repeat-x"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

			  </tr>

			  <tr> 

				<td align="center" style="padding:8px"><a href="javascript:void(0)" onClick="savenum('<?=$_SERVER['REQUEST_URI']?>')" class="breakdown">Save my numbers</a><br><br><a href="#" class="breakdown">Print numbers</a></td>

			  </tr>

			  <tr>

				<td align="center" valign="top" style="padding:8px"><a href="javascript:void(0)" onClick="playnum('<?=$_SERVER['REQUEST_URI']?>')"><img src="<?=$_DIR['site']['url']?>images/play_number2.png" border="0" width="161" height="23"></a></td>

			  </tr>

			</table></form></td>

		</tr>

		<tr> 

		  <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img05.png" width="223" height="6"></td>

		</tr>

	  </table></td>

	<td width="2%"><img src="<?=$_DIR['site']['url']?>images/spacer.png"></td>

	<td width="68%" valign="top" align="left"><table width="469px" border="0" cellspacing="0" cellpadding="0">

		<tr>

		  <td height="5px" valign="top"><img src="<?=$_DIR['site']['url']?>images/img136.gif" width="469" height="6"></td>

		</tr>

		<tr>

		  <td background="<?=$_DIR['site']['url']?>images/img138.gif" style="background-repeat: repeat-y" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">

			  <tr>

				<td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">

					<tr> 

					  <td width="21%" valign="top"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="center">

					<tr> 

					  <td width="75px" class="iconimg3">&nbsp;</td>

					</tr>

				  </table></td>

					  <td width="70%" class="lottoext" valign="top" style="padding-top:5px"><span class="number">Lotto results for</span><br><?=$dates?>  </td>

					  <td width="9%" valign="top"><a href="#" class="add">Help</a></td>

					</tr>

					<tr> 

					  <td colspan="3" class="your_number" style="padding:5px">Yours Numbers</td>

					</tr>

				  </table></td>

			  </tr>

			  <tr>

				<td bgcolor="#FFFFFF" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">

				<?php 

				$cnt=count($afro_id);

				if($cnt<=0) print "<tr><td height='30' valign='middle'><strong>Sorry, you haven't entered a winning selection.</strong></td></tr>";

				for($i=0;$i<$cnt;$i++) { 

				?>

				<tr>

				  <td valign="top" align="left" style="padding-top:4px;padding-bottom:4px"><table width="100%" border="0" cellspacing="0" cellpadding="0">

					  <tr>

						<td width="72%" height="25">Result 

						  for draw <?=strlen($afro_id[$i])<4?substr("0000",0,4-strlen($afro_id[$i])).$afro_id[$i]:$afro_id[$i]?> <span class="basket" style="color:#D70109"><?=$to_time[$i]?></span></td>

						<td width="28%"><a href="<?=$_DIR['site']['url']?>prize-breakdown-afro<?=$atend?>idx<?=$_DELIM."i".md5($afro_id[$i]).$baratend?>" class="breakdown">Prize breakdown</a></td>

					  </tr>

					  <tr>

						<td valign="top"><table border="0" cellspacing="2" cellpadding="0">

							<tr> 

							  <?php

							  	$matchp=0;

								$len2=count($result[$i]);

								for($j=0,$k=0;$j<$len2;$j++,$k+=2) {

									if(!$result[$i][$j]) {

							  ?>

							  	<td width="31px" height="26px">&nbsp;</td>

							  <?php

									} else {

							  ?>

								<td width="31" align="center">&nbsp;<img src="<?=$_DIR['site']['url']?>images/write_icon3a.png"></td>

							  <?php 

									}

								}

							  ?>

							</tr>

							<tr>

							  <?php

								for($j=0,$k=0;$j<$len2;$j++,$k+=2) {

									if(!$result[$i][$j]) {

							  ?>

							  	<td width="40px" height="40px" align="center" background="<?=$_DIR['site']['url']?>images/imgbad.png" style="background-repeat: no-repeat"><font face="Arial" size="+1" color="Black"><b><?=substr($lotto_num[$i],$k,2)?></b></font></td>

							  <?php

									} else {

										$matchp++;

							  ?>

								<td width="40px" height="40px" align="center" background="<?=$_DIR['site']['url']?>images/imggood.png" style="background-repeat: no-repeat"><font face="Arial" size="+2" color="Black"><b><?=substr($lotto_num[$i],$k,2)?></b></font></td>

							  <?php 

									}

								}

							  ?>

							</tr>

						  </table></td>

						<td valign="top" style="padding-top:10px" class="text">Line <?=$line_number[$i]?><br><span class="basket" style="color:#0267A1">Matched <?=$matchp?></span></td>

					  </tr>

					</table></td>

				</tr>

				<tr>

				  <td height="1px" style="background:url(<?=$_DIR['site']['url']?>images/dot2.gif) repeat-x"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

				</tr>

				<?php } ?>				

			  </table><br></td>

			  </tr>

			  <tr>

				<td valign="top" align="left"><br><table width="98%" border="0" cellspacing="1" cellpadding="1" align="center">

					<tr>

					  <td><a href="#" class="resultlink">View draws that didn't match</a></td>

					  <td align="right"><a href="#" class="resultlink">How to claim your winnings</a></td>

					</tr>

				  </table><br></td>

			  </tr>

			</table></td>

		</tr>

		<tr>

		  <td valign="top" height="5px"><img src="<?=$_DIR['site']['url']?>images/img137.gif" width="469" height="5"></td>

		</tr>

	  </table></td>

  </tr>

</table></td>

	</tr>

</table>

<?php include_once("footer.php"); ?>