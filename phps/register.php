<?php
require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../smarty/libs/Smarty.class.php";
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilder.php";

$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
//自作データベース接続クラスオブジェクト生成
$connect_obj = new pdoConnectClass();
//クエリビルダ
$gender_model = new queryBuilder();
$gender_model->setTable("M_GENDER")->queryBuild();

$type_model = new queryBuilder();
$type_model->setTable("M_TYPE")->queryBuild();

try {
  //データベース接続
  $connect_obj->connection();

} catch(PDOException $e) {
  //エラー発生時
  echo "データベース接続失敗";
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage()); 

}

//性別取得
$m_gender = $connect_obj->getAll($gender_model->getQuery());
//タイプ取得
$m_type = $connect_obj->getAll($type_model->getQuery());

$smarty->assign('m_gender', $m_gender);
$smarty->assign('m_type', $m_type);
$smarty->assign('test', "test");
$smarty->display("../templates/register.html");
?>

