<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>金額の計算</title>
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
  // エラーメッセージを入れる配列
  $errors = [];
  //クーポンコード
  if (isset($_POST['couponCode'])) {
    $couponCode = $_POST['couponCode'];
  } else {
    // 未設定エラー
    $couponCode = "";
  }
  //商品ID
  if (isset($_POST['goodsID'])) {
    $goodsID = $_POST['goodsID'];
  } else {
    // 未設定エラー
    $goodsID = "";
  }
?>

<?php
  // セールデータを読み込む
  require_once("saleData.php");
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
  // 個数の入力値
  if(isset($_POST['kosu'])) {
    $kosu = $_POST['kosu'];
    // 入力値のチェック
    if (!ctype_digit($kosu)){
      // 整数ではないときエラー
      $errors[] = "個数は整数で入力してください。";
    }
  } else {
    // 未設定エラー
    $errors[] = "個数が未設定";
  }
?>

<?php
if (count($errors)>0){
  //エラーがあったとき
  echo '<ol class="error">';
  foreach ($errors as $value) {
    echo "<li>", $value , "</li>";
  }
  echo "</ol>";
} else {
  // エラーがなかったとき（端数は切り捨て）
  $price = $tanka * $kosu;
  $discount_price = floor($price * $discount);
  $off_price = $price - $discount_price;
  $off_per = (1 - $discount)*100;
  // ３桁位取り
  $tanka_fmt = number_format($tanka);
  $discount_price_fmt = number_format($discount_price);
  $off_price_fmt = number_format($off_price);
  // 表示する
  echo "単価：{$tanka_fmt}円、", "個数：{$kosu}個", "<br>";
  echo "金額：{$discount_price_fmt}円", "<br>";
  echo "（割引：-{$off_price_fmt}円、{$off_per}% OFF)", "<br>";
}
?>

<!-- 戻りボタンのフォーム -->
  <form method="POST" action="discountForm.php">
    <!-- 隠しフィールドに個数を設定してPOSTする -->
    <input type="hidden" name="kosu" value="<?php echo $kosu; ?>">
    <ul>
      <li><input type="submit" value="戻る"></li>
    </ul>
  </form>

</div>
</body>
</html>
