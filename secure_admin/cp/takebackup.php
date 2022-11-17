<?PHP
function get_structure() { 
$user 	= 'visionlo_vision1';
$pass 	= 'vision12345';
$db     = 'visionlo_lottery';
$server	= 'localhost';

mysql_connect($server, $user, $pass); 
mysql_select_db($db); 
$tables = mysql_list_tables($db); 
while ($td = mysql_fetch_array($tables)) 
{ 
$table = $td[0]; 
 
$r = mysql_query("SHOW CREATE TABLE `$table`"); 
if ($r) 
{ 
$insert_sql = ""; 
$d = mysql_fetch_array($r); 
$d[1] .= ";"; 
$SQL[] = "\n--";
$SQL[] = "-- Table structure for table `".$table."`";
$SQL[] = "--\n";
$SQL[] = str_replace("\n", "", $d[1]); 
$SQL[] = "\n\n--";
$SQL[] = "-- Dumping data for table `".$table."`";
$SQL[] = "--\n";
$table_query = mysql_query("SELECT * FROM `$table`"); 
$num_fields = mysql_num_fields($table_query); 
while ($fetch_row = mysql_fetch_array($table_query)) 
{ 
$insert_sql .= "INSERT INTO $table VALUES("; 

for ($n=1;$n<=$num_fields;$n++) 
{ 
$m = $n - 1; 
$insert_sql .= "'".mysql_real_escape_string($fetch_row[$m])."', "; 
} 
$insert_sql = substr($insert_sql,0,-2); 
$insert_sql .= ");\n"; 
} 
if ($insert_sql!= "") 
{ 
$SQL[] = $insert_sql; 
} 
} 
} 
return implode("\r", $SQL); 
} 

// We'll be outputting a PDF
header("Content-type: application/txt");

// It will be called downloaded.pdf
header("Content-Disposition: attachment; filename=visionlottery.sql");

echo get_structure();
?>