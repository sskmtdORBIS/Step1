<?php

//寿司の種類数Nとパックに詰める寿司の数Mを取得し配列&NMに代入

$NM = explode(" ",trim(fgets(STDIN)));

//並べるべき寿司の種類を配列$patternに代入

for($i=0;$i<$NM[1];$i++){
    $pattern[]=trim(fgets(STDIN));
}

//残りのM行を順に取得しながら$patternを取得した値でin_arrayし、合致するものがあったら配列から削除
//合致するものがなかったらその時点でNoを結果に返してbreakする

$result = "Yes";




for($i=0;$i<$NM[1];$i++){
    $key = array_search(trim(fgets(STDIN)),$pattern);
    if($key !== false){
        unset($pattern[$key]);
    } else {
        $result = "No";
        break;
    }
}

echo $result;

?>