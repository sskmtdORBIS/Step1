<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>数学と英語がともに60点以上のときに合格</title>
</head>
<body>
<?php
$sugaku = 85;
$eigo = 67;
// 両方とも60以上のときに合格
if (($sugaku>=60) && ($eigo>=60)) {
  echo "おめでとう！合格です！";
} else {
  echo "残念、不合格です。";
}
?>
</body>
</html>
