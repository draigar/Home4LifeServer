<?PHP
  $_sql = "UPDATE state SET state_name='".trim($_POST['txtName'])."',state_code='".trim($_POST['txtScode'])."', last_update=NOW() WHERE state_id=".$_GET['id'];
?>