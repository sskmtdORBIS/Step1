<?php

function exchangeList(&$value,$key,$rateData){
    $rate = $rateData["rate"];
    if($rate == 0){
        return;
    }
    $value = $value/$rate;

    $value = round($value,2);
}

$priceList = [2300,1200,4000];

$dollaryen = ["symbol"=>'$',"rate"=>150.0];

array_walk($priceList,"exchangeList",$dollaryen);
print_r($priceList);
?>