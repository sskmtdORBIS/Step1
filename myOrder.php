<?php

require_once("OrderManager_kai.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OrderManagerクラスでオーダーする</title>
</head>
<body>
<pre>
<?php
$theOrder = new OrderManager();

$theOrder->addOrder(items:["ワイン","カルパッチョ"],allergys:["ピーナッツ","そば"]);
$theOrder->addOrder(items:["ビール","枝豆"],memo:"誕生日");



$orderstring = $theOrder->nextOrder();
echo($orderstring.PHP_EOL);

$orderstring = $theOrder->nextOrder();
echo($orderstring.PHP_EOL);

$orderstring = $theOrder->nextOrder();
echo($orderstring.PHP_EOL);


?>
</pre>
</body>
</html>