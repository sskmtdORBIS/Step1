<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>論理積を利用した条件式 and</title>
</head>
<body>
<?php
$sex = "woman";
$age = 34;
if ($sex == "woman") {
  if (($age>=30)&&($age<40)) {
    echo "採用です。";
  } else {
    echo "30代の方を募集しています。";
  }
} else {
  echo "女性のみの募集です。";
}
?>
</body>
</html>
