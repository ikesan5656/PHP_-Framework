<?php

define('DSN', 'mysql:host=localhost; dbname=DB_POKEMON; charset=utf8');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'POke5656.3142');

class pdoConnectClass {

    private $pdo_obj;

    //データベース接続
    public function connection() {
        $this->pdo_obj = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        //例外をスローしてくれる．これを選択しておくのが一番無難．
        $this->pdo_obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo_obj->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    //PDOオブジェクトを取得させる
    public function getPdo() {
        return $this->pdo_obj;
    }

    //データベースからselectする
    public function select($sql) {
        //select文を実行
        $stmt = $this->pdo_obj->query($sql);
        $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }
}

?>