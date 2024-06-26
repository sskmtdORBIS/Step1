<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>引数名を利用する</title>
</head>
<body>
<?php
function fee($adult=0, $child=0) {
  $adult_fee = 1000 * $adult;
  $child_fee = 600 * $child;
  $fee = $adult_fee + $child_fee;
  return $fee;
}
?>
<?php
$total = fee(1, 2);
echo "大人１人、子供２人の料金：";
echo "{$total}円";
?>
<br>

<?php
$total = fee(child:2, adult:1);
echo "子供２人、大人１人の料金：";
echo "{$total}円";
?>
<br>

<?php
$total = fee(child:1);
echo "子供１人の料金：";
echo "{$total}円";
?>
</body>
</html>
