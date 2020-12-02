<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 14:20:16
  from '/home/www/html/PHP_FrameWork/templates/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7a2a035df22_07617926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '576292e37ec60932337d78c284c14c26fca8bc58' => 
    array (
      0 => '/home/www/html/PHP_FrameWork/templates/register.html',
      1 => 1606918774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc7a2a035df22_07617926 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/table.css">
		<title>データベース登録</title>
	</head>
	<body>
		<h1>データベース登録</h1>		
		<form action="../app/registerCheck.php" method="POST"> 
			<table>
				<tr>
					<td colspan=2>基本情報</td>
				</tr>
				<tr>
					<th>図鑑番号</th>
					<td><input type="text" name="index" value=<?php echo $_smarty_tpl->tpl_vars['m_index']->value;?>
></td>
				</tr>
				<tr>
					<th>名前</th>
					<td><input type="text" name="name" value=<?php echo $_smarty_tpl->tpl_vars['m_name']->value;?>
></td>
				</tr>	
				<tr>
					<th>性別</th>
					<td>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m_gender']->value, 'gender');
$_smarty_tpl->tpl_vars['gender']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->do_else = false;
?>
							<input type="radio" name="gender" value=<?php echo $_smarty_tpl->tpl_vars['gender']->value['M_GENDER_ID'];?>

								<?php if ($_smarty_tpl->tpl_vars['gender']->value['M_GENDER_ID'] == $_smarty_tpl->tpl_vars['select_data_array']->value['gender']) {?>
									checked
								<?php }?>
							>
							<label for="gender"><?php echo $_smarty_tpl->tpl_vars['gender']->value['NAME'];?>
</label>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</td>
				</tr>
				<tr>
				  <th>タイプ</th>
				  <td>
				      <select name="type">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m_type']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
							<option value=<?php echo $_smarty_tpl->tpl_vars['type']->value['M_TYPE_ID'];?>

								<?php if ($_smarty_tpl->tpl_vars['type']->value['M_TYPE_ID'] == $_smarty_tpl->tpl_vars['select_data_array']->value['type']) {?>
									selected
								<?php }?>
								><?php echo $_smarty_tpl->tpl_vars['type']->value['NAME'];?>

							</option>
				        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				      </select>
				  </td>
				</tr>
			</table>
			<input type="submit" value="送信">
			<input type="reset" name="reset" value="リセット" >
		</form>
	</body>
</html><?php }
}
