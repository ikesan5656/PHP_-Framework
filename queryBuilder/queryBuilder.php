<?php
/**
 * セレクトするためのクラス
 */
class queryBuilder
{
	private $table_name = "";
	private $select_array = array();
	private $select_sql = "";
	private $where_array = array();
	private $where_sql =  "";
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
	 * select文を配列に追加
	 * @param string $column カラム名
	 * @return object 自身のインスタンス
	 */
	public function select($column) {
		$this->select_array[] = $column;
		return $this;
	}

	/**
	 * 配列として追加したselect文をsqlとして作成する
	 * @return object 自身のインスタンス
	 */
	public function createSelectQuery() {
		//配列なら処理を行うが、空配列の場合には処理は行わない
		if($this->select_array && is_array($this->select_array)) {
			$this->select_sql = implode(",", $this->select_array);
			//SELECT文をSQL配列に格納
			$this->m_sql_array[] = "SELECT $this->select_sql";
		}else{
			$this->m_sql_array[] = "SELECT *";
		}
		return $this;
	}

	/**
	 * FROM句の作成、追加
	 * @return object 自身のインスタンス
	 */
	public function createFromQuery() {
		$this->m_sql_array[] = "FROM $this->table_name";
	}

	/**
	 * where文を配列に追加
	 * @param string $where where条件文
	 * @return object 自身のインスタンス
	 */
	public function where($where) {
		$this->where_array[] = $where;
		return $this;
	} 

	/**
	 * 配列として追加したwhere文をsqlとして作成する
	 * @return object 自身のインスタンス
	 */
	public function createWhereQuery() {
		if($this->where_array && is_array($this->where_array)) {
			//where句配列をAND区切りで連結
			$this->where_sql = implode(" AND ", $this->where_array);
			$this->m_sql_array[] = "WHERE $this->where_sql";
		}
		return $this;
	}

	/**
	 * クエリ配列を作成
	 * @return object 自身のインスタンス
	 */
	public function createQuery() {
		//where句を生成
		$this->createSelectQuery();
		$this->createFromQuery();
		$this->createWhereQuery();
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
}
?>