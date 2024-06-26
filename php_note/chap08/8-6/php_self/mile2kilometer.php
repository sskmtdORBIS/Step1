<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>計算ページ</title>
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
  // POSTされた値を取り出す
  if (isset($_POST["mile"])){
    // 数値かどうか確認する
    $isNum = is_numeric($_POST["mile"]);
    if ($isNum){
      // 数値ならば計算式とフォーム表示の値で使う
      $mile = $_POST["mile"];
      $error = "";
    } else {
      $mile = "";
      $error = '<span class="error">←数値を入力してください。</span>';
    }
  } else {
    // POSTされた値がないとき
    $isNum = false;
    $mile = "";
    $error = "";
  }
  ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li>
        <label>マイルをkmに換算：
        <input type="text" name="mile" value="<?php echo $mile; ?>">
        </label>
        <!-- エラー表示 -->
        <?php echo $error; ?>
      </li>
      <li><input type="submit" value="計算する"></li>
    </ul>
  </form>

  <?php
    // $mileが数値であれば計算結果を表示する
    if ($isNum) {
      echo "<HR>";
      $kilometer = $mile * 1.609344;
      echo "{$mile}マイルは{$kilometer}kmです。";
    }
  ?>
</div>
</body>
</html>
