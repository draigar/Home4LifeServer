<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'view_tickets.php'); //include code file

$content[0]="View Tickets";

include_once("acc_header.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="23%" valign="top" align="left">

			  <?php include_once("leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

				  

                <td width="75%" valign="top" align="left"><table width="98%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td height="58px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

              <tr> 

                <td width="4%">&nbsp;</td>

                <td width="63%" class="vticket" style="padding-top:8px">View Tickets</td>

                <td width="26%" align="right" style="padding-top:8px"><a href="#" class="link55">Print</a></td>

                <td width="7%" valign="top" style="padding-top:12px;padding-left:2px"><a href="#"><img src="<?=$_DIR["site"]["url"]?>images/img51.png" width="32" height="27" border="0"></a></td>

              </tr>

            </table></td>

        </tr>

        <tr> 

          <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 

                <td>&nbsp;</td>

              </tr>

              <tr> 

                <td valign="top"><table width="661px" border="0" cellspacing="0" cellpadding="0" align="center">

                    <tr> 

                      <td height="151px" background="<?=$_DIR["site"]["url"]?>images/img100.png" style="background-repeat: no-repeat" valign="top">

					  <form name="frmSearch" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

					  <table width="661" border="0" cellspacing="0" cellpadding="0">

                          <tr> 

                            <td height="26px" class="text12" style="padding-left:15px">Choose 

                              type</td>

                            <td width="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                            <td width="325" class="text12" style="padding-left:15px">or 

                              search by draw date</td>

                          </tr>

                          <tr> 

                            <td height="115px" valign="top" style="padding-top:10px;padding-left:30px"> 

                              <table width="300px" border="0" cellspacing="0" cellpadding="2" align="center">

                                <tr> 

                                  <td colspan="2"><strong>Naira Lotto</strong></td>

                                  

                                  <td colspan="2"><strong>Afro Millions</strong></td>

                                  

                                </tr>

								<tr> 

                                  <td><input type="radio" name="rdoLotto" value="1" checked></td>

                                  <td>All tickets</td>

                                  <td><input type="radio" name="rdoLotto" value="4" <?php echo $_POST['rdoLotto']=="4"?"checked":""; ?>></td>

                                  <td>All tickets</td>

                                </tr>

                                <tr> 

                                  <td><input type="radio" name="rdoLotto" value="2" <?php echo $_POST['rdoLotto']=="2"?"checked":""; ?>></td>

                                  <td>Account tickets</td>

                                  <td><input type="radio" name="rdoLotto" value="5" <?php echo $_POST['rdoLotto']=="5"?"checked":""; ?>></td>

                                  <td>Account tickets</td>

                                </tr>

                                <tr> 

                                  <td><input type="radio" name="rdoLotto" value="3" <?php echo $_POST['rdoLotto']=="3"?"checked":""; ?>></td>

                                  <td>Winning tickets</td>

                                  <td><input type="radio" name="rdoLotto" value="6" <?php echo $_POST['rdoLotto']=="6"?"checked":""; ?>></td>

                                  <td>Winning tickets</td>

                                </tr>

                                <tr> 

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                </tr>

                              </table></td>

                            <td width="1px" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                            <td valign="top" style="padding-top:10px"><table width="315px" border="0" cellspacing="0" cellpadding="2" align="center">

                                <tr> 

                                  <td width="37">Select </td>

                                  <td width="180" class="text11"> <select name="cmbMonth" class="combo4">

                                      <option value="">All Months</option>

								 	  <?php

										for($i=0;$i<10;$i++) {

										echo  $val=date("mY",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));

										  $mnth=date("M Y",mktime(date("h"),date("i"),date("s"),date("m")-$i,date("d"),date("Y")));	

										  print "<option value='".$val."' ".($_POST["cmbMonth"]==$val?"selected":"").">".$mnth."</option>";

										  if($mnth=="Jan 2010") break;

										}

									  ?>

                                    </select> </td>

                                  <td width="86">&nbsp;</td>

                                </tr>

                                <tr> 

                                  <td>&nbsp;</td>

                                  <td>&nbsp;</td>

                                  <td><input type="image" border="0" src="<?=$_DIR["site"]["url"]?>images/search.gif" width="77" height="23"></td>

                                </tr>

                              </table></td>

                          </tr>

                        </table>

					  </form>

					  </td>

                    </tr>

                  </table></td>

              </tr>

              <tr> 

                <td align="right" style="padding-right:7px"><br>

                  </td>

              </tr>

   				<?php        

					if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))

					{

				?>

              <tr> 

                <td height="25px" bgcolor="#F6F6F6" style="border-bottom:2px solid #CCCCCC;padding-left:5px" align="left" class="text12">All 

                  Transactions</td>

              </tr>

              <tr> 

                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr> 

                      <td width="23%" height="35px" class="text11">Draw Date</td>

                      <td colspan="2" class="text11">Description / Ticket number</td>

                      <td width="27%" class="text11">Action</td>

                    </tr>

                    <tr> 

                      <td colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                    </tr>

				<?php 			

						foreach($pageAndData['results'] as $key => $val)

						{

				?>

                    <tr> 

                      <td colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                    </tr>

                    <tr> 

                      <td height="25px"><?=$val['draw_date']?></td>

                      <td><?=$lottoName?></td>

                      <td><?=$val['ticket_no']?></td>

                      <td><a href="<?=$_DIR['site']['url']?>tickets<?=$atend?>ticket_no=<?=$val['ticket_no']?><?=$baratend?>frm=<?=$lotto?><?=$baratend?>" class="viewticket">View 

                        ticket</a></td>

                    </tr>

				<?php  

							unset($rowbgcolor);

							unset($firstletterofStat);

						}

				?>					

                    <tr> 

                      <td colspan="4" bgcolor="#CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                    </tr>

                    <tr> 

                      <td>&nbsp;</td>

                      <td colspan="2">&nbsp;</td>

                      <td>&nbsp;</td>

                    </tr>

                  </table></td>

              </tr>

			  <tr><td align="right"><?=@$pageAndData['paginationbuttonHTML2']?></td></tr>

              <? }else{ ?>

			  <tr> 

			  <td align="center" valign="top" class="text11">Sorry, No Tickets In Your Account.</td>                

              </tr>

			  <?php } ?>						

            </table></td>

        </tr>

        <tr> 

          <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>

        </tr>

      </table></td>

              </tr>

            </table>

<?php include_once("acc_footer.php"); ?>