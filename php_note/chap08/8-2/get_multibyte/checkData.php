
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>GETリクエスト処理</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  // GETリクエストのパラメータの値を受け取る
  $data = $_GET["data"];
  // URLデコードする
  $data = rawurldecode($data);
  echo "「{$data}」を受け取りました。";
?>
</div>
</body>
</html>
