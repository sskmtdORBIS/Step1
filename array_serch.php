<?php

$nameList = ["m01" => "田中達也","m02" => "佐々木和也","w01" => "新井貴子","w02" => "笠井香"];
$ageList = ["m01" => 34,"m02" => 24,"w01" => 22,"w02" => 43];

function getAge($name){
    global $nameList;
    global $ageList;
    $key = array_search($name,$nameList);
    if($key !== false){
        $age = $ageList[$key];
        echo "{$name}さんは{$age}です。";
    } else {
        echo "{$name}さんはメンバーではありません。";
    }
}

echo getAge("新井貴子"),"<br>";
echo getAge("鈴木孝彦"),"<br>";
echo getAge("田中達也"),"<br>";
echo getAge("笠井香"),"<br>";
?>