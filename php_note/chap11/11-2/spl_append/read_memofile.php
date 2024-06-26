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
    // ファイルオブジェクトを作る（rb 読み込み専用）
    $fileObj = new SplFileObject($filename, "rb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }

  // ファイルロック（共有ロック）
  $fileObj->flock(LOCK_SH);
  // ストリングを読み込む
  $readdata = $fileObj->fread($fileObj->getSize());
  // アンロック
  $fileObj->flock(LOCK_UN);

  if (!($readdata === FALSE)){
    // HTMLエスケープ（<br>を挿入する前に行う）
    $readdata = es($readdata);
    // 改行コードの前に<br>を挿入する
    $readdata_br = nl2br($readdata, false);
    echo "{$filename}を読み込みました。", "<br>";
    echo $readdata_br, "<hr>";
    echo '<a href="input_memo.php">メモ入力ページへ</a>';
  } else {
    // ファイルエラー
    echo '<span class="error">ファイルを読み込めませんでした。</span>';
  }
  ?>
</div>
</body>
</html>
