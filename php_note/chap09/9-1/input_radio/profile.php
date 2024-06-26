<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ラジオボタン</title>
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
  // POSTされた「性別」を取り出す
  if (isSet($_POST["sex"])){
    // 性別かどうか確認する
    $sexValues = ["男性","女性"];
    // $sexValuesに含まれている値ならばtrue
    $isSex = in_array($_POST["sex"], $sexValues);
    if ($isSex){
      // 選択されている値を取り出す
      $sex = $_POST["sex"];
    } else {
      $sex = "error";
      $error[] = "「性別」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $isSex = false;
    $sex = "男性";
  }
  // POSTされた「結婚」を取り出す
  if (isSet($_POST["marriage"])){
    // 「結婚」かどうか確認する
    $marriageValues = ["独身","既婚", "同棲中"];
    // $marriageValuesに含まれている値ならばtrue
    $isMarriage = in_array($_POST["marriage"], $marriageValues);
    if ($isMarriage){
      // 選択されている値を取り出す
      $marriage = $_POST["marriage"];
    } else {
      $marriage = "error";
      $error[] = "「結婚」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $isMarriage = false;
    $marriage = "独身";
  }
  ?>

  <?php
  // チェック状態にするかどうか決める
  function checked(string $value, array $checkedValues) {
    // 選択する値に含まれているかどうか調べる
    $isChecked = in_array($value, $checkedValues);
    if ($isChecked) {
      // チェック状態にする
      echo "checked";
    }
  }
 ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li><span>性別：</span>
        <label><input type="radio" name="sex" value="男性" <?php checked("男性", [$sex]); ?> >男性</label>
        <label><input type="radio" name="sex" value="女性" <?php checked("女性", [$sex]); ?> >女性</label>
      </li>
      <li><span>結婚：</span>
        <label><input type="radio" name="marriage" value="独身" <?php checked("独身", [$marriage]) ; ?> >独身</label>
        <label><input type="radio" name="marriage" value="既婚" <?php checked("既婚", [$marriage]); ?> >既婚</label>
        <label><input type="radio" name="marriage" value="同棲中" <?php checked("同棲中", [$marriage]); ?> >同棲中</label>
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

  <?php
    // 「性別」と「結婚」が受信されていれば結果を表示する
    $isSubmited = $isSex && $isMarriage;
    if ($isSubmited) {
      echo "<HR>";
      echo "あなたは「{$sex}、{$marriage}」です。";
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
