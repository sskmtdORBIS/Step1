<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ユーザ定義関数をhtmlコードに組み込む</title>
</head>
<body>
2400円を２個購入した場合の金額は

<?php
$kingaku = price(2400,2);
if($kingaku<5000){
    $souryo = 250;
    $kingaku += $souryo;
    echo "受注額が5000円未満のため送料{$souryo}円がかかり、合計でお支払い金額は{$kingaku}円です。";
} else {
    echo "お支払い金額は{$kingaku}円です。";
}
?>

<br>

1200円を５個購入した場合の金額は
<?php
$kingaku = price(1200,5);
if($kingaku<5000){
    $souryo = 250;
    $kingaku += $souryo;
    echo "受注額が5000円未満のため送料{$souryo}円がかかり、合計でお支払い金額は{$kingaku}円です。";
} else {
    echo "お支払い金額は{$kingaku}円です。";
}
?>

<?php

function price($tanka, $kosu) {
    $ryoukin = $tanka * $kosu;
    return $ryoukin;
}

?>
</body>
</html>