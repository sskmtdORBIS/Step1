<?php
require_once("../../lib/util.php");
// セッションの開始
session_start();
$error = [];
// セッションのチェック
if (!empty($_SESSION['name']) && !empty($_SESSION['kotoba'])){
  // セッション変数から値を取り出す
  $name = $_SESSION['name'];
  $kotoba = $_SESSION['kotoba'];
} else {
  $error[] = "セッションエラーです。";
}
// HTMLを表示する前にセッションを破棄する
killSession();
?>

<?php
// セッションを破棄する
function killSession(){
  // セッション変数の値を空にする
  $_SESSION = [];
  // セッションクッキーを破棄する
  if (isset($_COOKIE[session_name()])){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time()-36000, $params['path']);
  }
  // セッションを破棄する
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>完了ページ</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php if (count($error)>0){ ?>
    <!-- エラーがあったとき -->
    <span class="error"><?php echo implode('<br>', $error); ?></span><br>
    <a href="input.html">最初のページに戻る</a>
  <?php } else { ?>
    <!-- エラーがなかったとき -->
    <span>
      次のように受付けました。ありがとうございました。
      <HR>
      <span>
        名前：<?php echo es($name); ?><br>
        好きな言葉：<?php echo es($kotoba); ?><br>
        <a href="input.html">最初のページに戻る</a>
      </span>
  <?php } ?>
</div>
</body>
</html>
