<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字の検索置換</title>
</head>
<body>
<pre>
<?php
$subject = "Apple Pie";
// 大文字小文字を区別せずに置換する
$result = str_ireplace("p", "?", $subject, $count);
echo "置換前：{$subject}", PHP_EOL;
echo "置換後：{$result}", PHP_EOL;
echo "個数：{$count}";
?>
</pre>
</body>
</html>
