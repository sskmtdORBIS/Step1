<?php
require_once("../../lib/util.php");
// セッションの開始
session_start();
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
  <?php
    // セッション変数を調べる
    if(isset($_SESSION["coupon"])){
      // クーポンコードを取り出す
      $coupon = $_SESSION["coupon"];
      // 正しいクーポンコード
      $couponList = ["ABC123", "XYZ999"];
      // クーポンコードをチェックする
      if (in_array($coupon, $couponList)){
        echo es($coupon), "は、正しいクーポンコードです。";
      } else {
        echo es($coupon), "は、誤ったクーポンコードです。";
      }
    } else {
      echo "セッションエラーです";
    }
   ?>
</div>
</body>
</html>
