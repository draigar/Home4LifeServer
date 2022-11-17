<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$formvalidation=true;
$isajax=true;
$content[0]="Bank Account Details";

include_once($_DIR['inc']['code'].'bank_account.php'); //include code file

include_once("acc_header.php");

?> <img src="<?=$_DIR["site"]["url"]?>images/spacer.png"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="21%" valign="top" align="left">

			  <?php include_once("leftmenu.php"); ?>

			  </td>

				  
    <td width="3%">&nbsp;</td>

				  

                <td width="76%" valign="top">
				
				
				
				
				<table width="98%" border="0" cellspacing="0" cellpadding="0">
				<td height="58px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top">
				
					
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
				






                          <tr> 







                            <td width="4%">&nbsp;</td>                            







               				<td width="96%" class="vticket">Bank Details</td>







                          </tr>







                        </table></td>







                    </tr>

     <?php if($success) include("success.php"); ?>






                    <tr>







                      
          <td height="228" colspan="3"  valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"> 
            <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
              <?php
			 function State(){  

				global $database;
				
				$result = '<select id="cmbState" class="validate[\'required\'] combo4" style="width:160px" name="cmbState" onChange="showCity(document.getElementById(\'cmbState\').options[document.getElementById(\'cmbState\').selectedIndex].value,'.($_POST["cmbState"]?$_POST["cmbState"]:0).')">';
				
				$sql="select state_id,state_name from state order by state_name";
				
				$rs  = mysql_query($sql);
				
				$result .= "<option value=''>Select State</option>";
				
				while($record=mysql_fetch_array($rs)) { 
				
				if ($_POST["cmbState"] == $record['state_id'])
				
					$result .= "<option value='".$record['state_id']."' selected='selected'>" . $record['state_name'] . '</option>';
				
				else 
				
					$result .= "<option value='".$record['state_id']."'>" . $record['state_name'] . '</option>';	
				
				}
				
				$result .= '</select>';	
				
				return $result;
				
				}
				
				function Lga(){ 
				
				global $database;
				
				$result  = '<select id="cmbLga" class="combo4" style="width:228px" name="cmbLga">';
				
				$result .= "<option value=''>Select your Local Goverment</option>";
				
				if(!empty($_POST['cmbState'])) {
				
				$sql="select lga_id,lga_name FROM lga where state_id='".$_POST["cmbState"]."' order by lga_name";
				
				$rs1  = mysql_query($sql);
				
				while ($record1=mysql_fetch_array($rs1)) {
				
				if ($_POST["cmbLga"] == $record1['lga_id'])
				
					$result .= "<option value='".$record1['lga_id']."' selected='selected'>" . $record1['lga_name'] . '</option>';
				
				else 
				
					$result .= "<option value='".$record1['lga_id']."'>" . $record1['lga_name'] . '</option>';	
				
				}
				
				}
				
				$result .= '</select>';	
				
				return $result;
				
				}
			?>
              <table align="center" class="t_content_bg" cellspacing=1 cellpadding=5 width="94%" border=0 bgcolor="#cccccc">
                <tbody>
                  <tr> 
                    <td colspan="4" bgcolor="#ffffff" class="text12"><strong>Primary 
                      Bank Information:</strong></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#ffffff" width="18%">Account Name: <font color="red">*</font></td>
                    <td width="35%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtACCName"  size="30" class="validate['required'] textfield" type="text" id="txtACCName" value="<?php print getValue(@$_POST["txtACCName"]); ?>" maxlength="100"> 
                      <br> 
                      <?=$_MSG[1]?>
                    </td>
                    <td bgcolor="#ffffff"  width="20%">Account Number: <font color="red">*</font></td>
                    <td width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtACCNo"  size="30" class="validate['required'] textfield" type="text" id="txtACCNo" value="<?php print getValue(@$_POST["txtACCNo"]); ?>" maxlength="50"> 
                      <br> 
                      <?=$_MSG[2]?>
                    </td>
                  </tr>
                  <tr> 
                    <td bgcolor="#ffffff">Account Type: <font color="red">*</font></td>
                    <td width="35%" bgcolor="#ffffff" class=t_content_cell2_bg> 
                      <select name="cmbAType" class="validate['required']">
                        <option value="">Select Type</option>
                        <?=$acc_type?>
                      </select> <br> 
                      <?=$_MSG[3]?>
                    </td>
                    <td bgcolor="#ffffff"  width="20%">Bank Name: <font color="red">*</font></td>
                    <td width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBankName"  class="validate['required'] textfield" size="30" type="text" id="txtBankName" value="<?php print getValue(@$_POST["txtBankName"]); ?>" maxlength="100"> 
                      <br> 
                      <?=$_MSG[4]?>
                    </td>
                  </tr>
                  <tr> 
                    <td bgcolor="#ffffff" width="20%">Swift Code:</td>
                    <td width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtSwift"  size="30" class="textfield" type="text" id="txtSwift" value="<?php print getValue(@$_POST["txtSwift"]); ?>" maxlength="100"></td>
                    <td bgcolor="#ffffff"  width="18%">Other Code:</td>
                    <td width="35%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBOtherCode"  size="30" class="textfield" type="text" id="txtBOtherCode" value="<?php print getValue(@$_POST["txtBOtherCode"]); ?>" maxlength="100"></td>
                  </tr>
                  
                  <tr> 
                    <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td colspan="4" bgcolor="#ffffff" class="text12"><strong>Bank 
                      Address:</strong></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#ffffff" width="18%">Address: <font color="red">*</font></td>
                    <td width="35%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBankAdd"  size="30" class="validate['required'] textfield" type="text" id="txtBankAdd" value="<?php print getValue(@$_POST["txtBankAdd"]); ?>" maxlength="255"> 
                      <br> 
                      <?=$_MSG[6]?>
                    </td>
                    <td bgcolor="#ffffff"  width="20%">Address Line 2:</td>
                    <td width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBankAdd1" class="textfield" size="30" type="text" id="txtBankAdd1" value="<?php print getValue(@$_POST["txtBankAdd1"]); ?>" maxlength="255"></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#ffffff" >City: <font color="red">*</font></td>
                    <td width="35%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBankCity" size="30" class="validate['required'] textfield" type="text" id="txtBankCity" value="<?php print getValue(@$_POST["txtBankCity"]); ?>" maxlength="50"> 
                      <br> 
                      <?=$_MSG[7]?>
                    </td>
					 <td bgcolor="#ffffff" >Country: <font color="red">*</font></td>
                    <td bgcolor="#ffffff" class="t_content_cell2_bg">Nigeria</td>
                   
                  </tr>
                  <tr> 
                   
					 <td bgcolor="#ffffff"  width="20%">State: <font color="red">*</font></td>
                    <td width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"> 
                      <?php  echo State();?>
                      <br> 
                      <?=$_MSG[8]?>
                    </td>
					<td height="22"  align="left" bgcolor="#ffffff"><span>Primary 
                      Bank Y/N: </span></td>
                    <td bgcolor="#ffffff"> <input type="checkbox" name="chkPrimary" value="Y" <?=$_POST['chkPrimary']=="Y"?"checked":""?>>  
                    </td>
                    
                  </tr>
                  <tr> 
                    
					<td bgcolor="#ffffff" nowrap>Local Government Area: <font color="red">*</font> 
                    </td>
                    <td bgcolor="#ffffff" class=t_content_cell2_bg id="txtCategory" colspan="3"> 
                      <?php echo Lga(); ?> </td>
                  </tr>
                  <tr> 
                    <td colspan="4" height="30px" valign="middle" bgcolor="#FFFFFF" align="center"> <input type="submit" class="sbutton" value="<?=$_GET["act"]=="edit"?"Update":"Submit"?>" name="Input">  
                           <input type="reset" value="Reset" name="Reset" class="sbutton"></td>
                  </tr>
                </tbody>
              </table>
			  
            </form>
             <br><br>
			
			
			
			
			
			<table width="94%" border="0" cellspacing="2" cellpadding="0" align="center">


                    <tr> 







                            <td  colspan="6" height="25px" bgcolor="#F6F6F6" style="border-bottom:2px solid #CCCCCC;padding-left:5px" align="left" class="text12">Your Bank List</td>







                          </tr> 




                               
							   
							   
							    <tr> 







                                  
                     <td width="17%" height="35px" class="text11" >Bank Name</td>







                                  
                <td width="17%" class="text11" align="left">Bank Address</td>                                  







                      			  
                <td width="17%" align="left" class="text11">Account Name</td>







								  
                <td width="16%" align="left" style="padding-right:5px;" class="text11">Account 
                  No</td>





									
                <td width="14%" align="center" style="padding-right:5px;" class="text11">Primary 
                </td>



								  
                <td width="17%" align="center" style="padding-right:5px;" class="text11">Action 
                </td>







                                </tr>







									<?php 			

											foreach($pageAndData['results'] as $key => $val)

											{

									?>
                               
							   
							   






								<tr> 







                                  <td align="left"><?=stripslashes(@$val['bank_name'])?></td>







                                  <td align="left"><?=stripslashes(@$val['address1'])?></td>                                  







                      			  <td align="left"><?= stripslashes(@$val['acnt_name'])?></td>







								  <td align="left" style="padding-right:5px;"><?=@$val['acnt_no']?></td>





								  <td align="center" style="padding-right:5px;"><?php if($val['cpramary']=="Y"){ echo "Yes"; } else { echo "No"; } ?></td>



								  
                <td style="padding-right:5px;" align="center"><a href="<?=$_DIR['site']['url']."bank_account.php?act=edit&id".$_DELIM.@$val['ubank_id']?>">Edit</a></td>






                                </tr>







								<tr> 







                                  <td colspan="6" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







                                </tr>







										<?php  







													unset($rowbgcolor);







													unset($firstletterofStat);







												}







										?>







                              </table>						  
								<?=@$pageAndData['paginationbuttonHTML2']?>
								
                        </td>







                    </tr>
					
					

                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"></td>

                    </tr>
					

                    <tr>

                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>

                    </tr>
                  
                  </table></td>

              </tr>
            </table>
			
	<script>
	gfncalldel()
	{
	
	
	}

	</script>
			

<?php include_once("acc_footer.php"); ?>