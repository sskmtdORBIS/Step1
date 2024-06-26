<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>本日のランチ</title>
  <link  href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
$meat = "チキン南蛮香味だれ";
$fish = "鯖の竜田揚げ";
?>

<body>
<div class="main-contents">

本日のランチ、肉料理は、
<h1>
<?php echo $meat; ?>
</h1>
魚料理は、
<h1>
<?php echo $fish; ?>
</h1>
です。<br>

</div>
</body>
</html>
