<?php
session_start();

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../smarty/libs/Smarty.class.php";
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilder.php";

//require_once dirname(__FILE__) . "draw.php";

$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
//自作データベース接続クラスオブジェクト生成
$connect_obj = new pdoConnectClass();
//$draw = new draw();

try {
	//データベース接続
	$connect_obj->connection();

} catch(PDOException $e) {
	//エラー発生時
	echo "データベース接続失敗";
	header('Content-Type: text/plain; charset=UTF-8', true, 500);
	exit($e->getMessage()); 
}

//postデータを受け取る
$post_data = $_POST;
//postデータをセッション変数に格納
$_SESSION = $post_data;

print_r($_SESSION);

//性別取得
$sql = "SELECT * FROM M_GENDER";
$m_gender = $connect_obj->select($sql);

if(isset($post_data["gender"])) {
	foreach($m_gender as $m_gender_data) {
		if($post_data["gender"] == $m_gender_data["GENDER_ID"]) {
			$gender = $m_gender_data["NAME"];
		}
	}
}

//$gender = $draw->displaySelectData($_POST["gender"], $m_gender);

//タイプ取得
$sql = "SELECT * FROM M_TYPE";
$m_type = $connect_obj->select($sql);

if(isset($post_data["type"])) {
	foreach($m_type as $m_type_data) {
		if($post_data["type"] == $m_type_data["TYPE_ID"]) {
			$type = $m_type_data["NAME"];
		}
	}
}

$smarty->assign('gender', $gender);
$smarty->assign('type', $type);

$smarty->display("../templates/registerCheck.html");
?>

