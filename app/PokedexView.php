<?php
/**
 * ポケモン図鑑テーブル(U_POKEMON_INDEX)の中身を表示する
 */

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../smarty/libs/Smarty.class.php";
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilder.php";
require_once dirname(__FILE__) . "/../Db/U_POKEMON_INDEX.php";
require_once dirname(__FILE__) . "/../Db/U_TYPE.php";

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

//U_POKEMON_INDEXテーブルの情報を取得(仮)

//全取得するクエリの組み立て
//$pokemon_index_model = new queryBuilder();
//$pokemon_index_model->setTable("U_POKEMON_INDEX")->queryBuild();

//U_POKEMON_INDEXテーブルの情報を全レコード取得
//$pokemon_index_data = $connect_obj->getAll($pokemon_index_model->getQuery());



$model_pokemon_index = new Db_U_POKEMON_INDEX();
$pokemon_index_data = $model_pokemon_index->joinSelect($connect_obj->getPdo());

//複数レコードの配列となっているタイプを一旦文字列として連結する
$model_type = new Db_U_TYPE();


$processing_index_data = array();

//必要な情報の追加
foreach($pokemon_index_data as $pokemon_data) {
	//echo $pokemon_data["M_NATIONWIDE_ID"];
	$type_name = $model_type->joinSelectName($connect_obj->getPdo(), $pokemon_data["M_NATIONWIDE_ID"]);
	//名前を取り出す
	//print_r($type_name["TYPE_NAME"]);

	//タイプ名
	$pokemon_data["TYPE_NAME"] = $type_name["TYPE_NAME"];
	//4桁に0埋めした画像ID
	$pokemon_data["IMG_ID"] = str_pad($pokemon_data["M_NATIONWIDE_ID"], 4, '0', STR_PAD_LEFT);

	/*$type_name_array = array();
	$type_name_array[] = $type_name;
	//配列に取得したタイプ名を一つの文字列として連結する
	$type_string = "";
	$type_string = implode("/", $type_name_array);
	echo $type_string;*/

	/*foreach($type_name as $v) {
		echo $v;
	}*/
	$processing_index_data[] = $pokemon_data;
}

print_r($processing_index_data);
//print_r($type_name_array);
//print_r(json_encode($all_data));
//print_r($pokemon_index_data);
$smarty->assign('processing_index_data', $processing_index_data);
$smarty->display("../templates/PokedexView.html");