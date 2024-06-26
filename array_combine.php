<?php
$point = ["10km","20km","30km","40km","50km"];
$time = ["00:50:27","02:30:30","02:30:30","03:15:20","04:00:38"];

$result = array_combine($point,$time);

print_r($result);

?>