<?PHP
$_sql = "SELECT state_id FROM state 
WHERE state_name='".trim($_POST['txtName'])."' and state_id!=".$_GET['id'];
?>