<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>前後にある全角空白と改行を削除する</title>
</head>
<body>
<pre>
<?php
$msg = "　東京都千代田区　\n\n";
$result = trim(mb_convert_kana($msg, "s"));
echo "処理前:" . PHP_EOL;
echo "[{$msg}]" . PHP_EOL;
echo "処理後:" . PHP_EOL;
echo "[{$result}]" . PHP_EOL;
?>
</pre>
</body>
</html>
