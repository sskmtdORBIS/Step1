<?php
require_once("bar2:Staff.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Staffクラスメンバーを使う</title>
</head>
<body>
<pre>
<?php

Staff::deposit(100);
Staff::deposit(150);

echo Staff::$piggyBank, "円になりました。".PHP_EOL;

$hana = new Staff(name:"花",age:21);
$hana->latePenalty();
echo Staff::$piggyBank,"円になりました。".PHP_EOL;
?>
</pre>
</body>
</html>
