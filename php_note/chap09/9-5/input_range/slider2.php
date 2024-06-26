<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スライダー</title>
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
  // エラーを入れる配列
  $error = [];
  // 甘味の値の範囲
  $min = 1;
  $max = 5;
  // POSTされた値を取り出す
  if (isSet($_POST["taste"])){
    $taste = $_POST["taste"];
    // 値が整数かつ範囲内かどうかをチェックする
    $isTaste = ctype_digit($taste) && ($taste>=$min) && ($taste<=$max);
    if (!$isTaste){
      $error[] = "甘味の値にエラーがありました。";
      $taste = $min;
    }
  } else {
    // POSTされた値がないとき
    $taste = round(($min+$max)/2);
    $isTaste = true; // 初期値も甘味を表示する
  }
  ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li><span>甘味：</span>
        <input type="range" name="taste" step="1" <?php echo "min={$min} max={$max} value={$taste}";?>>
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

  <?php
    // 甘味が入力されていれば表示する
    if ($isTaste) {
      $tasteList = ["甘い", "少し甘い", "普通", "少し苦い", "苦い"];
      echo "<HR>";
      echo "甘味は「{$taste}.{$tasteList[$taste-1]}」です。";
    }
  ?>
  <?php
  // エラー表示
  if (count($error)>0){
    echo "<HR>";
    // 値を"<br>"で連結して表示する
    echo '<span class="error">', implode("<br>", $error), '</span>';
  }
  ?>
</div>
</body>
</html>
