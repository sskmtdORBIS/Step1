<?php
$color = "red";
$$color = 125;
echo "{$red}<br>";
echo "{$color}<br><br>";
?>

<?php
$unitPrice = 230;
$quantity = 5;

$tanka = "unitPrice";
$kosu = "quantity";

$ryoukin = $$tanka * $$kosu;
echo $ryoukin . "円";
?>