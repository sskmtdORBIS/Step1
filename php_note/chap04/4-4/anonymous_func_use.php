<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>無名関数で使う変数に値を設定する</title>
</head>
<body>
<?php
// 無名関数で使う変数に値を設定する
$msg = "ありがとう";
$myFunc = function (string $who) use ($msg){
  echo "{$who}さん、" . $msg,  PHP_EOL;
};

// $myFuncへの代入後に$msgの値を変更する
$msg = "さようなら";

// 実行する
$myFunc("田中");
$myFunc("佐藤");
?>
</body>
</html>
