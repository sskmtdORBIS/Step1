<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>メモを読み込む</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $filename = "memo.txt";
  try {
    // ファイルオブジェクトを作る（rb 読み込みのみ）
    $fileObj = new SplFileObject($filename, "rb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }

  // データを読み込む（先頭の5行）
  $fileObj->flock(LOCK_SH); // 共有ロック
  $data = new LimitIterator($fileObj, 0, 5);
  foreach ($data as $key => $value) {
    // 01〜05、ストリング、改行
    echo sprintf("%02d:　%s", $key+1, es($value)), "<br>";
  }
  $fileObj->flock(LOCK_UN);

  echo "<hr>", '<a href="input_memo.php">メモ入力ページへ</a>';
  ?>
</div>
</body>
</html>
