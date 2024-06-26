<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>変数の参照渡し</title>
</head>
<body>
<?php
// 参照渡し
function oneUp(&$var){
  $var += 1;
}

// 実行する
$num = 5;
oneUp($num);
echo $num;
?>
</body>
</html>
