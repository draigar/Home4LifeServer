<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$_THISPAGENAME='draw-history-naira';
include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');
$content[0]="Naira Loto Draw History";
include_once("header.php");
?>
<script type="text/javascript">
	function showChange(val){
	alert(val);
		if(val=="N")
			document.getElemenyById('cmbDay').value="F";
		elseif(val=="A")
			document.getElemenyById('cmbDay').value="S";
	}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="75%" valign="top" align="left"><table width="705px" border="0" cellspacing="0" cellpadding="0">
<tr> 
          <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Naira 
            Lotto - Prize Break Down</td>
</tr>
<tr> 
  <td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">
  
  
 <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img114.gif" width="681" height="8"></td>
                    </tr>
                    <tr> 
                      <td height="629" valign="top" background="<?=$_DIR['site']['url']?>images/img20.gif"  style="background-repeat: repeat-y;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="13%" align="center"><table width="75px" border="0" cellspacing="0" cellpadding="0" align="center">
                                            <tr> 
                                              <td width="75px" class="iconimg2">&nbsp;</td>
                                            </tr>
                                          </table></td>
                                  
                            <td width="35%" style="line-height:1.7em"><span class="accountads">Draw 
                              history for Naira</span><br>
                                    <a href="#" class="linksign">Download draw 
                                    history for Lotto</a><br></td>
                                  <td width="40%" valign="top" style="padding-top:18px"><table width="87%" border="0" cellspacing="0" cellpadding="2">
                                      <tr>
                                        <td width="26%" class="text11">Game</td>
                                        <td width="74%"><select id="lotto" class="combo5">
											 <option value="draw-history-afro">Afro Millions</option>
											 <option value="draw-history-naira">Naira Lotto</option>
										  </select></td>
                                      </tr>
                                      <tr>
                                        <td class="text11">Draw</td>
                                        <td><select name="cmbDraw" class="combo5">
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                          </select></td>
                                      </tr>
                                    </table></td>
                                  <td width="12%" style="padding-top:21px"><a href="#"><img src="<?=$_DIR['site']['url']?>images/go_button2.gif" width="49" height="23"></a></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="536" align="left" valign="top">
<table border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr> 
                                  <td width="102px" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" class="eurohistory" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;">Date</td>
                                  <td width="144px" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif"  align="center" style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Ball Numbers</td>
                                  <td width="105px" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Vision Number</td>
                                  <td width="105px" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Jackpot</td>
                                  <td width="55" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Draw</td>
                                  <td width="67" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Machine </td>
                                  <td width="33" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif" align="center"  style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Set</td>
                                  <td width="60" height="37px" background="<?=$_DIR['site']['url']?>images/img115.gif"  align="center" style="background-repeat: repeat-x;border-right:1px solid #FFFFFF;" class="eurohistory">Prizes</td>
                                </tr>
								<?php  
									if($rsIn && !$rsIn->EOF) {
										$pre=""; $cur="";
										while(!$rsIn->EOF) {
											$drawNo=str_replace(",","-",$rsIn->fields['draw_number']);
											$winVis="";
											if($rsIn->fields['winner_vision_number']) $winVis=str_replace(",","-",$rsIn->fields['winner_vision_number']);
											$cur=$rsIn->fields['month'];											
											if($cur!=$pre) {
								?>
								<tr> 
                                  <td colspan="8" height="24px" style="padding-left:6px;border-bottom:1px solid #339030"><strong><?=$rsIn->fields['month']?></strong></td>
                                </tr>
								<?php 
										$pre=$rsIn->fields['month'];
									} 
								?>
                                <tr> 
                                  <td height="35px" style="border-bottom:1px solid #339030;border-right:1px solid #339030" align="center"><?=$rsIn->fields['to_time2']?></td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030"><?=$drawNo?></td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030"><?=$winVis?></td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030"><img src="<?=$_DIR['site']['url']?>images/naira.gif"> <?=$rsIn->fields['match6']?> </td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030"><?=strlen($rsIn->fields['naira_id'])<4?substr("0000",0,4-strlen($rsIn->fields['naira_id'])).$rsIn->fields['naira_id']:$rsIn->fields['naira_id']?></td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030">ARTHUR</td>
                                  <td align="center" style="border-bottom:1px solid #339030;border-right:1px solid #339030">3</td>
                                  
                            <td align="center" style="border-bottom:1px solid #339030;"><a href="<?=$_DIR['site']['url']?>prize-breakdown-naira<?=$atend?>idx<?=$_DELIM."i".md5($rsIn->fields['naira_id']).$baratend?>">View</a></td>
                                </tr>
								<?php   
											$rsIn->MoveNext();
										}
									}
									if($rsIn) $rsIn->close();
								?>
								<tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>

                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td valign="top"><img src="<?=$_DIR['site']['url']?>images/img21.gif" width="681" height="8"></td>
                    </tr>
                  </table> 
  
  </td>
</tr>
<tr> 
  <td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>
</tr>
</table></td>
</tr>
</table>
<?php include_once("footer.php"); ?>