<?php
/**
 * U_POKEMON_INDEXテーブル操作クラス
 */
require_once dirname(__FILE__) . '/../Db/BaseController.php';

class Db_U_POKEMON_INDEX extends Db_BaseController {

	private $table_name = "U_POKEMON_INDEX";

	/**
	 * ポケモン図鑑テーブルの全カラムに挿入(セキュリティ対策)
	 * @param object $pdo_obj pdoインスタンス
	 * @param integer $nationwide_id 全国図鑑番号
	 * @param string $name 名前
	 * @param integer $gender_id 性別ID
	 * @param integer $type_id タイプID
	 */
	public function insertAll($pdo_obj, $nationwide_id, $name, $gender_id, $type_id) {
		//文を実行する準備を行い、文オブジェクトを返す
		$stmt = $pdo_obj->prepare("INSERT INTO $this->table_name (NATIONWIDE_ID, NAME, GENDER_ID, TYPE_ID)
		VALUES (:NATIONWIDE_ID, :NAME, :GENDER_ID, :TYPE_ID)");

		$stmt->bindValue(':NATIONWIDE_ID', $nationwide_id, PDO::PARAM_INT);
		$stmt->bindParam(':NAME', $name, PDO::PARAM_STR);
		$stmt->bindValue(':GENDER_ID', $gender_id, PDO::PARAM_INT);
		$stmt->bindValue(':TYPE_ID', $type_id, PDO::PARAM_INT);
		$stmt->execute();
	}

	/**
	 * ポケモン図鑑テーブルの情報を全て取得する(ユーザー入力がない)
	 * 
	 */
	public function selectAll() {

	}
}