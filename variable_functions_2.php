
<?php

function hello($who){
    echo"{$who}さん、こんにちは！";

}

$msg = "hello";

if(function_exists($msg)){
    $msg("太郎");
}
?>

