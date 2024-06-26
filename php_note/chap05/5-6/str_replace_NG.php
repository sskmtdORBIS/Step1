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
$search = ["XG", "P10"];
// 置換文字
$replace = ["XP","P10a"];
// 対象文字列
$subject = "XG90, XG100, P10, P15";
$result = str_replace($search, $replace, $subject);
echo "置換前：{$subject}", PHP_EOL;
echo "置換後：{$result}";
?>
</pre>
</body>
</html>
