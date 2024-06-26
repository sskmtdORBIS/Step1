<?php

function array_addUnique($array,$value){
    if(in_array($value, $array)){
        return false;
    } else {
        $array[] = $value;
        return $array;
    }
}

$myList = ["blue","green"];
print_r(array_addUnique($myList,"white"));
array_addUnique($myList,"blue");
array_addUnique($myList,"red");
array_addUnique($myList,"white");
print_r($myList);
?>