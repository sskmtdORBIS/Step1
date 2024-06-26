<?php
$msg = "吾輩は猫である。名前はまだない。";
echo mb_strlen($msg),PHP_EOL,"<br>";
echo mb_substr($msg,4),PHP_EOL,"<br>";
echo mb_substr($msg,4,1),PHP_EOL,"<br>";
echo mb_substr($msg,-6),"<br><br><br>";

echo mb_substr($msg,0,-1),"<br>";


$id = "ab23456p";
echo substr($id,4),"<br>";
echo strlen($id),"<br>";
echo substr($id,5,-2),"<br>";



?>