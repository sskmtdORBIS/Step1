<?php
$num = "99";

switch ($num){
    case 1:
        $result_switch = "普通";
        break;
    case 99:
        $result_switch = "当たり";
        break;
    default:
        $result_switch = "該当なし";
        break;
}
echo "switch判定結果{$result_switch}<br>";

$result_match = match($num){
    1 => "普通",
    99 => "当たり",
    default => "該当なし",
};
echo "matchの判定 {$result_match}";
?>