<?php
require_once("Soccer.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soccerクラスを利用する</title>
</head>
<body>
<pre>
<?php
$player1 = new Soccer("しんじ");
$player1->who();
$player1->play();
?>

<?php
$player2 = new Soccer("翼");
echo "{$player2}";
?>

<?php
$player3 = new Soccer();
$player3->play();

print_r($player3);

?>

</pre>
</body>
</html>