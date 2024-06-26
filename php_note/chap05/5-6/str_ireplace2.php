<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字の検索置換</title>
</head>
<body>
<pre>
<?php
// 検索文字
$search = ["p", "e"];
// 対象文字列
$subject = "a piece of the apple pie";
// 大文字小文字を区別せずに置換する
$result = str_ireplace($search, "?", $subject, $count);
echo "置換前：{$subject}", PHP_EOL;
echo "置換後：{$result}", PHP_EOL;
echo "個数：{$count}";
?>
</pre>
</body>
</html>
