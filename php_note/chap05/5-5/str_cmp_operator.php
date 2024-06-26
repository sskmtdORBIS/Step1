<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>比較演算子で文字列の大小を比較する</title>
</head>
<body>
<pre>
<?php
function compare($a, $b){
  if($a < $b){
    echo "{$a}、{$b}の順。" . PHP_EOL;
  } else if($a == $b){
    echo "{$a}と{$b}は同じ。" . PHP_EOL;
  } else if($a > $b){
    echo "{$b}、{$a}の順。" . PHP_EOL;
  }
}
// 試す
compare("apple", "apple");
compare("apple", "beatles");
compare("apple", "android");
compare("apple", "APPLE");
?>
</pre>
</body>
</html>
