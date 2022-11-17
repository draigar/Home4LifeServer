<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true;
include_once($_DIR['inc']['code'].'agent-afro-cancelled.php'); //include code file
//$content[0]="View Transactions";
include_once("acc_header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="23%" valign="top" align="left">
			  <?php include_once("agent-leftmenu.php"); ?>
			  </td>
				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="48px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="4%">&nbsp;</td>                            
               				<td class="vticket">Cancelled Afro Million Entries</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td  valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr> 
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                          </tr>
                          <tr> 
                            <td align="right" style="padding-right:7px"><form method="post" action="<?=$_SERVER['REQUEST_URI']?>" id="formular" name="formular" class="formular" >
							<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
                                <tr> 
                                 <td width="87" align="center" class="text11">From</td>
                                 <td width="250" class="text11">
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
                                  <td colspan="3">&nbsp;</td>
                                  <td width="112" align="center"><input type="image" border="0" src="<?=$_DIR["site"]["url"]?>images/search.gif" width="77" height="23"></td>
                                </tr>
								 <tr> 
                                  <td colspan="6"><hr></td>
                                </tr>
                              </table>
							</form></td>
                          </tr>
						<?php        
							if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))
							{
						?>
                          <tr> 
                            
                <td height="25px" bgcolor="#F6F6F6" style="border-bottom:2px solid #CCCCCC;padding-left:5px" align="left" class="text12">Afro 
                  Million Entries</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                <tr> 
								  <td width="174" height="35px" class="text11" style="padding-left:5px" align="left">AL-ID</td>                                  
                      			  <td width="233" align="left" class="text11">Date/Time Entered</td>
								  <td width="107" align="center" style="padding-right:5px;" class="text11">Ticket No</td>
									<td width="107" align="center" style="padding-right:5px;" class="text11">Method</td>
								  <td width="159" align="center" style="padding-right:5px;" class="text11">Entries</td>
								  <td width="159" align="center" style="padding-right:5px;" class="text11">Vision No</td>
								  <td width="159" align="center" style="padding-right:5px;" class="text11">Action</td>
                                </tr>
									<?php 			
											foreach($pageAndData['results'] as $key => $val)
											{
									?>
								<tr> 
                                  <td align="left"><?=@$val['nl_id']?></td>                                  
                      			  <td align="left"><?=@$val['date_entered']?></td>
								  <td align="center" ><?=@$val['ticket_no']?></td>
								  <td align="center" ><?php if(@$val['method_id']=='I'){ echo "Internet"; }if(@$val['method_id']=='S'){ echo "SMS"; }if(@$val['method_id']=='T'){ echo "Terminal"; }?></td>
								  <td align="center" ><?=@$val['entries']?></td>
								    <td align="center" ><?=@$val['vision_numbers']?></td>
									 <td align="center" ><a>View</a></td>
                                </tr>
								<tr> 
                                  <td colspan="8" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
                                </tr>
										<?php  
												}
										?>
                              </table></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" style="padding-right:20px;padding-top:10px;"><?=@$pageAndData['paginationbuttonHTML2']?></td>
                          </tr>
						<? }else{ ?>
								 <tr> 
                                  <td colspan="5" bgcolor="#F6F6F6" align="center">Sorry, No Record Found.</td>
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