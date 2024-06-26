<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>パターンと置換文字を配列で指定する</title>
</head>
<body>
<pre>
<?php
// 開催日と開始時間を配列で置換する
$pattern = ["/開催日/u", "/開始時間/u"];
$replacement = ["金曜日", "午後2:30"];
$subject = "次回は開催日の開始時間からです。";
$result = preg_replace($pattern,$replacement, $subject);
echo $result;
?>
</pre>
</body>
</html>
