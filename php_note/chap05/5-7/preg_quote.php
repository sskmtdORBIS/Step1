<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>preg_quote()でエスケープする</title>
</head>
<body>
<pre>
<?php
// URLに含まれるメタ文字をエスケープする
$escaped = preg_quote("http://sample.com/php/", "/");
$pattern = "/{$escaped}/u";
echo $pattern, "\n";
var_dump(preg_match($pattern, "URLはhttp://sample.com/php/です"));
var_dump(preg_match($pattern, "URLはhttp://sample.com/swift/です"));
?>
</pre>
</body>
</html>
