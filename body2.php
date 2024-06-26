<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>コロンで区切ったswitch構文</title>
</head>
<body>
<?php
$color =10;
?>
<?php switch($color):?>
<?php case 0:?>
    0は５００円です。<br>
<?php break; ?>

<?php case 1:?>
    1は１０００円です。<br>
<?php break; ?>

<?php case 2:?>
    2は２０００円です。<br>
<?php break; ?>

<?php default: ?>
それ以外は１万円
<?php break; ?>
<?php endswitch; ?>
</body>
</html>