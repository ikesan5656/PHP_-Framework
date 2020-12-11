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
	public function insertAll($pdo_obj, $nationwide_id, $name, $gender_id) {
		//文を実行する準備を行い、文オブジェクトを返す
		$stmt = $pdo_obj->prepare("INSERT INTO $this->table_name (M_NATIONWIDE_ID, NAME, GENDER_ID)
		VALUES (:M_NATIONWIDE_ID, :NAME, :GENDER_ID)");

		$stmt->bindValue(':M_NATIONWIDE_ID', $nationwide_id, PDO::PARAM_INT);
		$stmt->bindParam(':NAME', $name, PDO::PARAM_STR);
		$stmt->bindValue(':GENDER_ID', $gender_id, PDO::PARAM_INT);
		$stmt->execute();
	}

	/**
	 * ポケモン図鑑テーブルの情報を全て取得する(セキュリティ対策)
	 * 
	 */
	public function selectAll() {

	}

	/**
	 * 関連テーブルをjoinし、取得する
	 */
	public function joinSelect($pdo_obj) {
		$stmt = $pdo_obj->prepare("
		SELECT {$this->table_name}.M_NATIONWIDE_ID, {$this->table_name}.NAME, M_GENDER.NAME AS GENDER_NAME
		FROM {$this->table_name} 
		LEFT JOIN M_GENDER 
		ON {$this->table_name}.GENDER_ID = M_GENDER.M_GENDER_ID
		");
		$stmt->execute();
		$all_join_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $all_join_data;
		
	}
}