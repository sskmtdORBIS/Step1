<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>print_r()で配列とオブジェクトの値を確認する</title>
</head>
<body>
<?php
$colors = array("red", "blue", "green");
$now = new DateTime();
print_r($colors);
print_r($now);
?>
</body>
</html>
