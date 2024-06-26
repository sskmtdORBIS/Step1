<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>年月日プルダウンメニュー</title>
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
  // 日付の初期値（本日）
  $theYear = date('Y');
  $theMonth = date('n');
  $theDay = date('j');
  // エラーを入れる配列
  $error = [];
  // POSTされた値を取り出す
  if (isSet($_POST["year"])&&isSet($_POST["month"])&&isSet($_POST["day"])){
    $theYear = $_POST["year"];
    $theMonth = $_POST["month"];
    $theDay = $_POST["day"];
    // 値が日付として正しいかチェックする
    $isDate = checkdate($theMonth, $theDay, $theYear);
    if (!$isDate){
      $error[] = "日付として正しくありません。";
    }
  } else {
    $isDate = false;
  }
  ?>

 <?php
 // 今年の前後5年のプルダウンメニューを作る
 function yearOption(){
   global $theYear;
   // 今年
   $thisYear = date('Y');
   $startYear = $thisYear - 5;
   $endYear = $thisYear + 5;
   echo '<select name="year">' . PHP_EOL;
   for ($i=$startYear; $i <= $endYear; $i++) {
     // POSTされた年を選択する
     if ($i==$theYear){
       echo "<option value={$i} selected>{$i}</option>" . PHP_EOL;
     } else {
       echo "<option value={$i}>{$i}</option>" . PHP_EOL;
     }
   }
   echo '</select>';
 }

  // 1〜12月のプルダウンメニューを作る
 function monthOption(){
   global $theMonth;
   echo '<select name="month">';
   for ($i=1; $i <= 12; $i++) {
     // POSTされた月を選択する
     if ($i==$theMonth){
       echo "<option value={$i} selected>{$i}</option>" . PHP_EOL;
     } else {
       echo "<option value={$i}>{$i}</option>" . PHP_EOL;
     }
   }
   echo '</select>';
 }

 // 1〜31日のプルダウンメニューを作る
 function dayOption(){
   global $theDay;
   echo '<select name="day">';
   for ($i=1; $i <= 31; $i++) {
     // POSTされた日を選択する
     if ($i==$theDay){
       echo "<option value={$i} selected>{$i}</option>" . PHP_EOL;
     } else {
       echo "<option value={$i}>{$i}</option>" . PHP_EOL;
     }
   }
   echo '</select>';
 }
?>

  <!-- 年月日のプルダウンメニューを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li>
        <?php yearOption(); ?>年
        <?php monthOption();?>月
        <?php dayOption(); ?>日
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

    <?php
      // 正しい日付であれば表示する
      if ($isDate) {
        // 日付オブジェクトを作る
        $dateString = $theYear . "-". $theMonth . "-" . $theDay;
        $dateObj = new DateTime($dateString);
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
