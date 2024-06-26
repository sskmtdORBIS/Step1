<?php
$date = date("Y/n/j G:i:s", time());
$writedata = <<< "EOD"
ヒアドキュメントならば、
途中で改行したり、
変数を使った文章が作れますね。
更新日：$date
EOD;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ファイルに保存</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $filename = "mytext.txt";
  // ファイルが存在しなければ作成する（あればファイル更新日を更新する）
  $result = touch($filename);
  if ($result){
    // ファイルに書き出す
    file_put_contents($filename, $writedata, LOCK_EX);
    echo "{$filename}にデータを書き出しました。", "<hr>";
    echo '<a href="get_contents.php">ファイルを読み込む</a>';
  } else {
    // ファイルエラー
    echo '<span class="error">ファイルに保存できませんでした。</span>';
  }
  ?>
</div>
</body>
</html>
