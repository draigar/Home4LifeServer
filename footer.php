</td>

<?php if(!$noright) { ?>

                <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



                <td width="23%" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">



					<tr>



                      <td height="10px"><div class="smallbox">



                          <div class="smalltl"></div>



                          <div class="smalltr"></div>



                          <div class="smallt"></div>



                          <div class="smalll"></div>



                          <div class="smallr"></div>



                          <div class="smallb"></div>



                          <div class="smallbl"></div>



                          <div class="smallbr"></div>



                          <div class="smallboximg"><?php print signUpBox(); ?></div>



                        </div></td>



                    </tr>



                    <tr>



                      <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



                    </tr>



                    <tr>



                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr>



                            <td height="29px" style="background:url(<?=$_DIR["site"]["url"]?>images/img04.png) no-repeat" align="left"><span class="text4" style="padding-left:5px;">Vision Latest News</span></td>



                          </tr>



                          <tr>



                            <td height="121px" style="background:url(<?=$_DIR["site"]["url"]?>images/img06.png) repeat-y" valign="top">



							<?php include("latestnews.php"); ?>



							</td>



                          </tr>



                          <tr>



                            <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img05.png" width="223" height="6"></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr>



                      <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



                    </tr>



                    <tr>



                      <td valign="top">



						  <div class="smallbox">



                          <div class="smalltl"></div>



                          <div class="smalltr"></div>



                          <div class="smallt"></div>



                          <div class="smalll"></div>



                          <div class="smallr"></div>



                          <div class="smallb"></div>



                          <div class="smallbl"></div>



                          <div class="smallbr"></div>



                          <div class="smallboximg"><?php print fourBoxes(5); ?></div>



                        </div>



						 	</td>



                    </tr>



                  </table></td>

<?php } ?>

              </tr>



            </table></td>



        </tr>



      </table></td>



  </tr>



  <tr>



  <td height="15px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



  </tr>

<?php if(!$nofeature) { ?>

  <tr>



    <td height="202px" width="937px" background="<?=$_DIR["site"]["url"]?>images/img08.png" style="background-repeat: no-repeat;padding-top:12px" valign="top">



	  <?php



	  $fea=display_feature_module();



	  $featl=$fea[0];



	  $feadt=$fea[1];



	  ?>



	  <table width="98%" border="0" cellpadding="1" cellspacing="0" align="center">



        <tr>



          <td width="25%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">



              <tr>



                <td class="text8" height="22px" valign="top"><?php print $featl[11]; ?></td>



              </tr>



              <tr>



                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">



					<?php



					foreach($feadt[11] as $key=>$val) {



					?>



                    <tr>



                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>



                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>



                    </tr>



					<?php } ?>



                    <tr>



                  </table></td>



              </tr>



            </table></td>



          <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>



          <td width="25%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">



              <tr>



                <td class="text8" height="22px" valign="top"><?php print $featl[12]; ?></td>



              </tr>



              <tr>



                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">



                    <?php



					foreach($feadt[12] as $key=>$val) {



					?>



                    <tr>



                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>



                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>



                    </tr>



					<?php } ?>



                  </table></td>



              </tr>



            </table></td>



         <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>



          <td width="25%"><table width="100%" border="0" cellspacing="0" cellpadding="2">



              <tr>



                <td class="text8" height="22px" valign="top"><?php print $featl[13]; ?></td>



              </tr>



              <tr>



                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">



                    <?php



					foreach($feadt[13] as $key=>$val) {



					?>



                    <tr>



                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>



                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>



                    </tr>



					<?php } ?>



                  </table></td>



              </tr>



            </table></td>



          <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>



		  <td width="25%"><table width="100%" border="0" cellspacing="0" cellpadding="2">



              <tr>



                <td class="text8" height="22px" valign="top"><?php print $featl[14]; ?></td>



              </tr>



              <tr>



                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">



                    <?php



					foreach($feadt[14] as $key=>$val) {



					?>



                    <tr>



                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>



                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>



                    </tr>



					<?php } ?>



                  </table></td>



              </tr>



            </table></td>



        </tr>



      </table>







	</td>



  </tr>

<?php } ?>

  <tr>



    <td valign="top" style="padding-top:5px"><table width="100%" border="0" cellspacing="1" cellpadding="2">



        <tr>



          <td align="center" class="text4"><img src="<?=$_DIR["site"]["url"]?>images/img10.png" width="32" height="32" align="absmiddle">&nbsp; You must be 18 or over and Nigeria resident to play or claim a prize</td>



        </tr>



        <tr>



          <td align="center" style="padding:0px 0px">



		  	<?php



			$sql="SELECT * FROM page WHERE display_in='F' ORDER BY page_order";



			$rs = $_CONN->Execute($sql);



			while(!$rs->EOF) {



			  echo '<a href="'.$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']).'" class="topmenu">'.($rs->fields['page_id']==1?"Home":stripslashes($rs->fields['name'])).'</a>';



			  if($rs->MoveNext()) echo '<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">|<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">';



			}



			if($rs) $rs->close();



			?>


        <tr>



          <td align="center" class="textlabel"><a href="http://www.cac.gov.ng/" target="_blank" name="Corporate Affairs Commission"><img src="<?=$_DIR["site"]["url"]?>images/cacball.png" align="absmiddle"></a>&nbsp;IMO Lottery & Games Limited is incorporated by the Corporate Affairs Commission under the Nigeria Company and Allied Matters Act.- RC865316.</td>
</tr>

<br>
<tr>
<td align="middle"><i><font size="-3">Developed by</font></i><br><a href="http://www.sixgoldtech.com/" target="_blank"><img src="<?=$_DIR["site"]["url"]?>images/taglogo.png" alt="Developed by Sixgold Technologies" border="0"></a></td>

        </tr>



		  	</td>



        </tr>



      </table></td>



  </tr>



</table>



</body>



</html>



