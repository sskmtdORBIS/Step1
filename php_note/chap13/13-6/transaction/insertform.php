<?php
require_once("../../lib/util.php");
$gobackURL = "insertform.html";

// データベースユーザ
$user = 'inventoryuser';
$password = 'pw4inventoryuser';
// 利用するデータベース
$dbName = 'inventory';
// MySQLサーバ
$host = 'localhost:3306';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
//MySQLデータベースに接続する
try {
  $pdo = new PDO($dsn, $user, $password);
  // プリペアドステートメントのエミュレーションを無効にする
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  // 例外がスローされる設定にする
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // ブランドテーブルからブランドIDとブランド名を取り出す
  $sql = "SELECT id, name FROM brand";
  // プリペアドステートメントを作る
  $stm = $pdo->prepare($sql);
  // SQLクエリを実行する
  $stm->execute();
  // 結果の取得（連想配列で受け取る）
  $brand = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  $err =  '<span class="error">エラーがありました。</span><br>';
  $err .= $e->getMessage();
  exit($err);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>レコード追加</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <!-- 入力フォームを作る -->
  <form method="POST" action="insert_goods.php">
    <ul>
      <li>
        <label>商品ID：
        <input type="text" name="id" placeholder="商品ID">
        </label>
      </li>
      <li>
        <label>商品名：
        <input type="text" name="name" placeholder="商品名">
        </label>
      </li>
      <li>
        <label>サイズ：
        <input type="text" name="size" placeholder="（未入力でもOK）">
        </label>
      </li>
      <li>ブランド：
        <select name="brand">
          <?php
          // ブランドはブランドテーブルに登録してあるものから選ぶ
          foreach ($brand as $row){
            echo '<option value="', $row["id"], '">', $row["name"], "</option>";
          }
          ?>
        </select>
      </li>
      <li>
        <label>個数：
        <input type="number" name="quantity" placeholder="半角数字">
      </li>
      <li><input type="submit" value="追加する"></li>
    </ul>
  </form>
</div>
</body>
</html>
