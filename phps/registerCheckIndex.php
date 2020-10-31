<?php

//登録ボタンを押したとき
if(isset($_POST['regist'])) {
	//登録処理を行う
}

//戻るボタンを押したとき
if(isset($_POST['back'])) {
	//登録ページに値を保持してリダイレクト
	header('Location: http://192.168.33.10/PHP_FrameWork/phps/register.php');
	exit;
}

