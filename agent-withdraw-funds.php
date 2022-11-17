<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$formvalidation=true; //for form validation

$_THISPAGENAME='agent-withdraw-funds';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Withdraw Funds";

include_once("acc_header.php");

?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/validation.js"></script>



<table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

	
<td width="23%" valign="top" align="left">

			  <?php include_once("agent-leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>


      <td width="75%" valign="top">
<table width="98%" border="0" cellspacing="0" cellpadding="0">

		<tr> 

		  <td height="48" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket"><?=$content[0]?></td>

		</tr>

		<tr> 

		  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">

		  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

		  <table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

			  <tr> 

				<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img18.gif" width="681" height="8"></td>

			  </tr>

			  <tr> 

				<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" style="background-repeat: repeat-y;padding-top:10px;">

				<table width="96%" border="0" cellspacing="3" cellpadding="3" align="center">

					<?php if($success) { ?>

					<tr> 

					  <td colspan="3" height="8px"><?php include("success.php"); ?> <?=$doNotShow?></td>

					</tr>

					<?php } ?>

					<?php if($error) { ?>

		 			<tr> 

					  <td colspan="3" height="8px"><?php include("error.php"); ?></td>

					</tr>

					<?php } 
					
					if($doNotShow !=true){
					?>

					<Tr>

					    <td width="31%" class="text11">Your Balance:</td>  <td colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=get_balance();?></td>

					</tr>

					<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

					</tr>

					<tr> 

					    <td class="text11" valign="top" colspan="2" style="border-bottom:1px solid #000000;">Bank Details</td>  

						<td>&nbsp;</td>

					</tr>

					<tr>

						<td height="20px" class="text11">Account Name:</td>

						<td colspan="2"><?=$acnt_name?></td>

					</tr>

					<tr>

						<td height="20px" class="text11">Account No.:</td>

						<td colspan="2"><?=$acnt_no?></td>

					</tr>

					<tr>

						<td height="20px" class="text11">Bank Name:</td>

						<td colspan="2"><?=$bank_name?></td>

					</tr>

					<tr>

						<td height="20px" class="text11">Address:</td>

						<td colspan="2"><?=stripslashes($address)?></td>

					</tr>

					<tr>

						<td class="text11">&nbsp;</td>

						<td colspan="2">&nbsp;</td>

					</tr>

					<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

					</tr>

					<tr> 

					  <td width="31%" class="text11">Enter amount ( eg 20.00 ): </td>

					  <td colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif">
 <input type="text" name="txtAmount" id="txtAmount" class="validate['required','number'] textfield7" value="<?=$_POST['txtAmount']?>"> 
					  </td>

					</tr>

					<tr> 

					  <td colspan="3" height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

					</tr>

					

					<tr> 

					  <td colspan="3">Please note that all withdrawals are processed manually and for your maximum security may take up to 24 hours on a Business Day or more During Weekends.<br></td>

					</tr>

					

					<tr> 

					 
					  <td width="46%" align="right" style="padding-right:20px"><input type="image" src="<?=$_DIR["site"]["url"]?>images/remove_fund.gif" width="127" height="23" border="0"></td>

					  <td width="23%">&nbsp;</td>

					</tr>
			 <?php } 	?>
				  </table>

				</td>

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

<?php include_once("acc_footer.php"); ?>