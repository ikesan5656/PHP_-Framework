<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-23 23:56:09
  from '/home/www/html/study/templates/registerCheck.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f4283898da4f0_27214595',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edc6c8d96b2f9ab920358e9306df621058443476' => 
    array (
      0 => '/home/www/html/study/templates/registerCheck.html',
      1 => 1598194560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4283898da4f0_27214595 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/table.css">
    <title>データベース登録確認</title>
  </head>
  <body>
    <h1>データベース登録確認</h1>

    <form action="" method="POST"> 
      <table>
        <tr>
          <td colspan=2>基本情報</td>
        </tr>
        <tr>
          <th>名前</th>
          <td><?php echo $_POST['name'];?>
</td>
        </tr>

        <tr>
          <th>性別</th>
          <td><?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</td>
        </tr>

        <tr>
          <th>タイプ</th>
          <td>

          </td>
        </tr>

        
      </table>
      <input type="submit" value="送信">
    </form>
  </body>
</html><?php }
}
