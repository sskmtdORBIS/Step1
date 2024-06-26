<?php
$page = "PHP ８　サンプル.html";
$path = rawurlencode($page);
$url ="http://sample.com/{$path}";
echo $url,"<br>";
?>

<?php
$decoded = Rawurldecode($path);
echo $decoded;
?>