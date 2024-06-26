<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字の検索置換</title>
</head>
<body>
<pre>
<?php
// 同じ文字列を使って別の語句に置換する
$subject = "我輩は猫である。";
echo str_replace("猫", "犬", $subject), PHP_EOL;
echo str_replace("猫", "馬", $subject), PHP_EOL;
echo $subject;
?>
</pre>
</body>
</html>
