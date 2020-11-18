<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-18 02:45:36
  from '/home/www/html/PHP_FrameWork/templates/registerCheck.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb48ad0259ca7_29530969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2f4e76c710fcc37b79b9eeebffce96290f47fea' => 
    array (
      0 => '/home/www/html/PHP_FrameWork/templates/registerCheck.html',
      1 => 1605667521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb48ad0259ca7_29530969 (Smarty_Internal_Template $_smarty_tpl) {
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
					<td><?php echo $_smarty_tpl->tpl_vars['select_type']->value['NAME'];?>
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
			<input type="hidden" name="select_type_id" value=<?php echo $_smarty_tpl->tpl_vars['select_type']->value['TYPE_ID'];?>
>

			<input type="submit" name="regist" value="登録">
			<input type="submit" name="back" value="戻る">
		</form>
	</body>
</html><?php }
}
