<?php
/**
 * ポケモン図鑑テーブル(U_POKEMON_INDEX)の中身を表示する
 */

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../smarty/libs/Smarty.class.php";
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilder.php";

$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';

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

$smarty->display("../templates/PokedexView.html");