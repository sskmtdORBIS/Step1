<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>半角英数文字だけの文字列から文字を抜き出す</title>
</head>
<pre>
<?php
$id = "ABC1X239JP";
echo substr($id, 4), PHP_EOL; // 5文字目から最後まで
echo substr($id, 5, 3), PHP_EOL; // 6文字目から3文字
echo substr($id, -2); // 最後から2文字
?>
</pre>
</body>
</html>
