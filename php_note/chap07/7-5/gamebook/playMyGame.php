<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MyGameクラスを読み込んで遊ぶ</title>
</head>
<body>
<pre>
<?php
  // MyGameクラスファイルを読み込む
  require_once("MyGame.php");
  // MyGameクラスのインスタンスを作る
  $myPlayer = new MyGame(coins: 3);
  for ($i=0; $i<10; $i++){
    $kai = $i + 1;
    echo "{$kai}回目:";
    $myPlayer->play();
    if (! $myPlayer->isAlive()) {
      break;
    }
  }
  echo "ゲーム終了" . PHP_EOL;
?>
</pre>
</body>
</html>
