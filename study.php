<?php
require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';

//自作データベース接続クラスオブジェクト生成
$connect_obj = new pdoConnectClass();

try {
  //データベース接続
  $connect_obj->connection();

} catch(PDOException $e) {
  //エラー発生時
  echo "データベース接続失敗";
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage()); 

}

$sql = "SELECT * FROM M_GENDER";
$test = $connect_obj->select($sql);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="study.css">
    <title>データベース学習</title>
  </head>
  <body>
    <h1>データベース管理</h1>
    <p>はじめてのHTMLを作りました</p>
    <?php
    print_r($test);
    ?>
    <form>
      <table>
        <tr>
          <td colspan=2>基本情報</td>
        </tr>
        <tr>
          <th>名前</th>
          <td><input type="text" name="namae"></td>
        </tr>
        <tr>
          <th>性別</th>
          <td>aaa</td>
        </tr>

      </table>
    </form>

  </body>
</html>