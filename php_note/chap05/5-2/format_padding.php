<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字数に足りない部分は0や*で埋める</title>
</head>
<body>
<?php
$a = 7;
$b = 2380;
printf('番号は%03dです。', $a);
printf("請求額は%'*6d円", $b);
?>
</body>
</html>
