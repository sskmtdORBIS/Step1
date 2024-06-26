<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>３桁区切りし、小数第２位まで表示する</title>
</head>
<body>
<?php
$num = 235.365;
$length = number_format($num, 2);
echo $length, "m";
?>
</body>
</html>
