<?php
echo mb_internal_encoding(),"<br><br>";
?>

<?php
$msg = "Ｈｅｌｌｏ！　ＰＨＰ８を始めようぜ。";
$msg = mb_convert_kana($msg,"sa");
$msg = mb_convert_kana($msg,"Ah");
$msg = mb_convert_kana($msg,"HV");
echo "$msg";
?>
