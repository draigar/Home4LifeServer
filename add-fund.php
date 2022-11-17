<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$formvalidation=true;

$content[0]="Add Fund";

include_once($_DIR['inc']['code'].'add-fund.php'); //include code file

include_once("acc_header.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="23%" valign="top" align="left">

			  <?php include_once("leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

				  

                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td height="48px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

                          <tr> 

                            <td width="4%">&nbsp;</td>                            

                <td class="vticket">Funding your Vision Account</td>

                          </tr>

                        </table></td>

                    </tr>

                    <tr>

                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 

                <td width="69%" valign="top" align="left">

				<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

                    

                    <tr> 

                      <td valign="top" style="padding-top:10px" align="left"> 

                        



 <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">



		  <?php if($success) include("success.php"); ?>



						<?php if($error) include("error.php"); ?>

















<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">



					



				



					<tr> 



					  <td colspan="3" class="text">The MINIMUM  amount you can add to your Vision Account is: <img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=$limitx["N"]?>





						<br><br></td>



	<tr> 



					  <td colspan="3" class="text">The MAXIMUM  amount you can add to your Vision Account is: <img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=$limitx["M"]?>





						<br><br></td>











					</tr>



					<tr>

					  <td class="text11" colspan="2">Your Current Balance is:&nbsp;<span class="text"><img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"><?=get_balance();?></span></td>

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

					<?php if(!$step) { ?>

					<tr>



					    <td class="text11" colspan="2">Select your method of Payment</td>

					</tr>

<tr> 



					  <td colspan="3" height="2px"><p><hr/></td>

					</tr>



					<tr> 



					  <td colspan="3" class="text">





					<table width="100%" border="0" bgcolor="#f3f3f3" cellspacing="0" cellpadding="0">

                                  <tr> 

                                    <td width="41%" valign="top" style="padding-top:15px;padding-left:5px">

									<input type="radio" name="cmbMethod" <?=$_POST["cmbMethod"]=="V"?"checked":""?> class="validate['required']" value="V" onClick="javascript:showhide();"> 

                                      <img src="<?=$_DIR["site"]["url"]?>images/visionvoucher.png" width="130" height="32" border="0"> 

                                      <br>





                                      <div style="padding-left:20px">Select this options if you have a Vision 

                                      Voucher.</div> </td>

                                    <td width="59%" valign="top" style="padding-top:15px;padding-left:5px"> 

                                      <TABLE align="left" class="t_content_bg" cellSpacing=1 cellPadding=5 width="99%" border=0 bgcolor="#CCCCCC" id="visionrow" style="margin-top:15px;display:<?php echo $_POST['cmbMethod']=="V"?"block":"none"; ?>">

                                        <TR> 

                                          <TD width="235"  align="left" bgcolor="#FFFFFF">Voucher Serial 

                                            No: (8 Digits) </TD>

                                          <TD width="203" colspan="2" bgcolor="#FFFFFF"> 

                                          <input type="text" name="txtSerNo" onKeyPress="checknumchar(this,event,10,2,'.');" id="txtSerNo" value="<?=$_POST['txtSerNo']?>" maxlength="8" size="15"></TD>

                                        </TR>

                                        <TR > 

                                          <TD  align="left" bgcolor="#FFFFFF">Voucher 

                                            No: (16 Digits) </TD>

                                          <TD bgcolor="#FFFFFF" colspan="2"> <input type="text" name="txtVouNo2" onKeyPress="checknumchar(this,event,10,2,'.');" id="txtVouNo2" value="<?=$_POST['txtVouNo']?>" maxlength="16" size="25"></TD>

                                        </TR>

                                      </TABLE></td>

                                  </tr>

                                  <tr> 

                                    <td colspan="2"></p> 

                                  <tr> 

                                    <td colspan="4"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"> 

                                      <p> 

                                      <hr/></p>

                                    </td>

                                  </tr>

                                  <tr> 

                                    <td valign="top" style="padding-bottom:15px;padding-left:5px"><input type="radio" name="cmbMethod" <?=$_POST["cmbMethod"]=="P"?"checked":""?> value="P" onClick="javascript:showhide();"> 

                                      <img src="<?=$_DIR["site"]["url"]?>images/paymenex.png" width="125" height="29"border="0">

									  <br>
									  <div style="padding-left:20px">Select 

                                      this option if you have a Paymenex Debit Cards </div></td>

                                    <td valign="top" style="padding-bottom:15px;padding-left:5px">



									<TABLE align="left" class="t_content_bg" cellSpacing=1 cellPadding=5 width="100%" border=0 bgcolor="#CCCCCC" id="visionrow1" style="margin-top:15px;display:<?php echo $_POST['cmbMethod']=="P"?"block":"none"; ?>">

                                        <TR> 

                                          <TD width="180"  align="left" bgcolor="#FFFFFF">Card Serial 

                                            No: (8 Digits) </TD>

                                          <TD width="218" colspan="2" bgcolor="#FFFFFF"> 

                                          <input type="text" name="txtSerNo1" onKeyPress="checknumchar(this,event,10,2,'.');" id="txtSerNo12" value="<?=$_POST['txtSerNo1']?>" maxlength="8" size="15"></TD>
                                        </TR>
                                        <TR>
                                          <TD  align="left" bgcolor="#FFFFFF">Enter  Amount: (i.e. 200.00) </TD>
                                          <TD colspan="2" bgcolor="#FFFFFF"><img src="<?=$_DIR["site"]["url"]?>images/nairagent.png" border="0"><input type="text" name="txtAmount" id="txtAmount" class="validate['required','number'] textfield7" value="<?=$_POST['txtAmount']?>" size="15"></TD>
                                        </TR>
                                      </TABLE>







</td>

                                  </tr>

                                </table></td>

					</tr>



					<tr> 



					  <td colspan="3" height="3px"><p><hr/> </p></td>

					</tr>






					<tr> 



					  <td colspan="3" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

					</tr>





					<tr> 



					  

					  <td width="36%"></td>



					  <td width="64%"><input type="image" src="<?=$_DIR["site"]["url"]?>images/add_fund.gif" width="97" height="23" border="0"></td>

					</tr>

					

					<?php } else { ?>

					

					<tr>



					    <td  align="center" class="text11" colspan="2">Complete the following Card Security Verification </td>

					</tr>

<tr> 



					  <td colspan="3" height="2px"><p><hr/></td>

					</tr>



					<tr> 



					  <td colspan="3" class="text">





					<table width="100%" border="0" bgcolor="#f3f3f3" cellspacing="0" cellpadding="0">

                          <tr>

                            <td valign="middle" style="padding-top:15px;padding-left:5px">

                              <TABLE align="center" class="t_content_bg" cellSpacing=1 cellPadding=5 width="600" border=0 bgcolor="#cccccc" id="visionrow" style="margin-top:15px;">

							  <TR> 

								<TD width="256"  align="left" bgcolor="#f3f3f3">Your Card's Serial No:</TD>

								<TD width="321" bgcolor="#f3f3f3"> 

								<?php echo $_POST['txtSerNo1']; ?>

								<input type="hidden" name="txtSerNox" value="<?=$_POST['txtSerNo1']?$_POST['txtSerNo1']:$_POST['txtSerNox']?>">
								<input type="hidden" name="hidSessionId" value="<?=$vals[14]["value"]?$vals[14]["value"]:$_POST["hidSessionId"]?>">
								</TD>
							  </TR>

							  <TR> 

								<TD width="256"  align="left" bgcolor="#f3f3f3">Amount to be Added to Account:</TD>

								<TD width="321" bgcolor="#f3f3f3"> 

								<img src="<?=$_DIR["site"]["url"]?>images/nairatik.png"> <?php echo number_format($_POST['txtAmount'],2); ?>

								<input type="hidden" name="txtAmountx" value="<?=$_POST['txtAmount']?$_POST['txtAmount']:$_POST['txtAmountx']?>">								</TD>
							  </TR>
							  <TR>
                                <TD  align="left" bgcolor="#f3f3f3">Card No:</TD>
							    <TD bgcolor="#f3f3f3"><input type="text" name="txtCardNo" class="validate['required']" id="txtCardNo" value="<?=$_POST['txtCardNo']?>" maxlength="16" size="25"></TD>
							    </TR>
							  <TR>
                                <TD  align="left" bgcolor="#f3f3f3">Card Expiry Date:</TD>
							    <TD bgcolor="#f3f3f3"><select name="txtExpDD" class="validate['required']">
                                    <option value="">Month</option>
                                    <?php

										for($i=1;$i<=12;$i++) { 

										  if($i<=9) print "<option value='0$i'>0$i</option>"; 

										  else print "<option value='$i'>$i</option>"; 

										}

 									?>
                                                                                                  </select>
                                    <select name="txtExpYY" class="validate['required']">
                                      <option value="">Year</option>
                                      <?php

										for($i=date("Y");$i<=date("Y")+20;$i++) 

										  print "<option value='$i'>$i</option>";

 									?>
                                                                                                          </select></TD>
							    </TR>
							  

							  <TR> 

								<TD  align="left" bgcolor="#f3f3f3">Select <strong><font color="#FF0000"><?=$vals[10]["value"]?$vals[10]["value"]:$_POST["hidFirstDig"]?></font></strong> Digit of your Webkey:</TD>

								<TD bgcolor="#f3f3f3"> 

								<select name="txtFirstDig" class="validate['required']">

									<option value="">Select WEBKEY</option>

									<?php

										for($i=1;$i<=9;$i++) 

										  print "<option value='$i'>$i</option>";

 									?>
								</select>

								<input type="hidden" name="hidFirstDig1" value="<?=$vals[10]["tag"]?$vals[10]["tag"]:$_POST["hidFirstDig1"]?>">
								<input type="hidden" name="hidFirstDig" value="<?=$vals[10]["value"]?$vals[10]["value"]:$_POST["hidFirstDig"]?>">								</TD>
							  </TR>

							  <TR> 

								<TD  align="left" bgcolor="#f3f3f3">Select <strong><font color="#FF0000"><?=$vals[11]["value"]?$vals[11]["value"]:$_POST["hidSecDig"]?></font></strong> Digit of Webkey:</TD>

								<TD bgcolor="#f3f3f3"> 

								<select name="txtSecDig" class="validate['required']"> 

								    <option value="">Select WEBKEY</option>	

									<?php

										for($i=1;$i<=9;$i++) 

										  print "<option value='$i'>$i</option>";

 									?>
								</select>
								<input type="hidden" name="hidSecDig1" value="<?=$vals[11]["tag"]?$vals[11]["tag"]:$_POST["hidSecDig1"]?>">
								<input type="hidden" name="hidSecDig" value="<?=$vals[11]["value"]?$vals[11]["value"]:$_POST["hidSecDig"]?>">								</TD>
							  </TR>

							  <TR> 

								<TD  align="left" bgcolor="#f3f3f3">Enter <strong><font color="#FF0000"><?=$vals[12]["value"]?$vals[12]["value"]:$_POST["txtPac1"]?></font></strong> of your Card's PAC Code:</TD>

								<TD bgcolor="#f3f3f3"> 

								<input type="text" name="txtPac1" class="validate['required']" id="txtPac1" value="<?=$_POST['txtPac1']?>" maxlength="16" size="25">
								<input type="hidden" name="hidPac11" value="<?=$vals[12]["tag"]?$vals[12]["tag"]:$_POST["hidPac11"]?>">
								<input type="hidden" name="hidPac1" value="<?=$vals[12]["value"]?$vals[12]["value"]:$_POST["hidPac1"]?>">								</TD>
							  </TR>

							  <TR> 

								<TD  align="left" bgcolor="#f3f3f3">Enter <strong><font color="#FF0000"><?=$vals[13]["value"]?$vals[13]["value"]:$_POST["txtPac2"]?></font></strong> of your Card's PAC Code:</TD>

								<TD bgcolor="#f3f3f3"> 

								<input type="text" name="txtPac2" class="validate['required']" id="txtPac2" value="<?=$_POST['txtPac2']?>" maxlength="16" size="25">
								<input type="hidden" name="hidPac21" value="<?=$vals[13]["tag"]?$vals[13]["tag"]:$_POST["hidPac21"]?>">
								<input type="hidden" name="hidPac2" value="<?=$vals[13]["value"]?$vals[13]["value"]:$_POST["hidPac2"]?>">								</TD>
							  </TR>

							  <TR> 

								
							  </TR>
						   </TABLE>
                              <br>

							  

							  </td>

                          </tr></p>



<tr> 



					  <td colspan="3"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

					</tr>

                        </table><div align="center" style="margin-top:10px;"><input type="image" src="<?=$_DIR["site"]["url"]?>images/continue.gif"></div></td>

					</tr>

					<input name="p_serial_no" type="hidden" value="<?=$_POST['txtSerNo1']?>">

					<input name="p_amount" type="hidden" value="<?=$_POST['txtAmount']?>">

					<input type="hidden" name="Input1" value="Submit1">

					<?php } ?>

				  </table> 

                  </form>



                      

			</td>

		</tr>

	  </table>

	</td>

	<td width="1%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

  </tr>

</table></td>

		</tr>

		<tr>

		  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>

		</tr>

	  </table></td>

  </tr>

</table>

<script language="JavaScript1.2">

	function showhide(){

	if(document.formular.cmbMethod[0].checked==true){

		document.getElementById("visionrow").style.display = 'block';

		document.getElementById("visionrow1").style.display = 'none';

	}else{

		document.getElementById("visionrow").style.display = 'none';

	}

	if(document.formular.cmbMethod[1].checked== true){

		document.getElementById("visionrow1").style.display = 'block';

		document.getElementById("visionrow").style.display = 'none';

	}else{

		document.getElementById("visionrow1").style.display = 'none';

	}

}

</script>			

<?php include_once("acc_footer.php"); ?>