<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>throwテスト</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div><pre>
<?php
// 1〜10の整数を5倍にして返す
function makeValue(int $num): int {
  if ($num<=0 or $num>10) {
    throw new Exception("制限値外エラー ");
  }
  return $num * 5;
}
// makeValue()を例外処理の構文で試す
try {
  $value1 = makeValue(8);
  echo "結果１：{$value1}" . PHP_EOL;
  $value2 = makeValue(123);
  echo "結果２：{$value2}" . PHP_EOL;
  $value3 = makeValue(7);
  echo "結果３：{$value3}" . PHP_EOL;
} catch (Exception $e){
  $err = $e->getMessage();
  exit($err);
}
?>
</pre></div>
</body>
</html>
