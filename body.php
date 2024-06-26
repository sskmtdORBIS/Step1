<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>コロンで区切ったif構文</title>
</head>
<body>
<?php
$age =25;
?>
<?php if($age<=15):?>
            15歳以下の料金は５００円です。<br>
<?php elseif ($age<=19):?>
            20歳未満の料金は１０００円です。<br>
<?php else:?>
            20歳以上の料金は２０００円です。<br>
<?php endif;?>
</body>
</html>