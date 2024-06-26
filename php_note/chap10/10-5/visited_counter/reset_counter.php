<?php
// カウントをリセットする（テスト用に5分間有効）
$result = setcookie("visitedCount", 0, time()+60*5);
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
    echo "カウンタをリセットしました。", "<hr>";
    echo '<a href="page1.php">Page 1に戻る</a>';
  } else {
    echo '<span class="error">カウンタのリセットでエラーがありました。</span>';
  }
 ?>
</div>
</body>
</html>
