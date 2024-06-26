<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>可変関数</title>
</head>
<body>
<?php
function hello($who){
  echo "{$who}さん、こんにちは！";
}

function bye($who){
  echo "{$who}さん、さよなら！";
}

// 実行する関数名
$msg = "bye";
// 関数が存在したら実行する
if (function_exists($msg)){
  $msg("金太郎");
}
?>
</body>
</html>
