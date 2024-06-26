<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>割り勘計算</title>
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
?>

<?php
  // 合計金額のチェック
  if (isset($_POST['goukei'])){
    $goukei = $_POST['goukei'];
    if (!ctype_digit($goukei)){
      // 0以上の整数ではないときエラー
      $errors[] = "合計金額を整数で入力してください。";
    }
  } else {
    // 未設定のエラー
    $errors[] = "合計金額が未設定";
  }
  // 人数のチェック
  if (isset($_POST['ninzu'])){
    $ninzu = $_POST['ninzu'];
    if (!ctype_digit($ninzu)){
      // 0以上の整数ではないときエラー
      $errors[] = "人数を整数で入力してください。";
    } else if ($ninzu==0) {
      // 0のときエラー
      $errors[] = "0人では割れません。";
    }
  } else {
    // 未設定エラー
    $errors[] = "人数が未設定";
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
?>

<!-- 戻るボタンのフォーム -->
  <form method="POST" action="warikanForm.php">
    <ul>
      <li><input type="submit" value="戻る"></li>
    </ul>
  </form>

<?php
} else {
  // エラーがなかったとき
  $amari = $goukei % $ninzu;
  $price = ($goukei - $amari) / $ninzu;
  // ３桁位取り
  $goukei_fmt = number_format($goukei);
  $price_fmt = number_format($price);
  // 表示する
  echo "{$goukei_fmt}円を{$ninzu}人で割り勘します。", "<br>";
  echo "１人当たり{$price_fmt}円を支払えば、不足分は{$amari}円です。";
}
?>
</div>
</body>
</html>
