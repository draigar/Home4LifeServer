<?PHP
$_sql = "INSERT INTO state (state_name,create_date,state_code) VALUES ('".trim($_POST['txtName'])."',NOW(),'".trim($_POST["txtStcode"])."')";	
?>