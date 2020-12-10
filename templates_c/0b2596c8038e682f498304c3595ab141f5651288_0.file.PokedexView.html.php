<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-07 06:53:55
  from '/home/www/html/PHP_Framework/templates/PokedexView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcdd1839929a6_48598427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b2596c8038e682f498304c3595ab141f5651288' => 
    array (
      0 => '/home/www/html/PHP_Framework/templates/PokedexView.html',
      1 => 1607324023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcdd1839929a6_48598427 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/test.css">
		<title>ポケモン図鑑</title>
	</head>
	<body>
		<h1 class="page_header" >ポケモン図鑑</h1>
		<form action="" method="POST"> 
			<table class="custom">
				<tr>
					<th class="table_header" width="10%">図鑑番号</th>
					<th class="table_header">名前</th>
					<th class="table_header">性別</th>
				</tr>
				<!--
				<tr>
					<td class="table_cell">
						<p>1</p>
						<img src="../Assets/PixelArts/001.png" alt="画像" width="64">
					</td>
					<td class="table_cell">フシギダネ</td>
					<td class="table_cell">オス</td>
				</tr>
				<tr>
					<td class="table_cell">2</td>
					<td class="table_cell">フシギソウ</td>
					<td class="table_cell">メス</td>
				</tr>
				-->
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pokemon_index_data']->value, 'pokemon_data');
$_smarty_tpl->tpl_vars['pokemon_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pokemon_data']->value) {
$_smarty_tpl->tpl_vars['pokemon_data']->do_else = false;
?>
					<tr>
						<td class="table_cell"><?php echo $_smarty_tpl->tpl_vars['pokemon_data']->value['M_NATIONWIDE_ID'];?>
</td>
						<td class="table_cell"><?php echo $_smarty_tpl->tpl_vars['pokemon_data']->value['NAME'];?>
</td>
						<td class="table_cell"><?php echo $_smarty_tpl->tpl_vars['pokemon_data']->value['GENDER_NAME'];?>
</td>
					</tr>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			</table>
		</form>
	</body>
</html><?php }
}
