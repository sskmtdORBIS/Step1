<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>マッチした値をすべて取り出す</title>
</head>
<body>
<pre>
<?php
// 2012〜2015のAX型またはFX型を探す。小文字でもよい。
$pattern = "/201[2-5](AX|FX)/i";
$subject = "2011AX, 2012Fx, 2012AF, 2013FX, 2015ax, 2016Fx";
$result = preg_match_all($pattern, $subject, $matches);
// 実行結果をチェックする
if ($result === false) {
  echo "エラー：", preg_last_error();
} else if ($result == 0){
  echo "マッチした型式はありません。";
} else {
  echo "{$result}個マッチしました。" . PHP_EOL";
  // 配列の値を取り出して文字列に連結する
  echo implode("、", $matches[0]);
}
?>
</pre>
</body>
</html>
