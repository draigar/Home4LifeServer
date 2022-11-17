<?php

$sql="select type from saved_entry where user_id='".$_SESSION['login']['userid']."'";

$rs= $_CONN->Execute($sql);

if($rs && !$rs->EOF)

  $type=$rs->fields["type"];

if($rs) $rs->close();

?>

<table width="204px" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40a.png) no-repeat;padding-left:15px" class="text12">My 



                        Account </td>



                    </tr>



                    <tr> 



                      

    <td height="25px" style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y;padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-account<?=$atend?>" class="overview">My 

      Account Overview</a></td>



                    </tr>



                    <tr> 



                      <td  style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">


                         
                        </table></td>



                    </tr>








                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40a.png) no-repeat;padding-left:15px" class="text12"> Ticket Entries



                        </td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          
                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-naira-lotto<?=$atend?>" class="linksign">Naira

            Lotto Entries</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-afro-lotto<?=$atend?>" class="linksign">Afro Millions 

            Entries</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

                          

                          

                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-naira-cancelled<?=$atend?>" class="linksign">Naira Cancelled/Failed Entries</a></td>



                          </tr>
						  <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>


							<tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-afro-cancelled<?=$atend?>" class="linksign">Afro Cancelled/Failed Entries</a></td>



                          </tr>



                        </table></td>



                    </tr>





















                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40a.png) no-repeat;padding-left:15px" class="text12">Payment Transactions 



                        </td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          
                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-add-fund<?=$atend?>" class="linksign">Add 

            Funds</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-withdraw-funds<?=$atend?>" class="linksign">Withdraw 

            Funds</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-transaction<?=$atend?>" class="linksign">View 

            Transactions</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_bank_account<?=$atend?>" class="linksign">Add/Change Bank Account</a></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40a.png) no-repeat;padding-left:15px" class="text12">Managing 



                        My Account</td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_personal_detail<?=$atend?>" class="linksign">Personal 

            Details</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>
                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_preferences<?=$atend?>" class="linksign">Preferences</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>





                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent-changepassword<?=$atend?>" class="linksign">Change 

            Password</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>





                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_change_sec_code<?=$atend?>" class="linksign">Change Security Code</a></td>



                          </tr>

 <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_change_securdetail<?=$atend?>" class="linksign">Change Security Questions</a></td>



                          </tr>



					



						<tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>agent_close_account<?=$atend?>" class="linksign">Terminate Account</a></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40a.png) no-repeat;padding-left:15px" class="text12">Close Session</td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>logout<?=$atend?>" class="linksign">Logout</a></td>



                          </tr>                          



                        </table></td>



                    </tr>



                  </table>