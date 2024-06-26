<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>枕草子を読み込む</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  $filename = "makuranosoushi.txt";
  $fileObj = new SplFileObject($filename, "rb");
  foreach ($fileObj as $key => $value) {
    echo sprintf("%02d:　%s", $key, es($value)), "<br>";
  }
?>
</div>
</body>
</html>
