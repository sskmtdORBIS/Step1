<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>strcmp()を使って比較する</title>
</head>
<body>
<pre>
<?php
function compareStr($a, $b){
  // 文字列にキャストして比較する
  $result = strcmp($a, $b);
  if($result < 0){
    echo "{$a}、{$b}の順。" . PHP_EOL;
  } else if($result === 0){
    echo "{$a}と{$b}は同じ。" . PHP_EOL;
  } else if($result > 0){
    echo "{$b}、{$a}の順。" . PHP_EOL;
  }
}
// 試す
compareStr("123", 99);
compareStr("A123", 99);
compareStr("009", 99);
?>
</pre>
</body>
</html>
