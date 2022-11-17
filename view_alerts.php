<?php







include_once("includes/config/application.php"); //include config 







dbConnection('on'); //open database connection







//$content=getContent("15");







$formvalidation=true;







include_once($_DIR['inc']['code'].'view_alerts.php'); //include code file







$content[0]="View Alerts";







include_once("acc_header.php");







?>


<style type="text/css">
a.conglist { font-family: Verdana; font-size:11px; color:#356402; text-decoration:underline; }
a.conglist:hover { font-family: Verdana; font-size:11px; color:#356402; text-decoration:none; }
</style>


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







               				<td class="vticket">View Winning Alerts</td>







                          </tr>







                        </table></td>







                    </tr>







                    <tr>







                      <td  valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">







                          <tr> 







                            <td>&nbsp;</td>







                          </tr>







                          <tr> 







                            <td valign="top"><table width="661px" border="0" cellspacing="0" cellpadding="0" align="center">







                                <tr> 







                                  <td height="151px" background="<?=$_DIR["site"]["url"]?>images/img100.png" style="background-repeat: no-repeat" valign="top"><table width="661" border="0" cellspacing="0" cellpadding="0">







                          <tr> 







                            <td width="325" height="26" class="text12" style="padding-left:15px">Search 



                              by Alert date</td>







                          </tr>







                          <tr> 







                            <td height="115" valign="top" style="padding-top:30px">







							<form method="post" action="<?=$_SERVER['REQUEST_URI']?>" id="formular" name="formular" class="formular" >







							<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">







                                <tr> 







                                  <td width="42" class="text11">From</td>







                                  <td width="230" class="text11">







			  <select name="ff1" class="validate['required']">







					<option value="">Day</option>







					<?php for($i=01;$i<=31; $i++){ ?>







					<option value="<?=$i<=9?"0".$i:$i?>" <?php echo $_POST['ff1']==$i?"selected":""; ?>><?=$i<=9?"0".$i:$i?></option>







					<?php } ?>







			  </select>  







			  <select name="ff2" class="validate['required'] combo">







					<option value="">Month</option>







					<?php 







					$arr=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');







					foreach($arr as $key=>$val) {







					?>







					<option value="<?=$key?>" <?php echo $_POST['ff2']==$key?"selected":""; ?>><?=$val?></option>







					<?php } ?>







			   </select>  







			   <select name="ff3" class="validate['required']">







					<option value="">Year</option>







					<?php for($i=2010;$i<=2060; $i++){ ?>







					<option value="<?=$i?>" <?php echo $_POST['ff3']==$i?"selected":""; ?>><?=$i?></option>







					<?php } ?>







			  </select></td>







			  <td width="1">&nbsp;</td>







			  <td width="23" class="text11">To</td>







			  <td width="230" class="text11">







			  <select name="tt1" class="validate['required']">







					<option value="">Day</option>







					<?php for($i=01;$i<=31; $i++){ ?>







					<option value="<?=$i<=9?"0".$i:$i?>" <?php echo $_POST['tt1']==$i?"selected":""; ?>><?=$i<=9?"0".$i:$i?></option>







					<?php } ?>







			  </select>  







			  <select name="tt2" class="validate['required']">







					<option value="">Month</option>







					<?php 







					foreach($arr as $key=>$val) {







					?>







					<option value="<?=$key?>" <?php echo $_POST['tt2']==$key?"selected":""; ?>><?=$val?></option>







					<?php } ?>







			   </select>  







			   <select name="tt3" class="validate['required']">







					<option value="">Year</option>







					<?php for($i=2010;$i<=2060; $i++){ ?>







					<option value="<?=$i?>" <?php echo $_POST['tt3']==$i?"selected":""; ?>><?=$i?></option>







					<?php } ?>







			  </select></td>







                                </tr>







                                <tr> 







                                  <td>&nbsp;</td>







                                  <td colspan="4">&nbsp;</td>







                                  <td width="112"><input type="image" border="0" src="<?=$_DIR["site"]["url"]?>images/search.gif" width="77" height="23"></td>







                                </tr>







                              </table>







							</form>







							







							</td>







                          </tr>







                        </table></td>







                                </tr>







                              </table></td>







                          </tr>







                          <tr> 







                            <td align="right" style="padding-right:7px"><br><br></td>







                          </tr>







						<?php        







							if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))







							{







						?>















                          <tr> 







                            <td height="25px" bgcolor="#F6F6F6" style="border-bottom:2px solid #CCCCCC;padding-left:5px" align="left" class="text12">All Winning Alerts</td>







                          </tr>







                          <tr>







                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">







                                <tr> 







                                  <td height="35px" width="15%" class="text11">Alert Date</td>







                                  <td width="35%" class="text11">Title</td>                                  







                      			  <td width="50%" align="left" class="text11">Message</td>









                                </tr>







									<?php 			
											foreach($pageAndData['results'] as $key => $val)

											{

									?>







								<tr> 







                                  <td valign="top"><?=@$val['mdate']?></td>







                                  <td valign="top"><?=stripslashes(strip_tags(@$val['headline']))?></td>                                  







                      			  <td valign="top" align="left"><?=stripslashes(@$val['msg'])?></td>







                                </tr>







								<tr> 







                                  <td colspan="3" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>







                                </tr>







										<?php  







													unset($rowbgcolor);







													unset($firstletterofStat);







												}







										?>







                              </table></td>







                          </tr>







                          <tr>







                            <td align="right" valign="top" style="padding-right:20px;padding-top:10px;"><?=@$pageAndData['paginationbuttonHTML2']?></td>







                          </tr>







						<? }else{ ?>







								 <tr> 







                                  <td colspan="5" bgcolor="#CCCCCC" align="center">Sorry, No Alert Available In Your Account.</td>







                                </tr>







						  <?php } ?>						







				  







						  <tr> 







						    <td>&nbsp;</td>                                  







						  </tr>







                        </table></td>







                    </tr>







                    <tr>







                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>







                    </tr>







                  </table></td>







              </tr>







            </table>







<?php include_once("acc_footer.php"); ?>