<?php
require_once("../../lib/util.php");
// データベースユーザ
$user = 'inventoryuser';
$password = 'pw4inventoryuser';
// 利用するデータベース
$dbName = 'inventory';
// MySQLサーバ
$host = 'localhost:3306';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>レコードを取り出す</title>
<link href="../css/style.css" rel="stylesheet">
<!-- テーブル用のスタイルシート -->
<link href="../../css/tablestyle2.css" rel="stylesheet">
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
    // SQL文を作る
    $sql = "SELECT goods.id as goods_id, goods.name as goods_name,
     goods.size, brand.name as brand_name
    FROM goods, brand
    WHERE goods.brand = brand.id
    ORDER BY goods_id";
    // プリペアドステートメントを作る
    $prepare = $pdo->prepare($sql);
    // SQL文を実行する
    $prepare->execute();
    // 結果の取得（連想配列で受け取る）
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    // テーブルのタイトル行
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>", "ID", "</th>";
    echo "<th>", "商品", "</th>";
    echo "<th>", "サイズ", "</th>";
    echo "<th>", "ブランド", "</th>";
    echo "</tr></thead>";
    // 値を取り出して行に表示する
    echo "<tbody>";
    foreach ($result as $row){
      // １行ずつテーブルに入れる
      echo "<tr>";
      echo "<td>", es($row['goods_id']), "</td>";
      echo "<td>", es($row['goods_name']), "</td>";
      echo "<td>", es($row['size']), "</td>";
      echo "<td>", es($row['brand_name']), "</td>";
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
