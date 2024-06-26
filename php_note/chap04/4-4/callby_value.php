<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>変数の値渡し</title>
</head>
<body>
<?php
function oneUp($var){
  $var += 1;
}

// 実行する
$num = 5;
oneUp($num);
echo $num;
?>
</body>
</html>
