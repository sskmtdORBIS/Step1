<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列に乱数が5個追加されるまで繰り返す</title>
</head>
<body>
<pre>
<?php
// 空の配列を作る
$numArray = array();
// 配列$numArrayの値が５個になるまで繰り返す
while (count($numArray) < 5){
  // 1〜30から乱数を１個作る
  $num = mt_rand(1,30);
  // $numArrayに含まれているかどうか調べる
  if (! in_array($num, $numArray)) {
    // $numArrayに含まれていなければ追加する
    array_push($numArray, $num);
  }
}
// ５個の数値が入った配列を確認する
print_r($numArray);
?>
</pre>
</body>
</html>
