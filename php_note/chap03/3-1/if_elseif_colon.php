<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>コロンで区切ったif構文</title>
</head>
<body>
<?php
$age = 25; //年齢が25歳の場合
?>
<?php if ($age<=15):?>
  15歳以下の料金は500円です。<br>
<?php elseif ($age<=19):?>
  16歳から19歳は2,000円です。<br>
<?php else:?>
  20歳以上の大人は2,500円です。<br>
<?php endif;?>
</body>
</html>
