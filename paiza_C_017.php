<?php
//親カードの番号を取得　A Bの順番で配列に入れる
$Parent = explode(" ",trim(fgets(STDIN)));

//子の人数を取得する
$N = trim(fgets(STDIN));

//以下をforで繰り返し
//親のカードのA勝負をさせ、引き分けだった場合はBカードの勝負をして勝敗配列に入れる
//それ以外の場合はA勝負の結果を配列に入れる

for($i=1;$i<=$N;$i++){
    $child = explode(" ",trim(fgets(STDIN)));
    if($Parent[0] == $child[0]){
        if($Parent[1] < $child[1]){
            echo "High",PHP_EOL;
        } else {
            echo "Low",PHP_EOL;
        }
    } else {
        if($Parent[0] > $child[0]){
            echo "High",PHP_EOL;
        } else {
            echo "Low",PHP_EOL;
        }
    }
}



?>