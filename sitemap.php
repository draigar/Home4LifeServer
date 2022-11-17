<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$noright=true;
$nofeature=true;
$content[0]="Sitemap";
include_once("header.php"); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr> 
  <td valign="top" colspan="2" class="title"><?php print $content[0]; ?></td>
</tr>
<tr> 
  <td height="8px" colspan="2"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
</tr>
<tr>
<td width="300px" valign="top">
<table width="100%" cellpadding="0" cellspacing="0">
<tr> 
<td height="202px" style="background-repeat: no-repeat;padding-top:12px" valign="top">
	  <?php
		  $fea=main_menu();		 
	  ?>
	  <table border="0" cellpadding="1" cellspacing="0" align="left">
        <tr>
		  <td width="243" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr> 
                <td valign="top">
					<table width="100%" border="0" cellspacing="1" cellpadding="3">
					<?php
					foreach($fea as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" height="20px" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><?=$val?></td>
                    </tr>
					<?php } ?>                    
                  	</table>
				</td>
              </tr>
			  <tr> 
                <td valign="top">
				<?php
				  $fea=footer_menu_sitemap();		 
				?>
				<table width="100%" border="0" cellspacing="1" cellpadding="3">
					<?php
					foreach($fea as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" height="20px" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><?=$val?></td>
                    </tr>
					<?php } ?>
                    <tr> 
                  </table></td>
              </tr>
            </table></td>
			</tr>
            </table></td>
			</tr><tr>
        </tr>
      </table>
	
	</td>
    <td height="202px" style="background-repeat: no-repeat;padding-top:12px" valign="top">
	  <?php
	  $fea=display_feature_module();
	  $featl=$fea[0];
	  $feadt=$fea[1];
	  ?>
	  <table width="100%" border="0" cellpadding="1" cellspacing="0" align="right">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr> 
                <td height="22px" valign="top"><h3><?php print $featl[11]; ?></h3></td>
              </tr>
              <tr> 
                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
					<?php
					foreach($feadt[11] as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><a href="<?=$val["file"]?>" class="tabtext1"><?=$val["name"]?></a></td>
                    </tr>
					<?php } ?>
                    <tr> 
                  </table></td>
              </tr>
            </table></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr> 
                <td height="22px" valign="top"><h3><?php print $featl[12]; ?></h3></td>
              </tr>
              <tr> 
                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <?php
					foreach($feadt[12] as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><a href="<?=$_DIR["site"]["url"].$val["file"]?>" class="tabtext1"><?=$val["name"]?></a></td>
                    </tr>
					<?php } ?>
                  </table></td>
              </tr>
            </table></td>
			</tr><tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr> 
                <td height="22px" valign="top"><h3><?php print $featl[13]; ?></h3></td>
              </tr>
              <tr> 
                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <?php
					foreach($feadt[13] as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><a href="<?=$_DIR["site"]["url"].$val["file"]?>" class="tabtext1"><?=$val["name"]?></a></td>
                    </tr>
					<?php } ?>
                  </table></td>
              </tr>
            </table></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr> 
                <td height="22px" valign="top"><h3><?php print $featl[14]; ?></h3></td>
              </tr>
              <tr> 
                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <?php
					foreach($feadt[14] as $key=>$val) {
					?>
                    <tr> 
                      <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>
                      <td width="91%"><a href="<?=$_DIR["site"]["url"].$val["file"]?>" class="tabtext1"><?=$val["name"]?></a></td>
                    </tr>
					<?php } ?>
                  </table></td>
              </tr>
            </table></td>

        </tr>
      </table>
	
	</td>
  </tr>  
  </table>
  
<?php include_once("footer.php"); ?>