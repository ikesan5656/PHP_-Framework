<?php
if (!session_start()) {
	echo 'セッション開始失敗！';
}

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../smarty/libs/Smarty.class.php";
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilder.php";
error_log("〇〇の処理で失敗しました", 0);
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

if(isset($_SESSION["name"])) {
  $m_name = $_SESSION["name"];
}else{
  $m_name = "";
}

//選択状態データベース格納配列
$select_data_array = array();

//選択している性別ID
/*if(isset($_SESSION["gender"])) {
  $select_gender = $_SESSION["gender"];
}else{
	$select_gender = null;
}*/

//選択している性別ID
if(isset($_SESSION["gender"])) {
	$select_data_array["gender"] = $_SESSION["gender"];
  }else{
	$select_data_array["gender"] = null;
}

//print_r($_SESSION);

//選択しているtypeID
if(isset($_SESSION["type"])) {
	$select_data_array["type"] = $_SESSION["type"];
  }else{
	$select_data_array["type"] = null;
}

//性別取得
$m_gender = $connect_obj->getAll($gender_model->getQuery());
//タイプ取得
$m_type = $connect_obj->getAll($type_model->getQuery());


$smarty->assign('m_name', $m_name);
$smarty->assign('m_gender', $m_gender);
$smarty->assign('m_type', $m_type);
$smarty->assign('select_data_array', $select_data_array);
$smarty->assign('test', "test");
$smarty->display("../templates/register.html");
?>

