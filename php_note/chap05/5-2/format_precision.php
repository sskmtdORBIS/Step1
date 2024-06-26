<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>小数点以下の桁数、値の文字数を指定する</title>
</head>
<body>
<?php
$a = 10.2582;
$b = 3.1;
$c = "Hypertext Preprocessor！";
printf('結果は%.2fです。', $a);
printf('結果は%.02fです。', $b);
printf('PHPは%.5s ...', $c);
?>
</body>
</html>
