<?php
require_once("../../lib/util.php");
// セッションの開始
session_start();
?>

<?php
// 文字エンコードの検証
if (!cken($_POST)){
  $encoding = mb_internal_encoding();
  $err = "Encoding Error! The expected encoding is " . $encoding ;
  // エラーメッセージを出して、以下のコードをすべてキャンセルする
  exit($err);
}
?>

<?php
// POSTされた値をセッション変数に受け渡す
if (isset($_POST['name'])){
  $_SESSION['name'] = trim(mb_convert_kana($_POST['name'], "s"));
}
if (isset($_POST['kotoba'])){
  $_SESSION['kotoba'] = trim(mb_convert_kana($_POST['kotoba'], "s"));
}
// 入力データの取り出しとチェック
$error = [];
// 名前
if (empty($_SESSION['name'])){
  // 未設定のときエラー
  $error[] = "名前を入力してください。";
} else {
  // 名前を取り出す
  $name = $_SESSION['name'];
}
// 好きな言葉
if (empty($_SESSION['kotoba'])){
  // 未設定のときエラー
  $error[] = "好きな言葉を入力してください。";
} else {
  // 好きな言葉を取り出す
  $kotoba = $_SESSION['kotoba'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>確認ページ</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <form>
  <?php if (count($error)>0){ ?>
    <!-- エラーがあったとき -->
    <span class="error"><?php echo implode('<br>', $error); ?></span><br>
    <span>
      <input type="button" value="戻る" onclick="location.href='input.html'">
    </span>
  <?php } else { ?>
    <!-- エラーがなかったとき -->
    <span>
      名前：<?php echo es($name); ?><br>
      好きな言葉：<?php echo es($kotoba); ?><br>
      <input type="button" value="戻る" onclick="location.href='input.html'">
      <input type="button" value="送信する" onclick="location.href='thankyou.php'">
    </span>
  <?php } ?>
  </form>
</div>
</body>
</html>
