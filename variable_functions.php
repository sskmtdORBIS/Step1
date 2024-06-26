<?php

function byebye ($who){
    echo "{$who}さんさようなら！";
}

$msg = "bye";

$msg("金太郎");


//if(function_exists())無くても結果同じだな。。。

?>