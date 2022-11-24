<?php 

include('includes/adodb/adodb.inc.php');

$db = NewADOConnection('mysql');
$db->Connect("localhost", "root", "", "imolottery_lottery");
$result = $db->Execute("SELECT * FROM city");
if ($result === false) die("failed");
    while (!$result->EOF) {
       for ($i=0, $max=$result->FieldCount(); $i < $max; $i++)
              print $result->fields[$i].' ';
       $result->MoveNext();
   print "<br>n";
}

?>