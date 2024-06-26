<?php
$color =3;
$price = 100;
switch ($color){
    case 0:
    case 1:
        $price = 120;
        break;
    case 2:
        $price = 160;
        break;
    }
echo "{$color}は{$price}円";
?>
