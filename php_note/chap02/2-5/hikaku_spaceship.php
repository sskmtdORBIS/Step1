<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を絶対値でソートする</title>
</head>
<body>
<pre>
<?php
$nums = [3, 4, -2, 1, -3, 9, 0, 5];
usort($nums, function($a, $b){
  return abs($a) <=> abs($b);
});
print_r($nums);
?>
</pre>
</body>
</html>
