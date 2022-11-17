<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["Submit"]=="Post") { 
		     
	$terminalid		= trim($_POST["txtTermID"]);
	$lottoType		= trim($_POST["cmbType"]);
	$draw			= trim($_POST["cmbDraw"]);
	$weeks			= trim($_POST["cmbWeek"]);
	$loNumbersAry	= trim($_POST["txtEntries"]);
	$lotto_NumAry	= explode("#",$loNumbersAry);
	$entries="";
	
	if($lottoType =="NL") $limit=6;		
	elseif($lottoType =="AM") $limit=7;
		
	for($i=0,$m=1;$i<5;$i++,$m+=$limit) { 
		$tentries="";
		if($lottoType=="NL") { 
			for($x=$m;$x<$m+$limit;$x++) {
				if(!$tentries) $tentries.=trim($_POST["num".$x]);
				else $tentries.=",".trim($_POST["num".$x]); 
			}
		}
		elseif($lottoType =="AM") { 
			for($x=$m;$x<$m+$limit;$x++) {
				if(!$tentries) $tentries.=trim($_POST["nux".$x]);
				else $tentries.=",".trim($_POST["nux".$x]); 
			}
		}
		if($tentries) {
			if(!$entries) $entries=$tentries;
			else  $entries.="#".$tentries;
		}
	}

	$data="txtTermID=".$terminalid."&cmbType=".$lottoType."&cmbDraw=".$draw."&cmbWeek=".$weeks."&txtEntries=".$entries."&cmbVision=".trim($_POST["cmbVision"])."&txtVNAR=".trim($_POST["txtVNAR"]);
	$url = "http://www.visionlottery.com/gateway/apiexc.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	$response = curl_exec($ch);
	if(is_int($response)) {
		die("Errors: " . curl_errno($ch) . " : " . curl_error($ch));
	}
	curl_close ($ch);
	
	print "Remote Site : $url<br /><hr />$response";
	if($response==1) echo "<br />Entry Posted successfully.";
}
?>
<script language="JavaScript1.2">
function fnChange() { 
	if(document.frm.cmbType.selectedIndex==0) { 
		document.frm.cmbDraw.selectedIndex=0;
		document.getElementById('af').style.display='none';
		document.getElementById('nl').style.display='block';
	} else { 
		document.frm.cmbDraw.selectedIndex=1;
		document.getElementById('nl').style.display='none';
		document.getElementById('af').style.display='block';
	}
}
function chkVal(itm,rowid,val,currentcolumn) {
	if(itm.value=="LD") { return; }
	else if( Number(itm.value)>=1 && Number(itm.value)<=49 ) {
		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);		
	}
	else {
		itm.value="";
	}
	rmDupl(itm,val,6,currentcolumn);	
}
function chkaVal(itm,rowid,val,currentcolumn) {
	if(itm.value=="LD") { return; }
	else if( Number(itm.value)>=1 && Number(itm.value)<=50 ) {
		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);
	}
	else {
		itm.value="";
	}
	rmaDupl(itm,val,7,currentcolumn);
}
function rmDupl(itm,val,limit,currentcolumn) { 
	for(i=val;i<(val+limit);i++) {
		if(i!=currentcolumn && itm.value==document.getElementById("num"+i).value) {
			itm.value="";
		}
	}
}
function rmaDupl(itm,val,limit,currentcolumn) { 
	for(i=val;i<(val+limit);i++) {
		if(i!=currentcolumn && itm.value==document.getElementById("nux"+i).value) {
			itm.value="";
		}
	}
}
</script>
<form method="post" action="" name="frm">
<table width="60%" border="1" cellspacing="1" cellpadding="6" align="center">
  <tr> 
    <td width="32%">Terminal ID</td>
    <td width="68%"><input type="text" name="txtTermID" value="<?=trim($_POST["txtTermID"])?>"></td>
  </tr>
  <tr> 
    <td>Type</td>
    <td><select name="cmbType" size="1" onChange="fnChange()">
	<option value="NL" <?=$_POST["cmbType"]=="NL"?"selected":""?>>Naira Lotto</option>
	<option value="AM" <?=$_POST["cmbType"]=="AM"?"selected":""?>>Afro Millions</option>
	</select>
	</td>
  </tr>
  <tr> 
    <td>Draw</td>
    <td><select name="cmbDraw" size="1" onChange="document.frm.cmbType.selectedIndex==0?document.frm.cmbDraw.selectedIndex=0:document.frm.cmbDraw.selectedIndex=1">
	<option value="Saturday" <?=$_POST["cmbDraw"]=="Saturday"?"selected":""?>>Saturday</option>
	<option value="Friday" <?=$_POST["cmbDraw"]=="Friday"?"selected":""?>>Friday</option>
	</select>
	</td>
  </tr>
  <tr> 
    <td>Weeks</td>
    <td><select name="cmbWeek" size="1">
	<option value="1" <?=$_POST["cmbWeek"]=="1"?"selected":""?>>1</option>
	<option value="2" <?=$_POST["cmbWeek"]=="2"?"selected":""?>>2</option>
	<option value="3" <?=$_POST["cmbWeek"]=="3"?"selected":""?>>3</option>
	<option value="4" <?=$_POST["cmbWeek"]=="4"?"selected":""?>>4</option>
	</select></td>
  </tr>
  <tr> 
    <td>Entries</td>
    <td><table width="200px" border="0" id="nl"> 
		<?php for($i=0,$j=0,$m=1;$i<5;$i++,$m+=6) { ?>
          <tr>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="num<?=++$j?>" id="num<?=$j?>" value="<?=$_POST["num".$j]?>" onChange="chkVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
          </tr>
		<?php } ?>
        </table>
		<table width="200px" border="0" id="af" style="display:none;">
		<?php for($i=0,$j=0,$m=1;$i<5;$i++,$m+=7) { ?>
          <tr>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
            <td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
			<td align="center"><input type="text" name="nux<?=++$j?>" id="nux<?=$j?>" value="<?=$_POST["nux".$j]?>" onChange="chkaVal(this,'row<?=$i+1?>',<?=$m?>,<?=$j?>)" style="width:40px;text-align:center" maxlength="2"></td>
          </tr>
		<?php } ?> 		
        </table></td>
  </tr>
  <tr> 
    <td>Vision Number / Afro Raffle</td>
    <td height="45px">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="80px"><select name="cmbVision" id="cmbVision">
		<option value="">Choose</option>
		<option value="Y" <?=$_POST["cmbVision"]=="Y"?"selected":""?>>Yes</option>
		<option value="N" <?=$_POST["cmbVision"]=="N"?"selected":""?>>No</option>
        </select></td>	
		  </tr>
		</table>
	</td>
  </tr>
  <tr> 
    <td colspan="2" align="left" style="padding-left:200px;"><input type="submit" name="Submit" value="Post"></td>
  </tr>
</table>
</form>