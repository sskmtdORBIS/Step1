<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>年月日の書式を「0000-00-00」で表示する</title>
</head>
<body>
<?php
$year = 1987;
$month = 3;
$day = 9;
printf('%04d-%02d-%02d', $year, $month, $day);
?>
</body>
</html>
