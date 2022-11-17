<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true; //for form validation
$content[0]="Sign In"; //set meta and breadcrumb
include_once($_DIR['inc']['code'].'forgot-password.php'); //include code file
include_once("header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr> 
  <td valign="top">
  <?php if($success) include("success.php"); ?>
  <?php if($error) include("error.php"); ?>
  <table width="705px" border="0" cellspacing="0" cellpadding="0">

	  <tr> 

		  <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7">Forgot 
            Password </td>

	  </tr>

	  <tr> 

		<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="center" style="background-repeat: repeat-y;" valign="top" ><table width="98%" border="0" cellspacing="1" cellpadding="1">
            <tr>

			  <td class="text">Please enter your Vision Account's email address below to recover your forgotten password. If you're a new user, click 'Open 

				an Account' to securely enter your details.<br/><br/></td>

			</tr>

			<tr>

			  <td valign="top" align="left"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

				  <tr> 

					<td valign="top" height="77px" background="<?=$_DIR["site"]["url"]?>images/green.gif" style="background-repeat:no-repeat;">
					<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">

						<tr> 

						    <td width="50%" style="padding-left:8px" class="white">Forgot 
                              Password </td>

						  <td width="50%" style="padding-left:10px" class="white">New User? -- Open Account Now!</td>

						</tr>

					  </table>
					  
					  </td>

				  </tr>

				  <tr> 

					<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;">
					<table width="98%" border="0" cellpadding="0" cellspacing="0">

						<tr>
						  <td width="50%" valign="top" align="left">
						  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
						  <table width="99%" border="0" cellspacing="2" cellpadding="2">

							  <tr> 

								    <td colspan="2">Your Vision Account email Address</td>

							  </tr>

							  <tr> 

								<td colspan="2"> <input type="text" class="validate['required'] textfield" name="txtUsername" id="txtUsername" value="<?=$_POST['txtUsername']?>"> 
								</td>

							  </tr>

							  
							  <tr> 

								<td colspan="2" valign="top"><BR><a href="<?=$_DIR["site"]["url"]?>sign-in<?=$atend?>" class="linksign">Sign in to MyVision</a></td>

							  </tr>

							  <tr> 

								<td><br> <a href=""><img src="<?=$_DIR["site"]["url"]?>images/img14.gif" width="84" onClick="history.back();" height="23" border="0"></a></td>

								<td align="center"><br><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/img13.gif" width="76" height="23" border="0"></td>

							  </tr>

							</table></form></td>
							

						  <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot.gif" style="background-repeat: repeat-y;"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

						  <td width="50%" valign="top"><table width="94%" border="0" cellspacing="2" cellpadding="4" align="center">

							  <tr> 

								<td colspan="2" class="text9">Playing 

								  online can make your life 

								  easier:<br> <br></td>

							  </tr>

							  <tr> 

								<td width="5%"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td width="95%" align="left">Never lose 

								  that winning ticket</td>

							  </tr>

							  <tr> 

								<td><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left">Save time - it's quick 

								  and easy </td>

							  </tr>

							  <tr> 

								<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left">We'll let you know if 

								  you win so you don't have 

								  to check </td>

							  </tr>

							  <tr> 

								<td><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left">You can win up to NGN 500,000 

								  with Instant Wins!</td>

							  </tr>

							  <tr> 

								<td>&nbsp;</td>

								<td align="right"><br> <a href="<?=$_DIR["site"]["url"]?>open-account<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/open_account.gif" width="141" height="23" border="0"></a></td>

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
</table>                
<?php include_once("footer.php"); ?>