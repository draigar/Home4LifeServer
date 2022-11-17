<input type="hidden" name="cmbTitle" value="<?=$_POST['cmbTitle']?>">
<input type="hidden" name="txtFirstName" value="<?=stripslashes($_POST['txtFirstName'])?>">
<input type="hidden" name="txtLastName" value="<?=stripslashes($_POST['txtLastName'])?>">
<input type="hidden" name="cmbDate" value="<?=stripslashes($_POST['cmbDate'])?>">
<input type="hidden" name="cmbMonth" value="<?=stripslashes($_POST['cmbMonth'])?>">
<input type="hidden" name="cmbYear" value="<?=stripslashes($_POST['cmbYear'])?>">  
<input type="hidden" name="cmbGender" value="<?=$_POST['cmbGender']?>">
<input type="hidden" name="txtEmail" value="<?=stripslashes($_POST['txtEmail'])?>">
<input type="hidden" name="txtReEmail" value="<?=stripslashes($_POST['txtReEmail'])?>">
<input type="hidden" name="txtTelephone" value="<?=stripslashes($_POST['txtTelephone'])?>">
<input type="hidden" name="txtAddress1" value="<?=stripslashes($_POST['txtAddress1'])?>">
<input type="hidden" name="txtAddress2" value="<?=stripslashes($_POST['txtAddress2'])?>">
<input type="hidden" name="cmbLga" value="<?=stripslashes($_POST['cmbLga'])?>">
<input type="hidden" name="cmbState" value="<?=stripslashes($_POST['cmbState'])?>">

<?php
	if(!$_POST['cmbState']==""){
		$sql="select state_name from state where state_id=".$_POST['cmbState'];
		$rs= $_CONN->Execute($sql);
		if($rs && !$rs->EOF){
			$_POST["txtState"] = $rs->fields['state_name'];
		}if($rs)		$rs->close();
	}
	if(!$_POST['cmbLga']==""){
		$sql="select lga_name from lga where lga_id=".$_POST['cmbLga'];
		$rs= $_CONN->Execute($sql);
		if($rs && !$rs->EOF){
			$_POST["txtCity"] = $rs->fields['lga_name'];
		}if($rs)		$rs->close();
	}
?>
<input type="hidden" name="txtCity" value="<?=$_POST['txtCity']?>">
<input type="hidden" name="txtState" value="<?=$_POST['txtState']?>">

<input type="hidden" name="cmbSecQue1" value="<?=$_POST['cmbSecQue1']?>">
<input type="hidden" name="txtAnswer1" value="<?=stripslashes($_POST['txtAnswer1'])?>">
<input type="hidden" name="cmbSecQue2" value="<?=$_POST['cmbSecQue2']?>">
<input type="hidden" name="txtAnswer2" value="<?=stripslashes($_POST['txtAnswer2'])?>">
<input type="hidden" name="cmbSecQue3" value="<?=$_POST['cmbSecQue3']?>">
<input type="hidden" name="txtAnswer3" value="<?=stripslashes($_POST['txtAnswer3'])?>">
<?php
	if(!$_POST['cmbSecQue1']=="" && !$_POST['cmbSecQue2']=="" && !$_POST['cmbSecQue3']==""){
		$i=1;
		$sql="select value from gcm where condition_type='SEC_QUE' and `condition` in (".$_POST['cmbSecQue1'].",".$_POST['cmbSecQue2'].",".$_POST['cmbSecQue3'].")";
		$rs= $_CONN->Execute($sql);
		if($rs && !$rs->EOF){
			while(!$rs->EOF){
				$_POST["txtSecQue".$i] = $rs->fields['value'];
			$rs->MoveNext();
			$i++;
			}
		}if($rs)		$rs->close();
	}
?>
<input type="hidden" name="txtSecQue1" value="<?=$_POST['txtSecQue1']?>">
<input type="hidden" name="txtSecQue2" value="<?=$_POST['txtSecQue2']?>">
<input type="hidden" name="txtSecQue3" value="<?=$_POST['txtSecQue3']?>">

