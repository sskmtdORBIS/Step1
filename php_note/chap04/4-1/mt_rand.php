<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>１〜 100の間の乱数を10個作る</title>
</head>
<body>
<?php
for ($i=1;$i<=10;$i++){
  $num = mt_rand(1, 100);
  echo "{$num}, ";
}
?>
</body>
</html>
