<?php
// クッキーに保存する値を準備する
$message = "ハロー";
// クッキーに値を代入する（ブラウザを閉じるまで有効）
$result = setcookie("message", $message);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>クッキー保存ページ</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  if ($result){
    echo "クッキーを保存しました。", "<hr>";
    echo '<a href="check_cookie.php">クッキーを確認するページへ</a>';
  } else {
    echo '<span class="error">クッキーの保存でエラーがありました。</span>', "<br>";
  }
  ?>
</div>
</body>
</html>
