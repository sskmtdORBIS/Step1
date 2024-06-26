<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>if文のネスティング</title>
</head>
<body>
<?php
$sugaku = 85;
$eigo = 67;
if ($sugaku>=60) {
  if ($eigo>=60) {
    echo "おめでとう！合格です！";
  } else {
    echo "残念、不合格です。";
  }
} else {
  echo "残念、不合格です。";
}
?>
</body>
</html>
