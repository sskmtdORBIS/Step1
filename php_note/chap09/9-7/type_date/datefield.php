<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>日付フィールド</title>
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
  // POSTされた日付を取り出す
  if (! isSet($_POST["theDate"])){
    $isDate = false;
    $postDate = "";
  } else {
    // 日付文字列を取り出す
    $postDate = trim($_POST["theDate"]);
    // 全角を半角にする
    $postDate = mb_convert_kana($postDate, "as");
    // 日付形式のパターン(YYYY-MM-DDまたはYYYY/MM/DD)
    $pattern1 = preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $postDate);
    $pattern2 = preg_match("#^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$#", $postDate);
    // 年月日を配列にする
    if ($pattern1){
      $dateArray = explode("-", $postDate);
    }
    if ($pattern2){
      $dateArray = explode("/", $postDate);
    }
    if ($pattern1||$pattern2){
      // 正しい日付形式だったとき
      $theYear = $dateArray[0];
      $theMonth = $dateArray[1];
      $theDay = $dateArray[2];
      // 日付の妥当性チェック
      $isDate = checkdate($theMonth, $theDay, $theYear);
      if (! $isDate){
        $error[] = "日付として正しくありません。";
      }
    } else {
      // 正しい日付形式ではなかったとき
      $today = new DateTime();
      $today1 = $today->format("Y-n-j");
      $today2 = $today->format("Y/n/j");
      $error[] ="日付は次のどちらかの形式で入力してください。<br>{$today1} または {$today2}";
      $isDate = false;
    }
  }
  ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li><span>日付を選ぶ：</span>
        <input type="date" name="theDate" value=<?php echo "{$postDate}" ?>>
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

  <?php
  // 正しい日付であれば表示する
  if ($isDate) {
    // 日付オブジェクトを作る
    $dateObj = new DateTime($postDate);
    // 日付を年月日の書式にする
    $date = $dateObj->format("Y年m月d日");
    // 日付から曜日を求める
    $w = (int)$dateObj->format("w");
    $week = ["日", "月", "火", "水", "木", "金", "土"];
    $youbi = $week[$w];
    echo "<HR>";
    echo "{$date}は、{$youbi}曜日です。";
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
