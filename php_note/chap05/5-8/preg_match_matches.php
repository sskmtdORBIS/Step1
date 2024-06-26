<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>マッチした値を取り出す</title>
</head>
<body>
<pre>
<?php
// 「佐」から始まり「子」で終わる名前
$pattern = "/佐.+子/u";
// ヒアドキュメント
$subject = <<< "names"
佐藤有紀
佐藤ゆう子
塩田智子
杉山香
names;
// マッチテスト
$result = preg_match($pattern, $subject, $matches);
// 実行結果をチェックする
if ($result === false) {
  echo "エラー：", preg_last_error();
} else if ($result == 0){
  echo "マッチした値はありません。";
} else {
  echo "「", $matches[0], "」が見つかりました。";
}
?>
</pre>
</body>
</html>
