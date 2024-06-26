<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>コロンで区切ったwhile文</title>
    </head>
    <body>
        <?php
        $num = 1;
        ?>
        <?php while ($num < 10):?>
        げんき<br>
        <?php
        $plus = mt_rand(1,10);
        $num += $plus;
        echo "{$plus}、{$num}<br>";
        ?>

        <?php endwhile;?>
    </body>
</html>

<?php
do{
    $a=mt_rand(1,13);
    $b=mt_rand(1,13);
    $c=mt_rand(1,13);
    $abc = $a + $b +$c;

} while ($a <= 3);
echo "{$a},{$b},{$c}";
?>

