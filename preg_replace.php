<?php
function numbermask($subject){
    $pattern = "/^\d{4}\s?\d{4}\s?\d{4}\s?\d{2}(\d{2})$/";
    $replacement = "**** **** **** **$1";
    $result = preg_replace($pattern,$replacement,$subject);

    if(is_null($result)){
        return "エラー:".preg_last_error();
    } else if($result == $subject) {
        return "番号エラー";
    } else {
        return $result;
;

    }
}

$number1 = "1234 5678 9012 3456";
$number2 = "6543210987654321";
$number3 = null;
$number4 = "12345678901234567";

$num1 = numbermask($number1);
$num2 = numbermask($number2);
$num3 = numbermask($number3);
$num4 = numbermask($number4);



echo "{$num1}<br>";
echo "{$num2}<br>";
echo "{$num3}<br>";
echo "{$num4}<br>";



?>
