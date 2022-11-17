<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$_THISPAGENAME='afro-buy-slip';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Buy Playslip";

$noright=true;

include_once("header.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

<td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">

	<tr> 

	  <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Your 

		basket - check your numbers</td>

	</tr>

	<tr> 

	  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

		  <tr> 

			<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">

				<tr> 

				  <td valign="top" align="left"  style="padding-left:1px;"><img src="<?=$_DIR["site"]["url"]?>images/menu7.png" width="679" height="58"></td>

				</tr>

				<tr> 

				  <td valign="top" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">

					  <tr> 

						<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img76.png" style="background-repeat:repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">

							<tr> 

							  <td width="36%" align="left" valign="top">

							  <?php

							  	$tprice=0;

								$i=$_POST["INDEX"]?$_POST["INDEX"]:0;

								$len=count($my_basket);

								if($len>0) {

									$tprice+=$price*count($my_basket[$i]);

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

							  <td width="2%" valign="top" align="left">&nbsp;</td>

							  <td width="62%" valign="top" align="left">

							  <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">

							  <input type="hidden" name="hidAction" value="buynow">

							  <input type="hidden" name="INDEX" value="<?=$_POST["INDEX"]?($_POST["INDEX"]+1):1?>">

							  <input type="hidden" name="INSERTED_ID" value="<?=$_POST["INSERTED_ID"]?>">							  

							  <table width="99%" border="0" cellspacing="1" cellpadding="1">

								  <tr> 

									<td height="12" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

								  </tr>

								  <tr> 

									<td height="177px" colspan="2" background="<?=$_DIR["site"]["url"]?>images/img90a.png" style="background-repeat: no-repeat"><table width="369" height="181" border="0" cellspacing="0" cellpadding="0"  align="left">

										<tr> 

										  <td height="26px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

										</tr>

										<tr> 

										  <td width="291" height="19px" align="left" valign="bottom" style="padding-left:85px;color:#FFFFFF;font-size:14px;line-height:1.5em">&nbsp;&nbsp;&nbsp;&nbsp;Estimated Jackpot for</td>

										  <td width="78" height="19px" align="left"><table width="60px" border="0" cellspacing="0" cellpadding="0">

											  <tr> 

												<td height="23px" background="<?=$_DIR["site"]["url"]?>images/img91.gif" style="background-repeat:no-repeat;color:#FFFFFF;" align="center"> 

												  <strong><img src="<?=$_DIR["site"]["url"]?>images/nairacost.png"><?=$price?></strong></td>

											  </tr>

											</table></td>

										</tr>

										<tr> 

										  <td colspan="2" align="left" height="22px"  class="green" valign="top" style="padding-left:95px;line-height:1.5em"><?=$afro[0]?></td>

										</tr>

										<tr> 

										  <td height="47" colspan="2" align="left" style="padding-left:80px;"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img39a.png" style="padding-top:5px;"><?=$afro[1]?></span></td>

										</tr>

										<tr> 

										  <td height="55" colspan="2" align="left" valign="top"><br /> 

											<table width="100%" height="34" border="0" cellpadding="0" cellspacing="0">

											  <tr> 

												<td width="56%" height="34" align="left" valign="top">&nbsp;</td>

												<td width="44%" valign="top" align="left"> 

												  <table width="135" border="0" cellpadding="0" cellspacing="0">

													<tr> 

													  <td width="39" height="29" valign="middle" align="center" class="num2">&nbsp;&nbsp;&nbsp;&nbsp;<?=$afro[2]["fullDays"]?></td>

													  <td width="11"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

													  <td width="35" valign="middle" class="num2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?=$afro[2]["fullHours"]?></td>

													  <td width="13"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

													  <td width="37" valign="middle" class="num2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?=$afro[2]["fullMinutes"]?></td>

													</tr>

												  </table></td>

											  </tr>

											</table></td>

										</tr>

									  </table></td>

								  </tr>

								  <tr> 

									<td colspan="2" align="right" valign="top" style="padding-right:66px;font-size:13px"><strong><?=$afro[3]?><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="8px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Days<img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="15px">Hours<img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="15px">Mins</strong></td>

								  </tr>

								  <tr> 

									<td colspan="2" class="text" style="padding-top:5px"><p>We 

										will send an email confirming 

										your purchase. We will 

										also check your numbers 

										and send an email if you 

										win.</p></td>

								  </tr>

								  <tr> 

									<td width="67%" ><br><a href="javascript:if(confirm('Are you sure wish to cancel all play slips?')){self.location.href='<?=$_DIR["site"]["url"]."afro-buy-slip".$atend."act".$_DELIM."cancelps".$baratend?>'}" class="linksign">Cancel 

									  all play slips awaiting 

									  checkout </a><br><br></td>

									<td width="33%" align="center"><input type="image" src="<?=$_DIR["site"]["url"]?>images/buy_ticket.gif" width="97" height="22" border="0"></td>

								  </tr>

								  <tr> 

									<td colspan="2" class="text"><p>Please 

										note, by clicking ' Buy 

										now ' , you accept and 

										agree to be bound by the 

										<a href="#" class="linksign">Interactive 

										Account Terms and Conditions</a>, 

										the <a href="#" class="linksign">Rules 

										for Draw-Based Games Played 

										Interactively</a> and 

										the <a href="#" class="linksign">Lotto 

										Game Procedures.</a> </p></td>

								  </tr>

								</table></form></td>

							</tr>

						  </table></td>

					  </tr>

					</table></td>

				</tr>

			  </table></td>

		  </tr>

		  <tr> 

			<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

		  </tr>

		</table></td>

	</tr>

	<tr> 

	  <td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

	</tr>

  </table></td>

  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

  <td width="23%" valign="top" align="left"><table width="228px" border="0" cellspacing="0" cellpadding="0">

	<tr>

	  <td valign="top" style="padding-top:3px"><table width="228px" border="0" cellspacing="0" cellpadding="0" align="right">

		  <tr>

			<td><img src="<?=$_DIR["site"]["url"]?>images/img81.gif" width="228" height="7"></td>

		  </tr>

		  <tr>

			<td background="<?=$_DIR["site"]["url"]?>images/img83.gif" style="background-repeat:repeat-y" valign="top"><table width="93%" border="0" cellspacing="1" cellpadding="1" align="center">

				<tr>

				  <td class="basket" style="padding-bottom:8px">If you have any difficulties with this process</td>

				</tr>

				<tr>

				  <td class="text" style="padding-bottom:10px">Please call Vision Lottery Customer Care Team</td>

				</tr>

				

			  </table></td>

		  </tr>

		  <tr>

			<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img82.gif" width="228" height="7"></td>

		  </tr>

		</table></td>

	</tr>

	<tr>

	  <td>&nbsp;</td>

	</tr>

  </table></td>

</tr>

</table>

<?php include_once("footer.php"); ?>