<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$formvalidation=true; //for form validation

$_THISPAGENAME='transfer-amount';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Add Funds";

include_once("header.php");

?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/validation.js"></script>



<table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

	<td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">

		<tr> 

		  <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket"><?=$content[0]?></td>

		</tr>

		<tr> 

		  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">

		  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

		  <?php if($success) include("success.php"); ?>

						<?php if($error) include("error.php"); ?>

		  <table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

			  <tr> 

				<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img18.gif" width="681" height="8"></td>

			  </tr>

			  <tr> 

				<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" style="background-repeat: repeat-y;padding-top:10px;"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

					

					<tr> 

					  <td colspan="3" class="text16">Choose Payment Method</td>
					</tr>

					<tr> 

					  <td colspan="3" class="text">You need to load 

						a minimum of <img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=$maxAmt?> into your Vision Account.


						<br><br></td>
					</tr>

					<tr>
					  <td class="text11" colspan="2">Your Current Balance is:&nbsp;<span class="text"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=get_balance();?></span></td>
					 
					  </tr>

<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
					</tr>

<tr>
					  <td class="text11" colspan="2"></td>

					 
					  </tr>
<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
					</tr>

					<tr>

					    <td class="text11" colspan="2"><p><hr/>Select Payment Method</p>

						<input type="radio" name="cmbMethod" value="V"><img src="<?=$_DIR["site"]["url"]?>images/visionvoucher.png" width="130" height="41" border="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="cmbMethod" value="P"><img src="<?=$_DIR["site"]["url"]?>images/paymenex.png" width="125" height="29" style="padding-top:5px;" border="0"></td>
					
					</tr>

					<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
					</tr>

					<tr> 

					  <td colspan="3" height="8px">&nbsp;</td>
					</tr>

					<tr> 

					  <td width="26%" class="text11">Enter amount 

						( eg 20.00 ) &pound; </td>

					  <td colspan="2"> <input type="text" name="txtAmount" id="txtAmount" onKeyPress="checknumchar(this,event,10,2,'.');" class="validate['required'] textfield7" value="<?=$_POST['txtAmount']?>">					  </td>
					</tr>

					<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
					</tr>

					

					<tr> 

					  <td colspan="3">&nbsp;</td>
					</tr>

					<tr> 

					  <td colspan="3" class="text16">Transfer limits<br> 

						<br></td>
					</tr>

					<tr> 

					  <td colspan="3" valign="top" align="left"><table width="100%" border="0" cellspacing="2" cellpadding="2">

						  <tr> 

							<td width="21%">Minimum</td>

							<td width="79%"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif" border="0"><?=$maxAmt?></td>
						  </tr>

						  <tr> 

							<td>Maximum</td>

							<td><img src="<?=$_DIR["site"]["url"]?>images/naira.gif" border="0"><?=$maxAmt2?></td>
						  </tr>

						</table><br></td>
					</tr>

					<tr> 

					  <td><a href="<?=$_DIR["site"]["url"]?>index"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>

					  <td width="73%" align="right" style="padding-right:20px"><input type="image" src="<?=$_DIR["site"]["url"]?>images/add_fund.gif" width="97" height="23" border="0"></td>

					  <td width="1%">&nbsp;</td>
					</tr>

				  </table>
				<br></td>

			  </tr>

			  

			  <tr> 

				<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

			  </tr>

			  

			</table>

		  </form>

		  

		  </td>

		</tr>

		<tr> 

		  <td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

		</tr>

	  </table></td>

	  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

  </tr>

</table>

<?php include_once("footer.php"); ?>