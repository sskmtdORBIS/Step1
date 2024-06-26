<?php
$inputStr = trim(fgets(STDIN));
$inputStr = str_replace(array("\n","\r","\r\n"),'',$inputStr);
$length = mb_strlen($inputStr);
for($i = 1; $i<= $length +2 ; $i++){
    echo "+";
}
echo PHP_EOL;
echo "+","{$inputStr}","+",PHP_EOL;
for($i = 1; $i<= $length +2 ; $i++){
    echo "+";
}




?>