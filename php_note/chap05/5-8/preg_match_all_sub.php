<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>サブパターンの値を取り出す</title>
</head>
<body>
<pre>
<?php
// 2013のA〜F型を探す。
$pattern = "/2013([A-F])-(..)/i";
$subject = "2012A-sx, 2013F-fx, 2013G-fx, 2013A-dx, 2015a-sx";
$result = preg_match_all($pattern, $subject, $matches);
// 実行結果をチェックする
if ($result === false) {
  echo "エラー：", preg_last_error();
} else if ($result == 0){
  echo "マッチした型式はありません。";
} else {
  // 配列の値を取り出して文字列に連結する
  $all =  implode("、", $matches[0]);
  $model =  implode("、", $matches[1]);
  $type =  implode("、", $matches[2]);
  echo "見つかった型式：{$all}", PHP_EOL;
  echo "モデル：{$model}", PHP_EOL;
  echo "タイプ：{$type}", PHP_EOL;
}
?>
</pre>
</body>
</html>
