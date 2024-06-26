<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を定数にする</title>
</head>
<body>
<pre>
<?php
define("RANK", ["松", "竹", "梅"]);
print_r(RANK);
echo RANK[1];

?>
</pre>
</body>
</html>
