<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を正規表現で検索する</title>
</head>
<body>
<pre>
<?php
$nameList = ["田中達也", "川崎賢一", "山田一郎", "杉山直樹"];
$pattern = "/田/";
// パターンにマッチする値を配列からすべて取り出す
$result = preg_grep($pattern, $nameList);
echo "該当" . count($result) . "件" . PHP_EOL;
foreach ($result as $value) {
  echo $value , PHP_EOL;
}
?>
</pre>
</body>
</html>
