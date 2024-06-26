<?php
require_once("../../lib/util.php");
// データベースユーザ
$user = 'testuser';
$password = 'pw4testuser';
// 利用するデータベース
$dbName = 'testdb';
// MySQLサーバ
$host = 'localhost:3306';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>名前を変更する(UPDATE)</title>
<link href="../../css/style.css" rel="stylesheet">
<!-- テーブル用のスタイルシート -->
<link href="../../css/tablestyle.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  //MySQLデータベースに接続する
  try {
    $pdo = new PDO($dsn, $user, $password);
    // プリペアドステートメントのエミュレーションを無効にする
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベース{$dbName}に接続しました。", "<br>";
    // SQL文を作る（名前を変更する）
    $sql = "UPDATE member SET name = '新倉立男' WHERE id = 5";
    // プリペアドステートメントを作る
    $stm = $pdo->prepare($sql);
    // SQL文を実行する
    $stm->execute();

    // 更新後の確認
    $sql = "SELECT * FROM member WHERE id = 5";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    // 結果の取得（連想配列で受け取る）
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    // テーブルのタイトル行
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>", "ID", "</th>";
    echo "<th>", "名前", "</th>";
    echo "<th>", "年齢", "</th>";
    echo "<th>", "性別", "</th>";
    echo "</tr></thead>";
    // 値を取り出して行に表示する
    echo "<tbody>";
    foreach ($result as $row){
      // １行ずつテーブルに入れる
      echo "<tr>";
      echo "<td>", es($row['id']), "</td>";
      echo "<td>", es($row['name']), "</td>";
      echo "<td>", es($row['age']), "</td>";
      echo "<td>", es($row['sex']), "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
  ?>
</div>
</body>
</html>
