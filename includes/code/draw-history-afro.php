<?php
$sql="SELECT afro_id,date_format(to_time,'%a %d %b %Y') as to_time2,date_format(to_time,'%M') as month,draw_number,match7,winner_vision_number FROM afro_lotto where status='D' ORDER BY to_time desc";
$rsIn=$_CONN->Execute($sql);
?>