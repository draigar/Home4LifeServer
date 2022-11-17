<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
//Set meta and breadcrumb
$content[0]="Open An Agent Account";
include_once("header.php"); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr> 

<td valign="top"><table width="705px" border="0" cellspacing="0" cellpadding="0">



  <tr> 



	      <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket"> 
            Thank You </td>



  </tr>



  <tr>



	<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">



		<tr>



		  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">



			  <tr> 



				<td valign="top" align="left"  style="padding-left:1px;">

					<img src="<?=$_DIR["site"]["url"]?>images/menu1.png" width="679" height="58">										

				</td>



			  </tr>



			  <tr> 



				<td valign="top" align="left"><table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">
                   <tr>
					        <td td height="150px" align="center"><font size="3"><strong>
							We have successfully received your application for agent .<br />
							We will start processing it as soon as possible.</strong></font><br>
                              <br>
                              <font size="2"><strong>Please wait untile our support 
                              team contact with you..... <a href="index.php">Click 
                              here to go to home page</a></strong></font></td>
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

</tr>

<tr> 

<td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

</tr>

<tr>

<td valign="top" class="text"><p><?php print $content[1]; ?></p></td>

</tr>


</table>

<?php include_once("footer.php"); ?>