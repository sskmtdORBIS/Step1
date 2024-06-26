<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>全角の英数記号、全角スペースを半角にする</title>
</head>
<body>
<?php
$msg = "Ｈｅｌｌｏ！　ＰＨＰ８をはじめよう。";
echo mb_convert_kana($msg, "as");
?>
</body>
</html>
