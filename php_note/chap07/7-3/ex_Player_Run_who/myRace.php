<?php
  // クラスファイルを読み込む
  require_once("Runner.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Runnerクラスを利用する</title>
</head>
<body>
<?php
  // Runnerクラスのインスタンスを作る
  $runner1 = new Runner(name:"福士", age:23);
  // オーバーライドしたwho()を試す
  $runner1->who();
?>
</body>
</html>
