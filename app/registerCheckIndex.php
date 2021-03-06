<?php
session_start();

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';
require_once dirname(__FILE__) . "/../queryBuilder/queryBuilderInsert.php";
require_once dirname(__FILE__) . "/../Db/U_POKEMON_INDEX.php";
require_once dirname(__FILE__) . "/../Db/U_TYPE.php";


//postデータを受け取る
$post_data = $_POST;
//print_r(json_encode($post_data));
print_r($post_data["select_type"]);


//登録ボタンを押したとき
if(isset($_POST['regist'])) {
	//登録処理を行う
	//insertの処理を行なう
	echo "登録しました";

	//自作データベース接続クラスオブジェクト生成
	$connect_obj = new pdoConnectClass();
	try {
		//データベース接続
		$connect_obj->connection();

		//トランザクション開始
		$connect_obj->beginTransaction();

		//トランザクションの処理
		try {
			//メインテーブルのinsert
			$model_pokemon_index = new Db_U_POKEMON_INDEX();
			$model_pokemon_index->insertAll($connect_obj->getPdo(), $post_data["nationwide_id"], $post_data["name"], $post_data["select_gender_id"]);
			//typeのinsert
			$model_type = new Db_U_TYPE();
			foreach($post_data["select_type"]["id"] as $type_id) {
				$model_type->insertAll($connect_obj->getPdo(), $post_data["nationwide_id"],$type_id);
			}
			
			$connect_obj->commit();
		} catch(PDOException $e) {
			echo "インサート失敗";
			$connect_obj->rollBack();
			// 外側のTryブロックに対してスロー
			throw $e;
		}

	} catch(PDOException $e) {
		//エラー発生時
		echo "データベース接続失敗";
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage()); 
	}
}

//戻るボタンを押したとき
if(isset($_POST['back'])) {
	//登録ページに値を保持してリダイレクト
	header('Location: http://192.168.33.10/PHP_FrameWork/app/register.php');
	exit;
}

