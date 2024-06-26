<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>クッキーを確認する</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  // クッキーの値を取り出す
  if (isset($_COOKIE["fruits"])){
    // 訪問ログの値を取り出す
    $valueString = $_COOKIE["fruits"];
    // 値を配列にする
    $fruits = explode("&", $valueString);
    // HTMLエスケープする
    $fruits = es($fruits);
    // 配列の値を列挙する
    echo "好きなフルーツ：", "<br>";
    echo implode("<br>", $fruits), "<hr>";
  } else {
    echo "クッキーはありません。", "<hr>";
  }
  ?>
  <a href="set_cookie.php">戻る</a>
</div>
</body>
</html>
