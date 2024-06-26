<?php
// クッキーを破棄する
$result1 = setcookie('visitedLog[counter]', "", time()-3600);
$result2 = setcookie('visitedLog[time]', "", time()-3600);
$result = ($result1 && $result2);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>リセットページ</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
 <?php
  if ($result){
    echo "訪問ログのクッキーを破棄しました。", "<hr>";
    echo '<a href="page1.php">Page 1に戻る</a>';
  } else {
    echo '<span class="error">クッキーの破棄でエラーがありました。</span>';
  }
 ?>
</div>
</body>
</html>
