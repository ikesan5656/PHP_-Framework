<?php
session_start();

//登録ボタンを押したとき
if(isset($_POST['regist'])) {
	//登録処理を行う
	echo "登録しました";
}

//戻るボタンを押したとき
if(isset($_POST['back'])) {
	//登録ページに値を保持してリダイレクト
	header('Location: http://192.168.33.10/PHP_FrameWork/phps/register.php');
	exit;
}

