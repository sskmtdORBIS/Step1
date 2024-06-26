<?php
$data = [];
$data[]=["name"=>"井上真美","age"=>37,"phone"=>"090-4321-5678"];
$data[]=["name"=>"鈴木隆","age"=>23,"phone"=>"03-4321-3332"];
$data[]=["name"=>"山田孝之","age"=>54,"phone"=>"080-1234-1234"];
$data[]=["name"=>"兵頭龍太郎","age"=>43,"phone"=>"048-881-5678"];
$pattern = "/(\D)\D{2}$/";
$replacement = "**";

foreach($data as $user){
    $result = preg_replace($pattern,$replacement,$user);
    foreach($result as $key => $value){
        echo "{$key}:",$value,PHP_EOL;
    }
}
?>

