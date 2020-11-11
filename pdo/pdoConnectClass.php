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

    //条件に合うデータを全て取得
    //(このメソッドはMテーブルに使用)
    public function getAll($sql) {
        $stmt = $this->pdo_obj->query($sql);
        $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
	}
	
	/**
	 * ポケモン図鑑テーブルにプリペアドステートメントで挿入
	 * 
	 */
	public function insertPokeIndex($nationwide_id, $name, $gender_id, $type_id) {
		//文を実行する準備を行い、文オブジェクトを返す
		$stmt = $this->pdo_obj->prepare("INSERT INTO U_POKEMON_INDEX (NATIONWIDE_ID, NAME, GENDER_ID, M_TYPE_ID)
		VALUES (:NATIONWIDE_ID, :NAME, :GENDER_ID, :TYPE_ID)");

		$stmt->bindValue(':NATIONWIDE_ID', $nationwide_id, PDO::PARAM_INT);
		$stmt->bindParam(':NAME', $name, PDO::PARAM_STR);
		$stmt->bindValue(':GENDER_ID', $gender_id, PDO::PARAM_INT);
		$stmt->bindValue(':TYPE_ID', $type_id, PDO::PARAM_INT);
		$stmt->execute();
	}
}

?>