<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$_THISPAGENAME='play-lotto';
include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');
$content=getContent("17");
include_once("header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top">
<table width="705px" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7">Check Result</td>
</tr>
<tr>
<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
	  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding-top:10px;">
	  
<table width="674px" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td height="520px" valign="top" align="left" background="<?=$_DIR["site"]["url"]?>images/img126.png" style="background-repeat: no-repeat"><table width="100%" height="498" border="0" cellpadding="1" cellspacing="1">
	<tr>
	  <td width="50%" valign="top"><table width="334px" height="158px" border="0" cellspacing="0" cellpadding="0"  align="right">
		  <tr> 
			<td height="25px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" class="step" height="19px" valign="bottom" style="padding-left:108px">Estimated 
			  Jackpot for</td>
		  </tr>
		  <tr> 
			<td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" class="green" height="18px" valign="top" style="padding-left:80px"><?=$afro[0]?></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" height="43px" valign="middle" style="padding-left:70px"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img38.png" width="26" height="27px" align="top">&nbsp;<?=$afro[1]?></span></td>
		  </tr>
		  <tr> 
			<td colspan="2" valign="top" align="left"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr> 
				  <td width="54%" align="left" valign="top">&nbsp;</td>
				  <td width="46%" valign="top" align="left">
					<table border="0" cellpadding="0" cellspacing="0">
					  <tr> 
						<td width="9px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="34px" height="34px" valign="middle" align="center" class="num2"><?=$afro[2]["fullDays"]?></td>
						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="34px" valign="middle" class="num2" align="center"><?=$afro[2]["fullHours"]?></td>
						<td width="9px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="34px" valign="middle" class="num2" align="center"><?=$afro[2]["fullMinutes"]?></td>
					  </tr>
					</table></td>
				</tr>
			  </table></td>
		  </tr>
		</table>
		<div align="center"><a href="<?=$_DIR["site"]["url"]?>result-afro-millions<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" border="0" style="margin-top:85px;margin-left:-22px" width="170" height="170"></a></div>
	  </td>
	  <td width="50%" valign="top" align="left"><table width="334px" height="158px" border="0" cellspacing="0" cellpadding="0"  align="right">
		  <tr> 
			<td height="25px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" class="step" height="19px" valign="bottom" style="padding-left:108px">Estimated 
			  Jackpot for</td>
		  </tr>
		  <tr> 
			<td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" class="green" height="18px" valign="top" style="padding-left:80px"><?=$naira[0]?></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" height="43px" valign="middle" style="padding-left:70px"><span class="lottomoney"><img src="<?=$_DIR["site"]["url"]?>images/img39.png" align="top">&nbsp;<?=$naira[1]?></span></td>
		  </tr>
		  <tr> 
			<td colspan="2" align="left" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr> 
				  <td width="54%" align="left" valign="top">&nbsp;</td>
				  <td width="46%" valign="top" align="left">
					<table width="131px" border="0" cellpadding="0" cellspacing="0">
					  <tr> 
						<td width="7px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="34px" height="34px" valign="middle" align="center" class="num2"><?=$naira[2]["fullDays"]?></td>
						<td width="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="34px" valign="middle" class="num2" align="center"><?=$naira[2]["fullHours"]?></td>
						<td width="9px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
						<td width="37px" valign="middle" class="num2" align="center"><?=$naira[2]["fullMinutes"]?></td>
					  </tr>
					</table></td>
				</tr>
			  </table></td>
		  </tr>
		</table>
		<div align="center"><a href="<?=$_DIR["site"]["url"]?>result-naira-lotto<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif" border="0" style="margin-top:85px;margin-left:-4px" width="170" height="170"></a></div>
		</td>
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