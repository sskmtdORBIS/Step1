<?php
// セッションの開始
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>セッション開始ページ</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  このページから購入するとクーポン割引が適用されます。<br>
  <?php
  // セッション変数に値を代入する
  $_SESSION["coupon"] = "ABC123";
  ?>
  <a href="goal_page.php">次のページへ</a>
</div>
</body>
</html>
