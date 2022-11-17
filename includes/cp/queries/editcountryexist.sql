<?PHP
$_sql = "SELECT country_id FROM country WHERE name='".trim($_POST['txtName'])."' and country_id!=".$_GET['id'];
?>