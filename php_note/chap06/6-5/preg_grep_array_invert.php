<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を正規表現で検索する</title>
</head>
<body>
<pre>
<?php
$data = ["R5", "E2", "E6", "A8", "R1", "G8"];
$pattern = "/['A'|'R']/";
// パターンにマッチしない値を配列からすべて取り出す
$result = preg_grep($pattern, $data, PREG_GREP_INVERT);
echo "該当しない" . count($result) . "件" .  PHP_EOL;
// 値を改行で連結して文字列にする
$resultString = implode(PHP_EOL, $result);
echo $resultString;
// 値を１個ずつ取り出して表示した場合
// foreach ($result as $value) {
//   echo $value , PHP_EOL;
// }
?>
</pre>
</body>
</html>
