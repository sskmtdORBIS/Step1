<?php
$a = 15.69;
$b = 11.32;
printf('最大値%.1f、最小値%.1f<br>', $a , $b);
?>

<?php
$format = '最大値%.1f、最小値%.1f<br>';
$a = 15.69;
$b = 11.32;
printf($format, $a , $b);
?>

<?php

$format2 = '%2$fと%1$fは、それぞれ%2$.2dと%1$.2dになります。<br>';
$a = 12.345;
$b = 23.567;
printf($format2,$a,$b);
?>

<?php
$a = 7;
$b = 2380;
printf('番号は%+04dです。<br>',$a);
printf("請求額は%+'*6d円",$b);
?>