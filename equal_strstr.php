<?php
function holiday($youbi){
    if(($youbi == "土曜日")||($youbi == "日曜日")){
        echo $youbi,"はおやすみです。", "<br>";
    } else {
        echo $youbi,"はおやすみではありません。<br>";
    }
}

holiday("金曜日");
holiday("水曜日");
holiday("日曜日");
?>