<?php
$year = 2016;
$seq = 539;
$type = "p7";
sprintf ('%04d%06d-%s',$year,$seq,$type);
$id = sprintf ('%04d%06d-%s',$year,$seq,$type);
echo "製品IDは",$id,"です。";

?>