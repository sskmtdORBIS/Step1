<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Milkクラスを読み込んで利用する</title>
</head>
<body>
<pre>
<?php
  // Milkクラスファイルを読み込む
  require_once("Milk.php");
  // Milkクラスのインスタンスを作る
  $myMilk = new Milk();
  echo "作成日:", $myMilk->theDate;
  echo PHP_EOL;
  echo "期限日:", $myMilk->limitDate;
?>
</pre>
</body>
</html>
