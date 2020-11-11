<?php
/**
 * インサートするためのクラス
 */
class queryBuilderInsert
{
	private $table_name = "";
	private $insert_field_array = array();
	private $insert_field_sql = "";
	private $insert_value_array = array();
	private $insert_value_sql = "";
	private $m_sql = "";
	private $m_sql_array = array();

	/**
	 * テーブル名をセット
	 * @param string $table_name テーブル名
	 * @return object 自身のインスタンス
	 */
	public function setTable($table_name) {
		$this->table_name = $table_name;
		return $this;
	}

	/**
	 * INSERT句の作成
	 * @return object 自身のインスタンス
	 */
	public function createInsetQuery() {
		$this->m_sql_array[] = "INSERT INTO $this->table_name";
		return $this;
	}

	/**
	 * INSERTするカラムを配列に追加
	 * @param string $insert_field insertするカラム
	 * @return object 自身のインスタンス
	 */
	public function insertField($insert_field) {
		$this->insert_field_array[] = $insert_field;
		return $this;
	}

	/**
	 * INSERTするカラム配列を文字列として結合
	 * @return object 自身のインスタンス
	 */
	public function createInsertFieldQuery() {
		//配列なら処理を行うが、空配列の場合には処理は行わない
		if($this->insert_field_array && is_array($this->insert_field_array)) {
			$this->insert_field_sql = implode(",", $this->insert_field_array);
			$this->m_sql_array[] = "({$this->insert_field_sql})";
		}
		return $this;
	}

	/**
	 * INSERTする値を配列に追加
	 * @param string $insert_value insertする値
	 * @return object 自身のインスタンス
	 */
	public function insertValues($insert_value) {
		$this->insert_value_array[] = $insert_value;
		return $this;
	}

	/**
	 * INSERTする値の配列を文字列として結合
	 * @return object 自身のインスタンス
	 */
	public function createInsertValuesQuery() {
		//配列なら処理を行うが、空配列の場合には処理は行わない
		if($this->insert_value_array && is_array($this->insert_value_array)) {
			$this->insert_value_sql = implode(",", $this->insert_value_array);
			$this->m_sql_array[] = "VALUES ({$this->insert_value_sql})";
		}
		return $this;
	}

	/**
	 * クエリ配列を作成(メソッド内のクエリの順で必ず行う)
	 * @return object 自身のインスタンス
	 */
	public function createQuery() {
		//where句を生成
		$this->createInsetQuery();
		$this->createInsertFieldQuery();
		$this->createInsertValuesQuery();
	}

	/**
	 * クエリ文を組み立てる
	 * @return object 自身のインスタンス
	 */
	public function queryBuild() {
		//それぞれのクエリの生成
		$this->createQuery();
		$this->m_sql = implode(" ", $this->m_sql_array);
		return $this;
	}

	/**
	 * sql文をデバッグ出力するため
	 */
	public function out() {
		echo $this->m_sql;
	}

	/**
	 * sql文を取得
	 * @return string 作成したsql文
	 */
	public function getQuery() {
		return $this->m_sql;
	}

	/**
	 * ポケモン図鑑新規Insert用クエリ作成
	 * @return string 作成したsql文
	 */
	public function insertPokemonIndexSql($index_num, $name, $gender_id, $type_id) {
		$this->m_sql = "INSERT INTO U_POKEMON_INDEX (NATIONWIDE_ID, NAME, GENDER_ID, M_TYPE_ID)
		VALUES ($index_num, $name, $gender_id, $type_id)";
		return $this->m_sql;
	}
}
?>