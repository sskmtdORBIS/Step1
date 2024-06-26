<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ヒアドキュメント</title>
</head>
<?php
$version = 8;
$msg = <<< "EOD"
これから一緒に"PHP $version"を学びましょう。
本気出すよ。
EOD;
?>
<pre>
<?php
// ヒアドキュメントを表示する
echo $msg;
?>
</pre>
</body>
</html>
