<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

$_THISPAGENAME='unclaimed-afro-prizes';

include_once($_DIR['inc']['code'].$_THISPAGENAME.'.php');

$content[0]="Unclaimed Afro Millions Prizes";

$noright=true;

include_once("header.php"); ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr> 

  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

</tr>

<tr>

  <td valign="top" class="text">

	  <table width="779px" border="0" cellspacing="0" cellpadding="0" align="center">

		<tr><td background="<?=$_DIR["site"]["url"]?>images/img92.png" width="800px" height="70px" style="padding-left:10px;"><span class="vticket"><?php print $content[0]; ?></span></td></tr>

		<tr><td background="<?=$_DIR["site"]["url"]?>images/img94.png" style="background-repeat-y" valign="top">

		

		

<table width="788px" border="0" cellspacing="0" cellpadding="0" align="center">

<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img95.png" width="788px" height="9px"></td></tr>

<tr><td valign="top" background="<?=$_DIR["site"]["url"]?>images/img96.png" style="background-repeat-y">

	<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">

	  <tr> 

		<td bgcolor="#3366CC" height="25px" class="text12" style="padding-left:10px"><font color="White">Largest 

		  prizes still to be claimed</font></td>

	  </tr>

	  <tr> 

		<td>&nbsp;</td>

	  </tr>

	  <tr> 

		<td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">

			<tr> 

			  <td height="37px" valign="top" class="text11">Draw date</td>

			  <td height="37px" valign="top" class="text11">Draw no</td>

			  <td height="37px" valign="top" class="text11">Prize unclaimed</td>

			  <td height="37px" valign="top" class="text11">Prize level</td>

			  <td height="37px" valign="top" class="text11">Area bought</td>

			  <td height="37px" valign="top" class="text11">Winning numbers</td>
			  <td height="37px" valign="top" class="text11">Raffle Winning numbers</td>	
			  <td height="37px" valign="top" class="text11">Last date to claim</td>

			</tr>

			<tr> 

			  <td colspan="8" height="1px" style="border-bottom:1px solid #CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

			</tr>

			<?php

			$prizesum=array();

			$cnt=count($afro_id);

			for($i=0;$i<$cnt;$i++) { 

				$matchp=0;

				$len2=count($result[$i]);

				for($j=0,$k=0;$j<$len2;$j++,$k+=2) {

					if($result[$i][$j]) $matchp++;

				}

				$prizesum[$afro_id[$i]][$matchp]=!$prizesum[$afro_id[$i]][$matchp]?1:($prizesum[$afro_id[$i]][$matchp]+1);

			}

			if($cnt<=0) print "<tr><td height='30' colspan='7' valign='middle'><strong><font color=red>VisionNET counld not find any unclaimed prize in Winners list!</font></strong></td></tr>";

			for($i=0;$i<$cnt;$i++) { 

				$matchp=0;

				$len2=count($result[$i]);

				for($j=0,$k=0;$j<$len2;$j++,$k+=2) {

					if($result[$i][$j]) $matchp++;

				}

			?>

			<tr> 

			  <td height="35px" class="listing"><?=$to_time[$i]?></td>

			  <td class="listing"><?=strlen($afro_id[$i])<4?substr("0000",0,4-strlen($afro_id[$i])).$afro_id[$i]:$afro_id[$i]?></td>

			  <td class="listing"><img src="<?=$_DIR["site"]["url"]?>images/naira.gif">&nbsp;
			  <?php 
				$totalamount=0;
				if($win_num[$i]) $totalamount=$match[$i][$matchp]/$prizesum[$afro_id[$i]][$matchp]; 
				if($visionwinner[$i]) $totalamount+=$visionwinneramount[$i];
				echo number_format($totalamount,2); 
			  ?> 
			  </td>

			  <td class="listing"><?=$matchp==7?"Jackpot":"Matched ".$matchp?></td>

			  <td class="listing"><?php 
				if($method_id[$i]=='S'){ echo "SMS"; }elseif($method_id[$i]=='T'){ echo "Terminal"; }else{ echo "Internet"; }
			  ?></td>

			  <td class="listing"><?=$win_num[$i]?></td>
			  <td class="listing" align="center"><?=$visionwinner[$i]?></td>
			  <td class="listing"><?=$unclaim_date[$i]?></td>

			</tr>

			<tr> 

			  <td colspan="8" height="1px" style="border-bottom:1px solid #CCCCCC"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

			</tr>

			<?php } ?>

			<tr> 

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

<tr><td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img97.png" width="788px" height="8px"></td></tr>

</table>

			

		</td></tr>

		<tr><td><img src="<?=$_DIR["site"]["url"]?>images/img93.png" width="800px" height="9px"></td></tr>	

	  </table>

  </td>

</tr>

</table>

<?php include_once("footer.php"); ?>