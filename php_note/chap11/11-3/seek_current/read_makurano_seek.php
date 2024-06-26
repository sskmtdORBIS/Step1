<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>枕草子を読み込む seek</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  $filename = "makuranosoushi.txt";
  try {
    // ファイルオブジェクトを作る（rb 読み込みのみ）
    $fileObj = new SplFileObject($filename, "rb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }

  // 行を読み込む
  $fileObj->seek(3);
  echo $fileObj->key(), ": ", $fileObj->current(), "<br>";
  $fileObj->next();
  echo $fileObj->key(), ": ", $fileObj->current();
?>
</div>
</body>
</html>
