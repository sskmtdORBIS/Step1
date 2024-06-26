<?php
require_once("../../lib/util.php");
// クッキーの値を取り出す
if (isset($_COOKIE["visitedCount"])){
  // 現在のカウンタの値を取り出す
  $visitedCount = $_COOKIE["visitedCount"];
} else {
  // クッキーがないのでカウンタに初期値を設定する
  $visitedCount = 0;
}
// クッキーの値をカウントアップする（テスト用に5分間有効）
$result = setcookie("visitedCount", ++$visitedCount, time()+60*5);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Page 1</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  if ($result) {
    echo "このページの訪問は", es($visitedCount), "回目です。", "<hr>";
    echo '<a href="page2.php">ページを移動する</a>', "<br>";
    echo '（<a href="reset_counter.php">リセットする</a>）';
  } else {
    echo '<span class="error">クッキーが利用できませんでした。</span>';
  }
  ?>
</div>
</body>
</html>
