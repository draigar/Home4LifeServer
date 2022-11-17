<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$_THISPAGENAME='summary';



include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');



$content[0]="Purchase Summary";



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



				  <td valign="top" align="left"  style="padding-left:1px;"><img src="<?=$_DIR["site"]["url"]?>images/menu8.png"></td>



				</tr>



				<tr> 



				  <td valign="top" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">



					  <tr> 



						<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img76.png" style="background-repeat:repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">



							<tr> 



							  <td width="36%" align="left" valign="top" style="padding-left:10px;padding-top:10px;">



							  	



								<?php



								$len=count($ticket_details);



								for($i=0;$i<$len;$i++) {



								?>	



									<span class="text11">Ticket No:</span> <font color="Red"><?=$ticket_details[$i][0]?></font><br/> 



									<span class="text11">Purchase 



									date and time:</span><br/>



									<?=$ticket_details[$i][1]?><br/> <span class="text11">Draws 



									entered:</span> Single draw<br/> 



									<span class="text11">Channel:</span> 



									<?=$ticket_details[$i][2]?><br/>



									<span class="text11">Amount:</span> 



									<img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=sprintf("%1.2f",($ticket_details[$i][3]*$weeks))?><br/><br/>



								<?php } ?>



								<table>



								<tr> 



                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td style="line-height:1.5em">Draws: <?=$draws?><br>



                                                Weeks: <?=$weeks?><br></td>



                                            </tr>



                                            <tr> 



                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



											<tr> 



                                              <td height="1px" background="<?=$_DIR["site"]["url"]?>images/newdot.gif" style="background-repeat: repeat-x"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                            </tr>



                                            <tr> 



                                              <td>Entered Vision Number: <?=$vision_number?"Yes":"No"?><br>



											  <?php if($vision_number) { ?>



                                                <br> <?php echo substr($vision_number,0,1)."-".substr($vision_number,1,1)."-".substr($vision_number,2,1)."-".substr($vision_number,3,1)."-".substr($vision_number,4,1)."-".substr($vision_number,5,1)."-".substr($vision_number,6,1); ?><br/>



												<br> <span class="text11">Amount:</span> 



												<?=($vision_price==0 || $vision_price=="0.00")?"Free":'<img src="'.$_DIR["site"]["url"].'images/naira.gif"> '.sprintf("%1.2f",$vision_price)?><br/><br/>												



											  <?php } ?>	



											  <br></td>



                                            </tr>



								</table>



							  </td>



							  <td width="2%" valign="top" align="left">&nbsp;</td>



							  <td width="62%" valign="top" align="left">



							  <form action="" method="post">



							  <input type="hidden" name="hidAction" value="buynow">



							  <input type="hidden" name="INDEX" value="<?=$_POST["INDEX"]?($_POST["INDEX"]+1):1?>">



							  <table width="99%" border="0" cellspacing="1" cellpadding="1">



								  <tr> 



									<td height="12" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



								  </tr>



								  <tr> 



									<td height="177px" colspan="2" background="<?=$_DIR["site"]["url"]?>images/img90.png" style="background-repeat: no-repeat"><table width="369" height="168" border="0" cellspacing="0" cellpadding="0"  align="left">



										<tr> 



										  <td height="26px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



										</tr>



										<tr> 



										  <td width="291" height="19px" align="left" valign="bottom" style="padding-left:85px;color:#FFFFFF;font-size:14px;line-height:1.5em">Estimated Jackpot for</td>



										  <td width="78" height="19px" align="left"><table width="60px" border="0" cellspacing="0" cellpadding="0">



											  <tr> 



												<td height="23px" background="<?=$_DIR["site"]["url"]?>images/img91.gif" style="background-repeat:no-repeat;color:#FFFFFF;" align="center"> 



												  <strong><img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=$price?></strong></td>



											  </tr>



											</table></td>



										</tr>



										<tr> 



										  <td colspan="2" align="left" height="22px"  class="green" valign="top" style="padding-left:85px;line-height:1.5em"><?=$to_time2?></td>



										</tr>



										<tr> 



										  <td height="47" colspan="2" align="left" style="padding-left:80px;"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img39.png" align="top"><?=$prizeamt?></span></td>



										</tr>



										<tr> 



										  <td height="55" colspan="2" align="left" valign="top"><br /> 



											<table width="100%" height="34" border="0" cellpadding="0" cellspacing="0">



											  <tr> 



												<td width="56%" height="34" align="left" valign="top">&nbsp;</td>



												<td width="44%" valign="top" align="left"> 



												  <table width="135" border="0" cellpadding="0" cellspacing="0">



													<tr> 



													  <td width="39" height="29" valign="middle" align="center" class="num2"><?=$datediff["fullDays"]?></td>



													  <td width="11"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



													  <td width="35" valign="middle" class="num2" align="center"><?=$datediff["fullHours"]?></td>



													  <td width="13"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



													  <td width="37" valign="middle" class="num2" align="center"><?=$datediff["fullMinutes"]?></td>



													</tr>



												  </table></td>



											  </tr>



											</table></td>



										</tr>



									  </table></td>



								  </tr>



								  <tr> 



									<td colspan="2" align="right" valign="top" style="padding-right:76px;font-size:13px"><strong><?=$to_time1?><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="8px">Days<img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="15px">Hours<img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" width="15px">Mins</strong></td>



								  </tr>



								  <tr> 



									<td colspan="2" class="text" style="padding-top:5px">





<p><hr/><strong><font color="Green">You 



                                      have successfully purchased your Vision Lottery ticket(s).</font></strong></p>





<p>



									Thank you for buying your ticket(s) online. Your Ticket Summary is on the left of your screen.Click on "Print" to print the summary or "Continue" to view your ticket(s).



					



									</p>


<form>
<input type="button" value="Print this Page" onClick="window.print()">
</form>
									



                                    <p><hr/><a href="<?=$_DIR["site"]["url"]."view_tickets".$atend?>" class="link"><img src="<?=$_DIR["site"]["url"]?>images/continue.gif"></a></p>



									</td>



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



				  <td class="text" style="padding-bottom:10px">Please call our Vision Lottery Customer Care Team on 0845 45657 789</td>



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