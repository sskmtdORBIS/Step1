<?php
// セッションの開始
session_start();
require_once("../../lib/util.php");

// $_POST変数に値があれば セッション変数に受け渡す
if (isset($_POST['name'])){
  $_SESSION['name'] = trim(mb_convert_kana($_POST['name'], "s"));
}
if (isset($_POST['kotoba'])){
  $_SESSION['kotoba'] = trim(mb_convert_kana($_POST['kotoba'], "s"));
}
// セッション変数に値があれば受け渡す
if (empty($_SESSION['dogcat'])){
  $dogcat = [];
} else {
  $dogcat = $_SESSION['dogcat'];
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

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>犬好き猫好きページ</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  アンケート（２／２）<br>
  <form method="POST" action="confirm.php">
    <ul>
      <li><span>犬が好きですか？猫が好きですか?</span><br>
      <label><input type="checkbox" name="dogcat[]" value="犬" <?php checked("犬", $dogcat); ?> >犬が好き</label><br>
      <label><input type="checkbox" name="dogcat[]" value="猫" <?php checked("猫", $dogcat); ?> >猫が好き</label>
      </li>
      <input type="button" value="戻る" onclick="location.href='input.php'">
      <input type="submit" value="確認する">
    </ul>
  </form>
</div>
</body>
</html>
