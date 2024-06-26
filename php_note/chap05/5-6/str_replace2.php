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
$search = ["鈴木", "35歳"];
// 置換文字
$replace = ["A","x歳"];
// 対象文字列
$subject = "担当は鈴木さんです。鈴木さんは35歳の男性です。";
$result = str_replace($search, $replace, $subject);
echo "置換前：{$subject}", PHP_EOL;
echo "置換後：{$result}";
?>
</pre>
</body>
</html>
