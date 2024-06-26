<?php

$subject = "Apple Pie";

$result = str_replace("p","?",$subject,$count);
echo "置換前：{$subject}",PHP_EOL;
echo "置換後：{$result}",PHP_EOL;
echo "個数：{$count}";
?>

<?php

$serch = ["p","e"];

$subject = "a piece of the apple pie";

$result = str_ireplace($serch,"?",$subject,$count);
echo "{$result}<br>","<br>";
echo "{$count}";

?>