<?php
$a = mt_rand(0,50);
$b = mt_rand(0,50);
$kaigyo = "ほげ<br>";
$bigger = ($a>$b)? $a : $b;
echo "大きな値は{$bigger}、\$aは{$a}、\$bは{$b}{$kaigyo}";


$a = mt_rand(0,50);
$b = mt_rand(0,50);
if ($a>$b){
    $bigger = $a;
} else {
    $bigger = $b;
}
echo "大きな値は{$bigger}、\$aは{$a}、\$bは{$b}";



?>