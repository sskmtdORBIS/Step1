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
  if (isset($_COOKIE["gamedata"])){
    // ゲームデータの値を取り出す
    $dataQueryString = $_COOKIE["gamedata"];
    // クエリ文字列から連想配列を作る
    parse_str($dataQueryString, $gamedata);
    // HTMLエスケープ
    $gamedata = es($gamedata);
    // 連想配列の値を列挙する
    foreach ($gamedata as $key => $value) {
      echo "{$key}：{$value}", "<br>";
    }
    echo "<hr>";
  } else {
    echo "クッキーはありません。", "<hr>";
  }
  ?>
  <a href="set_cookie.php">戻る</a>
</div>
</body>
</html>
