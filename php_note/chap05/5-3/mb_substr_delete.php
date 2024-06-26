<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>最後の文字を削除する</title>
</head>
<body>
<pre>
<?php
$msg = "春はあけぼの。";
echo mb_substr($msg, 0, -1); // 最後の文字を削除する
?>
</pre>
</body>
</html>
