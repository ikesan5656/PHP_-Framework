<?php
//セッションを管理するクラスシングルトン

class SessionManager {
	private 

	//セッション開始
	function start() {
		session_start();
	}

	//セッション変数1つ登録
	public function setSession($session_name, $regist_data) {
		$_SESSION["$session_name"] = $regist_data;
	}
}

