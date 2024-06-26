<?php
require_once("bar1:Staff.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Staffクラスを読み込んで利用する</title>
</head>
<body>
<pre>
<?php
    $hana = new Staff("花",21);
    $taro = new Staff("太郎",35);

    $hana->hello();
    $taro->hello();
?>
</pre>
</body>
</html>