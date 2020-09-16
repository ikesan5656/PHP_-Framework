<?php
class queryBuilder
{
    private $_completed = false;
    //private $where = array();
    private $m_sql = "";

    //select文をsqlに追加
    public function select($table_name) {
        $this->m_sql .= "SELECT * FROM {$table_name}";
        //
        //echo $this->m_sql;
        return $this;
    }

    //where句をsqlに追加
    public function where($sql) {
        $this->m_sql .= " WHERE {$sql}";
        return $this;
    } 

	//継承先に定義
    public function createWhereQuery() {

    }

    public function out() {
        echo $this->m_sql;
        return $this;
    }

}

$queryBuilder = new queryBuilder();
$queryBuilder->select("M_TYPE")
        ->where("TYPE_ID = 1")
        ->out();


?>