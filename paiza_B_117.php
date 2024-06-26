<?php

//車の台数Nを取得

$N = trim(fgets(STDIN));

//初期位置を取得し配列に入れる

for($i=0;$i<$N;$i++){
    $line[]=trim(fgets(STDIN));
}

//今回出ていく車を$goingcarに代入する

$goingcar = 1;

//各車の周回回数を配列に入れる

for($i=0;$i<$N;$i++){
    $roundcount[]=0;
}

//配列の０を取り出し$goingcarと一致したら取り出したままにして$goingcarを＋１する
//$goingcarと一致しなかったら配列の最後にもう一度入れ、該当するキーの$roundcountを＋１し、$line配列が空になるまでループを回す

while(count($line)>0){
    if($line[0] == $goingcar){
        array_shift($line);
        $goingcar += 1;
    } else {
        $removed = array_shift($line);
        $line[] = $removed;
        $roundcount[$removed-1] += 1;
    }
}

echo max($roundcount);

?>