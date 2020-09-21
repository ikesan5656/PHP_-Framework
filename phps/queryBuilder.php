<?php
class queryBuilder
{
    private $_completed = false;
    private $table_name = "TEST";
    private $select_array = array();
    private $select_sql;
    private $where_array = array();
    private $where_sql =  "";
    private $m_sql = "";
    private $m_sql_array = array();

    //select文をsqlに追加
    public function select($column) {
        $this->select_array[] = $column;
        return $this;
    }

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

    public function createFromQuery() {
        $this->m_sql_array[] = "FROM $this->table_name";
    }

    //where句をsqlに追加
    public function where($where) {
        $this->where_array[] = $where;
        return $this;
    } 

    //継承先に定義
    //配列として追加したwhere句をANDで結びSQL文として連結
    public function createWhereQuery() {
        //where句配列をAND区切りで連結
        $this->where_sql = implode(" AND ", $this->where_array);
        //$this->m_sql_array[] = $this->where_sql;
        return $this;
    }

    //最終的なクエリを生成
    public function createQuery() {
        //where句を生成
        $this->createSelectQuery();
        $this->createFromQuery();
        $this->createWhereQuery();
        //echo "ほげ";
        /*$this->m_sql .= "SELECT $this->select_sql";
        $this->m_sql .= "FROM $this->table_name";
        $this->m_sql .= "WHERE $this->where_sql";*/
        //echo $this->m_sql;
        //return $this;
    }

    //最終的なクエリを組み立てる
    public function queryBuild() {
        //それぞれのクエリの生成
        $this->createQuery();

        $this->m_sql = implode(" ", $this->m_sql_array);

        echo $this->m_sql;

        return $this;
    }

    public function out() {
        echo $this->m_sql;
        return $this;
    }

    //条件に合うデータを全て取得
    public function getAll() {

    }

}

$queryBuilder = new queryBuilder();
$queryBuilder
        ->select("TYPE_ID")
        ->where("test_ID = 1")
        ->queryBuild();
?>