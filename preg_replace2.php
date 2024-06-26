<?php

$pattern = ["/開催日/u","/開始時間/u"];
$replacement = ["金曜日","午後２：３０"];
$subject = "次回は開催日の開始時間からです。";
$result = preg_replace($pattern,$replacement,$subject);
echo $result;
?>