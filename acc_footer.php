</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
  <td height="30px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
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
    <td valign="top" style="padding-top:15px"><table width="100%" border="0" cellspacing="1" cellpadding="2">
        <tr>
          <td align="center" class="text4"><img src="<?=$_DIR["site"]["url"]?>images/img10.png" width="31" height="32" align="absmiddle">&nbsp; You must be 16 or over to play or claim a prize</td>
        </tr>
        <tr>
          <td align="center" style="padding:20px 0px">
			<?php
			$sql="SELECT * FROM page WHERE display_in='F' ORDER BY page_order";
			$rs = $_CONN->Execute($sql);
			while(!$rs->EOF) {
			  echo '<a href="'.$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']).'" class="topmenu">'.($rs->fields['page_id']==1?"Home":stripslashes($rs->fields['name'])).'</a>';	
			  if($rs->MoveNext()) echo '<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">|<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">';
			}
			if($rs) $rs->close();
			?>			</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
