<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>$aに1を加算した後で$aの値を$bに代入する</title>
</head>
<body>
<?php
$a = 0;
$b = ++$a;
echo "\$aは{$a}、\$bは{$b}";
?>
</body>
</html>
