<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>カウンタを人数として計算する</title>
</head>
<body>
<?php
$price = 0;
$max = 6;
for ($kazu=1; $kazu<=$max; $kazu++){
  if ($kazu<=3){
    $price += 1000;
  } else {
    $price += 500;
  }
  echo "{$kazu}人、{$price}円。";
}
?>
</body>
</html>
