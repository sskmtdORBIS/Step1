<?php
$colorNumber = 100;
$number = abs($colorNumber) % 4;
$colorName = match($number){
    0 => "青",
    1,2 => "緑",
    3 => "黒",
};
echo "{$number}番は{$colorName}色です！";

?>