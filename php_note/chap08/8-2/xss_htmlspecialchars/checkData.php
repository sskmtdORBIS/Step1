
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>GETリクエスト処理（XSS対策）</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  // GETリクエストのパラメータの値を受け取る
  $data = $_GET["data"];
  // URLデコードする
  $data = rawurldecode($data);
  // XSS対策
  $data = htmlspecialchars(string:$data, flags:ENT_QUOTES, encoding:'UTF-8')
  echo "「{$data}」を受け取りました。";
?>
</div>
</body>
</html>
