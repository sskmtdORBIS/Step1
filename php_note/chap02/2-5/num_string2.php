<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列を使った計算式</title>
</head>
<body>
<?php
# error_reporting(0); # WARNINGが出力されないようにしたいときに実行する
$a = 2 + "15";
$b = 2.3 + "1.25";
$c = 2 + "-4";
$d = " 5 " + " 6 ";
$e = "5  6" +  7; # Warningが発生
$f = "1.2e-3" * 2;
$g = "250円" * 2; # Warningが発生
# $h = "番号 99" + 1; # Fatal errorで中断
# $i = 10 + "円"; # Fatal errorで中断

echo "a {$a}、b {$b}、c {$c}、d {$d}、e {$e}、f {$f}、g {$g}";
?>
</body>
</html>
