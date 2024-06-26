<?php
//STDINを引数としたfgets関数の返り値をtrim関数に引数として渡す。
//その返り値をexplode関数に第二引数として渡す。第一引数は" "を渡す。その返り値を$NLに代入する。
// メモ：N戦闘回数、L初期レベル
$NL = explode(" ",trim(fgets(STDIN)));

//$myLevelに$NL[1]を代入する。
$myLevel = $NL[1];

//初期値$i=0、条件評価式$i<$NL[0]、繰り返し後の実行処理$i++をfor文に渡す
for($i=0;$i<$NL[0];$i++){
    //STDINを引数としたfgets関数の返り値をtrim関数に引数として渡す。返り値を$enemyLevelに代入する。
    //メモ：対戦相手のレベルを取得。
    $enemyLevel = trim(fgets(STDIN));
    //if条件式に$myLevel>$enemyLevelを設定する。
    if($myLevel>$enemyLevel){
        //floor関数に$enemyLevel/2を引数として渡した返り値を$myLevelに足す。
        $myLevel += floor($enemyLevel/2);
        //else if条件式に$myLevel<$enemyLevelを設定。
    } else if($myLevel<$enemyLevel) {
        //floor関数に$myLevel/2を引数として渡した返り値を$myLevelに代入する。
        $myLevel = floor($myLevel/2);
    }
}
//$myLevelを出力する。
echo $myLevel;


?>