<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>リストボックス</title>
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
  if (isSet($_POST["meal"])){
    // 「食事」かどうか確認する
    $meals = ["朝食","夕食"];
    // $mealsに含まれていない値があれば取り出す
    $diffValue = array_diff($_POST["meal"], $meals);
    // 規定外の値が含まれていなければtrue
    if (count($diffValue)==0){
      // チェックされている値を取り出す
      $mealSelected = $_POST["meal"];
    } else {
      $mealSelected = [];
      $error[] = "「食事」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $mealSelected = [];
  }

  // POSTされた「ツアー」を取り出す
  if (isSet($_POST["tour"])){
    // 「ツアー」かどうか確認する
    $tours = ["カヌー","MTB", "トレラン"];
    // $toursに含まれていない値があれば取り出す
    $diffValue = array_diff($_POST["tour"], $tours);
    // 規定外の値が含まれていなければtrue
    if (count($diffValue)==0){
      // チェックされている値を取り出す
      $tourSelected = $_POST["tour"];
    } else {
      $tourSelected = [];
      $error[] = "「ツアー」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $tourSelected = [];
  }
  ?>

  <?php
  // 選択状態にするかどうか決める
  function selected(string $value, array $selectedValues) {
    // 選択する値に含まれているかどうか調べる
    $isSelected = in_array($value, $selectedValues);
    if ($isSelected) {
      // 選択状態にする
      echo "selected";
    }
  }
  ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li><span>食事：</span>
        <select name="meal[]" size="2" multiple>
          <option value="朝食" <?php selected("朝食", $mealSelected); ?> >朝食</option>
          <option value="夕食" <?php selected("夕食", $mealSelected); ?> >夕食</option>
      </select>
      </li>
      <li><span>ツアー：</span>
        <select name="tour[]" size="3" multiple>
          <option value="カヌー" <?php selected("カヌー", $tourSelected) ; ?> >カヌー</option>
          <option value="MTB" <?php selected("MTB", $tourSelected); ?> >MTB</option>
          <option value="トレラン" <?php selected("トレラン", $tourSelected); ?> >トレラン</option>
        </select>
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

  <?php
    // 「食事」と「ツアー」が入力されていれば結果を表示する
    $isSelected = count($mealSelected)>0 || count($tourSelected)>0;
    if ($isSelected) {
      echo "<HR>";
      // 値を”と”で連結して表示する
      echo "お食事：", implode("と", $mealSelected), "<br>";
      echo "ツアー：", implode("と", $tourSelected), "<br>";
    } else {
      echo "<HR>";
      echo "選択されているものはありません。";
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
