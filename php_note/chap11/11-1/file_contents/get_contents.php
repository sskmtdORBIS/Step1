<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ファイルを読み込む</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $filename = "mytext.txt";
  // ファイルがあるかどうか調べる
  $result = file_exists($filename);
  if ($result){
    // ファイルを読み込む
    $readdata = file_get_contents($filename);
    // HTMLエスケープ（<br>を挿入する前に行う）
    $readdata = es($readdata);
    // 改行コードの前に<br>を挿入する
    $readdata_br = nl2br($readdata, false);
    echo "{$filename}を読み込みました。", "<br>";
    echo $readdata_br, "<hr>";
    echo '<a href="put_contents.php">ファイルに書き込む</a>';
  } else {
    // ファイルエラー
    echo '<span class="error">ファイルを読み込めませんでした。</span>';
  }
  ?>
</div>
</body>
</html>
