<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
check_member_login('yes','MEMBER','','afro-check-number'); //Check login
$_THISPAGENAME='afro-check-number';
include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');
$content[0]="Check Numbers";
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
  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">
  <?php if($success) { ?>	
  <table width="600px" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><?php include("success.php"); ?></td></tr></table>
  <?php } ?>
  <table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">
	  <tr> 
		<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">
			<tr> 
			  <td valign="top" align="left"  style="padding-left:1px;"><img src="<?=$_DIR["site"]["url"]?>images/menu6.png" width="679" height="58"></td>
			</tr>
			<tr> 
			  <td valign="top" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
				  <tr> 
					<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img76.png" style="background-repeat:repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="72%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <?php
								$tprice=0;
								$len=get_basket_count();
								for($i=0;$i<$len;$i++) {
									$tprice+=$price*get_playslip_count($i);
									if($i%2==0) print "<tr>";
								?>
									<td align="left" valign="top">
									<table width="243px" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:10px;">
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
											  slip no. <?=$i+1?></td>
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
									if($i%2!=0) print "</tr>";
								}
								?></td>
							  </tr>
							</table></td>
						  <td width="28%" valign="top" align="left"><table width="98%" border="0" cellspacing="1" cellpadding="1" align="center">
							  <tr> 
								<td height="25">&nbsp;</td>
							  </tr>
							  <tr> 
								<td valign="top" style="line-height:1.5em;padding-left:10px;">Draws:<br> 
								  <span class="text11"><?=$my_basket['draws']?></span><br> 
								  </td>
							  </tr>
							  <tr> 
								<td style="line-height:1.5em;padding-left:10px;"><br>Weeks:&nbsp;&nbsp;&nbsp;
								  <span class="text11"><?=$my_basket['weeks']?></span><br></td>
							  </tr>
							  <tr> 
								<td style="color:#436200;padding-left:10px;"><a href="<?=$_DIR["site"]["url"]?>basket<?=$atend?>" class="linksign">Edit Weeks</a></td>
							  </tr>
							  <?php if($my_basket['vision']) { ?>
							  <tr> 

								<td style="line-height:1.5em;padding-left:10px;"><br> You are entered in <br>Vision Raffle Draw:<br> 

								  <span class="text11"><?=get_exist_vision_number()?></span><br></td>

							  </tr>
							  <?php } ?>
							  <tr> 
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td  valign="top" align="left"><?php if($my_basket['weeks']) $tprice=$tprice*$my_basket['weeks']; ?><table width="182px" border="0" cellspacing="0" cellpadding="0">
									<tr>
									  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img87.gif" width="182" height="12"></td>
									</tr>
									<tr>
									  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img89.gif" style="background-repeat:repeat-y"><table width="91%" border="0" cellspacing="1" cellpadding="1" align="center">
										  <tr> 
											<td class="basket">Total</td>
										  </tr>
										  <tr> 
											<td class="amount"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif"> <?=number_format($tprice+($my_basket['vision']?$afro[5]:0),2)?></td>
										  </tr>
										  <tr> 
											<td valign="top" style="padding-top:8px"><a href="<?=$_DIR["site"]["url"]?>afro-buy-slip<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/checkout.gif" width="129px" height="23px" border="0"></a></td>
										  </tr>
										  <tr> 
											<td><br/>Note: Each 
											  play slip generates 
											  a seperate ticket.</td>
										  </tr>
										  <tr>
											<td><br/><a href="<?=$_DIR["site"]["url"]?>afro-check-number<?=$atend."act".$_DELIM."savenumber".$baratend?>"><img src="<?=$_DIR["site"]["url"]?>images/save_number.gif" width="165" height="23" border="0"></a></td>
										  </tr>
										</table></td>
									</tr>
									<tr>
									  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img88.gif" width="182" height="12"></td>
									</tr>
								  </table></td>
							  </tr>
							</table></td>
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
</tr>
</table>
<?php include_once("footer.php"); ?>