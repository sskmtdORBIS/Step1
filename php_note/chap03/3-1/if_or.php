<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>論理和を利用した条件式 or</title>
</head>
<body>
<?php
$sugaku = 42;
$eigo = 67;
// どちらか一方でも60以上ならば合格
if (($sugaku>=60) || ($eigo>=60)) {
  echo "おめでとう！合格です！";
} else {
  echo "残念、不合格です。";
}
?>
</body>
</html>
