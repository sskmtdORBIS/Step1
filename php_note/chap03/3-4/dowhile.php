<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>合計が21になる３個の変数が決まるまで繰り返す</title>
</head>
<body>
<?php
do {
  // 変数に1〜13の乱数を入れる
  $a = mt_rand(1, 13);
  $b = mt_rand(1, 13);
  $c = mt_rand(1, 13);
  $abc = $a + $b + $c;
  // 合計が21になったらループを抜ける
  if ($abc == 21) {
  	break;
  }
} while (TRUE);
echo "合計が21になる３個の数字。{$a}、{$b}、{$c}";
?>
</body>
</html>
