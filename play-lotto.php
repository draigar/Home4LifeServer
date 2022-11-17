<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$_THISPAGENAME='play-lotto';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content=getContent("15");

include_once("header.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

                    <tr> 

                      <td valign="top">

<table width="705px" border="0" cellspacing="0" cellpadding="0">

<tr> 

<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7">Play Lotto</td>

</tr>

<tr>

<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

	<tr>

	  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding-top:10px;">


<table width="678px" border="0" cellspacing="0" cellpadding="0" align="center">
	  <tr> 
		<td width="339px" height="553px" valign="top" align="left"><table width="339px" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="7px"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img01.png" width="7" height="553"></td>
			  <td width="325px" valign="top" background="<?=$_DIR["site"]["url"]?>images/lotto_img03.png" style="background-repeat: repeat-x"><table width="325px" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
					<td height="6px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
				  </tr>
				  <tr> 
					<td height="155px" background="<?=$_DIR["site"]["url"]?>images/lotto_img04.png" style="background-repeat: no-repeat">
					


			<table width="100%" height="155px" border="0" cellspacing="0" cellpadding="0"  align="right">

		  <tr> 

			<td height="18px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" class="step" height="19px" valign="bottom" style="padding-left:108px">Estimated Jackpot for</td>

		  </tr>

		  <tr> 

			<td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" class="green" height="18px" valign="top" style="padding-left:80px"><?=$afro[0]?></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" height="43px" valign="middle" style="padding-left:70px"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img38.png" width="26" height="27px" style="padding-right:2px;"><?=$afro[1]?></span></td>

		  </tr>

		  <tr> 

			<td colspan="2" valign="top" align="left">

				<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:13px;">

				<tr> 

				  <td width="54%" align="left" valign="top">&nbsp;</td>

				  <td width="46%" valign="top" align="left">

					<table border="0" cellpadding="0" cellspacing="0">

					  <tr> 

						<td width="9px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" height="34px" valign="middle" align="center" class="num2"><?=$afro[2]["fullDays"]?></td>

						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" valign="middle" class="num2" align="center"><?=$afro[2]["fullHours"]?></td>

						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" valign="middle" class="num2" align="center"><?=$afro[2]["fullMinutes"]?></td>

					  </tr>

					</table></td>

				</tr>

			  </table></td>

		  </tr>

		</table>
		
		
					
					</td>
				  </tr>
				  <tr> 
					<td height="85px" align="center" valign="bottom"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img09.png" width="256" height="28"></td>
				  </tr>
				  <tr>
					<td height="223px" valign="top" align="center"><a href="<?=$_DIR["site"]["url"]?>afro-millions<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img11.png" width="209" height="209"></a></td>
				  </tr>
				</table></td>
			  <td><img src="<?=$_DIR["site"]["url"]?>images/lotto_img02.png" width="7px" height="553"></td>
			</tr>
		  </table></td>
		<td width="339px" valign="top" align="left"><table width="339px" border="0" cellspacing="0" cellpadding="0">
			<tr> 
			  <td width="7"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img05.png" width="7" height="553"></td>
			  <td width="325" valign="top" background="<?=$_DIR["site"]["url"]?>images/lotto_img07.png" style="background-repeat: repeat-x"><table width="325px" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
					<td height="6px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
				  </tr>
				  <tr> 
					<td height="155px" background="<?=$_DIR["site"]["url"]?>images/lotto_img08.png" style="background-repeat: no-repeat">
					
<table width="100%" height="155px" border="0" cellspacing="0" cellpadding="0"  align="right">

		  <tr> 

			<td height="18px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" class="step" height="19px" valign="bottom" style="padding-left:108px">Estimated Jackpot for</td>

		  </tr>

		  <tr> 

			<td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" class="green" height="18px" valign="top" style="padding-left:80px"><?=$naira[0]?></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" height="43px" valign="middle" style="padding-left:70px;"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img39.png" style="padding-right:2px;"><?=$naira[1]?></span></td>

		  </tr>

		  <tr> 

			<td colspan="2" align="left" valign="top">

				<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:13px;">

				<tr> 

				  <td width="54%" align="left" valign="top">&nbsp;</td>

				  <td width="46%" valign="top" align="left">

					<table border="0" cellpadding="0" cellspacing="0">

					  <tr> 

						<td width="9px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" height="34px" valign="middle" align="center" class="num2"><?=$naira[2]["fullDays"]?></td>

						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" valign="middle" class="num2" align="center"><?=$naira[2]["fullHours"]?></td>

						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

						<td width="34px" valign="middle" class="num2" align="center"><?=$naira[2]["fullMinutes"]?></td>

					  </tr>

					</table></td>

				</tr>

			  </table></td>

		  </tr>

		</table>
					
					
					</td>
				  </tr>
				  <tr> 
					<td height="85px" align="center" valign="bottom"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img12.png" width="264" height="31"></td>
				  </tr>
				  <tr>
					<td height="223px" valign="top"  align="center"><a href="<?=$_DIR["site"]["url"]?>naira-lotto<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img10.png" width="209" height="209"></a></td>
				  </tr>
				</table></td>
			  <td width="38"><img src="<?=$_DIR["site"]["url"]?>images/lotto_img06.png" width="7" height="553"></td>
			</tr>
		  </table></td>
	  </tr>
	</table>	  

	  </td>

	</tr>

	<tr>

	  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

	</tr>

  </table></td>

</tr>

<tr> 

<td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

</tr>

</table>

					  </td>

                    </tr>

                    <tr> 

                      <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

                    </tr>

                    <tr>

                      <td valign="top" class="text"><p><?php print $content[1]; ?></p></td>

                    </tr>

                  </table>



<?php include_once("footer.php"); ?>