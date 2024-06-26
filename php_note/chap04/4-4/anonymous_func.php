<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>無名関数</title>
</head>
<body>
<?php
$myFunc = function(string $who){
  echo "{$who}さん、こんにちは！";
}; //代入文なのでセミコロンが必要

// 実行する
$myFunc("田中");
?>
</body>
</html>
