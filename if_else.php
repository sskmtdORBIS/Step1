<?php
$age = 18; //年齢を指定
if ($age <13) {
    $price = 0;
} else if ($age<15) {
    $price = 500;
} else if ($age<=19) {
    $price = 1000;
} else {
    $price = 2000;
}
$msg = $age."歳なので".$price."円です。" ;
echo $msg;

echo "<br><br>";

$sugaku = 50;
$eigo = 60;

if ($sugaku >=90) {
    if($eigo >= 90){
        echo "おめでとう両方合格です！";
    } else {
        echo "英語はもう少し頑張ろう！";
    }
} else if ($eigo>= 90) {
    echo "数学もうちょっと頑張ろうぜ";
} else {
    echo "両方頑張ろう";
}

echo "<br><br>";

if (($sugaku>=90) && ($eigo>=90)) {
    echo "両方が合格です！！";
} else if (($sugaku>=90) && ($eigo<90)) {
    echo "英語は頑張りましょう";
} else if (($sugaku<90) && ($eigo>=90)) {
    echo "数学は頑張りましょう";
} else {
    echo "ザンネーン！！";
}

if ($sugaku == 50){
    echo "５０点かー！！！";
} else {
    echo "むむ";
}

?>