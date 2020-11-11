<?php
session_start();

require_once dirname(__FILE__) . '/../pdo/pdoConnectClass.php';

//自作データベース接続クラスオブジェクト生成
$connect_obj = new pdoConnectClass();

//登録ボタンを押したとき
if(isset($_POST['regist'])) {
	//登録処理を行う
	//insertの処理を行なう
	echo "登録しました";
}

//戻るボタンを押したとき
if(isset($_POST['back'])) {
	//登録ページに値を保持してリダイレクト
	header('Location: http://192.168.33.10/PHP_FrameWork/phps/register.php');
	exit;
}

