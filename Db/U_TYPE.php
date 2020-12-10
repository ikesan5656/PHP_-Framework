<?php
/**
 * U_TYPEテーブル操作クラス
 */
require_once dirname(__FILE__) . '/../Db/BaseController.php';

class Db_U_TYPE extends Db_BaseController {
	private $table_name = "U_TYPE";

	/**
	 * タイプテーブルに全挿入(セキュリティ対策)
	 */
	public function insertAll($pdo_obj, $nationwide_id, $type_id) {
		//文を実行する準備を行い、文オブジェクトを返す
		$stmt = $pdo_obj->prepare("INSERT INTO $this->table_name (NATIONWIDE_ID, TYPE_ID)
		VALUES (:NATIONWIDE_ID, :TYPE_ID)");

		$stmt->bindValue(':NATIONWIDE_ID', $nationwide_id, PDO::PARAM_INT);
		$stmt->bindValue(':TYPE_ID', $type_id, PDO::PARAM_INT);
		$stmt->execute();
	}

	/**
	 * 蘭連テーブルをjoinし、取得する
	 */
	public function joinSelect($pdo_obj) {
		$stmt = $pdo_obj->prepare("
		SELECT {$this->table_name}.NATIONWIDE_ID, {$this->table_name}.TYPE_ID, M_TYPE.NAME AS TYPE_NAME
		FROM {$this->table_name}
		LEFT JOIN M_TYPE
		ON {$this->table_name}.TYPE_ID = M_TYPE.M_TYPE_ID
		");
		
		$stmt->execute();
		$all_join_data = $stmt->fetchAll();
		return $all_join_data;
	}
}