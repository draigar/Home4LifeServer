<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$_THISPAGENAME='steps'; //Set meta and breadcrumb
include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');
$content[0]="Open An Account";
if($_POST["step"]==2) $isajax=true;
$formvalidation=true;
include_once("header.php");
?><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr> 
  <td valign="top"><table width="705px" border="0" cellspacing="0" cellpadding="0">

	  <tr> 

		<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Open 

		  An Account</td>

	  </tr>

	  <tr>

		<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

			<tr>

			  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">

				  <tr> 

					<td valign="top" align="left"  style="padding-left:1px;">
					<?php 																						
						switch($_POST["step"]) {
							case 1: echo "<img src='".$_DIR["site"]["url"]."images/menu1.png' width='679' height='58'>"; break;
							case 2: echo "<img src='".$_DIR["site"]["url"]."images/menu2.png' width='679' height='58'>"; break;
							case 3: echo "<img src='".$_DIR["site"]["url"]."images/menu2.png' width='679' height='58'>"; break;
							case 4: echo "<img src='".$_DIR["site"]["url"]."images/menu3.png' width='679' height='58'>"; break;
							case 5: echo "<img src='".$_DIR["site"]["url"]."images/menu4.png' width='679' height='58'>"; break;
							case 6: echo "<img src='".$_DIR["site"]["url"]."images/menu4.png' width='679' height='58'>"; break;
							default: echo "<img src='".$_DIR["site"]["url"]."images/menu2.png' width='679' height='58'>"; break;
						}
					?>
					</td>

				  </tr>

				  <tr> 

					<td valign="top" align="left">
					<?php 
						switch($_POST["step"]) {
							case 1: include("open-first.php"); break;
							case 2: include("open-second.php"); break;
							case 3: include("open-third.php"); break;
							case 4: include("open-fourth.php"); break;
							case 5: include("open-fifth.php"); break;
							case 6: include("open-sixth.php"); break;
							case 7: include("open-seven.php"); break;
							case 8: include("open-eight.php"); break;
						}
					?>
					</td>

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
</tr>
<tr> 
  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
</tr>
<tr>
  <td valign="top" class="text"><p><?php print $content[1]; ?></p></td>
</tr>
</table>
<?php include_once("footer.php"); ?>