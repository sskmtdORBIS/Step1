<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列の前後にある不要な文字を取り除く</title>
</head>
<body>
<pre>
<?php
$msg = "\tHello World!!   \n\n";
$result = trim($msg);
echo "処理前:" . PHP_EOL;
echo "[{$msg}]" . PHP_EOL;
echo "処理後:" . PHP_EOL;
echo "[{$result}]" . PHP_EOL;
?>
</pre>
</body>
</html>
