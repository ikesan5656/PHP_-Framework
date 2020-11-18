<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-18 02:36:11
  from '/home/www/html/PHP_Framework/templates/registerCheck.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb4889bda3ed3_92763127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0790edc655c023d5041e0519c25c78906cc0d313' => 
    array (
      0 => '/home/www/html/PHP_Framework/templates/registerCheck.html',
      1 => 1605666964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb4889bda3ed3_92763127 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/table.css">
		<title>データベース登録確認</title>
	</head>
	<body>
		<h1>データベース登録確認</h1>
		<form action="../phps/registerCheckIndex.php" method="POST"> 
			<table>
				<tr>
					<td colspan=2>基本情報</td>
				</tr>
				<tr>
					<th>図鑑番号</th>
					<td><?php echo $_POST['index'];?>
</td>
				</tr>
				<tr>
					<th>名前</th>
					<td><?php echo $_POST['name'];?>
</td>
				</tr>
				<tr>
					<th>性別</th>
					<td><?php echo $_smarty_tpl->tpl_vars['select_gender']->value['NAME'];?>
</td>
				</tr>
				<tr>
					<th>タイプ</th>
					<td><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</td>
				</tr>
			</table>
			<!--hidden-->
			<input type="hidden" name="nationwide_id" value=<?php echo $_POST['index'];?>
>
			<input type="hidden" name="name" value=<?php echo $_POST['name'];?>
>
			<input type="hidden" name="select_gender_id" value=<?php echo $_smarty_tpl->tpl_vars['select_gender']->value['GENDER_ID'];?>
>

			<input type="submit" name="regist" value="登録">
			<input type="submit" name="back" value="戻る">
		</form>
	</body>
</html><?php }
}
