<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>割引購入ページ</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
    require_once("../../lib/util.php");
    // 文字エンコードの検証
    if (!cken($_POST)){
      $encoding = mb_internal_encoding();
      $err = "Encoding Error! The expected encoding is " . $encoding ;
      // エラーメッセージを出して、以下のコードをすべてキャンセルする
      exit($err);
    }
    // HTMLエスケープ（XSS対策）
    $_POST = es($_POST);
  ?>

  <?php
    /* 再入力ならば前回の値を初期値にする */
    // 個数に値があるかどうか
    if (isset($_POST['kosu'])){
      $kosu = $_POST['kosu'];
    } else {
      $kosu = "";
    }
  ?>

  <?php
    // セールデータを読み込む
    require_once("saleData.php");
    // クーポンコードと商品ID
    $couponCode = "ha45as";
    $goodsID = "ax102";
    // 割引率と単価
    $discount = getCouponRate($couponCode);
    $tanka = getPrice($goodsID);
    // 割引率と単価に値があるかどうかチェックする
    if (is_null($discount)||is_null($tanka)){
      // エラーメッセージを出して、以下のコードをすべてキャンセルする
      $err = '<div class="error">不正な操作がありました。</div>';
      exit($err);
    }
  ?>

  <?php
    $off = (1 - $discount)*100;
    if ($discount>0){
      echo "<h2>このページでのご購入は{$off}% OFFになります！</h2>";
    }
    // ３桁位取り
    $tanka_fmt = number_format($tanka);
  ?>

  <!-- 入力フォームを作る -->
  <form method="POST" action="discount.php">
    <!-- 隠しフィールドにクーポンコードと商品IDを設定してPOSTする -->
    <input type="hidden" name="couponCode" value="<?php echo $couponCode; ?>">
    <input type="hidden" name="goodsID" value="<?php echo $goodsID; ?>">
    <ul>
      <li><label>単価：<?php echo $tanka_fmt; ?>円</label></li>
      <li><label>個数：
        <input type="number" name="kosu" value="<?php echo $kosu; ?>">
      </label></li>
      <li><input type="submit" value="計算する" ></li>
    </ul>
  </form>
</div>
</body>
</html>
